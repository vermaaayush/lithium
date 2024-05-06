@extends('admin.layout.main')
@section('title', 'IP Logs')
@section('main-container')
<div class="app-content content">
    <div class="content-wrapper">
      
      <div class="content-detached content-right">
       
  <div class="col-12">
    <!-- resources/views/user/index.blade.php -->


      <div class="card" >
          <div class="card-head">
              <div class="card-header">
                  <h4 class="card-title">User Ip Logs</h4>
                 
              </div>
          </div>
          <div class="card-content">
              <div class="card-body">
                  <!-- Task List table -->
                  <div class="table-responsive" style="padding-bottom:100px ">
                      <table id="users-contacts" class="table table-white-space row-grouping display no-wrap icheck table-middle">
                          <thead>
                              <tr>
                                 
                                  <th>IP Address</th>
                                  <th>Country</th>
                              
                        
                                  <th>Date/Time</th>
                              
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($data as $data)
                              <tr>
                                  {{-- <td>{{ $data->user_id }}</td> --}}
                                  <td>{{ $data->ip_address }}</td>
                                  <td>{{ $data->country }}</td>
                                 
                                  {{-- <td>{{ $data->description }}</td> --}}
                                
                                  <td>{{ $data->created_at }}</td> 
                                  
                                 
                              </tr>
                            @endforeach  
                          </tbody>
                         
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
        </div>
      </div>

    </div>
  </div>



@endsection