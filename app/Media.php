<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','type','path','filename','chalet_id'];

    
    public function chalets(){
        return $this->belongsTo('App\Chalet');
    }
}
