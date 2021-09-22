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
        <div class="row">
            <div class="col-xl-8 ml-auto mr-auto mt-5 mb-5" style="background-color: #eee">
                <div class="text-danger text-center">
                    {{session('msg')}}
                </div>
            <form action="/store_images/{{$indexer}}"  method="post" enctype="multipart/form-data" class="p-5">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1"> <strong>Pedigree:</strong></label>
                            <select class="form-control" placeholer="Select Pedigree" id="exampleFormControlSelect1" name="pedigree" >
                                <option value="">Select Pedigree</option>
                                @foreach ($pedigree as $pd)
                                <option value="{{$pd->reg1}}">
                                    {{$pd->name}}{{$pd->lastname}}
                                </option>
                                @endforeach
                            </select>
                    </div>
                      <h3 class="text-center pt-3">Step 1: Select or create a photo album</h3>
                    <div class="form-group">
                        <label for="Your Album" class="pt-5"> <strong>Your Albums:</strong> Select from one of your albums. </label><br>
                            <select class="form-control" id="exampleFormControlSelect1" name="album_select" required>
                                <option value="">Select Album</option>
                                @foreach ($alb as $ab)
                                <option value="{{$ab->gallery_id}}" name="album_select">
                                    {{$ab->gallery_name}}
                                </option>
                                @endforeach
                            </select>
                    </div>

                    <h3 class="text-center pt-3 mb-3">Step 2: Select your image files</h3>

                    <label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Upload Picture</label>
                    <input type="file" id="imageUpload" accept="image/*" style="display: none" name="image">
                    <img src="{{asset('addons/albums/images/656441519.jpg')}}" id="profile-img-tag" width="100px">


                     <button type="reset" class="btn reset">Reset</button>
                     <button type="submit" class="btn reset">Upload New Image</button>
                  </form>
            </div>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#profile-img-tag').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imageUpload").change(function () {
      readURL(this);
    });
  </script>


@include('include.newsletter-form')
@endsection
