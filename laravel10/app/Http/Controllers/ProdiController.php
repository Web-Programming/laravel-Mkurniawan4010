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

        $prodis = Prodi::with('mahasiswa')->get();
        foreach ($prodis as $prodi){
            echo "<h3>{$prodi->nama}</h3>";
            echo "<hr>Mahasiswa: ";
            foreach ($prodi->mahasiswas as $mhs){
                echo $mhs->nama_mahasiswa . ", ";
            }
            echo "<hr>";
        }
    }

    public function create()
    {
        returnview('prodi.create');

    }

    public function store(Request $request)
    {
       // dump($request);
       // echo $request->nama;
        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20'
        ]);
        //dump($validateData);
        //echo $validateDate['nama'];

        $prodi = new Prodi();
        $prodi->nama = $validateData['nama'];
        $prodi->save();

        $request->session()->flash('info', "Data prodi $prodi->nama berhasil disimpan kedata base");
        return redirect()->route('prodi.create');

    }

    public function index()
    {
        return view('prodi.index')->with('prodis', $prodis);
    }

    public functionshow(Prodi $prodi)
    {
        return view('prodi.show',['prodi' => $prodi]);
    }
}
