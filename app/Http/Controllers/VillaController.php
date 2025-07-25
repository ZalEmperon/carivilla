<?php

namespace App\Http\Controllers;

use App\Models\Villa;
use Illuminate\Http\Request;

class VillaController extends Controller
{
    public function index()
    {
        return redirect('/adminproduk');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Villa $villa)
    {
    }


    public function edit(Villa $villa)
    {
    }

    public function update(Request $request, Villa $villa)
    {
    }

    public function destroy(Villa $villa)
    {
    }
}
