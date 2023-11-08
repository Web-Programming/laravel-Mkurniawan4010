<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function allJoinFacade()
    {
        $kampus= 'Universitas Multidata Palembang';
        $kampus = DB::select('select mahasiswa.*, prodis.nama as nama_prodi from prodis, mahasiswas
        where prods.id = mahasiswas.prodi_id');
        return view('prodi.index',['allmahasiswaprodi' => $result, 'kampus' => $kampus]);
    }
}
