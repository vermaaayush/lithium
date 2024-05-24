@extends('user.layout.main')
@section('title', 'Authentication')
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

@if($u_info->add_status == 0 || $u_info->id_status== 0 || $u_info->id_status== 1 || $u_info->add_status== 1)

<h1>Complete Your KYC</h1>
<h5>You’re ready to start trading soon! Help us safeguard your account by verifying your personal information.</h5>
<br>
<br>

@else

<h1>User Profile KYC</h1>
<br>
<br>
<br>
@endif





<div class="row">

    <div class="xl:w-1/3 col-xxl-4 w-full">
        <div class="card">
            <div class="sm:p-5 p-4 text-center ai-icon  text-primary">
                <i style="font-size: 7rem" class="fa-solid fa-square-envelope"></i>
                <h2 class="my-2">Verify Email</h2>
                @if( $u_info->email_auth == 0)
                <p>Secure Authentication App</p>
                <p>&nbsp;</p>
                <button type="button" id="send-otp-button" class="btn my-2 inline-block rounded font-medium xl:py-4 xl:px-6 py-3 px-5 xl:text-lg text-base border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-lg dz-modal-btn" data-dz-modal="firstmodal"><i class="fa-solid fa-arrow-right"></i> Start</button>
                @else
                <p class="text-success text-xl"><i class="fa-solid fa-circle-check"></i> Verified</p>
                @endif
                
            </div>
        </div>
    </div>
   
    
 
    <div class="xl:w-1/3 col-xxl-4 w-full">
        <div class="card">
            <div class="sm:p-5 p-4 text-center ai-icon  text-primary">
                <i style="font-size: 7rem" class="fa-regular fa-id-card"></i>
                <h2 class="my-2">Identity Verification</h2>
                @if( $u_info->id_status == 0)

                <p>Submit and verify your proof of identity<br> to start trading.</p>
                <a href="/identity_form" class="btn my-2 inline-block rounded font-medium xl:py-4 xl:px-6 py-3 px-5 xl:text-lg text-base border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-lg"><i class="fa-solid fa-arrow-right"></i> Start</a>

                @elseif( $u_info->id_status == 1)
                  
                <p class="text-success">Thank you for submitting your proof of identity. Your request is now being reviewed by our team.</p>

                @elseif( $u_info->id_status == 2)

                <p class="text-success text-xl"><i class="fa-solid fa-circle-check"></i> Verified</p>

                @elseif( $u_info->id_status == 3)
                     
                <p class="text-danger">Identity Verification is Rejected, Try again!</p>
                <a href="/identity_form" class="btn my-2 inline-block rounded font-medium xl:py-4 xl:px-6 py-3 px-5 xl:text-lg text-base border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-lg"><i class="fa-solid fa-arrow-right"></i> Start</a>

                @endif
            </div>
        </div>
    </div>
   
    
    
    <div class="xl:w-1/3 col-xxl-4 w-full">
        <div class="card">
            <div class="sm:p-5 p-4 text-center ai-icon  text-primary">
                <i style="font-size: 7rem" class="fa-solid fa-map-location-dot"></i>
                <h2 class="my-2">Address Verification</h2>
                @if( $u_info->add_status == 0)

                <p>POA needs to be verified before you<br> can make a withdrawal.</p>
                <a href="/address_form" class="btn my-2 inline-block rounded font-medium xl:py-4 xl:px-6 py-3 px-5 xl:text-lg text-base border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-lg"><i class="fa-solid fa-arrow-right"></i> Start</a>

                @elseif( $u_info->add_status == 1)

                <p class="text-success">Thank you for submitting your proof of address. Your request is now being reviewed by our team.</p>
 
                @elseif( $u_info->add_status == 2)
                
                <p class="text-success text-xl"><i class="fa-solid fa-circle-check"></i> Verified</p>

                @elseif( $u_info->add_status == 3)

                <p class="text-danger">Address Proof Verification is Rejected, Try again!</p>
                <a href="/address_form" class="btn my-2 inline-block rounded font-medium xl:py-4 xl:px-6 py-3 px-5 xl:text-lg text-base border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-lg"><i class="fa-solid fa-arrow-right"></i> Start</a>


                @endif
            </div>
        </div>
    </div>
  

</div>









<div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055]  dz-modal-box model-close" id="firstmodal">
	<div class="modal-dialog modal-dialog-centered h-full flex items-center py-5" role="document">
		<div class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] w-full pointer-events-auto">
			<div class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
				<h5 class="modal-title">Security Authentication</h5>
				<button type="button" class="btn-close p-4 text-xs">
				</button>
			</div>
			<div class="modal-body relative p-[1.875rem] text-body-color sm:text-sm text-xs">
			   <div class="basic-form">
				<form action="/validate_email_otp" method="post" id="uploadForm" enctype="multipart/form-data">
					@csrf
					<div class="">
						<div class="mb-4">
							<label class="text-body-color dark:text-white">Enter Validation Code<span class="required text-danger">*</span></label>
							<input type="text" maxlength="6" name="otp" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="" required>
						</div>
					</div>
					<p>Code sent to {{session('s_user')['email']}}</p>

						<br>
						<br>
					</div>
					<button type="submit" class="block  rounded font-bold h-[3.125rem] text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Submit</button>
									
				</form>
				
				
				
			   </div>
			   
			   
			</div>
		  
		</div>
	</div>
</div>








<script>
    const appUrl = '{{ env('APP_URL') }}';
</script>
<script>
    document.getElementById('send-otp-button').addEventListener('click', function() {
        fetch(appUrl+'/api_send_otp')
            .then(response => {
                if (response.ok) {
                    console.log('OTP request sent successfully.');
                } else {
                    console.error('Error sending OTP. Status:', response.status);
                }
            })
            .catch(error => {
                console.error('Error sending OTP:', error);
            });
    });
</script>
@endsection