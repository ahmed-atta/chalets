<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['period_from','period_to','status','confirmed','total_price','chalet_id','user_id'];

    
    public function chalets()
    {
        return $this->belongsTo('App\Chalet','chalet_id');
    }
    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
