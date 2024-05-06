@extends('admin.layout.main')
@section('title', 'Add Penalty')
@section('main-container')


<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block text-center">Add Penalty</h3>
          
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
<form action="/add_penalty" method="post" >
  <div class="row match-height">



    @csrf


      <div class="col-md-6 mx-auto">
          <div class="card">
              
              <div class="card-content collapse show">
                  <div class="card-body">

                  
                        <div class="form-body">
                     
                            <div class="form-group">
                                <label for="name">User ID</label>
                                
                                <input class="form-control" type="text" placeholder="Enter User Id" name="user_id" required >
                            </div>

                            <div class="form-group">
                                <label for="name">Penalty Amount</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input class="form-control" type="text" id="bonusInput" name="penalty" placeholder="Enter Penalty Amount" required>
                                </div>
                            </div>


                            
                           
                        </div>
                    
                        <div class="form-actions text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Get Penalty
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