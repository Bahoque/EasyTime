<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PermisosHasrol;
use Illuminate\Http\Request;

class PermisosHasRolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisoshasrol = PermisosHasRol::with(['rol'])
        ->orderBy('ID_ROL_HAS_PERMISO')
        ->get();
        return view('permisoshasrol.index',compact('permisoshasrol'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PermisosHasrol $permisosHasrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PermisosHasrol $permisosHasrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PermisosHasrol $permisosHasrol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PermisosHasrol $permisosHasrol)
    {
        //
    }
}
