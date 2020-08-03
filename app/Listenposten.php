<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listenposten extends Model
{
    protected $fillable = ['postenname', 'anzahl', 'einkaufsliste_id'];

    public function list()
    {
        return $this->belongsTo('App\Einkaufsliste');
    }
}
