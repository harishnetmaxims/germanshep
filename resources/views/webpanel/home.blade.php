@extends('webpanel.include.master')
@section('content')
	  <section id="main-content">
          <div><br><br><br><br><br><br><br><br><p style="font-size: 20px;font-weight: 900;text-align: center;color: #333;">Welcome To German Shepherd Kennel Club Dashboard</p></div>
          
          <div class="domaort">
              
              
              
              <div class="col-md-6">
                  <div class="bordertag">
              <table class="table table-striped table-advance table-hover">
                             <h4>USER</h4>
                              <tbody>
                              
							             @foreach($member_profile as $index => $row)
							              <tr>
                              <td>{{ $index+1 }}</td>
                                  <td>{{ $row->first_name }}{{ $row->last_name }}</td>
                                  <td>{{ $row->country }}</td>
                                  <td>{{ $row->date_created }}</td>
                                  
                                  <td>
                                     <a href="update-profile/{{ $row->user_id }}"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    
                                  </td>
                              </tr>
                             
                             @endforeach  
                             <tr><td colspan="5" align="right" style="padding-right:10px;"><a href="manage-users">VIEW MORE USERS  &raquo;</a></td></tr>  
                              </tbody>
                          </table>
                          </div>
                          </div>
                          
              <div class="col-md-6">
                                <div class="bordertag">
              <table class="table table-striped table-advance table-hover">
                                <h4>PEDIGREE</h4>
                              <tbody>
                            
							              @foreach($pd_entries as $index => $row)
							              <tr>
                              <td>{{ $index+1 }}</td>
                                  <td>{{ $row->name }} {{ $row->lastname }}</td>
                                  <td>{{ $row->c1 }} - {{ $row->reg1 }}</td>
                                  <td>{{ date('m/d/Y',strtotime($row->dob)) }}</td>
                                  
                                  <td>
                                     <a href="update-pedigree/{{ $row->reg1 }}"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    
                                  </td>
                              </tr>
                               
                                
                                @endforeach
                                <tr><td colspan="5" align="right" style="padding-right:10px;"><a href="manage-pedigree">VIEW MORE PEDIGREE  &raquo;</a></td></tr>  
                              </tbody>
                          </table>
                          </div>
                          </div>
              
              <br><br><br>            
                          
              <div class="col-md-6">
                  <div class="bordertag">
              <table class="table table-striped table-advance table-hover">
                             <h4>BLOG</h4>
                              <tbody>
                
							           @foreach($dp_blogs as $index => $row)
							              <tr>
                              <td>{{ $index+1 }}</td>
                                  <td>{{ substr(strip_tags($row->title),0,40) }}</td>
                                  <td>{{ $row->category }}</td>
                                  <td>@if($row->date_created) 
                                    {{ date('m/d/Y', strtotime($row->date_created)) }}
                                  @endif
                                  </td>
                                  
                                  <td>
                                     <a href="update-blogs/{{ $row->indexer }}"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    
                                  </td>
                              </tr>
                                
                              @endforeach
                             <tr><td colspan="5" align="right" style="padding-right:10px;"><a href="manage-blog">VIEW MORE BLOGS  &raquo;</a></td></tr>  
                              </tbody>
                          </table>
                          </div>
                          </div>
                          
              <div class="col-md-6">
                                <div class="bordertag">
              <table class="table table-striped table-advance table-hover">
                                <h4>IMAGES</h4>
                              <tbody>
                              
							             @foreach($images as $index => $row)
							              <tr>
                              <td>{{ $index+1 }}</td>
                                  <td>{{ utf8_decode($row->gallery_name) }}</td>
                                  <td>{{ utf8_decode($row->tags) }}</td>
                                  <td>@if($row->date_uploaded)
                                    {{ date('m/d/Y', strtotime($row->date_uploaded)) }}
                                    @endif
                                  </td>
                                  
                                  <td>
                                      <a href="update-image/{{ $row->indexer }}"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    
                                  </td>
                              </tr>
                               
                                
                                @endforeach
                                <tr><td colspan="5" align="right" style="padding-right:10px;"><a href="manage-picture">VIEW MORE IMAGES  &raquo;</a></td></tr>  
                              </tbody>
                          </table>
                          </div>
                          </div>
                              
                          
                          
             <br><br><br>
                          
             <div class="col-md-6">
                                <div class="bordertag">
              <table class="table table-striped table-advance table-hover">
                                <h4>VIDEOS</h4>
                              <tbody>
                           @foreach($videos as $index => $row)
							              <tr>
                              <td>{{ $index+1 }} </td>
                                  <td>{{ $row->title }}</td>
                                  <td>{{ substr(strip_tags($row->channel),0,40) }}</td>
                                  <td>@if($row->date_uploaded) {{ date('m/d/Y', strtotime($row->date_uploaded)) }} @endif</td>
                                  <td>
                                     <a href="update-video/{{ $row->indexer }}"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    
                                  </td>
                              </tr>
                               
                                
                                @endforeach
                                <tr><td colspan="5" align="right" style="padding-right:10px;"><a href="manage-video">VIEW MORE VIDEOS &raquo;</a></td></tr>  
                              </tbody>
                          </table>
                          </div>
                          </div>             
                          
                          
                          
            <div class="col-md-6">
            <div class="bordertag">
            <table class="table table-striped table-advance table-hover">
            <h4>PAGES</h4>
            <tbody>
            
            @foreach($mm_pages as $index => $row)
            
            <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $row->title }}</td>
            <td>{{ substr(strip_tags($row->text),0,40) }}</td>
            <td>Date</td>
            
            <td>
            <a href="update-pages/{{ $row->page_id }}"> 
            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
            
            </td>
            </tr>
            
            
            @endforeach
            <tr><td colspan="5" align="right" style="padding-right:10px;"><a href="manage-pages">VIEW MORE PAGES  &raquo;</a></td></tr>  
            </tbody>
            </table>
            </div>
            </div>
            
           
              </div>
           <br><br><br>
	  </section>
	  @endsection('content')