<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    protected $table = "pemesanan";
    protected $guarded = ['id'];

    public function caripenumpang()
    {
        return $this->belongsTo('App\Models\penumpang', 'id_penumpang');
    }
    public function jadwal()
    {
        return $this->belongsTo('App\Models\jadwal', 'id_jadwal');
    }
    public function pemesananHead()
    {
    return $this->belongsTo('App\Models\pemesanananHead', 'id_pemesanan_head');
    }

}
