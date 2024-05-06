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
                     
                    <div class="col-lg-12 col-md-12">
                        <h3>User Access Control</h3>
                        <div class="card">
                          <form class="form" action="/access_control" method="post" style="padding: 5%">
                            @csrf
                            <div class="form-body">

                                <div class="form-group row">
                                    <label class="col-md-9 label-control" for="projectinput1">Users can change their e-mail in members area:</label>
                                    <div class="col-md-3">
                                        <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" name="m_email" {{ $data->m_email == 1 ? 'checked' : '' }}/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-9 label-control" for="projectinput1">Users are able to use an instant payment feature:</label>
                                    <div class="col-md-3">
                                        <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" name="m_instant_payment" {{ $data->m_instant_payment == 1 ? 'checked' : '' }}/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-9 label-control" for="projectinput1">Users can release a deposit before deposit plan duration ends:</label>
                                    <div class="col-md-3">
                                        <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" name="m_deposite" {{ $data->m_deposite == 1 ? 'checked' : '' }}/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-9 label-control" for="projectinput1">Users can transfer funds to other users' accounts inside the system.</label>
                                    <div class="col-md-3">
                                        <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" name="m_transfer" {{ $data->m_transfer == 1 ? 'checked' : '' }}/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-9 label-control" for="projectinput1">User can make a deposit via payment processing you use:</label>
                                    <div class="col-md-3">
                                        <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" name="extra1" {{ $data->extra1 == 1 ? 'checked' : '' }}/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                  <label class="col-md-9 label-control" for="projectinput1">Deposite without Identity verification:</label>
                                  <div class="col-md-3">
                                      <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" name="extra2" {{ $data->extra2 == 1 ? 'checked' : '' }}/>
                                  </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-9 label-control" for="projectinput1">Referral Program:</label>
                                <div class="col-md-3">
                                    <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" name="referral" {{ $data->referral == 1 ? 'checked' : '' }}/>
                                </div>
                            </div>
                    
                    
                    
                    
                             
                            </div>
                    
                            <div class="form-actions">
                             
                              <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Update Now
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
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