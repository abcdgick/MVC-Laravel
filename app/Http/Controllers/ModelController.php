<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Pustakawan;

use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    
    public function buku(){
        $data_buku = Buku::all();
        return view('buku', compact('data_buku'));
    }

    public function createbuku(){
        return view('createbuku');
    }

    public function savebuku(Request $req){
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

    public function createanggota(){
        return view('createanggota');
    }

    public function saveanggota(Request $req){
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

    public function createpustakawan(){
        return view('createpustakawan');
    }

    public function savepustakawan(Request $req){
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
}