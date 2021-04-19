<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Pages;
use App\Models\Posts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //return view('home');
        
        $count_users = Users::count(); 
        $count_pages = Pages::count(); 
        $count_posts = Posts::count(); 
        $filter = $request->query('filter');

        if (!empty($filter)) {
            $users = Users::sortable()
                ->where('users.name', 'like', '%'.$filter.'%')
                ->paginate(2);
        } else {
            $users = Users::sortable()
                ->paginate(2);
        }
    
        return view('home')->with('users', $users)->with('filter', $filter)
        ->with('count_users',$count_users)
        ->with('count_pages',$count_pages)
        ->with('count_posts',$count_posts);
    }
}
