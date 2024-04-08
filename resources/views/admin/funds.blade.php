@extends('admin.layout.main')
@section('title', 'Funds')
@section('main-container')


<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        
        
      </div>
      <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
  <div class="row match-height">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <form action="">
                        <h4 class="form-section"><i class="fa fa-eye"></i>User Detailsr</h4>
	                    		<div class="row">
	                    			<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput1">Full Name</label>
				                        	<div class="col-md-9">
				                            	<input type="text" id="userinput1" class="form-control border-primary"  value="{{ $data->name }}" name="firstname">
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput2">Email</label>
				                        	<div class="col-md-9">
				                            	<input type="text" id="userinput2" class="form-control border-primary" value="{{ $data->email }}" name="lastname">
			                        		</div>
				                        </div>
			                        </div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-6">
			                        	<div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput3">User Id</label>
				                        	<div class="col-md-9">
				                            	<input type="text" id="userinput3" class="form-control border-primary" value="{{ $data->user_id }}" name="user_id">
			                        		</div>
			                       		</div>
			                       	</div>
			                       	<div class="col-md-6">
				                        <div class="form-group row">
				                        	<label class="col-md-3 label-control" for="userinput4">Status</label>
				                        	<div class="col-md-9">
				                            	<input type="text" id="userinput4" class="form-control border-primary" value="{{ $data->status }}" name="nickname">
			                        		</div>
				                        </div>
				                    </div>

                                  
		                        </div>  
                    </form>
                </div>
            </div>    
        </div>
    </div>
      

     <div class=" col-md-12">
        <div class="card">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                          
                            <tbody>
                                <tr>
                                    
                                    <td><strong>Wallet Balance:</strong></td>
                                    <td><p style="color:green;font-size:25px;font-weight:bold">${{ number_format($data->balance) }}</p></td>
                                    <td><a href="#" class="btn btn-success" data-toggle="modal" data-target="#addBalanceModal">Add Balance</a></td>

                                   
                                </tr>
                                {{-- <tr>
                                    
                                    <td><strong>Total Balance:</strong></td>
                                    <td>${{ $data->balance }}</td>
                                    <td><a href="#" class="btn btn-primary">History</a></td>
                                   
                                </tr> --}}
                                <tr>
                                    
                                    <td><strong>Total Deposit:</strong></td>
                                    <td>${{ number_format($data->deposite) }}</td>
                                    <td><a href="#" class="btn btn-primary">History</a></td>
                                   
                                </tr>
                                <tr>
                                    
                                    <td><strong>Active Deposit:</strong></td>
                                    <td>$0</td>
                                    <td><a href="#" class="btn btn-danger">Manage Deposits</a></td>
                                    
                                   
                                </tr>
                                <tr>
                                    
                                    <td><strong>Total Earning:</strong></td>
                                    <td>${{ $data->Earning }}</td>
                                    <td><a href="#" class="btn btn-primary">History</a></td>
                                   
                                </tr>
                                <tr>
                                    
                                    <td><strong>Total Withdrawal:</strong></td>
                                    <td>${{ $data->withraw }}</td>
                                    <td><a href="#" class="btn btn-primary">History</a>  <a href="#" class="btn btn-danger">Withraw Request</a>  </td>

                                   
                                </tr>
                                <tr>
                                    
                                    <td><strong>Pending Withdrawals:</strong></td>
                                    <td>$0</td>
                                    <td><a href="#" class="btn btn-danger">Process Withrawals</a></td>
                                   
                                </tr>
                                <tr>
                                    
                                    <td><strong>Total Bonus:</strong></td>
                                    <td>$0</td>
                                    <td><a href="#" class="btn btn-primary">History</a>  <a href="#" class="btn btn-danger">Add A Bonus</a>  </td>

                                   
                                </tr>
                                <tr>
                                    
                                    <td><strong>Total Penalty:</strong></td>
                                    <td>$0</td>
                                    <td><a href="#" class="btn btn-primary">History</a>  <a href="#" class="btn btn-danger">Add A Penalty</a>  </td>

                                   
                                </tr>
                               
                            </tbody>
                        </table>
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
  
  


  <div class="modal fade" id="addBalanceModal" tabindex="-1" role="dialog" aria-labelledby="addBalanceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBalanceModalLabel">Add Balance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/add_balance/{{ $data->id }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="amount">Enter Amount:</label>
                        <input type="text" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection