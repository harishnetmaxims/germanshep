@extends('include.master')
@section('content')
<section class="headinner" style="background: url({{asset('images_1/80.jpg')}}) 50% 0;">
    <div class="container">
        <h3>MEMBER CONTENT</h3>
        <div class="breadcom">
            <a href="">Home</a>
        </div>
    </div>
</section>


<style>
    .vi{
        background-color: orangered;
        color: white;
    }
    .vi:hover{
        background-color: grey;
        color: white;
    }


    .pd{
        background-color: #eee;
        color: black;
    }
    .pd:hover{
        background-color: grey;
        color: white;
    }



</style>


<div class="Manage-pedigree m-5">
    <p>
        <a class="btn pd" href="manage-videos" >
            Manage Videos
        </a>
        <a class="btn pd" href="manage-images">
            Manage Images
        </a>
        <a class="btn pd" href="manage-blogs">
            Manage Blogs
        </a>
        <a class="btn vi" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Manage Pedigree
        </a>

      </p>
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <div class="row">
            @foreach ($result as $re)
                <div class="col-sm-4">
                    <a href="blogcat.php?blogcat_id=">
                                <img src="images_1/8.png" style="height:300px;width:300px;">
                    </a>
                </div>
                @endforeach
            </div>
            {{-- {{$todoCat->links('pagination::bootstrap-4')}} --}}
        </div></div>
</div>


@include('include.newsletter-form')
@endsection
