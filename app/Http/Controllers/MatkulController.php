<?php

namespace App\Http\Controllers;


use App\Models\Matkul;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\matkuls;

class MatkulController extends Controller
{
    public function insert(){

        // RAW
        $sql = DB::insert("INSERT INTO matkuls (kode_mk, nama_mk, created_at, updated_at) VALUES ('FM01', 'Framework', now(), now())");
        dump($sql);

        // SB
        $sql1 = DB::table('matkuls')->insert(
            [
                'kode_mk' => 'FM01',
                'nama_mk' => 'Framework',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dd($sql1);

        //ELOQUENT
        $sql2 = Matkul::create(
            [
                'kode_mk' => 'FM01',
                'nama_mk' => 'Framework',
                'created_at' => now(),
                'updated_at' => now()
            ]
            );
            dd($sql2);
        return "Data berhasil diproses";
    }

    public function select(){

        // RAW
        $sql = DB::select("SELECT * FROM matkuls");
        dd($sql);

        // SB
        $sql2 = DB::table('matkuls')->get();
        dd($sql2);

        //ELOQUENT
        $sql3 = Matkul::all();
        dd($sql3);
    }

    public function update(){

        //RAW
        $sql = DB::update("UPDATE matkuls SET nama_mk='Pemrograman Framework',updated_at=now() WHERE id=?",[1]);
        dd($sql);

        //SB
        $sql1 = DB::table('matkuls')
        ->where('id','1')
        ->update(
            [
                'nama_mk' => 'Pemrograman Framework',
                'updated_at' => now()
            ]
            );
        dd($sql1);

        #ELOQUENT
        $sql2 = Matkul::where('id','1')->first()->update([
            'nama_mk' => 'Pemrograman Framework',
            'updated_at' => now()
        ]);
        dd($sql2);

    }

    public function delete(){

        //RAW
        $sql = DB::delete("DELETE FROM matkuls WHERE id=?",[1]);
        dd($sql);

        //SB
        $sql1 = DB::table('matkuls')
        ->where('id','1')
        ->delete();
        dd($sql1);

        //ELOQUENT
        $sql2 = Matkul::where('id','1')->delete();
        dd($sql2);
    }
}
