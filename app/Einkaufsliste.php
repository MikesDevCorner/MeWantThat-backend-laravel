<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Einkaufsliste extends Model
{
    protected $fillable = ['listenname'];

    public function entries()
    {
        return $this->hasMany('App\Listenposten');
    }
}
