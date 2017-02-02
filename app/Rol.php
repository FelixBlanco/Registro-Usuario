<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rol extends Model
{
    use SoftDeletes;

    protected $table = "roles";

    protected $fillable = ['name_roles'];


    protected $dates = ['deleted_at'];

    public function users(){
    	return $this->hasMany('App\User',"id");
    }


}
