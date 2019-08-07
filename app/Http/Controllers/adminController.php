<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bis;
use App\Models\jadwal;
use App\Models\kotaBerangkat;
use App\Models\kotaTujuan;
use App\Models\pemesanan;
use App\Models\pemesananHead;
use App\Models\bukti;
use App\Models\users;
use App\Models\tiket;
use Session;
class adminController extends Controller
{
    public function index()
    {
        if(!Session::get('admin')){
            return redirect()->route('login')->with('failed', 'Anda harus login terlebih dahulu');
        }
        $bis = bis::all();
        $nama = Session::get('nama');
        return view('admin.index', ['username' => $nama, 'bis' => $bis]);
    }
    public function bisSave(Request $request)
    {
        if($request->id){
            $bis = bis::find($request->id);
            $bis->bis = $request->bis;
            $bis->jumlah_kursi = $request->kursi;
            $bis->save();
            return back()->with('success', "Berhasil mengubah");
        }else{
            bis::create([
                'bis' => $request->bis,
                'jumlah_kursi' => $request->kursi,
            ]);
            return back()->with('success', 'Berhasil Menambahkan');
        }
    }
    public function bisHapus($id)
    {
        $bis = bis::find($id);
        $bis->delete();
        return back()->with('success', "Berhasil Menghapus");
    }
    public function jadwal()
    {
        if(!Session::get('admin')){
            return redirect()->route('login')->with('failed', 'Anda harus login terlebih dahulu');
        }
        $jadwal = jadwal::all();
        $bis = bis::all();
        $tujuan = kotaTujuan::all();
        $berangkat = kotaBerangkat::all();
        return view('admin.jadwal', [ 'jadwal' => $jadwal, 'bis' => $bis, 'kotaTujuan' => $tujuan, 'kotaBerangkat' => $berangkat]);
    }
    public function jadwalSave(Request $request)
    {
        $data = explode('T', $request->jadwal_berangkat);
        $request->jadwal_berangkat = $data[0] .  ' ' . $data[1];
        $bis = bis::find($request->bis);
        if($request->id){
            $jadwal = jadwal::find($request->id);
            $jadwal->harga = $request->harga;
            $jadwal->id_bis = $request->bis;
            $jadwal->tujuan = $request->tujuan;
            $jadwal->berangkat = $request->berangkat;
            $jadwal->jadwal_berangkat = $request->jadwal_berangkat;
            $jadwal->jumlah_kursi = $bis->jumlah_kursi;
            $jadwal->save();
            return back()->with('success', "Berhasil mengedit jadwal");
        }else{
            jadwal::create([
                'id_bis' => $request->bis,
                'harga' => $request->harga,
                'tujuan' => $request->tujuan,
                'berangkat' => $request->berangkat,
                'jadwal_berangkat' => $request->jadwal_berangkat,
                'jumlah_kursi' => $bis->jumlah_kursi,
            ]);
            return back()->with('success', "Berhasil menambahkan jadwal");
        }
    }
    public function hapus($id)
    {
        $jadwal = jadwal::find($id);
        $jadwal->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
    public function logout()
    {
        Session::pull('admin');
        Session::pull('login');
        Session::pull('nama');
        Session::pull('pembayaran');
        return redirect()->route('login');
    }
    public function kotaTujuan()
    {
        if(!Session::get('admin')){
            return redirect()->route('login')->with('failed', 'Anda harus login terlebih dahulu');
        }
        return view('admin.kotaTujuan', ['kota' => kotaTujuan::all()]);
    }
    public function kotaBerangkat()
    {
        if(!Session::get('admin')){
            return redirect()->route('login')->with('failed', 'Anda harus login terlebih dahulu');
        }
        return view('admin.kotaBerangkat', ['kota' => kotaBerangkat::all()]);
    }
    public function kotaTujuanSave(Request $request)
    {
        if($request->id){
            $kota = kotaTujuan::find($request->id);
            $kota->kota_tujuan = $request->kota;
            $kota->save();
            return back()->with('success', 'Data berhasil diubah');
        }else{
            kotaTujuan::create([
                'kota_tujuan' => $request->kota,
            ]);
            return back()->with('success', "Data berhasil ditambahkan");
        }
    }
    public function kotaBerangkatSave(Request $request)
    {
        if($request->id){
            $kota = kotaBerangkat::find($request->id);
            $kota->kota_berangkat = $request->kota;
            $kota->save();
            return back()->with('success', 'Data berhasil diubah');
        }else{
            kotaBerangkat::create([
                'kota_berangkat' => $request->kota,
            ]);
            return back()->with('success', "Data berhasil ditambahkan");
        }
    }
    public function kotaBerangkatHapus($id)
    {
        $kota = kotaBerangkat::find($id);
        $kota->delete();
        return back()->with('success', 'Berhasil Menghapus');
    }
    public function kotaTujuanHapus($id)
    {
        $kota = kotaTujuan::find($id);
        $kota->delete();
        return back()->with('success', 'Berhasil Menghapus');
    }
    public function konfirmasiPembayaran()
    {
        if(!Session::get('admin')){
            return redirect()->route('login')->with('failed', 'Anda harus login terlebih dahulu');
        }
        return view('admin.konfirmasi', ['konfirmasi' => bukti::all()]);
    }

    public function updatePembayaran($id,$idBukti)
    {
        $head =  pemesananHead::find($id);
        $pemesanan = pemesanan::where('id_pemesanan_head', $head->id)->get();
        $jadwal = jadwal::find($pemesanan[0]->id_jadwal);
        $i = 0;
        foreach ($pemesanan as $p ) {
            $i++;
            $p->delete();
            tiket::create([
                "id_user" => $head->id_user,
                "id_penumpang" => $p->id_penumpang,
                "id_jadwal" => $p->id_jadwal,
                ]);
            }
        $jadwal->jumlah_kursi = $jadwal->jumlah_kursi - $i;
        $jadwal->save();
        $head->delete();
        bukti::find($idBukti)->delete();
        return back()->with('success', "Berhasil Mengkonfirmasi");
    }
    public function user()
    {
        return view("admin.user", ['users' => users::all()]);
    }
}
