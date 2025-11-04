<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UMKM;

class UMKMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showDashboard()
    {
        $umkms = UMKM::with('user')->get();
        return view('dashboard', ['umkms' => $umkms]);
    }
}