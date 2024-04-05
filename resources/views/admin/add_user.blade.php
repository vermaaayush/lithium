@extends('admin.layout.main')
@section('title', 'Client Status')
@section('main-container')

<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Add User</h3>
         
        </div>
        
      </div>
      <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
  <div class="row">
      <div class="col-md-12">
        @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
          <div class="card">
             
              <div class="card-content collpase show">
                  <div class="card-body">
                     
                      <form class="form form-horizontal"  action="/add_user" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <div class="form-body">
                            <h4 class="form-section"><i class="ft-clipboard"></i> Requirements</h4>
                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput1">Full Name</label>
                                  <div class="col-md-9">
                                      <input type="text" id="projectinput1" class="form-control" name="name" required>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput2">Email</label>
                                  <div class="col-md-9">
                                      <input type="email" id="projectinput2" class="form-control"  name="email" required>
                                  </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput4">Username</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput4" class="form-control"  name="username" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput4" >Password</label>
                                <div class="col-md-9">
                                    <input type="password" id="projectinput4" class="form-control"  name="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput4">Confirm Password</label>
                                <div class="col-md-9">
                                    <input type="password" id="projectinput4" class="form-control"  name="password_confirmation" required>
                                </div>
                            </div>

                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput4">Phone</label>
                                  <div class="col-md-9">
                                      <input type="text" id="projectinput4" class="form-control"  name="phone" required>
                                  </div>
                              </div>

                              

                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput5">Address</label>
                                  <div class="col-md-9">
                                      <input type="text" id="projectinput5" class="form-control" name="address" required>
                                  </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput5">Date Of Birth</label>
                                <div class="col-md-9">
                                    <input type="date" id="projectinput5" class="form-control"  name="dob" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput5">User Image</label>
                                <div class="col-md-9">
                                    <input type="file" id="projectinput5" class="form-control"  name="user_pic" required>
                                </div>
                            </div>

                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput6">Status</label>
                                  <div class="col-md-9">
                                      <select id="projectinput6" name="status" class="form-control">
                                          
                                          <option value="Active" selected>Active</option>
                                          <option value="Disabled">Disabled</option>
                                          <option value="Suspended">Suspended</option>
                                         
                                      </select>
                                  </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput5">Secret Question</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput5" class="form-control" name="s_question" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput5">Secret Answer</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput5" class="form-control" name="s_answer" required>
                                </div>
                            </div>

                           

                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput7">Auto-Withdrawal Enabled</label>
                                  <div class="col-md-9">
                                      <select id="projectinput7" name="auto_withraw" class="form-control">
                                          <option value="No" selecte>No</option>
                                          <option value="Yes">Yes</option>
                                         
                                      </select>
                                  </div>
                              </div>
                              
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput7">Pay Earnings Automatically</label>
                                <div class="col-md-9">
                                    <select id="projectinput7" name="pay_earning" class="form-control">
                                        <option value="No" selecte>No</option>
                                        <option value="Yes">Yes</option>
                                       
                                    </select>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput5">Max Withdraw</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput5" class="form-control" name="max_withdraw" required>
                                </div>
                            </div>

                            

                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput9">Admin Note</label>
                                  <div class="col-md-9">
                                      <textarea id="projectinput9" rows="5" class="form-control" name="admin_note" required></textarea>
                                  </div>
                              </div>
                          </div>

                          <div class="form-actions">
                             
                              <button type="submit" class="btn btn-primary">
                                  <i class="fa fa-check-square-o"></i> Save
                              </button>
                          </div>
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