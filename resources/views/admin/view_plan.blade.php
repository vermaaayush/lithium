@extends('admin.layout.main')
@section('title', 'Investment Plan Details')
@section('main-container')


<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Investment Plan Details</h3>
          
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
                       <p class="text-center"> <img class="rounded-circle"  src="{{ asset($p_info->image) }}" alt="aasaasd" width="200px" height="200px"></p>
                    <form class="form form-horizontal"  action="/edit_plan/{{ $p_info->id }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <div class="form-body">
                           
                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput1">Plan Name</label>
                                  <div class="col-md-9">
                                      <input type="text" id="projectinput1" class="form-control" value="{{ $p_info->name }}" name="name" required>
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput6">Status</label>
                                <div class="col-md-9">
                                    <select name="status" class="form-control">
                                        <option value="Active" @if($p_info->status == 'Active') selected @endif>Active</option>
                                        <option value="Inactive" @if($p_info->status == 'Inactive') selected @endif>Inactive</option>
                                    </select>
                                    
                                </div>
                            </div>
                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput2">Rate of Interest </label>
                                  <div class="col-md-9">
                                      <input type="text" id="projectinput2" class="form-control"  value="{{ $p_info->roi }}"  name="roi" required>
                                  </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput4">Minimum Amount Limit:</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput4" class="form-control"  value="{{ $p_info->minimum_amount }}"  name="minimum_amount" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput6">Plan Period</label>
                                <div class="col-md-9">
                                    <select id="projectinput6" name="period" class="form-control">
                                        <option value="Daily" @if($p_info->period == 'Daily') selected @endif>Daily</option>
                                        <option value="Weekly" @if($p_info->period == 'Weekly') selected @endif>Weekly</option>
                                        <option value="Monthly" @if($p_info->period == 'Monthly') selected @endif>Monthly</option>
                                        <option value="Every 3 Months" @if($p_info->period == 'Every 3 Months') selected @endif>Every 3 Months</option>
                                        <option value="Every 6 Months" @if($p_info->period == 'Every 6 Months') selected @endif>Every 6 Months</option>
                                        <option value="Yearly" @if($p_info->period == 'Yearly') selected @endif>Yearly</option>
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput4">Plan Duration</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput4" class="form-control"  value="{{ $p_info->duration }}" placeholder="Enter number of days"  name="duration" required>
                                </div>
                            </div>

                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput4">Risk Factor</label>
                                  <div class="col-md-9">
                                      <input type="text" id="projectinput4" class="form-control"  value="{{ $p_info->risk }}" placeholder="Enter risk percentage"  name="risk" required>
                                  </div>
                              </div>

                            

                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput6">Compounding</label>
                                <div class="col-md-9">
                                    <select id="projectinput6" name="compounding" class="form-control">
                                        <option value="Disabled" @if($p_info->compounding == 'Disabled') selected @endif>Disabled</option>
                                        <option value="Suspended" @if($p_info->compounding == 'Suspended') selected @endif>Enabled</option>
                                    </select>
                                    
                                </div>
                            </div>

                           

                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput6">Principal Release</label>
                                  <div class="col-md-9">
                                    <select id="projectinput6" name="principal_release" class="form-control">
                                        <option value="Disabled" {{ $p_info->principal_release == 'Disabled' ? 'selected' : '' }}>Disabled</option>
                                        <option value="Suspended" {{ $p_info->principal_release == 'Suspended' ? 'selected' : '' }}>Enabled</option>
                                    </select>
                                        
                                  </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput5">Release Fee</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput5" class="form-control"  value="{{ $p_info->release_fee }}" placeholder="Enter release fee"  name="release_fee" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput5">Description</label>
                                <div class="col-md-9">

                                    <textarea class="form-control" placeholder="Enter description"  name="description" required cols="30" rows="8">{{ $p_info->description }}</textarea>
                                </div>
                            </div>

                            
                            <div class="form-group row">
                               
                                <label class="col-md-3 label-control" for="projectinput5">Image</label>
                                <div class="col-md-9">
                                    <input type="file" id="projectinput5" class="form-control"  name="plan_image">
                                </div>
                            </div>
                        

                            

    

                          <div class="form-actions text-center">
                             
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