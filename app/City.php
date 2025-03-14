<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $fillable = ['name', 'airport_code', 'country_id'];
    public $timestamps = true;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function querys() {
        return $this->hasMany(Search::class);
    }
}
