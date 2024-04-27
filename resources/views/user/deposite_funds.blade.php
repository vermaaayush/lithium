@php
    use App\Models\User;
    use App\Models\Accesscontrol;
    $p_data = User::where('id', session('s_user')['id'])->first(); 
    $a_c = Accesscontrol::where('id', 1)->first(); 
@endphp
@extends('user.layout.main')
@section('title', 'Deposite Funds')
@section('main-container')
		<!-- Content body start -->
       <!-- Nav tabs -->
     
       @if ($a_c->extra2==1)
           
      
       @if ($p_data->id_status==2)
           
       @endif
       
       <div class="w-full">
        <div class="card dz-card dz-tab-area" id="nav-pills">
            <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2]">
                <h2>Deposite Funds</h2>
               
            </div>
            <div class="tab-content-area" id="myTabContent3">
                <div class="tab-content show active" id="tab-One2">
                    <div class="sm:p-5 p-4 dz-tab-area children">
                        <ul class="nav nav-pills mb-6 flex flex-wrap light">
                            <li class=" nav-item">
                                <a href="javascript:void(0);" data-tab="navpills-1" class="nav-link py-[15px] px-3 block rounded duration-500 text-[15px] dark:text-primary tab-btn ">CRYPTOCURRENCY</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" data-tab="navpills-2" class="nav-link py-[15px] px-3 block rounded duration-500 text-[15px] dark:text-primary tab-btn">CREDIT CARD</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" data-tab="navpills-3" class="nav-link py-[15px] px-3 block rounded duration-500 text-[15px] dark:text-primary tab-btn" data-bs-toggle="tab" aria-expanded="true">E-WALLET</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" data-tab="navpills-4" class="nav-link py-[15px] px-3 block rounded duration-500 text-[15px] dark:text-primary tab-btn" data-bs-toggle="tab" aria-expanded="true">BANK WIRE TRANSFER</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" data-tab="navpills-5" class="nav-link py-[15px] px-3 block rounded duration-500 text-[15px] dark:text-primary tab-btn active" data-bs-toggle="tab" aria-expanded="true">BY ADMIN</a>
                            </li>
                        </ul>
                        <div class="tab-content-area">
                            <div id="navpills-1" class="tab-content  ">
                                <div class="row">
                                    <div class="xl:w-2/3 col-xxl-8 w-full">
                                        <div class="row">
                                            <div class="md:w-1/2">
                                               <a href="#">
                                                <div class="card">
                                                    <div class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0">
                                                        <div class="clearfix">
                                                            <h1 class="card-title text-base">CRYPTOCURRENCY</h1>
                                                            <span class="text-body-color dark:text-white text-sm">By BTCpay Server</span>
                                                        </div>
                                                        <div class="clearfix text-center">
                                                            <img src="{{ asset('user_assets/cryptocurrency.png')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="sm:p-5 p-4 text-center">
                                                        <div class="ico-sparkline">
                                                            <div id="spark-bar"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                               </a>
                                            </div>
                                            
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="navpills-2" class="tab-content">
                                <div class="row">
                                    <div class="xl:w-2/3 col-xxl-8 w-full">
                                        <div class="row">
                                            <div class="md:w-1/2">
                                               <a href="#">
                                                <div class="card">
                                                    {{-- <div class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0">
                                                        <div class="clearfix">
                                                            <h1 class="card-title text-base">CRYPTOCURRENCY</h1>
                                                            <span class="text-body-color dark:text-white text-sm">By BTCpay Server</span>
                                                        </div>
                                                        <div class="clearfix text-center">
                                                            <img src="{{ asset('user_assets/cryptocurrency.png')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="sm:p-5 p-4 text-center">
                                                        <div class="ico-sparkline">
                                                            <div id="spark-bar"></div>
                                                        </div>
                                                    </div> --}}
                                                    WILL BE AVAILABLE SOON
                                                </div>
                                               </a>
                                            </div>
                                            
                                           
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div id="navpills-3" class="tab-content">
                                <div class="row">
                                    <div class="xl:w-2/3 col-xxl-8 w-full">
                                        <div class="row">
                                            <div class="md:w-1/2">
                                               <a href="#">
                                                <div class="card">
                                                    {{-- <div class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0">
                                                        <div class="clearfix">
                                                            <h1 class="card-title text-base">CRYPTOCURRENCY</h1>
                                                            <span class="text-body-color dark:text-white text-sm">By BTCpay Server</span>
                                                        </div>
                                                        <div class="clearfix text-center">
                                                            <img src="{{ asset('user_assets/cryptocurrency.png')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="sm:p-5 p-4 text-center">
                                                        <div class="ico-sparkline">
                                                            <div id="spark-bar"></div>
                                                        </div>
                                                    </div> --}}
                                                    WILL BE AVAILABLE SOON
                                                </div>
                                               </a>
                                            </div>
                                            
                                           
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div id="navpills-4" class="tab-content">
                                <div class="row">
                                    <div class="xl:w-2/3 col-xxl-8 w-full">
                                        <div class="row">
                                            <div class="md:w-1/2">
                                               <a href="/bank_wire">
                                                <div class="card">
                                                    <div class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0">
                                                        <div class="clearfix">
                                                            <h1 class="card-title text-base">Bank Wire Transfer Request</h1>
                                                            {{-- <span class="text-body-color dark:text-white text-sm">By BTCpay Server</span> --}}
                                                        </div>
                                                        <div class="clearfix text-center">
                                                            <img src="{{ asset('user_assets/transfer.png')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="sm:p-5 p-4 text-center">
                                                        <div class="ico-sparkline">
                                                            <div id="spark-bar"></div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                               </a>
                                            </div>
                                            
                                           
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div id="navpills-5" class="tab-content show active">
                                <div class="row">
                                    <div class="xl:w-2/3 col-xxl-8 w-full">
                                        <div class="row">
                                            <div class="md:w-1/2">
                                               <a href="/deposite_req">
                                                <div class="card">
                                                    <div class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0">
                                                        <div class="clearfix">
                                                            <h1 class="card-title text-base">BY ADMIN</h1>
                                                            
                                                        </div>
                                                        <div class="clearfix text-center">
                                                            <img src="{{ asset('user_assets/deposit.png')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="sm:p-5 p-4 text-center">
                                                        <div class="ico-sparkline">
                                                            <div id="spark-bar"></div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                               </a>
                                            </div>
                                            
                                           
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                      
        @else

           
        <div class="xl:w-1/2 w-full" style="margin: auto">
            <div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent text-danger bg-danger-light dark:bg-[#ff5e5e26] dark:border-[#ff5e5e26] notification">
                <p class="text-danger mb-2"><strong>Pending! </strong>Identity Verification</p>
                <p class="mb-4 text-danger leading-[1.5]">Submit and verify your proof of identity to fund your account.</p>
               
            </div>
        </div>              
        @endif						
						
         <!-- Content body end -->
@endsection