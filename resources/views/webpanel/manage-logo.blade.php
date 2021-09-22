@extends('webpanel.include.master')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div style="float:left;"><h3><i class="fa fa-angle-right"></i> Manage Logo</h3></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-panel">
                        <p align="center" style="color:#F00;"></p>
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Logo Details </h4>
                            <hr>
                            <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Logo Text</th>
                                <th> Image Name</th>
                                <th> Active Type</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ret as $row)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $row->logo_text }}</td>
                                    <td>{{ $row->logo_image }}</td>
                                    <td>{{ $row->active_type }}</td>
                                    <td>
                                        <a href="update-logo/{{ $row->id }}">
                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section>
    </section>
</section>
@endsection('content')