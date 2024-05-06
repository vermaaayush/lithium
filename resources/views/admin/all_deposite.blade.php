@extends('admin.layout.main')
@section('title', 'All Deposits')
@section('main-container')
<div class="app-content content">
    <div class="content-wrapper">
      
      <div class="content-detached content-right">
       
  <div class="col-12">
    <!-- resources/views/user/index.blade.php -->

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

      <div class="card" >
          <div class="card-head">
              <div class="card-header">
                  <h4 class="card-title">All Deposits</h4>
                  
              </div>
          </div>
          <div class="card-content">
              <div class="card-body">
                  <!-- Task List table -->
                  <div class="table-responsive" style="padding-bottom:100px ">
                      <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                          <thead>
                              <tr>
                                 
                                  <th>Name</th>
                                  <th>Amount</th>
                                  <th>Mode</th>
                                  <th>Tras.ID</th>
                                  <th>Date/Time</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($data as $data)
                              <tr>
                                  {{-- <td>{{ $data->user_id }}</td> --}}
                                  <td>{{ $data->name }}</td>
                                  <td>$ {{ $data->amount }}</td>
                                  <td>{{ $data->pay_mode }}</td>
                                  {{-- <td>{{ $data->description }}</td> --}}
                                  <td>{{ $data->transaction_id }}</td> 
                                  <td>{{ $data->created_at }}</td> 
                                  <td>
                                    @if ($data->status==0)
                                    <span class="badge border-warning warning badge-border">Pending!</span>
                                      
                                        <a href="app_depo/{{ $data->id }}" class="btn btn-sm btn-primary" id="approve_btn">Approved</a>
                                    @elseif ($data->status==2)
                                        <span class="badge border-warning warning badge-border">Pending!</span>
                                       
                                        <a href="bw_view/{{ $data->id }}" class="btn btn-sm btn-warning" id="approve_btn">View</a>

                                      
                                    @elseif ($data->status==3)
                                
                                    
                                    <span class="badge border-danger danger badge-border">Rejected!</span>

                                    @else
                                    
                                    
                                        <span class="badge border-success success badge-border">Success</span>
                                    @endif
                                
                                  </td> 
                                 
                                 
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