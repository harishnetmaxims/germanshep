@extends('include.master')
@section('content')
<section class="headinner" style="background: url({{asset('images_1/80.jpg')}}) 50% 0;">
    <div class="container">
        <h3>Blog</h3>
        <div class="breadcom">
            <a href="">Home</a>
        </div>
    </div>
</section>


<div class="userdetail">

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-xl-7">
                            <img src="{{asset('addons/albums/images/user_circle.png')}}" width="512" height="512" class="rounded" alt="Cinque Terre">
                        </div>
                        <div class="col-xl-5">
                           <a href="#" class="text-right">Update Profile</a>


                           {{-- @foreach ($todoArr as $td) --}}
                              {{-- {{$td->id}} --}}
                           {{-- @endforeach --}}


                                <div class="field mt-5">
                                    <p>Address : Janta Flat </p>
                                    <p>Directions: </p>
                                    <p>City: </p>
                                    <p>State: </p>
                                    <p>Zip Code: </p>
                                    <p>Country:</p>
                                    <p>Established: </p>
                                    <p>Date: </p>
                                    <p>Operating: </p>
                                    <p>Hours: </p>
                                    <p>Work: </p>
                                    <p>Telephone: </p>
                                    <p>Cell Telephone:</p>
                                    {{-- <p></p> --}}
                                    <p>Email: </p>
                                    <p>Title: </p>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h3>Upload</h3>
                            <p>Videos  <span>|</span> Pictures</p>
                        </div>
                      </div>
                </div>
            </div>
        </div>

</div>


@include('include.newsletter-form')
@endsection
