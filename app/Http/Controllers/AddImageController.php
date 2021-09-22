<?php

namespace App\Http\Controllers;

use App\Add_image;
use App\image;
use App\pd_entery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddImageController extends Controller
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
    // user_id,pd, gallery_id, gallery_name, image_id, description, tags


    public function update(Request $request, Add_image $add_image)
    {
        $d =   DB::table('image_galleries')->where('gallery_id',$request->input('album_select'))->get();
        foreach($d as $albd){
          $seo = $albd->gallery_name_seo;
          $desc = $albd->gallery_description;
          $tag = $albd->gallery_tags;
          $date_created = $albd->date_created;
        }
		

       $result = DB::table('images')
            ->where('indexer', $request->indexer)
            ->update([
                'pd' => $request->input('pedigree'),
                'gallery_id' => $request->input('album_select'),
                'title_seo'=> $seo,
                'description' => $desc,
                'tags' => $tag,
                'date_uploaded' => $date_created
            ]);
       $request->session()->flash('msg','Data UPdated');
       return redirect('login');
    }



    public function add_images(Request $request)
    {

      $d =   DB::table('image_galleries')->where('gallery_id',$request->input('album_select'))->get();
        foreach($d as $albd){
          $seo = $albd->gallery_name_seo;
          $desc = $albd->gallery_description;
          $tag = $albd->gallery_tags;
          $date_created = $albd->date_created;
        }

        $res =new image;
        $res->user_id=$request->input('user_id');
        $res->pd=$request->input('pedigree');
        $res->gallery_id=$request->input('album_select');
        $res->title_seo=$seo;
        $res->description = $desc;
        $res->tags = $tag;
        $res->date_uploaded = $date_created;
        // $res->image_id = $request->file('file')->store('upload_img');
        // $res->image_id = $request->file('file')->storeAs(
        //     'upload_img', $request->file('file')->getClientOriginalName()
        // );
        // $res->username =$request->session()->get('name');
        $res->save();
        $request->session()->flash('msg','Image Uploaded!!');
        return redirect('manage-images');
    }


    public function manage_images(Add_image $add_image,Request  $request )
    {


        $a = DB::table('member_profile')->where('user_name',session()->get('name'))->get();
        foreach($a as $c){
            // echo '<pre>';
            // print_r($c->user_id);
            // die();
            $user_id = $c->user_id;
        }


        $result = DB::table('images')->where('user_id',$user_id)->get();
        // echo'<pre>';
        // print_r(session()->get('name'));
        // die();
        $data = Add_image::paginate(6);
        // return view('manage-images',compact('result'))->with('todoCat',$data);
        return view('manage-images',compact('result'))->with('todoCat',$data);
        // return view('manage-images');
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Add_image  $add_image
     * @return \Illuminate\Http\Response
     */
    public function show(Add_image $add_image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Add_image  $add_image
     * @return \Illuminate\Http\Response
     */
    public function edit_image(Add_image $add_image , $indexer)
    {
        $pd_data = DB::table('pd_enteries')->where('indexer',$indexer)->get();
        $pedigree = DB::table('pd_enteries')->get();
        $a = DB::table('member_profile')->where('user_name',session()->get('name'))->get();
        foreach($a as $c){
            // echo '<pre>';
            // print_r($c->user_id);
            // die();
            $user_id = $c->user_id;
        }
        $alb = DB::table('image_galleries')->where('user_id',$user_id)->get();

        return view('edit-image',compact('pd_data','pedigree',"alb",'indexer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Add_image  $add_image
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Add_image  $add_image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Add_image $add_image)
    {
        //
    }
}
