<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\jadwal;
use App\Models\pemesanan;
use App\Models\pemesananHead;
use App\Models\penumpang;
use App\Models\tiket;
use App\Models\bukti;
use Illuminate\Support\Facades\Hash;
use Session;

class mainController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function registerAction(Request $request)
    {
     
        if(users::where("email", $request->email)->count() > 0){
            return back()->route('login')->with('failed', 'Email sudah Terdaftar');
        }
        if($request->cpassword !== $request->password){
            return back()->with('failed', 'Konfirmasi Password Tidak Sesuai');
        }
        $password = Hash::make($request->password);
        users::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no' => $request->nomor,
            'password' => $password,
        ]);
        return back()->with('success', "Berhasil Mendaftar");
    }
    public function loginAction(Request $request)
    {
        $users = users::where('email', $request->email)->first();
        if($users){
            if(Hash::check($request->password, $users->password)){
                if($users->roles == '1'){
                    session()->put('admin', true);
                    session()->put('nama', $users->nama);
                    session()->put('login', $users->id);
                    return redirect()->route('admin')->with('success', 'Selamat Datang ' . $users->nama); //Admin Routes
                }else if($users->roles == '0'){
                    session()->put('login', $users->id);
                    return redirect()->route('dashboard')->with('success', 'Selamat Datang ' . $users->nama); //Admin Routes
                }
            }else{
                return back()->with('failed', 'Password yang anda masukkan salah');
            }
        }
        else{
            return back()->with('failed', 'Email tidak terdaftar');
        }
        
    }
    public function dashboard()
    {
        if(!session()->get('login')){
            return redirect()->route('login');
        }
        $hitung = tiket::where('id_user', Session::get('login'))->count();
        return view('dashboard', ['hitung' => $hitung]);
    }
    public function cari($cari)
    {
        $jadwal = jadwal::join('kota_tujuan', 'jadwal.tujuan', '=', 'kota_tujuan.id')->where('kota_tujuan.kota_tujuan', 'like', '%' . $cari . '%')->select("jadwal.*")->get();
        foreach ($jadwal as $j ) {
                $j->bis = $j->bis->bis;
                $j->kotaBerangkat = $j->kotaBerangkat->kota_berangkat;
        $j->kotaTujuan = $j->kotaTujuan->kota_tujuan;   
        }
        return $jadwal;
    }
    public function pemesanan($id)
    {
        if(!session()->get('login')){
            return redirect()->route('login');
        }
        $jadwal = jadwal::find($id);
        return view("pemesanan", ['jadwal' => $jadwal]);
    }
    public function pesan($jumlah, $id)
    {
        if(!session()->get('login')){
            return redirect()->route('login');
        }
        return view('pesan', ['jumlah' => $jumlah, 'id' => $id]);
    }
    public function pesanSave(Request $request)
    {
        $cek = count($request->nama);
        $head = pemesananHead::create([
            'id_user' => Session::get('login'),
        ]);
        for ($i=1; $i <= $cek; $i++) { 
            $penumpang = penumpang::create([
                "nama" => $request->nama[$i - 1],
                "umur" => $request->umur[$i - 1],
            ]);
            pemesanan::create([
                "id_pemesanan_head" => $head->id,
                "id_penumpang" => $penumpang->id,
                "id_jadwal" =>  $request->id_jadwal,
            ]);
        }
        session()->put('pembayaran', $head->id);
        return redirect()->route('pembayaran')->with('success', 'Berhasil memesan');
    }
    public function pembayaran()
    {
        if(!session()->get('login')){
            return redirect()->route('login');
        }
        if (!Session::get('pembayaran')) {
            return back()->with('failed', 'Anda tidak memiliki akses');
        }
        $harga = pemesanan::where('id_pemesanan_head', Session::get('pembayaran'))->get();
        $total = 0;
        foreach ($harga as $h ) {
            $total = $total + $h->jadwal->harga;
        }
        return view('pembayaran', ['total' => $total]);
    }

    public function riwayat()
    {
        if(!session()->get('login')){
            return redirect()->route('login');
        }
        $head = pemesananHead::where('id_user', Session::get('login'))->get();
        return view('riwayat', ['head' => $head]);
    }
    public function cekPembayaran($id)
    {
        session()->put('pembayaran', $id);
        return redirect()->route('pembayaran');
    }
    public function uploadPembayaran(Request $request)
    {
        $file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'bukti_upload';
        $file->move($tujuan_upload,$nama_file);
        
        bukti::create([
            "id_pemesanan_head" => Session::get('pembayaran'),
            "bukti" => $nama_file
        ]);
        return redirect()->route('dashboard')->with('success', 'Berhasil Mengupload');
    }
    public function tiket()
    {
        if(!session()->get('login')){
            return redirect()->route('login');
        }
        $tiket = tiket::where('id_user', Session::get('login'))->get();
    return view("tiket", ['tiket' => $tiket]);
    }
    public function lihatTiket($id)
    {
        if(!session()->get('login')){
            return redirect()->route('login');
        }
        $tiket = tiket::find($id);
        return view('lihatTiket', ['tiket' => $tiket]);
    }
}
