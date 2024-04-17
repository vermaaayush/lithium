@php
    use App\Models\User;
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
<div class="w-full lg:w-1/2 " style="margin:auto">
    <div class="card">
        <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
            <h4 class="card-title text-base capitalize">Transfer Funds To Other User Account:</h4>
        </div>
        @if (session('error'))
        <div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent border-l-4 border-l-danger text-danger bg-danger-light alert-alt dark:bg-[#ff5e5e26] dark:border-[#ff5e5e26]">
            <button type="button" class="remove-btn absolute right-0 py-5 px-4 top-[-5px] opacity-50 z-[2] dark:text-white"><span><i class="fa-solid fa-xmark scale-[0.9]"></i></span>
            </button>
            {{ session('error') }}
        </div>
        @endif
        <div class="sm:p-5 p-4">
            <div class="basic-form">
                <form action="/transfer" method="post" class="form-valide-with-icon needs-validation" > 
                    @csrf 
                    <div class="mb-4">
                        @php
                            $u_info = User::find(session('s_user')['id']);
                            

                        @endphp
                        <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Available Balance <span class="required text-danger">*</span></label>
                        <div class="flex items-stretch flex-wrap relative w-full">
                          
                            <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="$ {{  number_format($u_info->balance) }}" style="background-color: green;color:white" readonly>
                            <input type="text" value="{{ ($u_info->balance) }}" name="avl_balance" hidden>
                           
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Receiver Email / User ID <span class="required text-danger">*</span></label>
                        <div class="flex items-stretch flex-wrap relative w-full">
                          
                            <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter receiver detail" name="receiver" required>
                           
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Amount <span class="required text-danger">*</span></label>
                        <div class="flex items-stretch flex-wrap relative w-full">
                          
                            <input id="amountInput" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500 outline-none ml-[-1px]" placeholder="Enter the amount" name="amount" required>

                        </div>
                    </div>

                   
                    
                    <button type="submit" class="btn mr-2 inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Continue</button>
                    
                </form>
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