<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chapter extends Model
{
    protected $table = "chapter";
    public function truyen()
    {
    	return $this->belongsTo('App\truyen','idtruyen','id');
    }
}
