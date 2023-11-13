<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function insert()
    {
        $result = DB::insert('insert into mahasiswa ( npm, nama_mahasiswa, tempat_lahir, tanggal_lahir,
        alamat,created_at) values ( ?,?,?,?,?,?) ', ['2226250069' ,'Wawan','Palembang','2004-01-01','JL. rajawali', now()]);
        dump($result);

        $result = DB::update('Update mahasiswa set nama_mahasiswa = "Ali",
        update_at = noe() where npm = ?',['2226250069']);
        dump($result);

        $result = DB::delete('detele from mahasiswaq where npm = ?',['2226250069']);
        dump($result);

         $result = DB::select('select * from mahasiswa');
        dump($result);

        $kampus = "Universitas Multi Data Palembang";
         $result = DB::select('select * from mahasiswa');
        //dump($result);
        return view('mahasiswa.index',['allmahasiswa' => $result,'kampus' =>$kampus]);

        $result = DB::table('mahasiswa')
            ->where('npm', '2226250069')
            ->update(
            [
                'nama_mahasiswa' => 'wawan',
                'updated_at' => now()
            ]
            );
        dump($result);

        $result = DB::table('mahasiswa')
            ->where('npm','=', '2226250069')
            ->delete();
        dump($result);
    }

    public function insertQb()
    {
        $result = DB::table('mahasiswa')->insert([
            'npm' => '22216250069',
            'nama_mahasiswa' => 'Jakarta',
            'tepat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2004-10-10',
            'alamat' => 'Jl Sudirman',
            'created_at' => now()
        ]);

        $kampus = "Universitas Multi Data Palembang";
        $result = DB::table('mahasiswa')->get();
        // dump($result);
        return view('mahasiswa.index',['allmahasiswa'=> $result,'kampus' => $kampus]);
    }

    public function indertElq()
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->npm = '2226250069';
        $mahasiswa->nama_mahasiswa = 'wawan';
        $mahasiswa->tempat_lahir = 'Palembang';
        $mahasiswa->tanggal_lahir = '2004-01-01';
        $mahasiswa->alamat = 'Jl Rajawali';
        $mahasiswa->save();
        dump($mahasiswa);

        $mahasiswa = Mahasiswa::where('npm','2226250069')->first();

        $mahasiswa->nama_mahasiswa = 'kafka';
        $mahasiswa->save();
        dump($mahasiswa);

       $mahasiswa = Mahasiswa::where('npm','2226250069')->first();

       $mahasiswa->delete();
       dump($mahasiswa);

    }

    public function SelectElq()
    {
        $kampus = "Universitas Multidata Palembang";
        $mahasiswa = Mahasiswa::all();
        //dump($Allmahasiswa);
        return view ('mahasiswa.index',['allmahasiswa '=> $mahasiswa,'kampus'=>$kampus]);
    }

    public function prodi()
    {
        return$this->belongsTo('App\Model\Prodi');
    }

    public function allJoinElq()
    {
        $kampus = "Universitas Multidata palembang";
        $mahasiswas = Mahasiswa::has('prodi')->get();
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswas, 'kampus' => $kampus]);
    }
}
