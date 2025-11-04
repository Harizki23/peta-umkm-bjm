<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUMKMRequest;
use App\Http\Requests\UpdateUMKMRequest;
use App\Models\User;
use App\Models\UMKM;

class UMKMController2 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $umkms = UMKM::with('user')->get();
        return view('umkm.index', ['umkms' => $umkms]);
    }

    public function create()
    {
        $users = User::all();
        return view('umkm.create', compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUMKMRequest $request)
    {
        UMKM::create($request->validated());

        return redirect()->route('presensi.index')->with('success', 'Presensi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $presensi = UMKM::findOrFail($id);
        $users = User::all();
        return view('presensi.edit', compact('presensi', 'users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(UMKM $umkm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUMKMRequest $request, UMKM $umkm)
    {
        $umkm->update($request->validated());

        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UMKM $umkm)
    {
        $umkm->delete();

        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil dihapus!');
    }
}