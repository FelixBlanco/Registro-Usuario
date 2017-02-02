<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pais extends Model
{
    use SoftDeletes;

    protected $table = "pais";

    protected $fillable = ['name_pais'];

    protected $dates = ['deleted_at'];

    public function users(){
    	return $this->hasMany('App\User',"id");
    }

}
