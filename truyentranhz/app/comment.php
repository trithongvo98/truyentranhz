<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    protected $table = "comment";

    public function truyen()
    {
    	return $this->belongsTo('App\truyen','idtruyen','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','idUser','id');
    }

}
