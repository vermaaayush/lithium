@php
    use App\Models\User;
    
                            $u_info = User::find(session('s_user')['id']);
                            

@endphp
@extends('user.layout.main')
@section('title', 'Fund Transfer')
@section('main-container')

<!-- Content body start -->
<h4>
    Seamlessly transfer funds to another user's account, ensuring efficiency and convenience in managing your finances.
</h4>
<br>
<br>
<div class="row">
    <div class="w-full col-xxl-12">
        <div class="card">
            <div class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-4">
                <h3 class="card-title  capitalize">Withdrawal Funds</h3>
            </div>
            <div class="sm:p-5 p-4">
                <div id="smartwizard" class="form-wizard order-create border-0">
                    
                    <div class="tab-content">
                        <form action="/transfer" method="POST">
                            @csrf 
                            <div id="wizard_Service" class="tab-pane active show" role="tabpanel">
                                <div class="row">
                                    <div class="lg:w-1/2 mb-2">
                                        <div class="mb-4">
                                            <label class="text-body-color dark:text-white">Available Wallet Balance</label>
                                            <input type="text" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="${{ number_format($u_info->balance) }}" style="color:green;font-weight:bold" name="balance" readonly>
                                            <input type="text" value="{{ ($u_info->balance) }}" name="avl_balance" hidden>
                                        </div>
                                    </div>
                                    <div class="lg:w-1/2 mb-2">
                                        <div class="mb-4">
                                            <label class="text-body-color dark:text-white">Receiver Email / User ID</label>
                                            <input type="email" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Enter receiver detail" name="receiver" required>
                                        </div>
                                    </div>
                                    <div class="w-full mb-4">
                                        <div class="mb-4">
                                            <label class="text-body-color dark:text-white">Amount<span class="required text-danger">*</span></label>
                                            <input type="text" id="amountInput" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Enter the amount" name="amount" required>
                                        </div>
                                    </div>
                                   
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



<script>
document.addEventListener('DOMContentLoaded', function () {
    const amountInput = document.getElementById('amountInput');

    amountInput.addEventListener('input', function () {
        let enteredValue = amountInput.value.replace(/[^\d.]/g, ''); // Remove non-numeric characters except decimal point
        if (enteredValue === '') {
            enteredValue = '0'; // Set to 0 if input is empty or contains only non-numeric characters
        }

        const amount = parseFloat(enteredValue); // Convert the cleaned input to a floating-point number
        const formattedAmount = amount.toLocaleString(); // Format with commas for thousands separation

        // Update the input field value with the formatted amount without $ and ,
        amountInput.value = formattedAmount; // Display only the formatted amount without $ and ,
    });
});

</script>

@endsection