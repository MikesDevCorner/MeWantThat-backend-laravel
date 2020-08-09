<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    protected $fillable = ['listname', 'user_id'];

    public function entries()
    {
        return $this->hasMany('App\ShoppingListEntry');
    }

    public function list()
    {
        return $this->belongsTo('App\User');
    }
}
