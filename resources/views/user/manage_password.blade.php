@extends('user.layout.main')
@section('title', 'Manage Password')
@section('main-container')


                                    @if (session('error'))
									<div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent border-l-4 border-l-danger text-danger bg-danger-light alert-alt dark:bg-[#ff5e5e26] dark:border-[#ff5e5e26]">
										<button type="button" class="remove-btn absolute right-0 py-5 px-4 top-[-5px] opacity-50 z-[2] dark:text-white"><span><i class="fa-solid fa-xmark scale-[0.9]"></i></span>
										</button>
										{{ session('error') }}
									</div>
								    @endif
                                    @if (session('success'))
									<div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent border-l-4 border-l-success text-success bg-success-light alert-alt">
										<button type="button" class="remove-btn absolute right-0 py-5 px-4 top-[-5px] opacity-50 z-[2] dark:text-white"><span><i class="fa-solid fa-xmark scale-[0.9]"></i></span>
										</button>
										{{ session('success') }}
									</div>
									@endif

<div class="w-full lg:w-1/2 " style="margin:auto">
    <div class="card">
        <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
            <h4 class="card-title text-base capitalize">Manage Password</h4>
        </div>
        <div class="sm:p-5 p-4">
            <div class="basic-form">
                <form action="/update_password" method="post" class="form-valide-with-icon needs-validation" > 
                    @csrf 
                    <div class="mb-4">
                        <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Old Password <span class="required text-danger">*</span></label>
                        <div class="flex items-stretch flex-wrap relative w-full">
                          
                            <input type="password" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter Old Password" name="old_pass" >
                           
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">New Password <span class="required text-danger">*</span></label>
                        <div class="flex items-stretch flex-wrap relative w-full">
                          
                            <input type="password" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter New Password" name="n_pass" >
                           
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Confirm Password <span class="required text-danger">*</span></label>
                        <div class="flex items-stretch flex-wrap relative w-full">
                          
                            <input type="password" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter Confirm Password" name="c_pass" >
                           
                        </div>
                    </div>

                   

                    
                    
                    <button type="submit" class="btn mr-2 inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Change Password</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
              
                  
            

@endsection