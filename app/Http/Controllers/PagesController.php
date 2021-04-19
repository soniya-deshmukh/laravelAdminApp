<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use Session;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        /* $pages = Pages::orderBy('created_at','desc')->paginate(1);
        return view('pages.index')->with('pages',$pages); */
        $filter = $request->query('filter');

        if (!empty($filter)) {
            $pages = Pages::sortable()
                ->where('pages.page_title', 'like', '%'.$filter.'%')
                ->paginate(2);
        } else {
            $pages = Pages::sortable()
                ->paginate(2);
        }
    
        return view('pages.index')->with('pages', $pages)->with('filter', $filter);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::put('modal_page', 'modal_page');
        $page = new Pages;
		$page->page_title= $request->input('page_title');
        $page->page_body = $request->input('page_body');
        $page->meta_tag = $request->input('meta_tag');
        $page->meta_description = $request->input('meta_description');
        if($request->input('is_published')=='on'){
            $page->is_published = 1;
        }else{
            $page->is_published = 0;
        }
        $page->admin_id = auth()->user()->id;
        //print_r($page); exit;
        $request->validate([
            'page_title' => 'required',
            'page_body' => 'required',
        ]);
    
        $page->save();
     
        return redirect()->route('pages.index')
                        ->with('success','Page created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(Pages $pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit(Pages $page)
    {
        //
        return view('pages/edit')->with('page',$page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'page_title' => 'required',
            'page_body' => 'required',
        ]);
        $page =  Pages::find($id);
        $page->page_title= $request->input('page_title');
        $page->page_body = $request->input('page_body');
        $page->meta_tag = $request->input('meta_tag');
        $page->meta_description = $request->input('meta_description');
        if($request->input('is_published')=='on'){
            $page->is_published = 1;
        }else{
            $page->is_published = 0;
        }
        $page->admin_id = auth()->user()->id;
        $page->updated_at = date("Y-m-d H:i:s");

        $page->save();
    
        return redirect()->route('pages.index')
                        ->with('success','Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pages $page)
    {
        //
        $page->delete();
    
        return redirect()->route('pages.index')
                        ->with('success','Page deleted successfully');
    }
}
