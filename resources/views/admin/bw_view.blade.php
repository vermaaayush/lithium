@extends('admin.layout.main')
@section('title', 'Bank Wire Deposite Request')
@section('main-container')


<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Bank Wire Deposite Request</h3>
          
        </div>
        
      </div>
      <div class="content-body"><!-- Basic form layout section start -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
<section id="basic-form-layouts">
<form  method="post" >
  <div class="row match-height">



    @csrf
      
      <div class="col-md-10 mx-auto ">
          <div class="card">
              
              <div class="card-content collapse show">
                  <div class="card-body">

                    <div class="table-responsive">
                        <table id="users-contacts" class="table table-white-space  row-grouping display no-wrap icheck table-middle" >
                            
                            <tbody>
                            
                                <tr>
                                    <td><h4><strong>Bank Name: </strong>{{$data->bank_name}}</h4></td>
                                    <td><h4><strong>Account Number: </strong>{{$data->acc_number}}</h4></td>
                                </tr>
                                <tr>
                                    <td><h4><strong>Amount: </strong>{{$data->acc_number}}</h4></td>
                                    <td><h4><strong>Transaction ID: </strong>{{$data->transaction_id}}</h4></td>
                                </tr>
                                @if ($data->notes)
                                <tr>
                                    <td><h4><strong>Description: </strong>{{$data->notes}}</h4></td>
                                 
                                </tr>
                                @endif

                                <br>
                                <br>
                                <tr>
                                    
                                    <td><img src="{{ asset($data->img) }}" width="100%" alt="aaasdasdasd"></td>
                                 
                                </tr>
                               
                              
                            </tbody>
                           
                        </table>
                    </div>
                  
                   
                        <div class="form-actions text-center">
                            <a href="/app_depo/{{$data->id}}" class="btn btn-success">Approve</a>
                            <a href="/bw_reject/{{$data->id}}" class="btn btn-danger">Reject</a>
                          
                        </div>

                    
                     
                  
 
                     

                  </div>

                 
              </div>
          </div>
      </div>

  </div>
</form>


</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectAllCheckbox = document.getElementById('select-all-checkbox');
        const checkboxes = document.querySelectorAll('input[name="checkbox[]"]');

        selectAllCheckbox.addEventListener('change', function () {
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });
    });
</script>

<!-- // Basic form layout section end -->
      </div>
    </div>
  </div>    
@endsection