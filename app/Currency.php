<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currency';
    protected $fillable = ['currency_symbol', 'exchange_rate', 'currency_code', 'base'];
    public $timestamps = true;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
