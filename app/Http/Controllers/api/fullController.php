<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
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

class fullController extends Controller
{
    public function login(Request $request){
        $users = users::where('email', $request->email)->first();
        if($users){
            if(Hash::check($request->password, $users->password)){
                if($users->roles == '1'){
                    $data = [
                        'message' => 'Please login with website',
                        'code' => '0',
                        'id' => '0'
                    ];
                    return response()->json($data);
                }else if($users->roles == '0'){
                    $data = [
                        'message' => 'Welcome ' . $users->nama,
                        'code' => '1',
                        'id' => $users->id
                    ];
                    return response()->json($data);
                }
            }else{
                $data = [
                    'message' => 'Password yang anda masukkan salah',
                    'code' => '0',
                    'id' => '0'
                ];
                return response()->json($data);
            }
        }
        else{
            $data = [
                'message' => 'Email tidak terdaftar',
                'code' => '0',
                'id' => '0'
            ];
            return response()->json($data);
        }
    }

    public function register(Request $request){
        if(users::where("email", $request->email)->count() > 0){
            $data = [
                "code" => '0',
                "message" => "Email sudah terdaftar"
            ];
            return response()->json($data);
        }
        if($request->cpassword !== $request->password){
            $data = [
                "code" => '0',
                "message" => "Konfirmasi Password Tidak Sesuai"
            ];
            return response()->json($data);
        }
        $password = Hash::make($request->password);
        users::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no' => $request->nomor,
            'password' => $password,
        ]);
        $data = [
            "code" => '1',
            "message" => "Berhasil mendaftar"
        ];
        return response()->json($data);
        
    }
}
