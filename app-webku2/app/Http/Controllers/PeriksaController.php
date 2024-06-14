<?php

namespace App\Http\Controllers;

use App\Models\Paramedik;
use App\Models\Pasien;
use App\Models\Periksa;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PeriksaController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Periksa',
        ];
        $list_periksa = Periksa::all();
        View::share($data_layout);
        return view('periksa.show', ['list_periksa' => $list_periksa]);
    }

    public function create()
    {
        $list_pasien = Pasien::all();
        $list_paramedik = Paramedik::all();

        return view('periksa.create', ['list_pasien' => $list_pasien, 'list_paramedik' => $list_paramedik]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tanggal' => 'required|date_format:d/m/Y',
            'berat' => 'required',
            'tinggi' => 'required',
            'tensi' => 'required',
            'keterangan' => 'required',
            'pasien_id' => 'required',
            'paramedik_id' => 'required',
        ]);

        $data = $request->all();
        $data['tanggal'] = Carbon::createFromFormat('d/m/Y', $data['tanggal'])->format('Y-m-d H:i:s');

        Periksa::create($data);

        return redirect(route('periksa'))->with('pesan', 'Data berhasil disimpan');
    }

    public function edit(string $id)
    {
        $periksa = Periksa::findOrFail($id);
        $list_pasien = Pasien::all();
        $list_paramedik = Paramedik::all();

        $periksa->tanggal = Carbon::parse($periksa->tanggal)->format('d/m/Y');

        return view('periksa.edit', ['periksa' => $periksa, 'list_pasien' => $list_pasien, 'list_paramedik' => $list_paramedik]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'tanggal' => 'required|date_format:d/m/Y',
            'berat' => 'required',
            'tinggi' => 'required',
            'tensi' => 'required',
            'keterangan' => 'required',
            'pasien_id' => 'required',
            'paramedik_id' => 'required',
        ]);

        $data = $request->all();
        $data['tanggal'] = Carbon::createFromFormat('d/m/Y', $data['tanggal'])->format('Y-m-d H:i:s');

        $periksa = Periksa::findOrFail($id);
        $periksa->update($data);


        return redirect(route('periksa'))->with('pesan', 'Data berhasil diupdate');
    }

    public function view(string $id)
    {
        $periksa = Periksa::findOrFail($id);
        return view('periksa.view', ['periksa' => $periksa]);
    }

    public function destroy(string $id): RedirectResponse
    {
        Periksa::find($id)->delete();
        return redirect(route('periksa'))->with('pesan', 'Data berhasil dihapus');
    }
}
