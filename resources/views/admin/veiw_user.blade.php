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
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control" value="{{ $u_info->username }}"  name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" id="password" class="form-control" value="{{ $u_info->password }}"  name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control" value="{{ $u_info->phone }}" name="phone"  required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" class="form-control" value="{{ $u_info->address }}" name="address"  required>
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" id="dob" class="form-control" name="dob" value="{{ $u_info->dob }}"  required>
                            </div>
                            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="Active" {{ $u_info->status == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Disabled" {{ $u_info->status == 'Disabled' ? 'selected' : '' }}>Disabled</option>
                                    <option value="Suspended" {{ $u_info->status == 'Suspended' ? 'selected' : '' }}>Suspended</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="s_question">Secret Question</label>
                                <input type="text" id="s_question" class="form-control" value="{{ $u_info->secret_question }}" readonly name="s_question" required>
                            </div>
                            <div class="form-group">
                                <label for="s_answer">Secret Answer</label>
                                <input type="text" id="s_answer" class="form-control" name="s_answer" value="{{ $u_info->sectret_answer }}" readonly required>
                            </div>
                            <div class="form-group">
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
                            </div>
                            
                            <div class="form-group">
                                <label for="max_withdraw">Max Withdraw</label>
                                <input type="text" id="max_withdraw" class="form-control" name="max_withdraw" value="{{ $u_info->max_withdraw }}" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="admin_note">Admin Note</label>
                                <textarea id="admin_note" rows="5" class="form-control" name="admin_note"  required>
                                    {{ $u_info->admin_note }}
                                </textarea>
                            </div>
                            <div class="form-group ">
                                <label  for="projectinput5">User Image</label>
                                <div >
                                    <input type="file" id="projectinput5" class="form-control"  name="user_pic" >
                                </div>
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

                    <p class="text-center"> <img class="rounded-circle"  src="{{ asset($u_info->image) }}" alt="aasaasd" width="200px" height="200px"></p>

                     
                          <div class="form-body">
                              <h4 class="form-section"><i class="fa fa-money"></i> Amount</h4>
                            

                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="balance">Balance:</label>
                                        <input class="form-control border-primary" type="text" value="${{ $u_info->balance }}" id="balance">
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="funded">Funded:</label>
                                        <input class="form-control border-primary" type="text" value="${{ $u_info->funded }}" id="funded">
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="withdraw">Withdraw:</label>
                                        <input class="form-control border-primary" id="withdraw" type="text" value="${{ $u_info->withraw }}">
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="commission">Commission:</label>
                                        <input class="form-control border-primary" id="commission" type="text" value="${{ $u_info->commission }}">
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="assets">Assets:</label>
                                        <input class="form-control border-primary" id="assets" type="text" value="${{ $u_info->assets }}">
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="earnings">Earnings:</label>
                                        <input class="form-control border-primary" id="earnings" type="text" value="${{ $u_info->Earning }}">
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