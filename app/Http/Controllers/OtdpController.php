<?php

namespace App\Http\Controllers;

use App\Models\Otdp;
use Illuminate\Http\Request;
use File;
use Carbon\Carbon;

class OtdpController extends Controller
{
    public function index()
    {
        $data_otdps = Otdp::latest()->get();
        return view('pages.otdp.index', compact('data_otdps'));
    }

    public function create()
    {
        return view('pages.otdp.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $destinasi = $request->destinasi_tujuan;

        if ($destinasi === 'Jawa') {
            $tujuan = $request->provinsi;
        } else {
            $tujuan = $request->provinsi . '-' . $request->destinasi_pulau;
        }

        $files = $request->file('file');
        $dok = uniqid() . '.' . 'file' . '.' . $request->file->extension();
        $files->move(public_path('file/'), $dok);
        $file = $dok;

        $file2 = $request->file('foto');
        $photo = uniqid() . '.' . 'foto' . '.' . $request->foto->extension();
        $file2->move(public_path('file/'), $photo);
        $filefoto = $photo;

        $provinsiDekat = [
            'Bali',
            'Kalimantan Selatan',
            'Kalimantan Barat',
            'Kalimantan Tengah',
            'Lampung',
            'Sumatra Selatan',
            'Sulawesi Selatan',
            'Nusa Tenggara Barat',
            'Bengkulu',
            'Jambi'
        ];

        $destinasi = $request->destinasi_tujuan; // Destinasi Tujuan dari permintaan HTTP
        $provinsi = $request->provinsi; // Provinsi dari permintaan HTTP
        $umur = $request->umur; // Umur dari permintaan HTTP
        $pekerjaan = $request->pekerjaan; // Pekerjaan dari permintaan HTTP

        $hasil = ''; // Inisialisasi variabel $hasil dengan nilai awal

        if (in_array($provinsi, $provinsiDekat)) {
            if ($umur >= 51 && $destinasi !== 'Jawa') {
                // Umur 51++ , destinasi luar Jawa, dan provinsi termasuk dalam kategori jarak dekat
                $hasil = 'Jarak Dekat'; //done
                // ...
            } elseif ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Wiraswasta') {
                // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak dekat, dan pekerjaan wiraswasta
                $hasil = 'Jarak Dekat'; //done
                // ...
            } elseif ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Buruh') {
                // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak dekat, dan pekerjaan buruh
                $hasil = 'Jarak Dekat';

            }else{
                $hasil = 'Jarak Jauh';
            }
        } else if ($umur >= 15 && $umur <= 30 && $destinasi !== 'Jawa') {
            // Umur 15-30, destinasi luar Jawa, provinsi termasuk dalam kategori jarak jauh,
            $hasil = 'Jarak Jauh'; //done
        } else if ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Karyawan Swasta') {
            // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak jauh, dan pekerjaan karyawan swasta
            $hasil = 'Jarak Jauh'; //done
        } else if ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Ibu Rumah Tangga') {
            // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak jauh, dan pekerjaan ibu rumah tangga
            $hasil = 'Jarak Jauh'; //done
        } elseif ($destinasi == 'Jawa') {
            $hasil = 'Jarak Dekat';
        } else {
            $hasil = 'Jarak Jauh';
        }

        // Simpan data ke database
        $dataOtdp = new Otdp();
        $dataOtdp->nama = $request->nama;
        $dataOtdp->no_kepolisian = $request->no;
        $dataOtdp->no_pelapor = $request->no_pelapor;
        $dataOtdp->kota = $request->kota;
        $dataOtdp->umur = $request->umur;
        $dataOtdp->tempat_lahir = $request->tempat_lahir;
        $dataOtdp->tanggal_lahir = $request->tanggal_lahir;
        $dataOtdp->alamat = $request->alamat;
        $dataOtdp->pekerjaan = $request->pekerjaan;
        $dataOtdp->destinasi_tujuan = $tujuan;
        $dataOtdp->destinasi_pulau = $request->destinasi_pulau;
        $dataOtdp->provinsi = $request->provinsi;
        $dataOtdp->nama_file = $file;
        $dataOtdp->foto = $filefoto;
        $dataOtdp->hasil = $hasil;
        $dataOtdp->save();

        return redirect()->route('otdp.index');
    }

    public function show(Otdp $otdp)
    {
        //
    }

    public function edit($id)
    {
        $data_otdp = Otdp::findOrFail($id);
        return view('pages.otdp.edit', compact('data_otdp'));
    }

    public function update(Request $request, $id)
    {

        $dataOtdp = Otdp::findOrFail($id);
        $destinasi = $request->destinasi_tujuan;

        if ($destinasi === 'Jawa') {
            $tujuan = $request->provinsi;
        } else {
            $tujuan = $request->provinsi . '-' . $request->destinasi_pulau;
        }

        if ($request->hasFile('file')) {
            $files = $request->file('file');
            $dok = uniqid() . '.' . 'file' . '.' . $request->file->extension();
            $files->move(public_path('file/'), $dok);
            $file = $dok;

            File::delete('file/' . $dataOtdp->nama_file);
        } else {
            $file = $dataOtdp->nama_file;
        }

        if ($request->hasFile('file')) {
            $file2 = $request->file('foto');
            $photo = uniqid() . '.' . 'foto' . '.' . $request->foto->extension();
            $file2->move(public_path('file/'), $photo);
            $filefoto = $photo;

            File::delete('file/' . $dataOtdp->foto);
        } else {
            $filefoto = $dataOtdp->foto;
        }
        $provinsiDekat = [
            'Bali',
            'Kalimantan Selatan',
            'Kalimantan Barat',
            'Kalimantan Tengah',
            'Lampung',
            'Sumatra Selatan',
            'Sulawesi Selatan',
            'Nusa Tenggara Barat',
            'Bengkulu',
            'Jambi'
        ];

        $destinasi = $request->destinasi_tujuan; // Destinasi Tujuan dari permintaan HTTP
        $provinsi = $request->provinsi; // Provinsi dari permintaan HTTP
        $umur = $request->umur; // Umur dari permintaan HTTP
        $pekerjaan = $request->pekerjaan; // Pekerjaan dari permintaan HTTP

        $hasil = ''; // Inisialisasi variabel $hasil dengan nilai awal

        if (in_array($provinsi, $provinsiDekat)) {
            if ($umur >= 51 && $destinasi !== 'Jawa') {
                // Umur 51++ , destinasi luar Jawa, dan provinsi termasuk dalam kategori jarak dekat
                $hasil = 'Jarak Dekat'; //done
                // ...
            } elseif ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Wiraswasta') {
                // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak dekat, dan pekerjaan wiraswasta
                $hasil = 'Jarak Dekat'; //done
                // ...
            } elseif ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Buruh') {
                // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak dekat, dan pekerjaan buruh
                $hasil = 'Jarak Dekat';

            }else{
                $hasil = 'Jarak Jauh';
            }
        } else if ($umur >= 15 && $umur <= 30 && $destinasi !== 'Jawa') {
            // Umur 15-30, destinasi luar Jawa, provinsi termasuk dalam kategori jarak jauh,
            $hasil = 'Jarak JAUH Kondisi Provinsi Jauh'; //done
        } else if ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Karyawan Swasta') {
            // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak jauh, dan pekerjaan karyawan swasta
            $hasil = 'Jarak JAUH Kondisi Provinsi Jauh'; //done
        } else if ($umur >= 31 && $umur <= 50 && $destinasi !== 'Jawa' && $pekerjaan === 'Ibu Rumah Tangga') {
            // Umur 31-50, destinasi luar Jawa, provinsi termasuk dalam kategori jarak jauh, dan pekerjaan ibu rumah tangga
            $hasil = 'Jarak JAUH Kondisi Provinsi Jauh'; //done
        } elseif ($destinasi == 'Jawa') {
            $hasil = 'Jarak Dekat';
        } else {
                $hasil = 'Jarak Jauh';
;
        }

        $dataOtdp->update([
            'nama' => $request->nama,
            'no_kepolisian' => $request->no,
            'umur' => $request->umur,
            'no_pelapor' => $request->no_pelapor,
            'kota' => $request->kota,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'destinasi_tujuan' => $tujuan,
            'destinasi_pulau' => $request->destinasi_pulau,
            'provinsi' => $request->provinsi,
            'nama_file' => $file,
            'foto' => $filefoto,
            'hasil' => $hasil,
        ]);

        return redirect()->route('otdp.index');
    }

    public function destroy($id)
    {
        $data_otdp = Otdp::findOrFail($id);
        if ($data_otdp) {
            File::delete('file/' . $data_otdp->nama_file);
            $data_otdp->delete();
            return redirect()->route('otdp.index');
        }
        return redirect()->route('otdp.index');
    }


}
