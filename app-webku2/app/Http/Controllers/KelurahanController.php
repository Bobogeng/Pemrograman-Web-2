<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class KelurahanController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Kelurahan',
        ];
        $list_kelurahan = Kelurahan::all();
        View::share($data_layout);
        return view('kelurahan.show', ['list_kelurahan' => $list_kelurahan]);
    }

    public function create()
    {
        return view('kelurahan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Kelurahan::create($request->all());

        return redirect(route('kelurahan'))->with('pesan', 'Data berhasil disimpan');
    }

    public function edit(string $id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        return view('kelurahan.edit', ['kelurahan' => $kelurahan]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->update($request->all());

        return redirect(route('kelurahan'))->with('pesan', 'Data berhasil diupdate');
    }

    public function view(string $id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        return view('kelurahan.view', ['kelurahan' => $kelurahan]);
    }

    public function destroy(string $id): RedirectResponse
    {
        Kelurahan::find($id)->delete();
        return redirect(route('kelurahan'))->with('pesan', 'Data berhasil dihapus');
    }
}
