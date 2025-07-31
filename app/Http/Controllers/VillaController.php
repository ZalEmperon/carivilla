<?php

namespace App\Http\Controllers;

use App\Models\Villa;
use Illuminate\Http\Request;

class VillaController extends Controller
{
    // public function dashboardVilla()
    // {
    //     return view('home');
    // }

    public function showListVilla()
    {
        $dataVilla = Villa::all();
        return view('guest.list_villa', compact('dataVilla'));
    }

    public function showDetailVilla($slug)
    {
        $dataVilla = Villa::where('slug', $slug)->first();
        if (!$dataVilla) {
            return redirect()->back()->with('error', 'Villa not found.');
        }
        return view('guest.detail_villa', compact('dataVilla'));
    }
}
