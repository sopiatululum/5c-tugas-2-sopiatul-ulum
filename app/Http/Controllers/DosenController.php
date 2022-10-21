<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dosens;

class DosenController extends Controller
{
    public function insert(){

        //RAW
        $sql = DB::insert("INSERT INTO dosens (nidn,nama,jenis_kelamin,alamat,tempat_lahir,tanggal_lahir,photo,created_at,updated_at) VALUES ('002003', 'M Jajuli M.Kom','laki-laki','Jl.Mahkota No.4','Subang','1980-09-10','Jajuli.png',now(),now())");
        dump($sql);

        //SB
        $sql1 = DB::table('dosens')->insert(
            [
                'nidn' => '002001',
                'nama' => 'Arip Solehudin',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Jl.Pebayuran',
                'tempat_lahir' => 'Karawang',
                'tanggal_lahir' => '1990-04-02',
                'photo' => 'arip.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        dump($sql1);

        //ELOQUENT
        $sql2 = Dosen::create(
            [
                'nidn' => '002008',
                'nama' => 'Susilawati M.Kom',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl.Klari',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1993-09-12',
                'photo' => 'susilawati.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
            );
            dump($sql2);
    }

    public function select(){

        //RAW
        $sql = DB::select("SELECT * FROM dosens");
        dd($sql);

        //SB
        $sql2 = DB::table('dosens')->get();
        dd($sql2);

        //ELOQUENT
        $sql3 = Dosen::all();
        dd($sql3);
    }

    public function update(){

        // RAW
        $sql = DB::update("UPDATE dosens SET alamat='Jl.Pebayuran',updated_at=now() WHERE id=?",[1]);
        dd($sql);

        //SB
        $sql1 = DB::table('dosens')
        ->where('id','3')
        ->update(
            [
                'alamat' => 'Jl.Malaka',
                'updated_at' => now(),
            ]
            );
        dd($sql1);

        #ELOQUENT
        $sql2 = Dosen::where('id','1')->first()->update([
            'alamat' => 'Jl.Malaka',
            'updated_at' => now(),
        ]);
        dd($sql2);


    }

    public function delete(){

        //RAW
        $sql = DB::delete("DELETE FROM dosens WHERE nidn=?",['002008']);
        dd($sql);

        //SB
        $sql1 = DB::table('dosens')
        ->where('nidn','002008')
        ->delete();
        dd($sql1);

        //ELOQUENT
        $sql2 = Dosen::where('nidn','002008')->delete();
        dd($sql2);
    }
}
