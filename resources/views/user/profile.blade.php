@extends('user.layout.main')
@section('title', 'Profile')
@section('main-container')

@if (session('success'))
<div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent border-l-4 border-l-success text-success bg-success-light alert-alt">
    <button type="button" class="remove-btn absolute right-0 py-5 px-4 top-[-5px] opacity-50 z-[2] dark:text-white"><span><i class="fa-solid fa-xmark scale-[0.9]"></i></span>
    </button>
    {{ session('success') }}
</div>
@endif

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
                                    <li class="flex items-center justify-between border-t border-b-color text-[15px] py-[18px] px-[30px] text-dark dark:text-white"><strong>KYC:</strong>
                                    @if ($data->status=='Suspended') 
                                   
                                    <span class="mr-[0.3125rem] mb-[0.3125rem] inline-block font-medium leading-[1.5] rounded text-xs py-[5px] px-3 border border-transparent text-white bg-danger">Suspended</span>    
                                      

                                    @elseif($data->id_status != 2 || $data->add_status != 2 ) 
                                    <span class="mr-[0.3125rem] mb-[0.3125rem] inline-block font-medium leading-[1.5] rounded text-xs py-[5px] px-3 border border-transparent text-white bg-warning">KYC Pending!</span>
                                    
                                    @else 
                                        
                                        <span class="mr-[0.3125rem] mb-[0.3125rem] inline-block font-medium leading-[1.5] rounded text-xs py-[5px] px-3 border border-transparent text-white bg-success">Active</span>
                                        
                                    @endif   
                                    </li>
                                </ul>
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
                    <form class="profile-form" action="/update_profile" method="post">
                        @csrf
                        <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                            <div class="row">
                                <div class="sm:w-1/2 w-full mb-[30px]">
                                    <label class="text-dark dark:text-white text-[13px] mb-2">Full Name</label>
                                    <input type="text" class="form-control relative text-[13px] text-body-color dark:text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="{{$data->name}}" name="name">
                                </div>
                                <div class="sm:w-1/2 w-full mb-[30px]">
                                    <label class="text-dark dark:text-white text-[13px] mb-2">Email</label>
                                    <input type="email" class="form-control relative text-[13px] text-body-color dark:text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="{{$data->email}}" name="email" @if($m_email == 0) readonly @endif>
                                </div>
                                <div class="sm:w-1/2 w-full mb-[30px]">
                                    <label class="text-dark dark:text-white text-[13px] mb-2">Phone</label>
                                    <input type="text" class="form-control relative text-[13px] text-body-color dark:text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="{{$data->phone}}" name="phone">
                                </div>
                                <div class="sm:w-1/2 w-full mb-[30px]">
                                    <label class="text-dark dark:text-white text-[13px] mb-2">Date of Birth</label>
                                    <input type="text" class="form-control relative text-[13px] text-body-color dark:text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="{{$data->dob}}" name="dob">
                                </div>
                                <div class="sm:w-1/2 w-full mb-[30px]">
                                    <label class="text-dark dark:text-white text-[13px] mb-2">Country</label>
                                    <input type="text" class="form-control relative text-[13px] text-body-color dark:text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="{{$data->country}}" name="country">
                                </div>
                                <div class="sm:w-1/2 w-full mb-[30px]">
                                    <label class="text-dark dark:text-white text-[13px] mb-2">Password</label>
                                    <input type="password" class="form-control relative text-[13px] text-body-color dark:text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="{{$data->password}}" readonly>
                                </div>
                                
                            </div>
                        </div>
                        <div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
                            <button class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Update Profile</button>
                        
                        </div>
                    </form>
                </div>
            </div>

            <hr>
            <h3>KYC Details:</h3>
            <br>
            <br>

            @if ($data->id_status==1 || $data->id_status==2)
                
           
            <div class="w-full lg:w-1/2 " >
                <div class="card">
                  
                    <div class="sm:p-5 p-4">
                        <div class="">
                            <div class="card ">
                                <div class="text-center p-4 relative z-[1] overlay-box" style="background-image: url(assets/images/big/img1.jpg);">
                                    <h3 style="color: white">Identity Details</h3>
                                
                                </div>
                                <div class="flex flex-wrap">
                                    <div class="w-full sm:w-1/2 p-4">
                                        <h5>Uploaded ID</h5>
                                        <img src="{{ $data->id_proof }}" alt="ID Proof" class="w-full h-auto">
                                    </div>
                                    <div class="w-full sm:w-1/2 p-4">
                                        <h5>Selfie Image</h5>
                                        <img src="{{ $data->image_data }}" alt="Image Data" class="w-full h-auto">
                                    </div>
                                </div>
                                
                                <ul class="list-group flex flex-col list-group-flush">
                                   
                                    <li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">Full Name</span> <strong class="">{{ $kyc->name }}	</strong></li>
                                    
    
                                    
                                    <li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">ID Type</span> <strong class="">{{ $kyc->id_type }}	</strong></li>
                                    
    
                                    
                                    <li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">Nationality</span> <strong class="">{{ $kyc->nationality }}	</strong></li>
                                    
    
                                   
                                    <li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">ID Serial Number</span> <strong class="">{{ $kyc->id_no }}	</strong></li>
                                    
    
                                    
               
                                    
                                </ul>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endif

            @if ($data->add_status==1 || $data->add_status==2)
            <div class="w-full lg:w-1/2 " style="margin:auto">
                <div class="card">
                  
                    <div class="sm:p-5 p-4">
                        <div class="">
                            <div class="card overflow-hidden">
                                <div class="text-center p-4 relative z-[1] overlay-box" style="background-image: url(assets/images/big/img1.jpg);">
                                    <h3 style="color: white">Address Details</h3>
                                
                                </div>
                                   
                                <div>
                                    <p style="text-align: center"><img src="{{ $data->address_proof }}" alt="" class="w-full h-auto"></p>
                                </div>
                               
                                <ul class="list-group flex flex-col list-group-flush">
                                   
                                    <li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">Nationality</span> <strong class="">{{ $kyc->adrs_nationality }}	</strong></li>
                                   
    
                                    
                                    <li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">Country of Residence</span> <strong class="">{{ $kyc->adrs_country }}	</strong></li>
                                   
    
                                    
                                    <li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">Address</span> <strong class="">{{ $kyc->address }}	</strong></li>
                                   
    
                                    
                                    <li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">Pincode</span> <strong class="">{{ $kyc->code }}	</strong></li>
                                   
    
                                    
                                    <li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">City</span> <strong class="">{{ $kyc->city }}	</strong></li>
                                   
                                    
                                    
                                    <li class="list-group-item flex p-4 text-body-color dark:text-white  text-base justify-between"><span class="mb-0">State</span> <strong class="">{{ $kyc->state }}	</strong></li>
                                   
    
                                    
                                   
                                </ul>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endif
        
        </div>

@endsection