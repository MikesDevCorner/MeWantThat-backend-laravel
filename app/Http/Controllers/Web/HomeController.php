<?php

namespace App\Http\Controllers\Web;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.oauth');
    }


    /**
     * Show the application welcome.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        return view('welcome');
    }

  /**
   * Deletes a user
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function unregister()
  {
    $user = User::where('id', Auth::user()->id)->firstOrFail();
    $user->delete();
    return view('auth.unregistered');
  }

}
