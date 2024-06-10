@php
    use App\Models\User;
    use App\Models\Accesscontrol;
    use App\Models\Bank;
    $p_data = User::where('id', session('s_user')['id'])->first(); 
    $a_c = Accesscontrol::where('id', 1)->first(); 
    $data = User::where('user_id', session('s_user')['user_id'])->first();
    $bank = Bank::find(1);
@endphp
@extends('user.layout.main')
@section('title', 'Deposite Funds')
@section('main-container')
		<!-- Content body start -->
       <!-- Nav tabs -->
       <style> .btcpay-form { display: inline-flex; align-items: center; justify-content: center; } .btcpay-form--inline { flex-direction: row; } .btcpay-form--block { flex-direction: column; } .btcpay-form--inline .submit { margin-left: 15px; } .btcpay-form--block select { margin-bottom: 10px; } .btcpay-form .btcpay-custom-container{ text-align: center; }.btcpay-custom { display: flex; align-items: center; justify-content: center; } .btcpay-form .plus-minus { cursor:pointer; font-size:25px; line-height: 25px; background: #DFE0E1; height: 30px; width: 45px; border:none; border-radius: 60px; margin: auto 5px; display: inline-flex; justify-content: center; } .btcpay-form select { -moz-appearance: none; -webkit-appearance: none; appearance: none; color: currentColor; background: transparent; border:1px solid transparent; display: block; padding: 1px; margin-left: auto; margin-right: auto; font-size: 11px; cursor: pointer; } .btcpay-form select:hover { border-color: #ccc; } .btcpay-form option { color: #000; background: rgba(0,0,0,.1); } .btcpay-input-price { -moz-appearance: textfield; border: none; box-shadow: none; font-size: 25px; margin: auto; border-radius: 5px; line-height: 35px; background: #fff; }.btcpay-input-price::-webkit-outer-spin-button, .btcpay-input-price::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } </style>
 
       @if ($a_c->extra2==1)
           
      
       @if ($p_data->id_status==2)
           
       @endif
       

       <div class="row">
            
        
        <div class="xl:w-3/4 lg:w-2/3">
            
            <div class="card flex flex-col max-sm:mb-[30px] profile-card" >
                <div class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-4">
                    <h3 class="card-title  capitalize">Deposit                    </h3>
                </div>
                <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">

                        <div class="row" id="cryptocurrency" style="display: none;">
                           
                          
                            
                          	<!-- Content body start -->
        <div class="w-full" style="margin:auto">
            <div class="card">
                <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
                    <h3 class="card-title text-base capitalize text-primary"><strong>CRYPTOCURRENCY DEPOSIT</strong>                    </h3>
                </div>
                <div class="sm:p-5 p-4" >
                    <h4>Deposit Instruction</h4>
                    <p>1. Complete the form below and press ‘Submit’</p>
                    <p>2. You will then be directed to a new window displaying a BTC wallet address</p>
                    <p>3. Copy the BTC wallet address and then log in to your personal BTC wallet and transfer your desired amount to the BTC address.</p>
                    <h4>Deposit Note</h4>
                    <p>1. Please note that we are unable to deposit or withdraw via BUSD, please ensure the address and Cryptocurrency match the chain and currency we accept or you may loss the fund. We shall not be liable for any loss incurred by the errors.</p>
                    <br>
                    <div>
                             
                        <form  style="width:100%" method="POST" action="https://coinpayme.de/api/v1/invoices" class="btcpay-form btcpay-form--block">
                            <input type="hidden" name="storeId" value="96K85uppq8qb3CQsWv4bc9BuMomiE5ntJqtpPF8hqwba" />
                            <input type="hidden" name="jsonResponse" value="true" />
                            <input type="hidden" name="serverIpn" value="{{ env('APP_URL') }}/api_btcpay.php?user_id={{session('s_user')['user_id']}}" />
                            <input type="hidden" name="browserRedirect" value="{{ env('APP_URL') }}/dashboard" />
                          
                          
                            <div >
                              

                             
                                <input type="text" style="width:300px !important;" class=" form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full input-default " type="number" name="price" min="1" max="20000" step="1"  data-price="1" placeholder="Enter Amount">
                            
                             
                              <input type="text" name="currency" value="USD" id="" hidden>
                                    
                                    <select name="defaultPaymentMethod" class="mb-4 nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem] form-control-lg">
                                    <option value="BTC" selected>BTC</option>
                                    <option value="DOGE">DOGE</option>
                                    <option value="LTC">LTC</option>
                                    </select>
                                   
                             
                          
                            </div>
                            <input type="image" class="submit" name="submit" src="https://mainnet.demo.btcpayserver.org/img/paybutton/pay.svg" style="width:209px" alt="Pay with BTCPay Server, a Self-Hosted Bitcoin Payment Processor">
                          </form>
                        
                       
                    </div>
                </div>
            </div>
        </div>
                      
   
								
		<script>
            if (!window.btcpay) {
                var script = document.createElement('script');
                script.src = "https://coinpayme.de/modal/btcpay.js";
                document.getElementsByTagName('head')[0].append(script);
            }
            function handleFormSubmit(event) {
                event.preventDefault();
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200 && this.responseText) {
                        window.btcpay.appendInvoiceFrame(JSON.parse(this.responseText).invoiceId);
                    }
                };
                xhttp.open('POST', event.target.getAttribute('action'), true);
                xhttp.send(new FormData(event.target));
            }
            document.querySelectorAll(".btcpay-form").forEach(function(el) {
                if (!el.dataset.initialized) {
                    el.addEventListener('submit', handleFormSubmit);
                    el.dataset.initialized = true;
                }
            });
            
            function handlePlusMinus(event) {
                event.preventDefault();
                const root = event.target.closest('.btcpay-form');
                const el = root.querySelector('.btcpay-input-price');
                const step = parseInt(event.target.dataset.step) || 1;
                const min = parseInt(event.target.dataset.min) || 1;
                const max = parseInt(event.target.dataset.max);
                const type = event.target.dataset.type;
                const price = parseInt(el.value) || min;
                if (type === '-') {
                    el.value = price - step < min ? min : price - step;
                } else if (type === '+') {
                    el.value = price + step > max ? max : price + step;
                }
            }
            document.querySelectorAll(".btcpay-form .plus-minus").forEach(function(el) {
                if (!el.dataset.initialized) {
                    el.addEventListener('click', handlePlusMinus);
                    el.dataset.initialized = true;
                }
            });
            
            function handlePriceInput(event) {
                event.preventDefault();
                const root = event.target.closest('.btcpay-form');
                const price = parseInt(event.target.dataset.price);
                if (isNaN(event.target.value)) root.querySelector('.btcpay-input-price').value = price;
                const min = parseInt(event.target.getAttribute('min')) || 1;
                const max = parseInt(event.target.getAttribute('max'));
                if (event.target.value < min) {
                    event.target.value = min;
                } else if (event.target.value > max) { 
                    event.target.value = max;
                }
            }
            document.querySelectorAll(".btcpay-form .btcpay-input-price").forEach(function(el) {
                if (!el.dataset.initialized) {
                    el.addEventListener('input', handlePriceInput);
                    el.dataset.initialized = true;
                }
            });
        </script>			
         <!-- Content body end -->
                           
                            
                        </div>

                        <div class="row" id="bankWire" style="display: none;">
                           
                          
                            
                            <div class="w-full" style="margin:auto">
                                <div class="">
                                  
                                    <div class="sm:p-5 p-4">
                                        <div class="">
                                            <div class="card overflow-hidden">
                                                <div class="text-center p-4 relative z-[1] overlay-box" style="background-image: url(assets/images/big/img1.jpg);">
                                                    <div class="profile-photo">
                                                        <i class="fas fa-solid fa-building-columns" style="color:white;font-size: 70px;"></i>
                                                    </div>
                                                
                                                </div>
                                                <div style="padding: 5%;">
                                                    <h3>Deposit Instruction</h3>
                                                    <p class="text-base">1. Please ensure that clearly shows
                                                        your full name, account number,
                                                        and deposit amount so we can
                                                        process your transaction.</p>
                                                    <p class="text-base">2. Please allow 1-6 hours for the
                                                            funds to be credited to your
                                                            account.</p>
                                                </div>
                    
                                                <div style="width:70%;margin:auto">
                                                    <div class="card text-white bg-primary">
                                                        <ul class="list-group flex flex-col list-group-flush">
                                                            
                                                             
                                                            @if(!empty($bank->name))
                                                            <li class="list-group-item flex justify-between p-4 text-sm"><span class="mb-0">Bank Name :</span><strong>{{ $bank->name }} </strong></li>
                                                            @endif
                    
                                                            @if(!empty($bank->account_number))
                                                            <li class="list-group-item flex justify-between p-4 text-sm"><span class="mb-0">Account Number :</span> <strong class="">{{ $bank->account_number }}</strong></li>
                                                            @endif
                    
                                                            @if(!empty($bank->address))
                                                            <li class="list-group-item flex justify-between p-4 text-sm"><span class="mb-0">Bank Address :</span><strong>{{ $bank->address }} </strong></li>
                                                            @endif
                    
                                                            @if(!empty($bank->swift_code))
                                                            <li class="list-group-item flex justify-between p-4 text-sm"><span class="mb-0">Swift Code :</span> <strong class="">{{ $bank->swift_code }}</strong></li>
                                                            @endif
                    
                                                            @if(!empty($bank->ibank_number))
                                                            <li class="list-group-item flex justify-between p-4 text-sm"><span class="mb-0">IBAN number :</span><strong>{{ $bank->ibank_number }} </strong></li>
                                                            @endif
                    
                                                            @if(!empty($bank->rounting_number))
                                                            <li class="list-group-item flex justify-between p-4 text-sm"><span class="mb-0">Rounting Number :</span> <strong class="">{{ $bank->rounting_number }}</strong></li>
                                                            @endif
                    
                                                            @if(!empty($bank->description))
                                                            <li class="list-group-item flex justify-between p-4 text-sm"><span class="mb-0">Description :</span> <strong class="">{{ $bank->description }}</strong></li>
                                                            @endif
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                    
                            <div class="w-full " style="margin:auto">
                                <div class="card">
                                    <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
                                        <h2 class="card-title  capitalize" style="color:red">SEND RECEIPT</h2>
                                        <p class="text-base">Once you have made the transfer, please complete the form below and attach a copy
                                            of the bank transfer receipt.</p>
                                    </div>
                                    <div class="sm:p-5 p-4">
                                        <div class="basic-form">
                                            <form action="/wire_deposite" method="post" class="form-valide-with-icon needs-validation"  enctype="multipart/form-data" > 
                                                @csrf 
                                                {{-- <div class="mb-4">
                                                    <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Bank Name <span class="required text-danger">*</span></label>
                                                    <div class="flex items-stretch flex-wrap relative w-full">
                                                      
                                                        <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter bank name" name="bank_name" required>
                                                       
                                                    </div>
                                                </div> --}}
                    
                                                <div class="mb-4">
                                                    <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Account Number <span class="required text-danger">*</span></label>
                                                    <div class="flex items-stretch flex-wrap relative w-full">
                                                      
                                                        <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter account number" value="{{$bank->account_number}}" name="acc_no" required>
                                                       
                                                    </div>
                                                </div>
                    
                                                <div class="mb-4">
                                                    <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Amount <span class="required text-danger">*</span></label>
                                                    <div class="flex items-stretch flex-wrap relative w-full">
                                                      
                                                        <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter the amount" name="amount" required>
                                                       
                                                    </div>
                                                </div>
                    
                                                {{-- <div class="mb-4">
                                                    <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Transaction ID <span class="required text-danger">*</span></label>
                                                    <div class="flex items-stretch flex-wrap relative w-full">
                                                      
                                                        <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Transaction ID" name="tranx_id" required>
                                                       
                                                    </div>
                                                </div> --}}
                    
                                                <div class="mb-4">
                                                    <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Notes <span class="required text-danger">*</span></label>
                                                    <div class="flex items-stretch flex-wrap relative w-full">
                                                      
                                                        <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Notes" name="notes" required>
                                                       
                                                    </div>
                                                </div>
                    
                                                <div class="mb-4">
                                                    <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Upload <span class="required text-danger">*</span></label>
                                                    <div class="flex items-stretch flex-wrap relative w-full">
                                                      
                                                        <input type="file"  class="form-control"  name="depo_proof" required>
                    
                                                       
                                                    </div>
                                                </div>
                    
                                               
                    
                                              
                    
                                                
                                                
                                                <button type="submit" class="btn mr-2 inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Submit</button>
                                               
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                             
                         </div>
                </div>

                
                   
             
            </div>


           
        </div>

        <div class="xl:w-1/4 lg:w-1/3 w-full">
            <div class="clearfix">
                
                <div class="card text-center flex flex-col max-sm:mb-[30px]">
                    <div class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0">
                        <h3 class="card-title  capitalize">Payment Modes</h3>
                    </div> 
                    <br>
                    <div class="card-body">
                        
                        <div>
                            <ul class="navbar-nav nav" id="menu-bar">
                                <li class="relative">
                                    <button id="btn1" class="scroll text-[13px] block py-[0.638rem] px-[0.95rem] text-body-color w-full">CRYPTOCURRENCY</button>
                                </li>
                                <li class="relative">
                                    <button id="btn2" class="scroll text-[13px] block py-[0.638rem] px-[0.95rem] text-body-color w-full">BANK WIRE</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

       
    
    </div>
 
		


        @endif						
						
         <!-- Content body end -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const btn1 = document.getElementById('btn1');
    const btn2 = document.getElementById('btn2');
    const cryptocurrency = document.getElementById('cryptocurrency');
    const bankWire = document.getElementById('bankWire');

    btn1.addEventListener('click', function() {
        cryptocurrency.style.display = 'block';
        bankWire.style.display = 'none';
        btn1.classList.add('active');
        btn2.classList.remove('active');
    });

    btn2.addEventListener('click', function() {
        cryptocurrency.style.display = 'none';
        bankWire.style.display = 'block';
        btn2.classList.add('active');
        btn1.classList.remove('active');
    });
});

    </script>
@endsection