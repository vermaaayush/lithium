@extends('user.layout.main')
@section('title', 'Deposite Funds')
@section('main-container')
<style> .btcpay-form { display: inline-flex; align-items: center; justify-content: center; } .btcpay-form--inline { flex-direction: row; } .btcpay-form--block { flex-direction: column; } .btcpay-form--inline .submit { margin-left: 15px; } .btcpay-form--block select { margin-bottom: 10px; } .btcpay-form .btcpay-custom-container{ text-align: center; }.btcpay-custom { display: flex; align-items: center; justify-content: center; } .btcpay-form .plus-minus { cursor:pointer; font-size:25px; line-height: 25px; background: #DFE0E1; height: 30px; width: 45px; border:none; border-radius: 60px; margin: auto 5px; display: inline-flex; justify-content: center; } .btcpay-form select { -moz-appearance: none; -webkit-appearance: none; appearance: none; color: currentColor; background: transparent; border:1px solid transparent; display: block; padding: 1px; margin-left: auto; margin-right: auto; font-size: 11px; cursor: pointer; } .btcpay-form select:hover { border-color: #ccc; } .btcpay-form option { color: #000; background: rgba(0,0,0,.1); } .btcpay-input-price { -moz-appearance: textfield; border: none; box-shadow: none; text-align: center; font-size: 25px; margin: auto; border-radius: 5px; line-height: 35px; background: #fff; }.btcpay-input-price::-webkit-outer-spin-button, .btcpay-input-price::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } </style>

		<!-- Content body start -->
        <div class="w-full lg:w-1/2 " style="margin:auto">
            <div class="card">
                <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
                    <h4 class="card-title text-base capitalize">Deposite Funds</h4>
                </div>
                <div class="sm:p-5 p-4">
                    <div class="basic-form" style="margin: auto">
                             
                        <form method="POST" action="https://mainnet.demo.btcpayserver.org/api/v1/invoices" class="btcpay-form btcpay-form--block">
                            <input type="hidden" name="storeId" value="6HhP9n62Z11HVszAwPA3catP2Rh7qnjbD23jCnw6xS5j" />
                            <input type="hidden" name="jsonResponse" value="true" />
                            <input type="hidden" name="serverIpn" value="{{ env('APP_URL') }}/api_btcpay.php?user_id={{session('s_user')['user_id']}}" />
                            <input type="hidden" name="browserRedirect" value="{{ env('APP_URL') }}/dashboard" />
                          
                          
                            <div class="btcpay-custom-container">
                              <div class="btcpay-custom">
                                <input class="btcpay-input-price" type="number" name="price" min="1" max="20000" step="1" value="1" data-price="1" style="width:15em;border:1px solid black" />
                              </div>
                              <select name="currency">
                                <option value="USD" selected>USD</option>
                                {{-- <option value="GBP">GBP</option>
                                <option value="EUR">EUR</option>
                                <option value="BTC">BTC</option> --}}
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
                script.src = "https://mainnet.demo.btcpayserver.org/modal/btcpay.js";
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
@endsection