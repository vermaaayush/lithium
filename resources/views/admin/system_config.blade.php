@extends('admin.layout.main')
@section('title', 'System Config')
@section('main-container')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h1 class="content-header-title mb-0 d-inline-block">System Config</h1>
          <div class="row breadcrumbs-top d-inline-block">
           
          </div>
        </div>
       
      </div>
      <div class="content-body"><!-- Checkbox Toggle start -->
<section class="bootstrap-checkbox" id="bootstrap-checkbox">

<div class="row match-height">
  <div class="col-lg-6 col-md-12">
    <h3>Company Details</h3>
    <div class="card ">
      <form class="form" style="padding: 5%">
        <div class="form-body">

          <div class="form-group">
            <label for="complaintinput1">Company Name</label>
            <input type="text" id="complaintinput1" class="form-control round"  name="companyname">
          </div>

          <div class="form-group">
            <label for="complaintinput2">Company URL</label>
            <input type="text" id="complaintinput2" class="form-control round"  name="company_url">
          </div>

          <div class="form-group">
            <label for="complaintinput3">Company Phone</label>
            <input type="number" id="complaintinput3" class="form-control round" name="company_phone">
          </div>


          <div class="form-group">
            <label for="complaintinput4">Company Email</label>
            <input type="email" id="complaintinput4" class="form-control round"  name="company_email">
          </div>


          <div class="form-group">
            <label for="complaintinput5">Company Logo</label>
            <input type="file" id="complaintinput4" class="form-control round" placeholder="supervisor name" name="company_logo">
          </div>

         
        </div>

        <div class="form-actions">
          
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-check-square-o"></i> Update Information
          </button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-lg-6 col-md-12">
    <h3>User Access Control</h3>
    <div class="card">
      <form class="form" style="padding: 5%">
        <div class="form-body">


          <div class="form-group">
            <label for="complaintinput3">Manage e-currency: </label>
            <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" checked/>
          </div>

          <div class="form-group">
            <label for="complaintinput3">Manage e-mail: </label>
            <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" checked/>
          </div>

          <div class="form-group">
            <label for="complaintinput3">Instant Payment: </label>
            <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" checked/>
          </div>

          <div class="form-group">
            <label for="complaintinput3">Deposit via payment processing: </label>
            <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" checked/>
          </div>

          <div class="form-group">
            <label for="complaintinput3">Manage compounding percent: </label>
            <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" checked/>
          </div>

          <div class="form-group">
            <label for="complaintinput3">Release a deposit from plan: </label>
            <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" checked/>
          </div>

          <div class="form-group">
            <label for="complaintinput3">Transfer funds to other users: </label>
            <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" checked/>
          </div>

          <div class="form-group">
            <label for="complaintinput3">Date of Complaint : </label>
            <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" checked/>
          </div>


         
        </div>

        <div class="form-actions">
         
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-check-square-o"></i> Update Information
          </button>
        </div>
      </form>
    </div>
  </div>
 
  
</div>
</section>
<!-- Bootstrap Switch end -->



<!-- Template Color Switchery end-->
      </div>
    </div>
  </div>


 
  <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js') }}"></script>
  <script src="{{ asset('app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js') }}"></script>
  <script src="{{ asset('app-assets/vendors/js/forms/toggle/switchery.min.js') }}"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN ROBUST JS-->
  <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
  <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
  <!-- END ROBUST JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{ asset('app-assets/js/scripts/forms/switch.js') }}"></script>
  
@endsection