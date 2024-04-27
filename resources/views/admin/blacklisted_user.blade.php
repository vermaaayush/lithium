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
                  <h4 class="card-title">Suspended Users</h4>
                  <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                      
                      <a href="/add_user" class="btn btn-primary btn-sm"><i class="ft-plus white"></i> Add User</a>
                      {{-- <span class="dropdown">
                          <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-warning dropdown-toggle dropdown-menu-right btn-sm"><i class="ft-download-cloud white"></i></button>
                          <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right">
                              <a href="#" class="dropdown-item"><i class="ft-upload"></i> Import</a>
                              <a href="#" class="dropdown-item"><i class="ft-download"></i> Export</a>
                              <a href="#" class="dropdown-item"><i class="ft-shuffle"></i> Find Duplicate</a>
                          </span>
                      </span> --}}
                      
                  </div>
              </div>
          </div>
          <div class="card-content">
              <div class="card-body">
                  <!-- Task List table -->
                  <div class="table-responsive">
                      <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle" >
                          <thead>
                              <tr>
                                  <th>User Id</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Status</th>
                                  <th>Funds</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody style="padding-bottom:200px">
                            @foreach ($users as $user)
                              <tr>
                                  <td>{{ $user->user_id }}</td>
                                  <td>
                                      <div class="media">
                                        @if (!empty($user->image))
                                          <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle"><img  src="{{ asset($user->image) }}" width="40px" height="40px" alt="avatar"><i></i></span></div>
                                        @else
                                        <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="{{ asset('default/man.png') }}"  width="40px" height="40px" alt="avatar"><i></i></span></div>
                                        @endif
                                        <div class="media-body media-middle">{{ $user->name }}</div>
                                      </div>
                                  </td>
                                  <td class="text-center">
                                    {{ $user->email }}
                                  </td>
                                  <td>
                                    @if ( $user->status == 'Active' )
                                    <span style="color: green">{{$user->status}}</span>
                                    <br>
                                    @else
                                     <span style="color:red">{{$user->status}}</span>
                                    <br>
                                    @endif
                                    

                                    @if ( $user->id_status == 0 )
                                    <span style="color: red">Identity Verification Pending!</span>
                                    <br>
                                    @elseif( $user->id_status==1)
                                     <span style="color:#967adc">Check Identity Proof</span>
                                    <br>
                                    @endif

                                    @if ( $user->id_status == 0 )
                                    <span style="color: red">Address Verification Pending!</span>
                                    <br>
                                    @elseif( $user->id_status==1)
                                    <span style="color:#967adc">Check Address Proof</span>
                                    <br>
                                    @endif

                                  </td>
                                  <td>    
                                    Balance:   <span style="float:right">${{number_format($user->balance) }}</span><br>
                                    Invested:  <span style="float:right">${{number_format($user->funded) }}</span><br>
                                    Deposite:  <span style="float:right">${{number_format($user->deposite) }}</span><br>
                                    Withrawal: <span style="float:right">${{number_format($user->withraw) }}</span><br>
                                    Earning:   <span style="float:right">${{number_format($user->Earning) }}</span><br>
                                </td>
                                  <td>
                                      <span class="dropdown">
                                          <button id="" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                                          <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                              <a href="/veiw_user/{{$user->id}}" class="dropdown-item"><i class="ft-edit-2 success"></i> Edit</a>
                                              <a href="/funds/{{$user->id}}" class="dropdown-item"><i class="ft-plus-circle primary"></i> Funds</a>
                                              <a href="/invest_now/{{$user->id}}" class="dropdown-item"><i class="ft-plus-circle primary"></i> Invest Now</a>
                                              
                                              @if ($user->status=='Active')
                                              <a href="/block_suspend/{{$user->id}}" class="dropdown-item"><i class="ft-alert-octagon danger"></i> Block</a>
                                              @else
                                              <a href="/activate_user/{{$user->id}}" class="dropdown-item"><i class="ft-heart success"></i> Activate</a>
                                              @endif
                                              <a href="#" class="dropdown-item"><i class="ft-trash-2 danger"></i> Delete</a>
                                              
 
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