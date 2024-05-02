@extends('user.layout.main')
@section('title', 'Profile')
@section('main-container')


        <div class="row">
            <div class="xl:w-1/4 lg:w-1/3 w-full">
                <div class="clearfix">
                    <div class="card text-center flex flex-col max-sm:mb-[30px]">
                        <div class="card-body">
                            <div class="p-12">
                                <div class="author-profile text-center">
                                    <div class="relative mx-auto mb-[13px] inline-block">
                                        <img src="{{ asset('user_assets/man.png') }}" alt="" class="w-[130px] rounded-full">
                                      
                                    </div>
                                    <div class="author-info">
                                        <h3 class="">{{$data->name}}</h3>

                                    </div>
                                </div>
                            </div>
                            <div class="info-list">
                                <ul>
                                    <li class="flex items-center justify-between border-t border-b-color text-[15px] py-[18px] px-[30px] text-dark dark:text-white"><i class="fa-solid fa-wallet" style="font-size: 22px;"></i><span style="color: green">${{number_format($data->balance)}}</span></li>
                                    <li class="flex items-center justify-between border-t border-b-color text-[15px] py-[18px] px-[30px] text-dark dark:text-white"><strong>USER ID:</strong><span>{{$data->user_id}}</span></li>
                                    <li class="flex items-center justify-between border-t border-b-color text-[15px] py-[18px] px-[30px] text-dark dark:text-white"><a href="app-profile-1.html">Lessons</a><span>1</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer p-[30px] block border-t border-b-color">
                            <div class="relative flex flex-wrap items-stretch w-full mb-4">
                                <div class="h-[45px] border border-b-color overflow-hidden leading-[34px] relative flex-1 w-[1%] block py-1.5 px-3 text-[0.9rem] text-body-color rounded text-center dark:text-white dark:bg-[#182237]">Portfolio</div>
                            </div>
                            <div class="relative flex flex-wrap items-stretch w-full mb-4">
                                <a href="https://www.dexignzone.com/" target="_blank" class="h-[45px] border border-b-color overflow-hidden leading-[34px] relative flex-1 w-[1%] block py-1.5 px-3 text-[13px] text-primary rounded text-center dark:text-white dark:bg-[#182237]">https://www.dexignzone.com/</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:w-3/4 lg:w-2/3">
                <div class="card flex flex-col max-sm:mb-[30px] profile-card">
                    <div class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
                        <h6 class="text-[15px] font-medium text-body-color title relative">Profile</h6>
                    </div>
                    <form class="profile-form">
                        <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                            <div class="row">
                                <div class="sm:w-1/2 w-full mb-[30px]">
                                    <label class="text-dark dark:text-white text-[13px] mb-2">Full Name</label>
                                    <input type="text" class="form-control relative text-[13px] text-body-color dark:text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="John">
                                </div>
                                <div class="sm:w-1/2 w-full mb-[30px]">
                                    <label class="text-dark dark:text-white text-[13px] mb-2">Email</label>
                                    <input type="text" class="form-control relative text-[13px] text-body-color dark:text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full">
                                </div>
                                <div class="sm:w-1/2 w-full mb-[30px]">
                                    <label class="text-dark dark:text-white text-[13px] mb-2">Phone</label>
                                    <input type="text" class="form-control relative text-[13px] text-body-color dark:text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="Developer">
                                </div>
                                <div class="sm:w-1/2 w-full mb-[30px]">
                                    <label class="text-dark dark:text-white text-[13px] mb-2">Date of Birth</label>
                                    <input type="text" class="form-control relative text-[13px] text-body-color dark:text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="Developer">
                                </div>
                                <div class="sm:w-1/2 w-full mb-[30px]">
                                    <label class="text-dark dark:text-white text-[13px] mb-2">Country</label>
                                    <input type="text" class="form-control relative text-[13px] text-body-color dark:text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="HTML,  JavaScript,  PHP">
                                </div>
                                <div class="sm:w-1/2 w-full mb-[30px]">
                                    <label class="text-dark dark:text-white text-[13px] mb-2">Status</label>
                                    <div class="relative">
                                        <input type="date" class="form-control relative text-[13px] text-body-color dark:text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full flatpickr">
                                        <i class="fa-regular fa-calendar absolute right-[15px] bottom-[15px] text-body-color"></i>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
                            <button class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">UPDATE</button>
                            <a href="page-register.html" class="text-[15px] text-primary dark:text-white">Forgot your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection