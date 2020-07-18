<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class truyen extends Model
{
    //
    protected $table = "truyen";

     public $timestamp = false;
    
    public function theloai_truyen()
    {
        return $this->hasMany('App\theloai_truyen');
    }
    public function comment()
    {
    	return $this->hasMany('App\comment','idtruyen','id');
    }
    public function chapter()
    {
        return $this->hasMany('App\chapter','idtruyen','id');
    }
}
