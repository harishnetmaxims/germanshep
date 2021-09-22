@extends('include.master')
@section('content')
<section class="headinner-no-background-img " style="background: url({{asset('images/81.jpg')}}) 50% 0; background-size:cover;">
    <div class="container">
        <h3>German Shepherd Pedigree</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href="">Pedigree</a>
        </div>
    </div>
</section>
<div class="blogsecton">
    <div class="container">
        <div class="blogitem">
            @foreach($pedigree as $row)
            <a href="pdgdetail/{{ $row->reg1 }}/{{ $row->c1 }}">
                <div class="imageset">
                    @if (empty($row->picture))
                        <img src="{{asset('images/img/default.jpg')}}" style="height:155px;">
                    @else
                        <img src="pictures/{{asset($row->picture)}}" style="height:155px;">
                    @endif
                </div>
                <p>{{ $row->rank }} {{ $row->place }} {{ $row->name }} {{ $row->lastname }}</p>
            </a>
            @endforeach
            <ul class="pagination">
               {{ $pedigree->links() }}
            </ul>

        </div>

        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>

    </div>
</div>

@include('include.newsletter-form')
@endsection

