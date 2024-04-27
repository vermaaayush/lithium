@extends('admin.layout.main')
@section('title', 'User Details')
@section('main-container')


<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">User Details</h3>
          
        </div>
        
      </div>
      <div class="content-body"><!-- Basic form layout section start -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
<section id="basic-form-layouts">
  <div class="row match-height">

    <div class="col-md-12">
        <div class="card">
           
            <div class="card-content collapse show">
                <div class="card-body">
                    <h2>User KYC</h2>
                    <div class="table-responsive">
                        <table class="table">
                           
                            <tbody>
                                <tr>
                                   
                                    <td><a target="_blank" href="{{ asset($u_info->image_data) }}"><img src="{{ asset($u_info->image_data) }}" alt="ss" width="160" height="160"></a></td>
                                    <td><a target="_blank" href="{{ asset($u_info->id_proof) }}"><img src="{{ asset($u_info->id_proof) }}" alt="ss" width="160" height="160"></a></td>
                                    <td><h2>Identity Proof</h2> <br> <a href="" class="btn btn-success">Approved Now</a> <br> <br> <a href="" class="btn btn-danger">Reject Now</a></td>
                                  
                                  
                                </tr>
                                <tr>
                                   
                                    <td><a target="_blank" href="{{ asset($u_info->address_proof) }}"><img src="{{ asset($u_info->address_proof) }}" alt="ss" width="160" height="160"></a></td>
                                    <td></td>
                                    <td><h2>Address Proof</h2> <br> <a href="" class="btn btn-success">Approved Now</a> <br> <br> <a href="" class="btn btn-danger">Reject Now</a></td>
                                  
                                </tr>
                                <tr>
                                    <th><h1>Email: {{ $u_info->email }}</h1></th>
                                    <td></td>
                                    <td>
                                        <h2>Authentication</h2>
                                        <br>
                                        <h5 class="text-danger">Pending!</h5>
                                    </td>
                                   
                                </tr>
                            </tbody>
                        </table>
                    </div>
                  
                   
                </div>
            </div>
        </div>
    </div>
  
      <div class="col-md-6">
          <div class="card">
             
              <div class="card-content collapse show">
                  <div class="card-body">
                      
                    <form class="form form-horizontal" action="/edit_user/{{ $u_info->id }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-clipboard"></i> Details</h4>
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" class="form-control" value="{{ $u_info->name }}"  name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" value="{{ $u_info->email }}"  name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="username">User ID</label>
                                <input type="text" id="username" class="form-control" value="{{ $u_info->user_id }}"  name="user_id" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" id="password" class="form-control" value="{{ $u_info->password }}"  name="password" required>
                            </div>
                         
                            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="Active" {{ $u_info->status == 'Active' ? 'selected' : '' }}>Active</option>

                                    <option value="Suspended" {{ $u_info->status == 'Suspended' ? 'selected' : '' }}>Suspended</option>
                                </select>
                            </div>
                           
                            {{-- <div class="form-group">
                                <label for="auto_withdraw">Auto-Withdrawal Enabled</label>
                                <select id="auto_withdraw" name="auto_withdraw" class="form-control">
                                    <option value="No" {{ $u_info->auto_withdraw == 'No' ? 'selected' : '' }}>No</option>
                                    <option value="Yes" {{ $u_info->auto_withdraw == 'Yes' ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="pay_earning">Pay Earnings Automatically</label>
                                <select id="pay_earning" name="pay_earning" class="form-control">
                                    <option value="No" {{ $u_info->pay_earning == 'No' ? 'selected' : '' }}>No</option>
                                    <option value="Yes" {{ $u_info->pay_earning == 'Yes' ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div> --}}
                            
                            <div class="form-group">
                                <label for="max_withdraw">Country</label>
                                <input type="text" id="max_withdraw" class="form-control" name="country" value="{{ $u_info->country }}"  >
                            </div>

                            <div class="form-group">
                                <label for="max_withdraw">Phone</label>
                                <input type="text" id="max_withdraw" class="form-control" name="phone" value="{{ $u_info->phone }}"  >
                            </div>

                            <div class="form-group">
                                <label for="max_withdraw">DOB</label>
                                <input type="text" id="max_withdraw" class="form-control" name="dob" value="{{ $u_info->dob }}"  >
                            </div>

                            <div class="form-group">
                                <label for="admin_note">Admin Note</label>
                                <textarea id="admin_note" rows="5" class="form-control" name="admin_note"  required>
                                    {{ $u_info->admin_note }}
                                </textarea>
                            </div>
                           
                        </div>
                    
                        <div class="form-actions text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Update Now
                            </button>
                        </div>

                    
                     
                  </div>
              </div>
          </div>
      </div>

      <div class="col-md-6">
          <div class="card">
              
              <div class="card-content collapse show">
                  <div class="card-body">

                    

                     
                          <div class="form-body">
                              <h4 class="form-section"><i class="fa fa-money"></i> Amount</h4>
                            

                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="balance">Balance:</label>
                                        <input class="form-control border-primary" type="text" value="{{ $u_info->balance }}" id="balance" name="balance">
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="funded">Invested:</label>
                                        <input class="form-control border-primary" type="text" value="{{ $u_info->funded }}" id="funded" name="funded">
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="withdraw">Withdraw:</label>
                                        <input class="form-control border-primary" id="withdraw" type="text" name="withraw" value="{{ $u_info->withraw }}">
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="commission">Deposite:</label>
                                        <input class="form-control border-primary" id="commission" type="text" value="{{ $u_info->commission }}" name="deposite">
                                    </div>
                            
                                    
                            
                                    <div class="form-group">
                                        <label for="earnings">Earnings:</label>
                                        <input class="form-control border-primary" id="earnings" type="text" value="{{ $u_info->Earning }}" name="Earning">
                                    </div>
                                </div>
                            </div>
                            

                             
                          </div>

                          {{-- <div class="form-actions right">
                              <button type="button" class="btn btn-warning mr-1">
                                  <i class="ft-x"></i> Cancel
                              </button>
                              <button type="submit" class="btn btn-primary">
                                  <i class="fa fa-check-square-o"></i> Save
                              </button>
                          </div> --}}
                            
                    </form>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>



</section>
<!-- // Basic form layout section end -->
      </div>
    </div>
  </div>    
@endsection