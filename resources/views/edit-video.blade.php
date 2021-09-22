@extends('include.master')
@section('content')
<section class="headinner" style="background: url({{asset('images_1/80.jpg')}}) 50% 0;">
    <div class="container">
        <h3>Edit Videos</h3>
        <div class="breadcom">
            <a href="">Home</a>
        </div>
    </div>
</section>
<style>
    .prcd{
        background-color: #a8741a;
        padding: 12px 35px;
        color: white;
    }
    .prcd:hover{
        background-color: #a8741a;
        padding: 12px 35px;
        color: white;
    }

</style>

<div class="add-vid">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 ml-auto mr-auto mt-5 mb-5" style="background-color: #eee">
                <form class="p-5" method="POST" action="/store-video/{{$id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1"> <strong>Pedigree:</strong></label>
                            <select class="form-control" placeholer="Select Pedigree" id="exampleFormControlSelect1" name="pedigree">
                                 @foreach ($result3 as $re2)
                                    <option value="{{$re2->indexer}}" name="album_select">
                                        {{$re2->name}}{{$re2->lastname}}
                                    </option>
                                    @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="name"> <strong>Title: </strong> </label>

                        @foreach ($data as $dt )
                        @endforeach

                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="@foreach ($data as $dt ) {{$dt->title}} @endforeach" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> <strong>Description:</strong> </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" value="">@foreach ($data as $dt ) {{$dt->description}} @endforeach</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tag"> <strong>Tags: </strong> </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tags" value="@foreach ($data as $dt ) {{$dt->tags}} @endforeach" >
                    </div>
                    Enter tag words - more than 1 word, separated by spaces - (NO COMMAS). <br> Tags are keywords used to describe your media.
                    <div class="form-group mt-3">
                        <label for="exampleFormControlSelect1"> <strong>Select Category:</strong></label>
                            <select class="form-control" placeholer="Select Pedigree" id="exampleFormControlSelect1" name="cat" >
                                @foreach ($result1 as $re)
                                <option value="{{$re->channel_id}}"> {{$re->channel_name}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1"> <strong>Select SubCategory:</strong></label>
                            <select class="form-control" placeholer="Select SubCategory" id="exampleFormControlSelect1" name="sub_cat" >
                                @foreach ($result2 as $re)
                                    <option value="{{$re->sub_channel_id }}"> {{$re->sub_channel_name }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="Your Album" class=""> <strong>Video:</strong>  </label><br>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                    </div>
                     <button type="submit" class="btn prcd">Continue To Upload >></button>
                </form>
            </div>
        </div>
    </div>
</div>


@include('include.newsletter-form')
@endsection
