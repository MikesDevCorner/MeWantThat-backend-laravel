<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingListEntry extends Model
{
    protected $fillable = ['entryname', 'amount', 'shopping_list_id'];

    public function list()
    {
        return $this->belongsTo('App\ShoppingList');
    }
}
