<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chalet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','address','district_id','owner_id'];

    public function attributes(){
        return $this->belongsToMany('App\Attribute','chalet_attributes', 'chalet_id', 'attribute_id')->withPivot('value');
    }

    public function media(){
        return $this->hasMany('App\Media','chalet_id');
    }

    public function prices(){
        return $this->hasMany('App\Price','chalet_id');
    }
}
