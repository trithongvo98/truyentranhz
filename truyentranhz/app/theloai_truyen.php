<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theloai_truyen extends Model
{
	protected $table = "theloai_truyen";

    public $timestamp = false;
    
    public function toTheloai()
    {
        return $this->belongstoMany('App\theloai');
    }
    public function toTruyen()
    {
        return $this->belongstoMany('App\Truyen');
    }
}
