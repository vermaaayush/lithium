@extends('admin.layout.main')
@section('title', 'Users')
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

      <div class="card">
          <div class="card-head">
              <div class="card-header">
                  <h4 class="card-title">All Users</h4>
                  <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                      
                      <a href="/add_user" class="btn btn-primary btn-sm"><i class="ft-plus white"></i> Add User</a>
                      <span class="dropdown">
                          <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-warning dropdown-toggle dropdown-menu-right btn-sm"><i class="ft-download-cloud white"></i></button>
                          <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right">
                              <a href="#" class="dropdown-item"><i class="ft-upload"></i> Import</a>
                              <a href="#" class="dropdown-item"><i class="ft-download"></i> Export</a>
                              <a href="#" class="dropdown-item"><i class="ft-shuffle"></i> Find Duplicate</a>
                          </span>
                      </span>
                      <button class="btn btn-default btn-sm"><i class="ft-settings white"></i></button>
                  </div>
              </div>
          </div>
          <div class="card-content">
              <div class="card-body">
                  <!-- Task List table -->
                  <div class="table-responsive">
                      <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle" style="padding-bottom: 100px">
                          <thead>
                              <tr>
                                  <th>User Id</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Status</th>
                                  <th>Wallet Balance</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($users as $user)
                              <tr>
                                  <td>{{ $user->user_id }}</td>
                                  <td>
                                      <div class="media">
                                        @if (!empty($user->image))
                                          <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="{{ asset($user->image) }}" alt="avatar"><i></i></span></div>
                                        @else
                                        <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="{{ asset('default/man.png') }}" alt="avatar"><i></i></span></div>
                                        @endif
                                        <div class="media-body media-middle">{{ $user->name }}</div>
                                      </div>
                                  </td>
                                  <td class="text-center">
                                    {{ $user->email }}
                                  </td>
                                  <td>{{ $user->status }}</td>
                                  <td>$ {{number_format($user->balance) }}</td>
                                  <td>
                                      <span class="dropdown">
                                          <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                                          <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                              <a href="/veiw_user/{{$user->id}}" class="dropdown-item"><i class="ft-edit-2 success"></i> Edit</a>
                                              <a href="/funds/{{$user->id}}" class="dropdown-item"><i class="ft-plus-circle primary"></i> Funds</a>
                                              <a href="/invest_now/{{$user->id}}" class="dropdown-item"><i class="ft-plus-circle primary"></i> Invest Now</a>
                                              <a href="/block_suspend/{{$user->id}}" class="dropdown-item"><i class="ft-trash-2 danger"></i> Block</a>
                                              <a href="/delete/{{$user->id}}" class="dropdown-item"><i class="ft-trash-2 danger"></i> Delete</a>
                                              
 
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