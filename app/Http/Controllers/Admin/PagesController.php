<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            $pages = Page::all();
        }else{
            $pages=Auth::user()->pages()->get();
        }
        return view('admin.pages.index', ['pages'=>$pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create', ['model'=> new Page()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        Auth::user()->pages()->save(new Page($request->only(['title','url','content'])));
        return redirect()->route('pages.index')->with('status','Page Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function edit(Page $page)
    {
        if(Auth::user()->cant('update', $page)){
            return redirect()->route('pages.index');
        }
        return view('admin.pages.edit',['model'=> $page]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, Page $page)
    {
        if(Auth::user()->cant('update', $page)){
            return redirect()->route('pages.index');
        }
        $page->fill($request->only(['title','url','content']));
        $page->save();
        return redirect()->route('pages.index')->with('status','Page Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        if(Auth::user()->cant('delete', $page)){
            return redirect()->route('pages.index');
        }
    }
}
