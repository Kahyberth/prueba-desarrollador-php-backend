<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table = 'search';
    protected $fillable = ['budget', 'city', 'currency', 'city_id'];
    public $timestamps = true;

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
