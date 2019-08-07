<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pemesananHead extends Model
{
    protected $table = 'pemesanan_head';
    protected $guarded = ['id'];

    public function pemesanan()
    {
        return $this->hasMany('App\Models\pemesanan', 'id_pemesanan_head');
    }
}
