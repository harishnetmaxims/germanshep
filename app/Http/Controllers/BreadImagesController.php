<?php

namespace App\Http\Controllers;
use App\bread_images;
use App\pd_entery;
use App\image;
use Illuminate\Http\Request;

class BreadImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \App\bread_images  $bread_images
     * @return \Illuminate\Http\Response
     */
    public function show(bread_images $bread_images,pd_entery $pd_entery)
    {
        return view('home')->with('todoArr',bread_images::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bread_images  $bread_images
     * @return \Illuminate\Http\Response
     */
    public function edit(bread_images $bread_images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bread_images  $bread_images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bread_images $bread_images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bread_images  $bread_images
     * @return \Illuminate\Http\Response
     */
    public function destroy(bread_images $bread_images)
    {
        //
    }
}
