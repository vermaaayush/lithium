@extends('admin.layout.main')
@section('title', 'Add Investment Plan')
@section('main-container')

<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Add Investment Plan</h3>
         
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
                     
                      <form class="form form-horizontal"  action="/add_plan" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <div class="form-body">
                           
                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput1">Plan Name</label>
                                  <div class="col-md-9">
                                      <input type="text" id="projectinput1" class="form-control" name="name" required>
                                  </div>
                              </div>
                             
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput6">Status</label>
                                <div class="col-md-9">
                                    <select id="projectinput6" name="status" class="form-control" required>
                                        
                                      
                                        <option value="Active" selected>Active</option>
                                        <option value="Inactive">Inactive</option>
                                       
                                    </select>
                                </div>
                            </div>
                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput2">Rate of Interest </label>
                                  <div class="col-md-9">
                                      <input type="text" id="projectinput2" class="form-control"  name="roi" required>
                                  </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput4">Minimum Amount Limit:</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput4" class="form-control"  name="minimum_amount" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput6">Plan Period</label>
                                <div class="col-md-9">
                                    <select id="projectinput6" name="period" class="form-control">
                                        
                                      
                                        <option value="Daily">Daily</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Monthly" selected>Monthly</option>
                                        <option value="Every 3 Months">Every 3 Months</option>
                                        <option value="Every 6 Months">Every 6 Months</option>
                                        <option value="Yearly">Yearly</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput4">Plan Duration</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput4" class="form-control" placeholder="Enter number of days"  name="duration" required>
                                </div>
                            </div>

                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput4">Risk Factor</label>
                                  <div class="col-md-9">
                                      <input type="text" id="projectinput4" class="form-control" placeholder="Enter risk percentage"  name="risk" required>
                                  </div>
                              </div>

                            

                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput6">Compounding</label>
                                <div class="col-md-9">
                                    <select id="projectinput6" name="compounding" class="form-control">
                                        
                                      
                                        <option value="Disabled" selected>Disabled</option>
                                        <option value="Suspended">Enabled</option>
                                       
                                    </select>
                                </div>
                            </div>

                           

                              <div class="form-group row">
                                  <label class="col-md-3 label-control" for="projectinput6">Principal Release</label>
                                  <div class="col-md-9">
                                      <select id="projectinput6" name="principal_release" class="form-control">
                                          
                                        
                                          <option value="Disabled" selected>Disabled</option>
                                          <option value="Suspended">Enabled</option>
                                         
                                      </select>
                                  </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput5">Release Fee</label>
                                <div class="col-md-9">
                                    <input type="text" id="projectinput5" class="form-control" placeholder="Enter release fee"  name="release_fee" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput5">Description</label>
                                <div class="col-md-9">

                                    <textarea class="form-control" placeholder="Enter description" name="description" required cols="30" rows="8"></textarea>
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput5">Image</label>
                                <div class="col-md-9">
                                    <input type="file" id="projectinput5" class="form-control"  name="plan_image">
                                </div>
                            </div>
                        

                            

    

                          <div class="form-actions">
                             
                              <button type="submit" class="btn btn-primary">
                                  <i class="fa fa-check-square-o"></i>Add Now
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