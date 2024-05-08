@extends('admin.layout.main')
@section('title', 'Manage Password')
@section('main-container')


<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block text-center">Manage Login Details</h3>
          
        </div>
        
      </div>
      <div class="content-body"><!-- Basic form layout section start -->
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
<section id="basic-form-layouts">
<form action="/c_password" method="post" >
  <div class="row match-height">



    @csrf


      <div class="col-md-6 mx-auto">
          <div class="card">
              
              <div class="card-content collapse show">
                  <div class="card-body">

                  
                        <div class="form-body">
                     
                            <div class="form-group">
                                <label for="name">Admin Email</label>
                                
                                <input class="form-control" type="email" value="{{$data->email}}" name="email" required >
                            </div>

                            <div class="form-group">
                                <label for="name">Old Password</label>
                                <div class="input-group">

                                    <input class="form-control" type="password"  name="o_pass" placeholder="Enter Your Old Password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">New Password</label>
                                <div class="input-group">

                                    <input class="form-control" type="password"  name="n_pass" placeholder="Enter Your New Password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Confirm Password</label>
                                <div class="input-group">

                                    <input class="form-control" type="password"  name="c_pass" placeholder="Enter New Password Again" required>
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

  </div>
</form>


</section>


<!-- // Basic form layout section end -->
      </div>
    </div>
  </div>  

  
  
@endsection