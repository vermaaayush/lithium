@extends('user.layout.main')
@section('title', 'Deposite Funds')
@section('main-container')
		<!-- Content body start -->
        <div class="w-full lg:w-1/2 " style="margin:auto">
            <div class="card">
                <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
                    <h4 class="card-title text-base capitalize">Deposite Funds</h4>
                </div>
                <div class="sm:p-5 p-4">
                    <div class="basic-form">
                        <form action="/deposite_funds" method="post" class="form-valide-with-icon needs-validation" > 
                            @csrf 
                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Name <span class="required text-danger">*</span></label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                  
                                    <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="{{ session('s_user')['name'] }}" name="name" readonly>
                                   
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Amount <span class="required text-danger">*</span></label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                  
                                    <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter the amount" name="amount" required>
                                   
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Payment Mode <span class="required text-danger">*</span></label>
                                <select name="pay_mode" class="nice-select style-1 py-1.5 px-3 bg-transparent text-[13px] font-normal outline-none relative focus:ring-0 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.813rem] form-control-lg">
                                    <option value="Test" selected>Test</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Description <span class="required text-danger">*</span></label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                  
                                    <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Description" name="description">
                                   
                                </div>
                            </div>
                            
                            <button type="submit" class="btn mr-2 inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Submit</button>
                            <button type="submit" class="inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-danger-light text-danger bg-danger-light hover:text-white hover:bg-danger duration-300">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                      
                          
								
						
         <!-- Content body end -->
@endsection