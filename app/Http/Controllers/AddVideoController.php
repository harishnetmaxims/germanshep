<?php

namespace App\Http\Controllers;

use App\Add_video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddVideoController extends Controller
{

    public function update(Request $request, Add_video $add_video)
    {
        $ch = DB::table('channels')->where('channel_id',$request->input('cat'))->get();
        foreach($ch  as $c){
            $c_n =  $c->channel_name;
            $seo =  $c->channel_name_seo;
            $desc =  $c->channel_description;
            $date_created =  $c->date_created;
            // die();
        }

        $result = DB::table('videos')
        ->where('indexer', $request->id)
        ->update([
            'pd' => $request->input('pedigree'),
            'title'=> $request->input('title'),
            'description'=>$request->input('description'),
            'tags'=>$request->input('tags'),
            'channel_id' => $request->input('cat'),
            'sub_channel_id'=>$request->input('sub_cat'),
            'channel'=> $c_n,
            'title_seo'=>$seo,
            // $res->description=$desc;
            'date_uploaded' => $date_created
        ]);
   $request->session()->flash('msg','Data UPdated');
   return redirect('login');

    }

    public function add_video(Request $request)
    {

        $ch = DB::table('channels')->where('channel_id',$request->input('cat'))->get();
        foreach($ch  as $c){
            $c_n =  $c->channel_name;
            $seo =  $c->channel_name_seo;
            $desc =  $c->channel_description;
            $date_created =  $c->date_created;
            // die();
        }

        $res =new add_video;
        $res->pd=$request->input('pedigree');
        $res->title=$request->input('title');
        $res->description=$request->input('description');
        $res->tags=$request->input('tags');
        $res->channel_id=$request->input('cat');
        $res->sub_channel_id=$request->input('sub_cat');
        $res->channel=$c_n;
        $res->title_seo=$seo;
        // $res->description=$desc;
        $res->date_uploaded=$date_created;
        // $res->video_id = $request->file('file')->store('upload_vid');
        $res->user_id =$request->input('user_id');
        $res->save();
        $request->session()->flash('msg','Video Uploaded!!');
        return redirect('manage-videos');
    }

    public function manage_videos(Add_video $add_video)
    {

        $a = DB::table('member_profile')->where('user_name',session()->get('name'))->get();
        foreach($a as $c){
            // echo '<pre>';
            // print_r($c->user_id);
            // die();
            $user_id = $c->user_id;
        }

        $result = DB::table('videos')->where('user_id',$user_id)->get();
        // echo $result;
        // die();
        $data = Add_video::paginate(6);
        return view('manage-videos',compact('result'))->with('todoCat',$data);
    }

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
     * @param  \App\Add_video  $add_video
     * @return \Illuminate\Http\Response
     */
    public function show(Add_video $add_video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Add_video  $add_video
     * @return \Illuminate\Http\Response
     */
    public function edit_video(Add_video $add_video, $indexer)
    {
        $data = DB::table('videos')->where('indexer',$indexer)->get();
        // echo $data;
        // die();
        // echo $indexer;
        $id = $indexer;
        $result1 = DB::table('channels')->get();
        $result2 = DB::table('sub_channels')->get();
        $result3 = DB::table('pd_enteries')->get();

        $result4 = DB::table('member_profile')->where('user_id',$indexer)->get();
        return view('edit-video',compact('result1','result2','result3','result4','data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Add_video  $add_video
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Add_video  $add_video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Add_video $add_video)
    {
        //
    }
}
