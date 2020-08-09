<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingListEntry extends Model
{
    protected $fillable = ['entryname', 'amount', 'shoppinglist_id'];

    public function list()
    {
        return $this->belongsTo('App\ShoppingList');
    }
}
