<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['period_from','period_to','day_price','chalet_id'];

    
    public function chalets()
    {
        return $this->belongsTo('App\Chalet');
    }
}
