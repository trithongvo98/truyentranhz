<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theloai extends Model
{
    //
    protected $table = "theloai";

    public $timestamp = false;
    
    public function theloai_truyen()
    {
        return $this->hasMany('App\theloai_truyen');
    }
}
