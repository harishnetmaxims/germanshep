@extends('webpanel.include.master')
@section('content')
      <section id="main-content">
          <section class="wrapper">
          	<div style="float:left;"><h3><i class="fa fa-angle-right"></i> Manage Newsletters Subscribers</h3></div><div class="logout" style="float:right;"> </div>
				      <div class="row">
                  <div class="col-md-12">
                      <div class="content-panel">
					               <p align="center" style="color:#F00;"></p>
                          <table class="table table-striped table-advance table-hover">
	                  	  	 <div class="col-md-12" style="padding:0px;">
                              	<div class="col-md-6"><h4><i class="fa fa-angle-right"></i> All Newsletters Subscribers </h4></div>
                                  <div class="col-md-6">
                                  </div>
                                <div class="container d-xs-none"><div id="displayblogcat"></div></div>
	                  	  	     <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th>Name</th>
                                  <th>Date</th>
                                 <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($ret as $index => $row)
                              <tr>
                                    <td width="5%">{{ $index+1 }}</td>
                                    <td width="60%">{{ $row->email }}</td>

                                    <td width="20%">@if($row->date) {{ date('m/d/Y H:i:s',strtotime($row->date)) }} @endif</td>
                                     <td width="10%"><a href="manage-subscriber/{{ $row->id }}">
                                    <button class="btn btn-danger btn-xs"  onClick="return confirm('Are you sure you want to delete subscriber {{ $row->email }}');"><i class="fa fa-trash-o "></i></button></a></td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                      {{ $ret->links() }}
                  </div>
              </div>
		</section>
      </section>
	  </section>
@endsection('content')