<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingListEntry extends Model
{
    protected $fillable = ['entryname', 'amount', 'shopping_list_id'];

    public function ShoppingList()
    {
        return $this->belongsTo('App\ShoppingList');
    }
}
