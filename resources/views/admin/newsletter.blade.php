@extends('admin.layout.main')
@section('title', 'User Details')
@section('main-container')


<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">User Details</h3>
          
        </div>
        
      </div>
      <div class="content-body"><!-- Basic form layout section start -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
<section id="basic-form-layouts">
<form action="/send_newsletter" method="post" >
  <div class="row match-height">



    @csrf
      <div class="col-md-6">
          <div class="card">
             
              <div class="card-content collapse show">
                  <div class="card-body" style="overflow-y: auto; height: 600px;">
                    <div class="table-responsive">
                        <table id="users-contacts" border="1" >
                            <thead>
                                <tr>
                                    <th style="padding:10px ">#</th>
                                    <th style="padding:10px ">User Name</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody >
                                <tr>
                                    <td style="padding:7px "><input type="checkbox" id="select-all-checkbox"  name="select_all" class="form-control"></td>
                                   
                                    <td style="padding:7px ">
                                        <label>Select All</label>
                                       
                                    </td>
                                  
                                </tr>
                              @foreach ($u_info as $user)
                                <tr>
                                    <td style="padding:7px "><input type="checkbox" name="checkbox[]" value="{{ $user->id }}" class="form-control"></td>
                                   
                                    <td style="padding:7px ">
                                        <label for="checkbox_{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</label>
                                        <input type="hidden" name="user_ids[]" value="{{ $user->id }}">
                                    
                                    </td>
                                  
                                </tr>
                              @endforeach  
                            </tbody>
                           
                        </table>
                    </div> 
                      
                  </div>
              </div>
          </div>
      </div>

      <div class="col-md-6">
          <div class="card">
              
              <div class="card-content collapse show">
                  <div class="card-body">

                  
                        <div class="form-body">
                     
                            <div class="form-group">
                                <label for="name">Notification Text</label>
                               
                                <textarea name="msg"  cols="30" rows="10" class="form-control" required></textarea>
                            </div>
                            
                           
                        </div>
                    
                        <div class="form-actions text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Send Now
                            </button>
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