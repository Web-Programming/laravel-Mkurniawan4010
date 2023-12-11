<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function insertElq()
    {
        // $mhs = new Mahasiswa();
        // $mhs->nama = "Verrino Adityya";
        // $mhs->npm = "2226250053";
        // $mhs->tempat_lahir = "Palembang";
        // $mhs->tanggal_lahir = date("2004-10-15");
        // $mhs->save();

        // Single
        // $mhs = Mahasiswa::insert(
        //     ['nama' => 'Verrino Adityya', 'npm' => '2226250001', 'tempat_lahir' => 'Palembang', 'tanggal_lahir' => '2004-10-15']
        // );
        // dump($mhs);
        // Mass Assignment
        $mhs = Mahasiswa::insert(
            [
                ['nama' => 'Verrino Adityya', 'npm' => '2226250002', 'tempat_lahir' => 'Bandung', 'tanggal_lahir' => '2004-10-15'],
                ['nama' => 'Verrino Adityya', 'npm' => '2226250003', 'tempat_lahir' => 'Jakarta', 'tanggal_lahir' => '2004-10-15']
                ]
        );
        dump($mhs);
    }

    public function updateElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '2226250001')->first();
        $mahasiswa->nama = 'Bayu';
        $mahasiswa->save();
        dump($mahasiswa);
    }

    public function deleteElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '2226250002')->first();
        $mahasiswa->delete();
        dump($mahasiswa);
    }
    public function selectElq()
    {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::all();

        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswa, 'kampus' => $kampus]);
    }

    public function allJoinElq() {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswas = Mahasiswa::has('prodi')->get();
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswas, 'kampus' => $kampus]);
    }
}
