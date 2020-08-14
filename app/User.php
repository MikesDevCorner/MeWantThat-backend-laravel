<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens; // added

class User extends Authenticatable
{
    use Notifiable, HasApiTokens; //modified

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function lists()
    {
        return $this->hasMany('App\ShoppingList');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  // this is a recommended way to declare event handlers
  public static function boot() {
    parent::boot();

    static::deleting(function($user) { // cleanup
      foreach($user->lists as $list) { $list->delete(); }
    });
  }
}
