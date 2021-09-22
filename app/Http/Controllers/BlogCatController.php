<?php

namespace App\Http\Controllers;

use App\blog_cat;
use Illuminate\Http\Request;

class BlogCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog_cat  $blog_cat
     * @return \Illuminate\Http\Response
     */
    public function show(blog_cat $blog_cat)
    {
        $data = blog_cat::paginate(6);
        return view('blog')->with('todoCat',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog_cat  $blog_cat
     * @return \Illuminate\Http\Response
     */
    public function edit(blog_cat $blog_cat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog_cat  $blog_cat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog_cat $blog_cat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog_cat  $blog_cat
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog_cat $blog_cat)
    {
        //
    }
}
