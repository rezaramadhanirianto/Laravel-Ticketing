<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    protected $table = "tiket";
    protected $guarded = ['id'];

    public function penumpang()
    {
        return $this->belongsTo('App\Models\penumpang','id_penumpang');
    }
    public function jadwal()
    {
        return $this->belongsTo('App\Models\jadwal','id_jadwal');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\users','id_user');
    }

}
