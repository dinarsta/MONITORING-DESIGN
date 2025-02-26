<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Design;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DesignController extends Controller
{
    // Menampilkan daftar design
    public function index()
    {
        $designs = Design::all();
        return view('designs.index', compact('designs'));
    }

    // Menampilkan form tambah design
    public function create()
    {
        $designers = User::where('role', 'designer')->get();
        return view('designs.create', compact('designers'));
    }

    // Menyimpan design baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'designer_id' => 'required|exists:users,id'
        ]);

        Design::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'designer_id' => $request->designer_id,
            'status' => 'pending',
        ]);

        return redirect('/designs')->with('success', 'Design berhasil ditambahkan.');
    }

    // Menampilkan detail design
    public function show(Design $design)
    {
        return view('designs.show', compact('design'));
    }

    // Menampilkan form edit design
    public function edit(Design $design)
    {
        $designers = User::where('role', 'designer')->get();
        return view('designs.edit', compact('design', 'designers'));
    }

    // Mengupdate design
    public function update(Request $request, Design $design)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'designer_id' => 'required|exists:users,id',
            'status' => 'required|in:pending,on_progress,completed',
        ]);

        $design->update($request->all());

        return redirect('/designs')->with('success', 'Design berhasil diperbarui.');
    }

    // Menghapus design
    public function destroy(Design $design)
    {
        $design->delete();
        return redirect('/designs')->with('success', 'Design berhasil dihapus.');
    }
}
