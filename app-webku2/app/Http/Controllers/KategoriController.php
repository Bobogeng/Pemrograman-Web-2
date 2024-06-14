<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class KategoriController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Kategori',
        ];
        $list_kategori = Kategori::all();
        View::share($data_layout);
        return view('kategori.show', ['list_kategori' => $list_kategori]);
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Kategori::create($request->all());

        return redirect(route('kategori'))->with('pesan', 'Data berhasil disimpan');
    }

    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', ['kategori' => $kategori]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());

        return redirect(route('kategori'))->with('pesan', 'Data berhasil diupdate');
    }

    public function view(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.view', ['kategori' => $kategori]);
    }

    public function destroy(string $id): RedirectResponse
    {
        Kategori::find($id)->delete();
        return redirect(route('kategori'))->with('pesan', 'Data berhasil dihapus');
    }
}
