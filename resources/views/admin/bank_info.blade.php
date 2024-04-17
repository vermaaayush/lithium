@extends('admin.layout.main')
@section('title', 'Bank Info')
@section('main-container')

<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Manage Bank Account Details</h3>
         
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

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
          <div class="card">
             
              <div class="card-content collpase show">
                  <div class="card-body">
                     
                      <form class="form form-horizontal"  action="/update_bank" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <div class="form-body">
                          
                            <br>
                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput1">Bank Name</label>
                                  <div class="col-md-9">
                                      <input type="text" id="projectinput1" class="form-control" value="{{$bank->name}}" name="bank_name" >
                                  </div>
                              </div>
                             
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput6">Account Number</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput1" class="form-control" value="{{$bank->account_number}}"  name="account_no" >
                                </div>
                            </div>
                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput2">Bank Address </label>
                                  <div class="col-md-9">
                                      <input type="text" id="projectinput2" class="form-control" value="{{$bank->address}}" name="bank_address" >
                                  </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput4">SWIFT/BIC Code:</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput4" class="form-control" value="{{$bank->swift_code}}"  name="swift_code" >
                                </div>
                            </div>

                           
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput4">IBAN Number</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput4" class="form-control" value="{{$bank->ibank_number}}"  name="iban_no" >
                                </div>
                            </div>

                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput4">Routing Number </label>
                                  <div class="col-md-9">
                                      <input type="text" class="form-control" value="{{$bank->rounting_number}}"   name="rounting_no" >
                                  </div>
                              </div>


                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput4">Any Additional Instructions</label>
                                <div class="col-md-9">
                                   
                                    <textarea class="form-control" name="description" id="" cols="30" rows="10">{{$bank->description}}</textarea>
                                </div>
                               </div>
 
                            

                             

                          <div class="form-actions">
                             
                              <button type="submit" class="btn btn-primary">
                                  <i class="fa fa-check-square-o"></i>Update Now
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