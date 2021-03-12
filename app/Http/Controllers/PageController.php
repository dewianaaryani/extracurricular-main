<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ekskul;
use App\Models\Content;

class PageController extends Controller
{
    public function landing()
    {
        $content = Content::find(1);
        return view('dashboard.landing', compact('content'));
    }
    public function about()
    {
        $content = Content::find(1);        
        return view('dashboard.about', compact('content'));
    }

}
