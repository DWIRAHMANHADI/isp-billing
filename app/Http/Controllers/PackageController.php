<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    

public function index()
{
    $packages = Package::all();
    return view('admin.packages.index', compact('packages'));
}

public function create()
{
    return view('admin.packages.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'upload_speed' => 'required|integer',
        'download_speed' => 'required|integer',
        'price' => 'required|numeric',
    ]);

    Package::create([
        'name' => $request->name,
        'upload_speed' => $request->upload_speed,
        'download_speed' => $request->download_speed,
        'price' => $request->price,
    ]);

    return redirect()->route('admin.packages.index')->with('success', 'Paket internet berhasil ditambahkan.');
}
public function edit(Package $package)
{
    return view('admin.packages.edit', compact('package'));
}

public function update(Request $request, Package $package)
{
    $request->validate([
        'name' => 'required|string',
        'upload_speed' => 'required|integer',
        'download_speed' => 'required|integer',
        'price' => 'required|numeric',
    ]);

    $package->update([
        'name' => $request->name,
        'upload_speed' => $request->upload_speed,
        'download_speed' => $request->download_speed,
        'price' => $request->price,
    ]);

    return redirect()->route('admin.packages.index')->with('success', 'Paket internet berhasil diperbarui.');
}

public function destroy(Package $package)
{
    $package->delete();
    return redirect()->route('admin.packages.index')->with('success', 'Paket internet berhasil dihapus.');
}
}