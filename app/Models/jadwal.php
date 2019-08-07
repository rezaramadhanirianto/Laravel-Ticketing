<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $table="jadwal";
    protected $guarded=['id'];

    public function bis(){
        return $this->belongsTo('App\Models\bis', 'id_bis');
    }
    public function kotaTujuan(){
        return $this->belongsTo('App\Models\kotaTujuan', 'tujuan');
    }
    public function kotaBerangkat(){
        return $this->belongsTo('App\Models\kotaBerangkat', 'berangkat');
    }
    
}
