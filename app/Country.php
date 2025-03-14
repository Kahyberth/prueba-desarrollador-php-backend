<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    protected $fillable = ['name', 'country_code', 'currency_id'];
    public $timestamps = true;

    public function currency() {
        return $this->hasOne(Currency::class);
    }

    public function cities() {
        return $this->hasMany(City::class);
    }
}
