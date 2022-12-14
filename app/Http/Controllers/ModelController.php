<?php

namespace App\Http\Controllers;
use App;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Pustakawan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    
    public function buku($locale ='id'){
        App::setLocale($locale);
        $data_buku = Buku::all();
        return view('buku', compact('data_buku'), ["locale" => $locale]);
    }

    // public function createbuku(){
    //     return view('createbuku');
    // }

    public function createbuku($locale='id'){
        App::setLocale($locale);
        return view('createbuku', ["locale" => $locale]);
    }

    public function savebuku(Request $req){
        App::setLocale($req->locale);
        $this->validate($req, [
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'harga' => 'required|numeric|gt:0'
        ]);
        $buku = new Buku;
        $buku->judul = $req->judul;
        $buku->penulis = $req->penulis;
        $buku->penerbit = $req->penerbit;
        $buku->kodekategori = $req->kodekat;
        $buku->hargabuku = $req->harga;
        $buku->save();
        return redirect('/buku')->with('pesan', 'Data buku berhasil disimpan');
    }

    public function editbuku($id){
        $buku = Buku::find($id);
        return view('editbuku', compact('buku'));
    }
    
    public function updatebuku(Request $req, $id){
        $this->validate($req, [
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'harga' => 'required|numeric|gt:0'
        ]);
        $buku = Buku::find($id);
        $buku->judul = $req->judul;
        $buku->penulis = $req->penulis;
        $buku->penerbit = $req->penerbit;
        $buku->kodekategori = $req->kodekat;
        $buku->hargabuku = $req->harga;
        $buku->update();
        return redirect('/buku')->with('pesan', 'Data buku berhasil diubah');
    }

    public function delbuku($id){
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesan', 'Data buku berhasil dihapus');
    }


    public function anggota(){
        $data_anggota = Anggota::all();
        return view('anggota', compact('data_anggota'));
    }

    public function createanggota($locale="id"){
        App::setLocale($locale);
        return view('createanggota', ["locale" => $locale]);
    }

    public function saveanggota(Request $req){
        App::setLocale($req->locale);
        $this->validate($req, [
            'npm' => 'required|numeric',
            'nama' => 'required|string',
            'alamat' => 'required|string',
        ]);
        $anggota = new Anggota;
        $anggota->NPM = $req->npm;
        $anggota->Nama = $req->nama;
        $anggota->{'Kode Gender'} = $req->gender;
        $anggota->Alamat = $req->alamat;
        $anggota->save();
        return redirect('/anggota')->with('pesan', 'Data anggota berhasil disimpan');
    }

    public function editanggota($id){
        $anggota = Anggota::find($id);
        return view('editanggota', compact('anggota'));
    }
    
    public function updateanggota(Request $req, $id){
        $this->validate($req, [
            'npm' => 'required|numeric',
            'nama' => 'required|string',
            'alamat' => 'required|string',
        ]);
        
        $anggota = Anggota::find($id);
        $anggota->NPM = $req->npm;
        $anggota->Nama = $req->nama;
        $anggota->{'Kode Gender'} = $req->gender;
        $anggota->Alamat = $req->alamat;
        $anggota->update();
        return redirect('/anggota')->with('pesan', 'Data anggota berhasil diubah');
    }

    public function delanggota($id){
        $anggota = Anggota::find($id);
        $anggota->delete();
        return redirect('/angota')->with('pesan', 'Data anggota berhasil dihapus');
    }


    public function pustakawan(){
        $data_pustakawan = Pustakawan::all();
        return view('pustakawan', compact('data_pustakawan'));
    }

    public function createpustakawan($locale="id"){
        App::setLocale($locale);
        return view('createpustakawan', ["locale" => $locale]);
    }

    public function savepustakawan(Request $req){
        App::setLocale($req->locale);
        $this->validate($req, [
            'nip' => 'required|numeric',
            'nama' => 'required|string',
            'gol' => 'required|string|size:2',
        ]);

        $pustakawan = new Pustakawan;
        $pustakawan->NIP = $req->nip;
        $pustakawan->Nama = $req->nama;
        $pustakawan->Golongan = $req->gol;
        
        $pustakawan->save();
        return redirect('/pustakawan')->with('pesan', 'Data pustakawan berhasil disimpan');;
    }

    public function editpustakawan($id){
        $pustakawan = Pustakawan::find($id);
        return view('editpustakawan', compact('pustakawan'));
    }
    
    public function updatepustakawan(Request $req, $id){
        $this->validate($req, [
            'nip' => 'required|numeric',
            'nama' => 'required|string',
            'gol' => 'required|string|size:2',
        ]);
        
        $pustakawan = Pustakawan::find($id);
        $pustakawan->NIP = $req->nip;
        $pustakawan->Nama = $req->nama;
        $pustakawan->Golongan = $req->gol;

        $pustakawan->update();
        return redirect('/pustakawan')->with('pesan', 'Data pustakawan berhasil diubah');
    }

    public function delpustakawan($id){
        $pustakawan = Pustakawan::find($id);
        $pustakawan->delete();
        return redirect('/pustakawan')->with('pesan', 'Data pustakawan berhasil dihapus');
    }

    public function lap1(){
        $data_lap1 = DB::select(
            'SELECT P.id IdPinjam, A.nama NamaAgt, B.judul JudulBuku, P.lama LamaPinjam
            FROM table_anggota A
            JOIN table_peminjaman P ON (A.id=P.anggota_id)
            JOIN table_buku B ON (B.id=P.buku_id)'
        );
        return view('lap1', compact('data_lap1'));
    }

    public function lap2(){
        $data_lap2 = DB::select(
            'SELECT P.id IdPinjam, A.nama NamaAgt, A.alamat AlamatAgt, B.judul JudulBuku, B.penulis PenulisBuku, P.lama LamaPinjam
            FROM table_anggota A
            JOIN table_peminjaman P ON (A.id=P.anggota_id)
            JOIN table_buku B ON (B.id=P.buku_id)'
        );
        return view('lap2', compact('data_lap2'));
    }

    public function lap3(){
        $data_lap3 = DB::select(
            "SELECT judul, penulis, penerbit, count(*) as kali
            FROM table_buku B
            JOIN table_peminjaman P ON (P.buku_id = B.id)
            GROUP BY B.id"
        );
        return view('lap3', compact('data_lap3'));
    }

    public function lap4(){
        $data_lap4 = DB::select(
            "SELECT npm, nama, alamat, count(*) as kali
            FROM table_anggota A
            JOIN table_peminjaman P ON (P.buku_id = A.id)
            GROUP BY A.id"
        );
        return view("lap4", compact("data_lap4"));
    }

    public function lap5(){
        $data_lap5 = DB::select(
            "SELECT penerbit, avg(hargabuku) as rata
            FROM table_buku
            GROUP BY penerbit"
        );
        return view("lap5", compact("data_lap5"));
    }

    public function lap6(){
        $data_lap6 = DB::select(
            "SELECT penulis, count(*) as kali
            FROM table_buku
            GROUP BY penulis"
        );
        return view("lap6", compact("data_lap6"));
    }
}