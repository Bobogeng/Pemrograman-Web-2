<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Pasien;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PasienController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Pasien',
        ];
        $list_pasien = Pasien::all();
        View::share($data_layout);
        return view('pasien.show', ['list_pasien' => $list_pasien]);
    }

    public function create()
    {
        $list_kelurahan = Kelurahan::all();
        return view('pasien.create', ['list_kelurahan' => $list_kelurahan]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required|date_format:d/m/Y',
            'gender' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kelurahan_id' => 'required',
        ]);

        $data = $request->all();
        $data['tgl_lahir'] = Carbon::createFromFormat('d/m/Y', $data['tgl_lahir'])->format('Y-m-d H:i:s');

        Pasien::create($data);

        return redirect(route('pasien'))->with('pesan', 'Data berhasil disimpan');
    }

    public function edit(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $list_kelurahan = Kelurahan::all();

        $pasien->tgl_lahir = Carbon::parse($pasien->tgl_lahir)->format('d/m/Y');

        return view('pasien.edit', ['pasien' => $pasien, 'list_kelurahan' => $list_kelurahan]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required|date_format:d/m/Y',
            'gender' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kelurahan_id' => 'required',
        ]);

        $data = $request->all();
        $data['tgl_lahir'] = Carbon::createFromFormat('d/m/Y', $data['tgl_lahir'])->format('Y-m-d H:i:s');

        $pasien = Pasien::findOrFail($id);
        $pasien->update($data);


        return redirect(route('pasien'))->with('pesan', 'Data berhasil diupdate');
    }

    public function view(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.view', ['pasien' => $pasien]);
    }

    public function destroy(string $id): RedirectResponse
    {
        Pasien::find($id)->delete();
        return redirect(route('pasien'))->with('pesan', 'Data berhasil dihapus');
    }
}
