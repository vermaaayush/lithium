@extends('user.layout.main')
@section('title', 'My Referrals')
@section('main-container')

<h2>My Referrals & Bonuses</h2>
            <p>Earn Money by Referring Friends and Family!</p>
            <br>
            <br>
            <br>
        <div class="row">
            
            <div class="xl:w-1/4 lg:w-1/3 w-full">
                <div class="clearfix">
                    <h3>Your Earning</h3>
                    <div class="card text-center flex flex-col max-sm:mb-[30px]">
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
                <h3>Referral Code</h3>
                <div class="card flex flex-col max-sm:mb-[30px] profile-card">
                   
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

           
        
        </div>
<script>
    function copyReferralCode() {
    const referralCodeInput = document.querySelector('input[name="name"]');
    referralCodeInput.select();
    document.execCommand('copy');
    alert('Referral code copied to clipboard!');
}

</script>
@endsection