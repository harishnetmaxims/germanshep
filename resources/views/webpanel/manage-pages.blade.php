@extends('webpanel.include.master')
@section('content')
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Manage Pages</h3>
				    <div class="row">
                  <div class="col-md-12">
                      <div class="content-panel">
					               <p align="center" style="color:#F00;"></p>
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All Pages Details </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th>Page name</th>
                                  <th> Content</th>
                                  <th> Status</th>
                                  <th>Reg. Date</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($ret as $index => $row)
                              <tr>
                              <td width="10%">{{ $index+1 }}</td>
                                  <td width="10%">{{ $row->title }}</td>
                                  <td width="50%">{!! substr($row->text,0,500) !!}</td>
                                  <td width="10%">{{ $row->status }}</td>
                                  <td width="10%">Date</td>
                                  <td width="10%">
                                     <a href="update-pages/{{ $row->page_id }}">
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                     <a href="manage-pages/{{ $row->page_id }}">
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Are you sure you want to delete blog {{ $row->title }}');"><i class="fa fa-trash-o "></i></button></a>
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