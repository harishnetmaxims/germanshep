@extends('include.master')
@section('content')
<section class="headinner" style="background: url({{asset('images_1/80.jpg')}}) 50% 0;">
    <div class="container">
        <h3>Images</h3>
        <div class="breadcom">
            <a href="">Home</a>
        </div>
    </div>
</section>
<style>
    .reset{
        background-color: grey;
        color: white;
    }
    .reset:hover{
        background-color: grey;
        color: white;
    }
    .model{
        background-color: grey;
        color: white;
    }
    .model:hover{
        background-color: grey;
        color: white;
    }
</style>
<div class="add-img">
    <div class="container">


        {{-- @foreach ($result as $re)
            {{$re->user_id}}
            {{$re->current_city}}
        @endforeach --}}



        <div class="row">
            <div class="col-xl-8 ml-auto mr-auto mt-5 mb-5" style="background-color: #eee">
                <div class="text-danger text-center">
                    {{session('msg')}}
                </div>
            <form action="{{route('add_images')}}"  method="post" enctype="multipart/form-data" class="p-5">
                    @csrf
        @php
            foreach($result as $re){
                $user_id = $re->user_id;
            }
        @endphp

            <div>
                <input type="text" name="user_id" value="{{$user_id}}" style="display: none;">
            </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1"> <strong>Pedigree:</strong></label>
                            <select class="form-control" placeholer="Select Pedigree" id="exampleFormControlSelect1" name="pedigree" >
                                @foreach ($result2 as $re2)
                                <option value="{{$re2->reg1}}" name="album_select">
                                    {{$re2->name}}{{$re2->lastname}}
                                </option>
                                @endforeach
                            </select>
                    </div>
                      <h3 class="text-center pt-3">Step 1: Select or create a photo album</h3>
                    <div class="form-group">
                        <label for="Your Album" class="pt-5"> <strong>Your Albums:</strong> Select from one of your albums. </label><br>
                            <select class="form-control" id="exampleFormControlSelect1" name="album_select" required>

                                @foreach ($alb as $ab)
                                <option value="{{$ab->gallery_id}}" name="album_select">
                                    {{$ab->gallery_name}}
                                </option>
                                @endforeach
                            </select>
                    </div>

                   <!-- Button trigger modal -->
                    <button type="button" class="btn model mt-4 mb-4" data-toggle="modal" data-target="#exampleModal">
                        Create New Album
                    </button>


                    <h3 class="text-center pt-3">Step 2: Select your image files</h3>
                    <div class="form-group">
                        <label for="Your Album" class="pt-5"> <strong>Please Note: Image files must be jpg, gif, or png - Min Image Size: 5kb - Max Image Size: 2000kb's.</strong>  </label><br>
                        <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
                    </div>

                     <button type="reset" class="btn reset">Reset</button>
                     <button type="submit" class="btn reset">Upload New Image</button>
                  </form>
            </div>
        </div>
    </div>
</div>


 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('create_album')}}" method="Post" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="text" name="user_id" value="{{$user_id}}" style="display: none;">
            </div>
            <div class="form-group">
                <label for="name"> <strong>New Album Name: </strong> </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="album_name" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alb_description" required></textarea>
            </div>
            <small>(BBC or HTML code is not allowed)</small>
            <div class="form-group">
                <label for="tag"> <strong>Tags: </strong> </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="alb_tag" required>
            </div>
            Enter tag words - more than 1 word, separated by spaces - (NO COMMAS). <br> Tags are keywords used to describe your media.

            <div class="form-check mt-3">
                <label for="tags"> <strong> Album Type: </strong> </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="public" name="alb_type" required>
                <label class="form-check-label" for="inlineRadio1">Public</label>
            </div>
            <div class="form-check mt-3">
                <input class="form-check-input" type="radio"  value="private" name="alb_type" required>
                <label class="form-check-label" for="inlineRadio2">Private <small>- Only visible to friends and moderators</small></label>
            </div>
            <div class="form-check mt-3">
                <label for="tags"> <strong> Allow Ratings: </strong> </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio"  id="" value="1" name="rat_yes">
                <label class="form-check-label" for="inlineRadio1">Yes</label>
            </div>
            <div class="form-check mt-3">
                <input class="form-check-input" type="radio" id="" value="0" name="rat_yes">
                <label class="form-check-label" for="inlineRadio2">No <small>- Only visible to friends and moderators</small></label>
            </div>
            <div class="form-check mt-3">
                <label for="tags"> <strong> Allow Comments: </strong> </label>
             </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="" value="Public" name="comment">
                <label class="form-check-label" for="inlineRadio1">Public</label>
            </div>
            <div class="form-check mt-3">
                <input class="form-check-input" type="radio" id="" value="Private" name="comment">
                <label class="form-check-label" for="inlineRadio2">Private <small>- Only visible to friends and moderators</small> </label>
            </div>

            <div class="form-group">
                <label for="Your Album" class="pt-5"> <strong>Blog Image:</strong>  </label><br>
                <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn" style="background-color: grey;color:white;">Create Album</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
    </div>
    </div>
  </div>


@include('include.newsletter-form')
@endsection
