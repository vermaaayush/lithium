@extends('admin.layout.main')
@section('title', 'Referrals')
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
                     
                    <form class="form form-horizontal"  action="/update_referral" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                        <div class="form-body">
                          <h4 class="form-section"><i class="ft-clipboard"></i> Manage Referrals Program</h4>
                            <div class="form-group row">
                                <label class="col-md-5 label-control" for="projectinput1">Referral Code Bonus ($)</label>
                                <div class="col-md-7">
                                  <input type="number" id="complaintinput1" class="form-control" value="{{$cfg->reff_code_bonus}}"   name="reff_code_bonus" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5 label-control" for="projectinput2">Earnings on referrals is on profit made from trades of referra (%)</label>
                                <div class="col-md-7">
                                  <input type="number" id="complaintinput2" class="form-control "  value="{{$cfg->reff_depo_earning}}" name="reff_depo_earning" required>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-5 label-control" for="projectinput4">Earnings from deposits of referrals (%)</label>
                              <div class="col-md-7">
                                <input type="number" id="complaintinput3" class="form-control " value="{{$cfg->reff_trade_earning}}" name="reff_trade_earning" required>
                              </div>
                          </div>

                      

                          <div class="form-actions" style="text-align: center">
                           
                            <button type="submit" class="btn btn-primary">
                                <i class  ="fa fa-check-square-o"></i> Update Now
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