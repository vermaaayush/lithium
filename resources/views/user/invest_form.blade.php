@extends('user.layout.main')
@section('title', 'Investment Form')
@section('main-container')


<div class="row">
	<div class="w-full col-xxl-12">
		<div class="card">
            <div class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-4">
                <h3 class="card-title  capitalize">Invest Now</h3>
            </div>
			<div class="sm:p-5 p-4">
				<div id="smartwizard" class="form-wizard order-create border-0">
					
					<div class="tab-content">
                        <form action="/trade_in" method="POST">
                            @csrf 
						<div id="wizard_Service" class="tab-pane active show" role="tabpanel">
							<div class="row">
								<div class="lg:w-1/2 mb-2">
									<div class="mb-4">
										<label class="text-body-color dark:text-white">Available Wallet Balance</label>
										<input type="text" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="${{ number_format($user->balance) }}" style="color:green;font-weight:bold" name="balance" readonly>
									</div>
								</div>
								<div class="lg:w-1/2 mb-2">
									<div class="mb-4">
										<label class="text-body-color dark:text-white">User Name</label>
										<input type="text" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="{{ $user->name }}" name="user_name" readonly>
									</div>
								</div>
								
								<div class="w-full mb-4">
									<div class="mb-4">
										<label class="text-body-color dark:text-white">Selected Plan</label>
										<input type="text" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="{{ $plan->name }}  | {{ $plan->roi }}% | {{ $plan->duration }}Days | ${{ $plan->minimum_amount }} minimum"  readonly>
									</div>
								</div>

                                <div class="w-full mb-4">
									<div class="mb-4">
										<label class="text-body-color dark:text-white">Amount<span class="required text-danger">*</span><span style="color:rebeccapurple">(Minimum Amount: ${{ number_format($plan->minimum_amount) }})</span></label>
										<input type="text" id="amount" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Enter the amount" name="amount" required>
									</div>
								</div>

                                <input type="text"  value="{{ $plan->plan_id }}" name="plan_id" hidden >
                                <input type="text"  value="{{ $plan->duration }}" name="duration" hidden >
                                <input type="text" name="user_id" value="{{ $user->user_id }}" hidden>

                                <div class="w-full mb-4">
									<div class="mb-4">
                                        <button type="submit" class="btn mr-2  w-full inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Invest Now</button>
									</div>
								</div>

							</div>
					 	</div>
                        </form>


					
						
						
					</div>
				</div>
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