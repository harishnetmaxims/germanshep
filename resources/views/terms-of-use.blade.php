@extends('include.master')
@section('content')
@foreach($pageData as $data)
<section class="headinner">
    <div class="container">
        <h3>{{ $data->title }}</h3>
        <div class="breadcom">
            <a href="">Home</a><span> > </span> <a href=""> {{ $data->title }} </a>
        </div>
    </div>
</section>

<section class="section-innerbar">
    <div class="container">
        {!! $data->text !!}
    </div>
</section>
@endforeach
@endsection