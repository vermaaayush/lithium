@extends('user.layout.main')
@section('title', 'Bank Wire ')
@section('main-container')
		<!-- Content body start -->
        <div class="w-full lg:w-1/2 " style="margin:auto">
            <div class="card">
              
                <div class="sm:p-5 p-4">
                    <div class="">
						<div class="card overflow-hidden">
							<div class="text-center p-4 relative z-[1] overlay-box" style="background-image: url(assets/images/big/img1.jpg);">
								<div class="profile-photo">
									<i class="fas fa-solid fa-building-columns" style="color:white;font-size: 100px;"></i>
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
							{{-- <ul class="list-group flex flex-col list-group-flush">
                                @if(!empty($bank->name))
								<li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">Bank Name</span> <strong class="">{{ $bank->name }}	</strong></li>
                                @endif

                                @if(!empty($bank->account_number))
								<li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">Account Number</span> <strong class="">{{ $bank->account_number }}	</strong></li>
                                @endif

                                @if(!empty($bank->address))
								<li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">Bank Address</span> <strong class="">{{ $bank->address }}	</strong></li>
                                @endif

                                @if(!empty($bank->swift_code))
								<li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">Swift code</span> <strong class="">{{ $bank->swift_code }}	</strong></li>
                                @endif

                                @if(!empty($bank->ibank_number))
								<li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">IBAN number</span> <strong class="">{{ $bank->ibank_number }}	</strong></li>
                                @endif
                                
                                @if(!empty($bank->rounting_number))
								<li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">Rounting Number</span> <strong class="">{{ $bank->rounting_number }}	</strong></li>
                                @endif

                                @if(!empty($bank->description))
								<li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">Description</span> <strong class="">{{ $bank->description }}	</strong></li>
                                @endif
							</ul> --}}
                          
                        </div>
					</div>
                </div>
            </div>
        </div>


        <div class="w-full lg:w-1/2 " style="margin:auto">
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
                      
                          
								
						
         <!-- Content body end -->
@endsection