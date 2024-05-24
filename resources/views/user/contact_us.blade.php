@php
  use App\Models\Config;
 
  $company = Config::first();

  
@endphp
@extends('user.layout.main')
@section('title', 'Contact')
@section('main-container')

@if (session('success'))
<div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent text-success bg-success-light">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
    <strong>{{ session('success') }}</strong>
    
</div>

@endif

<div class="w-full lg:w-1/2 " style="margin:auto">
    <div class="card">
      
        <div class="sm:p-5 p-4">
            <div class="">
                <div class="card overflow-hidden">
                    {{-- <div class="text-center p-4 relative z-[1] overlay-box" style="background-image: url(assets/images/big/img1.jpg);">
                        <div class="profile-photo">
                            <i class="fas fa-solid fa-building-columns" style="color:white;font-size: 100px;"></i>
                        </div>
                    
                    </div> --}}
                    <div style="padding: 5%;">
                        <h3>CONTACT US</h3>
                        <p class="text-base">PU Prime's professional multilingual customer support team is ready to assist you and help to provide you an incomparable trading experience.</p>
                        
                    </div>

                   

                    <div style="width:70%;margin:auto">
                        <div class="card text-white bg-primary">
                            <ul class="list-group flex flex-col list-group-flush">
                                
                                 
                                @if(!empty($company->email))
                                <li class="list-group-item flex justify-between p-4 text-sm"><span class="mb-0">Email :</span><strong>{{ $company->email }} </strong></li>
                                @endif

                                @if(!empty($company->phone))
                                <li class="list-group-item flex justify-between p-4 text-sm"><span class="mb-0">Phone :</span> <strong class="">{{ $company->phone }}</strong></li>
                                @endif

                             
                                
                            </ul>
                        </div>
                    </div>

                    <div> 
                        <iframe  style="margin: auto" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13049.510536445337!2d33.336429228419156!3d35.14720164694699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14de19f37a63f22f%3A0x8d7b278daa902640!2sAthalassas%20Ave%2062%2C%20Nicosia%202023%2C%20Cyprus!5e0!3m2!1sen!2sin!4v1716543210531!5m2!1sen!2sin" width="90%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                  <br>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="w-full lg:w-1/2 " style="margin:auto">
    <div class="card">
        <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
            <h2 class="card-title  capitalize text-primary" >Let’s Talk!...</h2>
            
        </div>
        <div class="sm:p-5 p-4">
            <div class="basic-form">
                <form action="/contact_Send" method="post" class="form-valide-with-icon needs-validation"  enctype="multipart/form-data" > 
                    @csrf 
                    <div class="mb-4">
                        <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Name <span class="required text-danger">*</span></label>
                        <div class="flex items-stretch flex-wrap relative w-full">
                          
                            <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="" name="name" required>
                           
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Email <span class="required text-danger">*</span></label>
                        <div class="flex items-stretch flex-wrap relative w-full">
                          
                            <input type="email" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="" name="email" required>
                           
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Phone <span class="required text-danger">*</span></label>
                        <div class="flex items-stretch flex-wrap relative w-full">
                          
                            <input type="phone" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="" name="phone" required>
                           
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Subject <span class="required text-danger">*</span></label>
                        <div class="flex items-stretch flex-wrap relative w-full">
                          
                            <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="" name="subject" required>
                           
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Message <span class="required text-danger">*</span></label>
                        <div class="flex items-stretch flex-wrap relative w-full">
                          
         
                            <textarea class="relative text-[13px] h-auto min-h-auto border border-b-color block p-3 duration-500 focus:border-danger outline-none resize-y flex-1 w-[1%] rounded-e-md" name="message" required></textarea>
                           
                        </div>
                    </div>

                    

                   

                  

                    
                    
                    <button type="submit" class="btn mr-2 inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Send Message</button>
                   
                </form>
            </div>
        </div>
    </div>
</div>
        
@endsection