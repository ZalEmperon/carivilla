<?php

namespace App\Http\Controllers;

use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboardAdmin()
    {
        $dataVilla = Villa::select('id', 'nama', 'slug','lokasi', 'harga_weekday','harga_weekend', 'foto_slider')->get();
        return view('admin.dashboard', compact('dataVilla'));
    }

    public function addVillaAdmin(Request $request)
    {
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
            'fasilitas.*.name' => 'required|string',
            'fasilitas.*.image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'map_embed' => 'required|string',
            'nomor_wa' => 'required|string|max:20',
        ]);

        $fotoSlider = [];
        if ($request->hasFile('foto_slider')) {
            foreach ($request->file('foto_slider') as $image) {
                $filename = 'villa' . time() . '_' . Str::random(5) . '.' . $image->extension();
                $image->storeAs('images/villas/', $filename, 'public');
                $fotoSlider[] = $filename;
            }
        }

        $fasilitasArray = [];
        foreach ($request->fasilitas as $fasilitas) {
            $image = $fasilitas['image'];
            $filename = 'fasilitas' . time() . '_' . Str::random(5) . '.' . $image->extension();
            $image->storeAs('images/fasilitas/', $filename, 'public');

            $fasilitasArray[] = [
                'nama' => $fasilitas['name'],
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
            'foto_slider' => json_encode($fotoSlider),
            'fasilitas' => json_encode($fasilitasArray),
            'map_embed' => $request->map_embed,
            'nomor_wa' => $request->nomor_wa,
        ]);
        return redirect('/admin-dashboard');
    }

    public function edit(Villa $villa)
    {
        return view('admin.edit_villa', compact('villa'));
    }
    public function editVillaAdmin(Request $request)
    {
        $villa = Villa::where('slug', $request->slug)->first();
        if (!$villa) {
            return response()->json(['error' => 'Villa not found.'], 404);
        }

        $villa->update([
            'nama' => $request->nama ?? $villa->nama,
            'lokasi' => $request->lokasi ?? $villa->lokasi,
            'harga_weekday' => $request->harga_weekday ?? $villa->harga_weekday,
            'harga_weekend' => $request->harga_weekend ?? $villa->harga_weekend,
            'nego_weekday' => $request->nego_weekday ?? $villa->nego_weekday,
            'nego_weekend' => $request->nego_weekend ?? $villa->nego_weekend,
            'kapasitas' => $request->kapasitas ?? $villa->kapasitas,
            'kamar_tidur' => $request->kamar_tidur ?? $villa->kamar_tidur,
            'kamar_mandi' => $request->kamar_mandi ?? $villa->kamar_mandi,
            'foto_slider' => $request->foto_slider ? json_encode($request->foto_slider) : $villa->foto_slider,
            'fasilitas' => $request->fasilitas ? json_encode($request->fasilitas) : $villa->fasilitas,
            'map_embed' => $request->map_embed ?? $villa->map_embed,
            'nomor_wa' => $request->nomor_wa ?? $villa->nomor_wa,
        ]);
        return redirect('/admin-dashboard')->with(['Villa updated successfully'], 201);
    }

    public function deleteVillaAdmin($slug)
    {
        $villa = Villa::where('slug', $slug)->first();
        if (!$villa) {
            return redirect('/admin-dashboard')->withErrors(['Villa not found.'], 404);
        }
        $villa->delete();
        return redirect('/admin-dashboard')->with(['Villa deleted successfully.'], 201);
    }
}
