@extends('user.layout.main')
@section('title', 'My Referrals')
@section('main-container')

<h2>My Referrals & Bonuses</h2>
            <p>Earn Money by Referring Friends and Family!</p>
            <br>
            <br>
            <br>

        <div class="row">
            <div class="xl:w-1/2">
                <div class="card overflow-hidden">
                    <div class="sm:p-5 p-4 flex-auto">
                        <div class="any-card flex justify-between">
                            <div class="c-con w-full max-sm:w-[63%]">
                                <h4 class="text-base"><strong>Referral Code</strong></h4>
                                <label class="text-dark dark:text-white text-[13px] mb-2">Get Your Referral Code</label>
                                <div class="flex items-center">
                                    <input type="text" class="form-control text-[13px] text-body-color dark:text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="{{$data->referral_id}}" name="name" readonly>
                                    <i class="far fa-copy ml-2 cursor-pointer" onclick="copyReferralCode()"></i>
                                    
                                </div>
                                <br>
                                <p>Start referring today and watch your earnings grow!</p>
                                 <br>
                                <a href="#" onclick="copyReferralCode()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary btn-sm duration-500 hover:bg-hover-primary hover:border-hover-primary">Copy Code</a>
                            </div>
                          
                        </div>	
                    </div>
                </div>
            </div>
            <div class="xl:w-1/2">
                <div class="card bg-primary">
                    <div class="card-header flex justify-between sm:pt-6 pb-4 py-5 sm:px-5 px-4 items-center relative flex-wrap">
                        <h4 class="text-base text-white">Overview Of Referral 😎</h4>
                    </div>
                    <div class="sm:p-5 p-4 flex-auto">
                        <div class="flex justify-between">
                            <div class="w-1/2 sales-bx py-2.5 px-10 text-center rounded-md bg-[#ffffff1a] min-w-[164px] ">
                                <img src="{{ asset('user_assets/assets/images/analytics/sales.png') }}" alt="" class="inline-block w-[45px] max-3xl:[30px]">
                                <h4 class="mt-[6px] text-white font-semibold">${{number_format($data->referrals_earning)}}</h4>
                                <span class="text-sm text-white">Earnings</span>
                            </div>
                            
                            <div class=" w-1/2 sales-bx py-2.5 px-10 text-center rounded-md bg-[#ffffff1a] min-w-[164px] ">
                                <img src="{{ asset('user_assets/assets/images/analytics/shopping.png') }}" alt="" class="inline-block w-[45px] max-3xl:[30px]">
                                <h4 class="mt-[6px] text-white font-semibold">{{$data->no_referral_user}}</h4>
                                <span class="text-sm text-white">Users</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            
        {{-- <div class="row">

            
            
            <div class="xl:w-1/4 lg:w-1/3 w-full">
                <div class="clearfix">
                   
                    <div class="card text-center flex flex-col max-sm:mb-[30px]">
                        <div class="card-header flex justify-between px-5 mb-4 pt-6 relative z-[2] pb-0">
                            <h3 class="card-title  capitalize">Transaction History</h3>
                        </div> 
                        <div class="card-body">
                            
                            
                            <div class="info-list">
                                <ul>
                                    <li class="flex items-center justify-between border-t border-b-color text-[15px] py-[18px] px-[30px] text-dark dark:text-white"><i class="fa-solid fa-wallet" style="font-size: 22px;"></i><span style="color: green">${{number_format($data->referrals_earning)}}</span></li>
                                    <li class="flex items-center justify-between border-t border-b-color text-[15px] py-[18px] px-[30px] text-dark dark:text-white"><i class="fa-solid fa-user" style="font-size: 22px;"></i><span>{{$data->no_referral_user}}</span></li>
                                </ul>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="xl:w-3/4 lg:w-2/3">
              
                <div class="card flex flex-col max-sm:mb-[30px] profile-card">
                    <div class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0">
                        <h3 class="card-title  capitalize">Referral Code</h3>
                    </div> 
                    <form class="profile-form" >
                        
                        <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                            <div class="row">
                               
                                <div class="sm:w-1/2 w-full mb-[30px] relative">
                                    <label class="text-dark dark:text-white text-[13px] mb-2">Get Your Referral Code</label>
                                    <div class="flex items-center">
                                        <input type="text" class="form-control text-[13px] text-body-color dark:text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="{{$data->referral_id}}" name="name" readonly>
                                        <i class="far fa-copy ml-2 cursor-pointer" onclick="copyReferralCode()"></i>
                                        
                                    </div>
                                    <p>Start referring today and watch your earnings grow!</p>
                                </div>
                                
                               
                               
                                
                            </div>
                        </div>
                       
                    </form>
                </div>
            </div>

           
        
        </div> --}}
<script>
    function copyReferralCode() {
    const referralCodeInput = document.querySelector('input[name="name"]');
    referralCodeInput.select();
    document.execCommand('copy');
    alert('Referral code copied to clipboard!');
}

</script>
@endsection