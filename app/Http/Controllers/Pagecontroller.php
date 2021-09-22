<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pagecontroller extends Controller
{
    public function home() {
    	return view('home');
    }

    public function about() {
    	//$result = DB::table('mm_pages')->where('page_id',1);
    	$result = DB::select('select * from mm_pages where page_id=1');
    	return view('about',['pageData'=>$result]);
    }

    public function advertise() {
    	$result = DB::select('select * from mm_pages where page_id=4');
    	return view('about',['pageData'=>$result]);
    	return view(advertise);
    }

    public function blog() {
    	return view('blog');
    }

    public function contact() {
    	$result = DB::select('select * from mm_pages where page_id=2');
    	return view('copyright-info',['pageData'=>$result]);
    }

    public function faq() {
    	$result = DB::select('select * from mm_pages where page_id=11');
    	return view('faq',['pageData'=>$result]);
    }

    public function privacy_policy() {
    	$result = DB::select('select * from mm_pages where page_id=12');
    	return view('privacy-policy',['pageData'=>$result]);
    }

    public function site_news() {
    	$result = DB::select('select * from mm_pages where page_id=10');
    	return view('site-news',['pageData'=>$result]);
    }

    public function terms_of_use() {
    	$result = DB::select('select * from mm_pages where page_id=3');
    	return view('terms-of-use',['pageData'=>$result]);
    }

    public function copyright_info() {
    	$result = DB::select('select * from mm_pages where page_id=13');
    	return view('copyright-info',['pageData'=>$result]);
    }

    public function gallery() {
        $result = DB::table('image_galleries')->simplePaginate(15);
        return view('gallery',['gallery'=>$result]);
    }

    public function pedigree() {
        $result = DB::table('pd_enteries')
                    ->leftJoin('pd_show', 'pd_enteries.reg1', '=', 'pd_show.sz')
                    ->where('pd_show.cat', '!=', '')
                    //->orderBy('override', 'desc')
                    //->orderBy('cat', 'desc')
                    //->limit(1)
                    ->simplePaginate(15);
        //print_r($result);
        return view('pedigree',['pedigree'=>$result]);
    }

    public function galdetail($id,$imgid=null) {
        $result = DB::table('image_galleries')
                    ->where('gallery_id',$id)
                    ->first(); 

        $gallery = DB::table('image_galleries')
                    ->groupBy('gallery_name')
                    ->get(); 
        $sinimgdet = DB::table('images')
                    ->where('gallery_id',$id)
                    ->first();  
        $rowcat = DB::table('images')
                    ->where('gallery_id',$id)
                    ->get();      
        $imgdetail = DB::table('images')
                    ->where('indexer',$imgid)
                    ->first();            
        return view('galdetail',['gal'=>$result,'gallery'=>$gallery,'sinimgdet'=>$sinimgdet, 'resultcc'=>$rowcat, 'imgdetail'=>$imgdetail]);
    }

    public function breeders() {
        $result = DB::table('group_profile')->simplePaginate(15);
        return view('breeders', ['breeders'=>$result]);
    }

    public function memberdetail($uname) {
        //DB::enableQueryLog();
        $userdet = DB::table('member_profile')
                    ->where('user_id',$uname)
                    ->first();

        $sgaldet = DB::table('videos')
                    ->where('user_id',$uname)
                    ->where('approved','yes')
                    ->orderBy('indexer','DESC')
                    ->first();

        $iNumVideos = DB::table('videos')
                    ->where('user_id',$uname)
                    ->where('approved','yes')
                    ->orderBy('indexer','DESC')
                    ->count();

        $resultImg = DB::table('images')
                    ->where('user_id',$uname)
                    ->where('approved','yes')
                    ->first();

        $iNumImg =  DB::table('images')
                    ->where('user_id',$uname)
                    ->where('approved','yes')
                    ->count();  

        //dd(DB::getQueryLog());
        return view('memberdetail',['userdet'=>$userdet,'sgaldet'=>$sgaldet,'resultImg'=>$resultImg,'id'=>$uname,'iNumVideos'=>$iNumVideos,'iNumImg'=>$iNumImg]);
    }
        
    public function membervideo($vgalid) {
        $userdet = DB::table('member_profile')
                    ->where('user_id',$vgalid)
                    ->first();

        $rowcat = DB::table('videos')
                    ->where('user_id',$vgalid)
                    ->where('approved','yes')
                    ->orderBy('indexer','DESC')
                    ->get(); 

        $iNumVideos = DB::table('videos')
                    ->where('user_id',$vgalid)
                    ->where('approved','yes')
                    ->orderBy('indexer','DESC')
                    ->count();

        return view('membervideo',['userdet'=>$userdet,'rowcat'=>$rowcat,'iNumVideos'=>$iNumVideos,'vgalid'=>$vgalid]);
    }
        
    public function video_subgallery($vgalid) {
        $sgaldet = DB::table('channels')
                    ->where('channel_id',$vgalid)
                    ->first();

        $resultcc = DB::table('sub_channels')
                    ->where('parent_channel_id',$vgalid)
                    ->get(); 

        return view('video-subgallery',['sgaldet'=>$sgaldet,'resultcc'=>$resultcc,'vgalid'=>$vgalid]);
    }

    public function videopage($channel_id,$sub_channel_id) {
        $resultcc = DB::table('videos')
                    ->where('sub_channel_id',$sub_channel_id)
                    ->where('channel_id',$channel_id)
                    ->where('approved','yes')
                    ->get();

        $sgaldet = DB::table('sub_channels')
                    ->where('sub_channel_id',$sub_channel_id)
                    ->first(); 

        return view('videopage',['sgaldet'=>$sgaldet,'resultcc'=>$resultcc]);
    }

    public function people() {
        $result = DB::table('member_profile')->simplePaginate(12);
        return view('people',['people'=>$result]);
    }

    public function video_gallery() {
        $result = DB::table('channels')->simplePaginate(15);
        return view('video-gallery',['video'=>$result]);
    }

    public function pdgdetail($pdgid,$pdgcat) {
        $szccdetail = DB::table('pd_entries')
                        ->where('reg1',$pdgid)
                        ->where('c1',$pdgcat)
                        ->first();
        
        $showccdetail = DB::table('pd_show')
                        ->where('sz',$pdgid)
                        ->where('cat', '!=', '')
                        ->orderBy('override','DESC')
                        ->orderBy('cat','DESC')
                        ->limit(1)
                        ->first();

        $korkcdetail = DB::table('pd_kork')
                        ->where('pd',$pdgid)
                        ->first();

        $szhipccdetail = DB::table('hips')
                         ->where('hdb',$szccdetail->title)
                         ->first();
                         
        return view('pdgdetail',['szccdetail'=>$szccdetail,'showccdetail'=>$showccdetail,'szhipccdetail'=>$szhipccdetail]);   

    }

}
