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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
      parent::boot();

      static::deleting(function($list) { // cleanup
        foreach($list->entries as $entry) { $entry->delete(); }
      });
    }
}
