@extends('user.layout.main')
@section('title', 'Bank Wire ')
@section('main-container')
		<!-- Content body start -->
        <div class="w-full lg:w-1/2 " style="margin:auto">
            <div class="card">
                <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
                    <h4 class="card-title text-base capitalize">Company Account Details</h4>
                </div>
                <div class="sm:p-5 p-4">
                    <div class="basic-form">
                        <form  > 
                          
                            @if(!empty($bank->name))
                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Bank Name</label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                    
                                        <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="{{ $bank->name }}" readonly>
                                    
                                </div>
                            </div>
                            @endif
                           
                            @if(!empty($bank->account_number))
                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Account Number</label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                   
                                        <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="{{ $bank->account_number }}" readonly>
                                    
                                </div>
                            </div>
                            @endif
                            @if(!empty($bank->address))
                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Bank Address</label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                    
                                        <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="{{ $bank->address }}" readonly>
                                    
                                </div>
                            </div>
                            @endif
                            @if(!empty($bank->swift_code))
                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Swift Code</label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                    
                                        <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="{{ $bank->swift_code }}" readonly>
                                    
                                </div>
                            </div>
                            @endif
                            @if(!empty($bank->ibank_number))
                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">IBAN Number</label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                   
                                        <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="{{ $bank->ibank_number }}" readonly>
                                    
                                </div>
                            </div>
                            @endif
                            @if(!empty($bank->rounting_number))
                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Routing Number</label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                    
                                        <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="{{ $bank->rounting_number }}" readonly>
                                   
                                </div>
                            </div>
                            @endif
                            @if(!empty($bank->description))
                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Description</label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                   
                                        <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="{{ $bank->description }}" readonly>
                                   
                                </div>
                            </div>
                            @endif

                          

                            
                            
                       </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="w-full lg:w-1/2 " style="margin:auto">
            <div class="card">
                <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
                    <h4 class="card-title text-base capitalize">Deposite Request By Bank Wire</h4>
                </div>
                <div class="sm:p-5 p-4">
                    <div class="basic-form">
                        <form action="/wire_deposite" method="post" class="form-valide-with-icon needs-validation" > 
                            @csrf 
                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Bank Name <span class="required text-danger">*</span></label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                  
                                    <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter bank name" name="bank_name" required>
                                   
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Account Number <span class="required text-danger">*</span></label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                  
                                    <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter account number" name="acc_no" required>
                                   
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Amount <span class="required text-danger">*</span></label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                  
                                    <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter the amount" name="amount" required>
                                   
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