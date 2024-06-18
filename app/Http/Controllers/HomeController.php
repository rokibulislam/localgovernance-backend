<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class HomeController extends Controller
{
    
    public function index()
    {

        $events = Event::with('category')->orderBy('start_date', 'desc')->take(5)->get();

        return view('frontend.home', compact('events') );
    }

    public function about()
    {

        return view('frontend.about');
    }

    public function contact()
    {

        return view('frontend.contact');
    }

    public function events()
    {

        $events = Event::all();

        return view('frontend.events', compact('events') );
    }


    public function singleevent( $id )
    {

        $event =  Event::find( $id );
        
        return view('frontend.event', compact('event') );
    }

    public function checkout()
    {

        return view('frontend.checkout');
    }

    public function payment()
    {

        return view('frontend.payment');
    }
}
