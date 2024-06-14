<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UnitKerjaController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Unit Kerja',
        ];
        $list_unitkerja = UnitKerja::all();
        View::share($data_layout);
        return view('unitkerja.show', ['list_unitkerja' => $list_unitkerja]);
    }

    public function create()
    {
        return view('unitkerja.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
        ]);

        UnitKerja::create($request->all());

        return redirect(route('unitkerja'))->with('pesan', 'Data berhasil disimpan');
    }

    public function edit(string $id)
    {
        $unitkerja = UnitKerja::findOrFail($id);
        return view('unitkerja.edit', ['unitkerja' => $unitkerja]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $unitkerja = UnitKerja::findOrFail($id);
        $unitkerja->update($request->all());

        return redirect(route('unitkerja'))->with('pesan', 'Data berhasil diupdate');
    }

    public function view(string $id)
    {
        $unitkerja = UnitKerja::findOrFail($id);
        return view('unitkerja.view', ['unitkerja' => $unitkerja]);
    }

    public function destroy(string $id): RedirectResponse
    {
        UnitKerja::find($id)->delete();
        return redirect(route('unitkerja'))->with('pesan', 'Data berhasil dihapus');
    }
}
