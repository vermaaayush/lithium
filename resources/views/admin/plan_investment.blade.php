@extends('admin.layout.main')
@section('title', 'Invest Now')
@section('main-container')


<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Invest Now</h3>
          
        </div>
        
      </div>
      <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
  <div class="row match-height">

      <div class="col-md-12">
        @if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
          <div class="card">
             
              <div class="card-content collapse show">
                  <div class="card-body">
                  
                    <form class="form form-horizontal"  action="/invest_in/{{ $user->id }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <div class="form-body">
                              
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Available Wallet Balance</label>
                                <div class="col-md-9">
                                    <input style="color:green;font-weight:bold" type="text" id="projectinput1" class="form-control" value="$ {{  number_format($user->balance) }}" name="name" readonly>
                                </div>
                            </div>
                           
                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput1">User Name</label>
                                  <div class="col-md-9">
                                      <input type="text" id="projectinput1" class="form-control" value="{{ $user->name }}" name="name" readonly>
                                  </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput2">UserId </label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput2" class="form-control"  value="{{ $user->user_id }}" readonly>
                                </div>
                            </div>

                            
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput6">Select Plan:</label>
                                <div class="col-md-9">
                                    <select name="plan_id" class="form-control">
                                        @foreach($plan as $plan)
                                        <option value="{{ $plan->plan_id }}">{{ $plan->name }} - {{ $plan->roi }}% ROI - {{ $plan->duration }}Days - {{ $plan->minimum_amount }} USD</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            

                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput4">Enter the Amount</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput4" class="form-control"    name="amount" required>
                                </div>
                            </div>

                           

                            

                           



                          

                           
                        

                            

    

                          <div class="form-actions text-center">
                             
                              <button type="submit" class="btn btn-primary">
                                  <i class="fa fa-check-square-o"></i>Invest Now
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