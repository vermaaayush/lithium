@extends('admin.layout.main')
@section('title', 'All Withdrawal')
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
                  <h4 class="card-title">All Withdrawal</h4>
                  <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                      
                     
                      <span class="dropdown">
                          <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-warning dropdown-toggle dropdown-menu-right btn-sm"><i class="ft-download-cloud white"></i></button>
                          <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right">
                              <a href="#" class="dropdown-item"><i class="ft-upload"></i> Import</a>
                              <a href="#" class="dropdown-item"><i class="ft-download"></i> Export</a>
                              <a href="#" class="dropdown-item"><i class="ft-shuffle"></i> Find Duplicate</a>
                          </span>
                      </span>
                     
                  </div>
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
                                 
                                  {{-- <td>{{ $data->description }}</td> --}}
                                  <td>{{ $data->transaction_id }}</td> 
                                  <td>{{ $data->created_at }}</td> 
                                  <td>
                                    @if ($data->status==0)
                                    <span class="badge border-warning warning badge-border">Pending!</span>
                                      
                                        <a href="app_withdrawal/{{ $data->id }}" class="btn btn-sm btn-primary" id="approve_btn">Approved</a>
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