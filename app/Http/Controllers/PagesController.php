<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root()
    {
    	//dd(\Auth::user()->hasVerifiedEmail());
    	return view('pages.root');
    }

    public function permissionDenied()
    {
    	if(config('adminitrator.permission'))
    	{
    		return redirect(url(config('adminitrator.uri')),302);
    	}

    	return view('pages.permission_denied');
    }
}
