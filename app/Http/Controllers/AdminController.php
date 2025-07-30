<?php

namespace App\Http\Controllers;

use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboardAdmin()
    {
        $dataVilla = Villa::select('id', 'nama', 'slug', 'lokasi', 'harga_weekday', 'harga_weekend', 'foto_slider')->get();
        return view('admin.dashboard', compact('dataVilla'));
    }

    public function addVillaAdmin(Request $request)
    {
        $publicStorageLink = public_path('storage');
        if (!is_link($publicStorageLink)) {
            Artisan::call('storage:link');
        }
        if (!Storage::disk('public')->exists('uploads')) {
            Storage::disk('public')->makeDirectory('uploads');
        }
        if (!Storage::disk('public')->exists('uploads/villas')) {
            Storage::disk('public')->makeDirectory('uploads/villas');
        }
        if (!Storage::disk('public')->exists('uploads/fasilitas')) {
            Storage::disk('public')->makeDirectory('uploads/fasilitas');
        }
        $request->validate([
            'nama' => 'required|string',
            'lokasi' => 'required|string',
            'harga_weekday' => 'required|integer',
            'harga_weekend' => 'required|integer',
            'nego_weekday' => 'required|boolean',
            'nego_weekend' => 'required|boolean',
            'kapasitas' => 'required|integer',
            'kamar_tidur' => 'required|integer',
            'kamar_mandi' => 'required|integer',
            'foto_slider.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'fasilitas' => 'required|array',
            'fasilitas.*.nama' => 'required|string',
            'fasilitas.*.foto' => 'image|mimes:jpeg,png,jpg|max:2048',
            'map_embed' => 'required|string',
            'nomor_wa' => 'required|string|max:20',
        ]);

        $fotoSlider = [];
        if ($request->hasFile('foto_slider')) {
            foreach ($request->file('foto_slider') as $image) {
                $filename = 'villa' . time() . '_' . Str::random(5) . '.' . $image->extension();
                $image->storeAs('uploads/villas/', $filename, 'public');
                $fotoSlider[] = $filename;
            }
        }

        $fasilitasArray = [];
        foreach ($request->fasilitas as $fasilitas) {
            $image = $fasilitas['foto'];
            $filename = 'fasilitas' . time() . '_' . Str::random(5) . '.' . $image->extension();
            $image->storeAs('uploads/fasilitas/', $filename, 'public');

            $fasilitasArray[] = [
                'nama' => $fasilitas['nama'],
                'foto' => $filename
            ];
        }

        $baseSlug = Str::slug($request->nama);
        $slug = $baseSlug;
        $count = 1;
        while (Villa::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        Villa::create([
            'nama' => $request->nama,
            'slug' => $slug,
            'lokasi' => $request->lokasi,
            'harga_weekday' => $request->harga_weekday,
            'harga_weekend' => $request->harga_weekend,
            'nego_weekday' => $request->nego_weekday,
            'nego_weekend' => $request->nego_weekend,
            'kapasitas' => $request->kapasitas,
            'kamar_tidur' => $request->kamar_tidur,
            'kamar_mandi' => $request->kamar_mandi,
            'foto_slider' => $fotoSlider,
            'fasilitas' => $fasilitasArray,
            'map_embed' => $request->map_embed,
            'nomor_wa' => $request->nomor_wa,
        ]);
        return redirect('/admin-dashboard');
    }

    public function editVillaAdminPage($slug)
    {
        $dataVilla = Villa::where('slug', $slug)->first();
        return view('admin.edit_villa', compact('dataVilla'));
    }

    public function editVillaAdmin(Request $request)
    {
        $dataVilla = Villa::where('slug', $request->slug)->first();
        if (!$dataVilla) {
            return back()->with('error', 'Villa not found.');
        }

        $fotoSlider = $dataVilla->foto_slider;
        if ($request->hasFile('foto_slider')) {
            foreach ($fotoSlider as $oldImage) {
                Storage::disk('public')->delete('/uploads/villas/' . $oldImage);
            }

            $fotoSlider = [];
            foreach ($request->file('foto_slider') as $file) {
                $filename = 'villa' . time() . '_' . Str::random(5) . '.' . $file->extension();
                $file->storeAs('uploads/villas', $filename, 'public');
                $fotoSlider[] = $filename;
            }
        }

        $fasilitas = $dataVilla->fasilitas;
        if ($request->fasilitas) {
            $newFasilitas = [];
            foreach ($request->fasilitas as $key => $item) {
                $image = $fasilitas[$key]['foto'] ?? null;

                // if (isset($item['foto']) && $item['foto'] instanceof UploadedFile) {
                if ($image) {
                    Storage::disk('public')->delete('/uploads/fasilitas/' . $image);
                }

                $filename = 'fasilitas' . time() . '_' . Str::random(5) . '.' . $item['foto']->extension();
                $item['foto']->storeAs('uploads/fasilitas', $filename, 'public');
                $image = $filename;
                // }

                $newFasilitas[] = [
                    'nama' => $item['nama'],
                    'foto' => $image
                ];
            }
            $fasilitas = $newFasilitas;
        }

        $dataVilla->update([
            'nama' => $request->nama ?? $dataVilla->nama,
            'lokasi' => $request->lokasi ?? $dataVilla->lokasi,
            'harga_weekday' => $request->harga_weekday ?? $dataVilla->harga_weekday,
            'harga_weekend' => $request->harga_weekend ?? $dataVilla->harga_weekend,
            'nego_weekday' => $request->boolean('nego_weekday'),
            'nego_weekend' => $request->boolean('nego_weekend'),
            'kapasitas' => $request->kapasitas ?? $dataVilla->kapasitas,
            'kamar_tidur' => $request->kamar_tidur ?? $dataVilla->kamar_tidur,
            'kamar_mandi' => $request->kamar_mandi ?? $dataVilla->kamar_mandi,
            'foto_slider' => $fotoSlider,
            'fasilitas' => $fasilitas,
            'map_embed' => $request->map_embed ?? $dataVilla->map_embed,
            'nomor_wa' => $request->nomor_wa ?? $dataVilla->nomor_wa,
        ]);

        return redirect('/admin-dashboard')->with('success', 'Villa updated successfully');
    }

    public function edit(Villa $villa)
    {
        return view('admin.edit_villa', compact('villa'));
    }

    public function deleteVillaAdmin($slug)
    {
        $dataVilla = Villa::where('slug', $slug)->first();
        if (!$dataVilla) {
            return redirect('/admin-dashboard')->withErrors(['Villa not found.'], 404);
        }
        if (is_array($dataVilla->foto_slider)) {
            foreach ($dataVilla->foto_slider as $foto) {
                $dataVillaImagePath = public_path('storage\\uploads\\villas\\' . $foto);
                if (File::exists($dataVillaImagePath)) {
                    File::delete($dataVillaImagePath);
                }
            }
        }
        if (is_array($dataVilla->fasilitas)) {
            foreach ($dataVilla->fasilitas as $fasilitas) {
                if (!empty($fasilitas['foto'])) {
                    $fasilitasImagePath = public_path('storage\\uploads\\fasilitas\\' . $fasilitas['foto']);
                    if (File::exists($fasilitasImagePath)) {
                        File::delete($fasilitasImagePath);
                    }
                }
            }
        }
        $dataVilla->delete();
        return redirect('/admin-dashboard')->with(['Villa deleted successfully.'], 201);
    }
}
