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
       

       @if (session('error'))
       <div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent border-l-4 border-l-danger text-danger bg-danger-light alert-alt dark:bg-[#ff5e5e26] dark:border-[#ff5e5e26]">
           <button type="button" class="remove-btn absolute right-0 py-5 px-4 top-[-5px] opacity-50 z-[2] dark:text-white"><span><i class="fa-solid fa-xmark scale-[0.9]"></i></span>
           </button>
           {{ session('error') }}
       </div>
       @endif
       
<div class="row">
	<div class="w-full col-xxl-12">
		<div class="card">
            <div class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-4">
                <h3 class="card-title  capitalize">Withdrawal Funds</h3>
            </div>
			<div class="sm:p-5 p-4">
				<div id="smartwizard" class="form-wizard order-create border-0">
					
					<div class="tab-content">
                        <form action="/add_withrawal" method="POST">
                            @csrf 
                            <div id="wizard_Service" class="tab-pane active show" role="tabpanel">
                                <div class="row">
                                    <div class="lg:w-1/2 mb-2">
                                        <div class="mb-4">
                                            <label class="text-body-color dark:text-white">Available Wallet Balance</label>
                                            <input type="text" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="${{ number_format($user->balance) }}" style="color:green;font-weight:bold" name="balance" readonly>
                                        </div>
                                    </div>
                                    <div class="lg:w-1/2 mb-2">
                                        <div class="mb-4">
                                            <label class="text-body-color dark:text-white">User Name</label>
                                            <input type="text" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="{{ $user->name }}" name="name" readonly>
                                        </div>
                                    </div>
                                    <div class="w-full mb-4">
                                        <div class="mb-4">
                                            <label class="text-body-color dark:text-white">Amount<span class="required text-danger">*</span></label>
                                            <input type="text" id="amount1" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Enter the amount" name="amount" required>
                                        </div>
                                    </div>
                                    <input type="text" name="user_id" value="{{ $user->user_id }}" hidden>
                                    <div class="w-full mb-4">
                                        <div class="mb-4">
                                            <button type="submit" class="btn mr-2 w-full inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Continue</button>
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



       
     
              
    @else
    <div class="xl:w-1/2 w-full" style="margin: auto">
        <div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent text-danger bg-danger-light dark:bg-[#ff5e5e26] dark:border-[#ff5e5e26] notification">
            <p class="text-danger mb-2"><strong>Pending! </strong>Address Proof Verification</p>
            <p class="mb-4 text-danger leading-[1.5]">Submit and verify your proof of address to withdrawal funds.</p>
           
        </div>
    </div>    
                      
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('DOM fully loaded and parsed');
            
            const amountInput = document.querySelector('#amount1');
            const balance = parseFloat('{{ $user->balance }}');
    
            console.log('Balance:', balance);
            
            amountInput.addEventListener('input', function () {
                const enteredAmount = parseFloat(amountInput.value);
                console.log('Entered Amount:', enteredAmount);
    
                if (enteredAmount > balance) {
                    console.log('Entered amount is greater than available balance');
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