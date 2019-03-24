<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description'];

    public function chalets()
    {
        return $this->belongsToMany('App\Chalet','chalet_attributes');
    }
}
