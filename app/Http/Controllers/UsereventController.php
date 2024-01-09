<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsereventController extends Controller
{
    //    //user section 
    public function home()
    {
        // dd(Auth::check());
        if (Auth::check()) {
            $events = Event::all();
            return view('home', ['events' => $events]);
        }
        return redirect('/');
    }
}
