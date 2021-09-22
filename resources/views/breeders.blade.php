@extends('include.master')
@section('content')
<section class="headinner" style="background: url({{asset('images/84.jpg')}}) 50% 0;">
    <div class="container">
        <h3>Breeders</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">All Breeder</a>
        </div>
    </div>
</section>

<section class="people padding">
    <div class="container">
        <div class="searchmem">
            <h3>All Breeders</h3>

            <div class="row">


                <div class="col-lg-12 col-xs-12">
                    <div class="brosermember">
                        @foreach($breeders as $row)
                        <div class="useradmin">
                            <div class="imageset">
                                @if (empty($row->image_pro))
                                    <img src="{{asset('images/img/default.jpg')}}">
                                @else
                                    <img src="{{asset('uploads/thumbs/'.$row->image_pro)}}">
                                @endif
                            </div>

                            <div class="admintile">
                                <a href="memberdetail/{{ $row->admin_id }}">{{ utf8_encode($row->group_name) }}</a><a
                                        href="membervideo/{{ $row->admin_id }}"
                                        class="videolink" style="float: right;">Video--></a>
                            </div>
                            <div class="admintile">
                                <a href="memberdetail/{{ $row->admin_id }}">{!! utf8_encode($row->group_description) !!}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <ul class="pagination">
                        {{ $breeders->links() }}
                    </ul>

                </div>


            </div>

        </div>
    </div>
</section>

@include('include.newsletter-form')
@endsection