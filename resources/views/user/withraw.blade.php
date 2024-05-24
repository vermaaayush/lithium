@php
    use App\Models\User;
    $p_data = User::where('id', session('s_user')['id'])->first(); 
@endphp
@extends('user.layout.main')
@section('title', 'Withdrawal Funds')
@section('main-container')
		<!-- Content body start -->
       <!-- Nav tabs -->
       @if ($p_data->add_status==2)
           
       
       <div class="w-full lg:w-1/2 " style="margin:auto">
        <div class="card">
            <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
                <h4 class="card-title text-base capitalize">Withdrawal Funds</h4>
            </div>
            <div class="sm:p-5 p-4">
                <div class="basic-form">
                    <form action="/add_withrawal" method="post" class="form-valide-with-icon needs-validation" enctype="multipart/form-data"> 
                        @csrf 
                        <div class="mb-4">
                            <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Available Wallet Balance <span class="required text-danger">*</span></label>
                            <div class="flex items-stretch flex-wrap relative w-full">
                              
                                <input type="text" class="form-control" value="${{ number_format($user->balance) }}"style="font-weight:bold;font-size:20px;border:0px" name="balance" readonly>
                               
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">User Name <span class="required text-danger">*</span></label>
                            <div class="flex items-stretch flex-wrap relative w-full">
                              
                                <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="{{ $user->name }}" name="name" readonly>
                               
                            </div>
                        </div>

                        <input type="text" name="user_id" value="{{ $user->user_id }}" hidden>

                       

                       

                        <div class="mb-4">
                            <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Amount <span class="required text-danger">*</span> <br><span style="color:rebeccapurple"></span></label>
                            <div class="flex items-stretch flex-wrap relative w-full">
                              
                                <input type="number" id="amount" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter the amount" name="amount" required>

                               
                            </div>
                        </div>

                       

                       
                        
                       <p style="text-align: center"> <button type="submit" class="btn mr-2 inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Continue</button>
                       </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
              
    @else
    <div class="xl:w-1/2 w-full" style="margin: auto">
        <div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent text-danger bg-danger-light dark:bg-[#ff5e5e26] dark:border-[#ff5e5e26] notification">
            <p class="text-danger mb-2"><strong>Pending! </strong>Address Proof Verification</p>
            <p class="mb-4 text-danger leading-[1.5]">Submit and verify your proof of address to withdrawal funds.</p>
           
        </div>
    </div>    
                      
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const amountInput = document.getElementById('amount');
            const balance = parseFloat('{{ $user->balance }}');
    
            amountInput.addEventListener('input', function () {
                const enteredAmount = parseFloat(amountInput.value);
    
                if (enteredAmount > balance) {
                    amountInput.setCustomValidity('Amount must be less than or equal to ${{ number_format($user->balance) }}');
                } else {
                    amountInput.setCustomValidity('');
                }
            });
        });
    </script>
          
        @endif						
						
         <!-- Content body end -->
@endsection