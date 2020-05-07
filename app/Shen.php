<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shen extends Model
{
    protected $table="shen";
    protected $primaryKey="id";
    public $timestamps=false;
    protected $guarded=[];
}
