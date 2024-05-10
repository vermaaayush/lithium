@extends('admin.layout.main')
@section('title', 'All Plans')
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
                  <h4 class="card-title">All Investments Plans</h4>
                  <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                      
                      <a href="/add_plan" class="btn btn-primary btn-sm"><i class="ft-plus white"></i> Add New</a>
                      
                     
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
                                  <th>Plan Id</th>
                                  <th>Name</th>
                                  <th>Status</th>
                                  <th>Duration</th>
                                  <th>Total Users</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($plan as $plan)
                              <tr>
                                  <td>{{ $plan->plan_id }}</td>
                                  <td>
                                      <div class="media">
                                          <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="{{ asset($plan->image) }}" alt="avatar"><i></i></span></div>
                                          <div class="media-body media-middle">{{ $plan->name }}</div>
                                      </div>
                                  </td>
                                  <td class="text-center">
                                    {{ $plan->status }}
                                  </td>
                                  <td>{{ $plan->duration }}</td>
                                  <td>Total Users</td>
                                  <td>
                                      <span class="dropdown">
                                          <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                                          <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                              <a href="/view_plan/{{$plan->id}}" class="dropdown-item"><i class="ft-edit-2 success"></i> Manage</a>
                                              <a href="/end_investment_plan/{{$plan->plan_id}}" class="dropdown-item"><i class="ft-alert-triangle danger"></i> End Now</a>
                                              {{-- <a href="/invest_now/{{$plan->id}}" class="dropdown-item"><i class="ft-trash-2 danger"></i> Invest Now</a> --}}
                                        
                                              <a href="/delete_plan/{{$plan->id}}" class="dropdown-item"><i class="ft-trash-2 danger"></i> Delete</a>
                                              
 
                                          </span>
                                      </span>
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