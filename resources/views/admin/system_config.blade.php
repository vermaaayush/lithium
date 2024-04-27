@extends('admin.layout.main')
@section('title', 'Client Status')
@section('main-container')

<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">

         
        </div>
        
      </div>
      <div class="content-body"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
  <div class="row">
      <div class="col-md-12">
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
          <div class="card">
             
              <div class="card-content collpase show">
                  <div class="card-body">
                     
                    <form class="form form-horizontal"  action="/system_config" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                        <div class="form-body">
                          <h4 class="form-section"><i class="ft-clipboard"></i> System Config</h4>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Company Name</label>
                                <div class="col-md-9">
                                  <input type="text" id="complaintinput1" class="form-control" value="{{$cfg->name}}"  name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput2">Company URL</label>
                                <div class="col-md-9">
                                  <input type="text" id="complaintinput2" class="form-control "  value="{{$cfg->url}}" name="url" required>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput4">Company Phone</label>
                              <div class="col-md-9">
                                <input type="text" id="complaintinput3" class="form-control " value="{{$cfg->phone}}" name="phone" required>
                              </div>
                          </div>

                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput4">Company Address</label>
                            <div class="col-md-9">
                              <input type="text" id="complaintinput3" class="form-control " value="{{$cfg->address}}" name="address" required>
                            </div>
                        </div>

                          <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput4" >Company Email</label>
                              <div class="col-md-9">
                                <input type="email" id="complaintinput4" class="form-control " value="{{$cfg->email}}"  name="email" required>
                              </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput4" >Licence Key</label>
                            <div class="col-md-9">
                              <input type="text" id="complaintinput4" class="form-control " value="{{$cfg->licence_key}}"  name="key" required>
                            </div>
                        </div>

                          <div class="form-group row">
                              <label class="col-md-3 label-control" for="projectinput4">Company Logo</label>
                              <div class="col-md-9">
                                <img src="{{$cfg->logo}}" width="200" alt="">
                                <br>
                                <br>
                                <input type="file" id="complaintinput4" class="form-control " placeholder="supervisor name" name="company_logo">
                              </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput4">Favicon</label>
                            <div class="col-md-9">
                              <img src="{{$cfg->favicon}}" width="200" alt="">
                              <br>
                              <br>
                              <input type="file" id="complaintinput4" class="form-control " placeholder="supervisor name" name="favicon">
                            </div>
                        </div>


                          <div class="form-actions" style="text-align: center">
                           
                            <button type="submit" class="btn btn-primary">
                                <i class  ="fa fa-check-square-o"></i> Save Now
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