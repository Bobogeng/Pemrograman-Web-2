<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Paramedik;
use App\Models\UnitKerja;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ParamedikController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Paramedik',
        ];
        $list_paramedik = Paramedik::all();
        View::share($data_layout);
        return view('paramedik.show', ['list_paramedik' => $list_paramedik]);
    }

    public function create()
    {
        $list_kategori = Kategori::all();
        $list_unitkerja = UnitKerja::all();

        return view('paramedik.create', ['list_kategori' => $list_kategori, 'list_unitkerja' => $list_unitkerja]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'gender' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required|date_format:d/m/Y',
            'telpon' => 'required',
            'alamat' => 'required',
            'kategori_id' => 'required',
            'unit_kerja_id' => 'required',
        ]);

        $data = $request->all();
        $data['tgl_lahir'] = Carbon::createFromFormat('d/m/Y', $data['tgl_lahir'])->format('Y-m-d H:i:s');

        Paramedik::create($data);

        return redirect(route('paramedik'))->with('pesan', 'Data berhasil disimpan');
    }

    public function edit(string $id)
    {
        $paramedik = Paramedik::findOrFail($id);
        $list_kategori = Kategori::all();
        $list_unitkerja = UnitKerja::all();

        $paramedik->tgl_lahir = Carbon::parse($paramedik->tgl_lahir)->format('d/m/Y');

        return view('paramedik.edit', ['paramedik' => $paramedik, 'list_kategori' => $list_kategori, 'list_unitkerja' => $list_unitkerja]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'gender' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required|date_format:d/m/Y',
            'telpon' => 'required',
            'alamat' => 'required',
            'kategori_id' => 'required',
            'unit_kerja_id' => 'required',
        ]);

        $data = $request->all();
        $data['tgl_lahir'] = Carbon::createFromFormat('d/m/Y', $data['tgl_lahir'])->format('Y-m-d H:i:s');

        $paramedik = Paramedik::findOrFail($id);
        $paramedik->update($data);

        return redirect(route('paramedik'))->with('pesan', 'Data berhasil diupdate');
    }

    public function view(string $id)
    {
        $paramedik = Paramedik::findOrFail($id);
        return view('paramedik.view', ['paramedik' => $paramedik]);
    }

    public function destroy(string $id): RedirectResponse
    {
        Paramedik::find($id)->delete();
        return redirect(route('paramedik'))->with('pesan', 'Data berhasil dihapus');
    }
}
