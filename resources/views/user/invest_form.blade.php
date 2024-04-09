@extends('user.layout.main')
@section('title', 'Investment Form')
@section('main-container')
		<!-- Content body start -->
        <div class="w-full lg:w-1/2 " style="margin:auto">
            <div class="card">
                <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
                    <h4 class="card-title text-base capitalize">Invest Now</h4>
                </div>
                <div class="sm:p-5 p-4">
                    <div class="basic-form">
                        <form action="/trade_in" method="post" class="form-valide-with-icon needs-validation" enctype="multipart/form-data"> 
                            @csrf 
                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Available Wallet Balance <span class="required text-danger">*</span></label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                  
                                    <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="${{ number_format($user->balance) }}" style="color:green;font-weight:bold" name="balance" readonly>
                                   
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">User Name <span class="required text-danger">*</span></label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                  
                                    <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="{{ $user->name }}" name="user_name" readonly>
                                   
                                </div>
                            </div>

                            <input type="text" name="user_id" value="{{ $user->user_id }}" hidden>

                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Selected Plan <span class="required text-danger">*</span></label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                  
                                    <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="{{ $plan->name }}  | {{ $plan->roi }}% | {{ $plan->duration }}Days | ${{ $plan->minimum_amount }} minimum"  readonly>
                                   
                                </div>
                            </div>

                             <input type="text"  value="{{ $plan->plan_id }}" name="plan_id" hidden >
                             <input type="text"  value="{{ $plan->duration }}" name="duration" hidden >

                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Amount <span class="required text-danger">*</span> <br><span style="color:rebeccapurple">(Minimum Amount: ${{ number_format($plan->minimum_amount) }})</span></label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                  
                                    <input type="text" id="amount" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter the amount" name="amount" required>

                                   
                                </div>
                            </div>

                           

                           
                            
                            <button type="submit" class="btn mr-2 inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Invest Now</button>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
                      
                          
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const amountInput = document.getElementById('amount');
        
                amountInput.addEventListener('input', function () {
                    const enteredAmount = parseFloat(amountInput.value);
                    const minimumAmount = parseFloat('{{ $plan->minimum_amount }}');
        
                    if (enteredAmount < minimumAmount) {
                        amountInput.setCustomValidity('Amount must be at least ${{ $plan->minimum_amount }}');
                    } else {
                        amountInput.setCustomValidity('');
                    }
                });
            });
        </script>
                            
						
         <!-- Content body end -->
@endsection