@extends('user.layout.main')
@section('title', 'Dashboard')
@section('main-container')

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
	<div class="tradingview-widget-container__widget"></div>
	<div class="tradingview-widget-copyright"></div>
	<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
	{
	"symbols": [
	  {
		"proName": "FOREXCOM:SPXUSD",
		"title": "S&P 500 Index"
	  },
	  {
		"description": "LAAC",
		"proName": "NYSE:LAAC"
	  },
	  {
		"description": "LIT",
		"proName": "AMEX:LIT"
	  },
	  {
		"description": "LAC",
		"proName": "NYSE:LAC"
	  },
	 
	  {
		"description": "ZA4",
		"proName": "GETTEX:ZA4"
	  },
	  {
		"description": "KC3",
		"proName": "GETTEX:KC3"
	  },
	  {
		"description": "IAH",
		"proName": "FWB:IAH"
	  },
	  {
		"description": "X1Q",
		"proName": "BER:X1Q"
	  }
	],
	"showSymbolLogo": true,
	"isTransparent": false,
	"displayMode": "adaptive",
	"colorTheme": "light",
	"locale": "en"
  }
	</script>
  </div>
  <!-- TradingView Widget END -->

@if (session('s_user')['status'] == 'Active')


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

@endif
@if( $u_info->email_auth == 0)
<div class="xl:w-1/3 col-xxl-4 sm:w-1/2">
    <div class="card overflow-hidden">
        <div class="sm:p-5 p-4">
            <div class="c-con">
                <h4><strong>Verify Email</strong></h4>
				
                <span class="text-sm text-body-color">Secure Authentication App</span>
				<div class="mt-[18px]">
                    <h1 style="color:#f8b940">Pending!</h1>
                    <br>
                    <button type="button" id="send-otp-button" class="btn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2" data-dz-modal="firstmodal">Start</button>
					
                </div>

            </div>
           
        </div>
    </div>
</div>
@endif


@if( $u_info->id_status != 2)
<div class="xl:w-1/3 col-xxl-4 sm:w-1/2">
    <div class="card overflow-hidden">
        <div class="sm:p-5 p-4">
            <div class="c-con">
                <h4><strong>Identity Verification</strong></h4>
				@if( $u_info->id_status == 0)
                <span class="text-sm text-body-color">Submit and verify your proof of identity to start trading.</span>
				<div class="mt-[18px]">
                    <h1 style="color:#f8b940">Pending!</h1>
                    <br>
                    <a href="/identity_form"><button type="button" class="btn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2" >Start</button></a>
                </div>
				@elseif( $u_info->id_status == 1)

                 <br>
				 <br>
				<h5 class="text-success">Thank you for submitting your proof of identity. Your request is now being reviewed by our team.</h5>
				
				@elseif( $u_info->id_status == 3)
                         
				<span class="text-sm  text-danger">Identity Verification is Rejected, Try again!</span>
				<div class="mt-[18px]">
                    <h1 class="text-danger">Rejected!</h1>
                    <br>
					
                   <a href="/identity_form"> <button type="button" class="btn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2" data-dz-modal="thirdmodal">Try Again</button></a>
                </div>

				@endif
            </div>
          
        </div>
    </div>
</div>
@endif


@if( $u_info->add_status != 2)
<div class="xl:w-1/3 col-xxl-4 sm:w-1/2">
    <div class="card overflow-hidden">
        <div class="sm:p-5 p-4">
            <div class="c-con">
                <h4><strong>Address Verification</strong></h4>
				@if( $u_info->add_status == 0)
                <span class="text-sm text-body-color">POA needs to be verified before you can make a withdrawal.</span>
				<div class="mt-[18px]">
                    <h1 style="color:#f8b940">Pending!</h1>
                    <br>
					
                   <a href="/address_form"> <button type="button" class="btn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2" data-dz-modal="thirdmodal">Start</button></a>
                </div>
				@elseif( $u_info->add_status == 1)
				<br>
				 <br>
				<h5 class="text-success">Thank you for submitting your proof of address. Your request is now being reviewed by our team.</h5>
				
				@elseif( $u_info->add_status == 3)
                         
				<span class="text-sm  text-danger">Address Proof Verification is Rejected, Try again!</span>
				<div class="mt-[18px]">
                    <h1 class="text-danger">Rejected!</h1>
                    <br>
					
                   <a href="/address_form"> <button type="button" class="btn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2" data-dz-modal="thirdmodal">Try Again</button></a>
                </div>

				@endif
            </div>
            
        </div>
    </div>
</div>	
@endif
{{-- modals code --}}
 
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






                            
							<div class="w-full">
								<div class="row">  
									<div class="">
										<div class="row">
											
											<div class="sm:w-1/4">
												<div class="card">
													<div class="card-body depostit-card p-5">
														<div class="depostit-card-media flex justify-between relative z-[2]">
															<div>
																<h6 class="font-normal">Wallet Balance</h6>
																<h3 class="font-semibold leading-[1.346]" id="x_balance">0</h3>
																<a href="/deposite_funds"><p>Add now</p></a>
															</div>
															<div class="icon-box bg-warning text-white h-[2.5rem] w-[2.5rem] relative flex items-center justify-center rounded-md">
																<svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11.4642 13.7074C11.4759 12.1252 10.8504 10.8738 9.60279 9.99009C8.6392 9.30968 7.46984 8.95476 6.33882 8.6137C3.98274 7.89943 3.29927 7.52321 3.29927 6.3965C3.29927 5.14147 4.93028 4.69493 6.32655 4.69493C7.34341 4.69493 8.51331 5.01109 9.23985 5.47964L10.6802 3.24887C9.73069 2.6333 8.43112 2.21342 7.14783 2.0831V0H4.49076V2.22918C2.12884 2.74876 0.640949 4.29246 0.640949 6.3965C0.640949 7.87005 1.25327 9.03865 2.45745 9.86289C3.37331 10.4921 4.49028 10.83 5.56927 11.1572C7.88027 11.8557 8.81873 12.2813 8.80805 13.691L8.80799 13.7014C8.80799 14.8845 7.24005 15.3051 5.89676 15.3051C4.62786 15.3051 3.248 14.749 2.46582 13.9222L0.535522 15.7481C1.52607 16.7957 2.96523 17.5364 4.4907 17.8267V20.0001H7.14783V17.8735C9.7724 17.4978 11.4616 15.9177 11.4642 13.7074Z" fill="#fff"/>
																</svg>
															</div>
														</div>
														<br>
														<div class="progress-box mt-0">
															<div class="progress h-[5px] flex overflow-hidden rounded-md">
																<div class="progress-bar bg-secondary" style="width:100%; height:5px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
												</div>	
											</div>
											<div class="sm:w-1/4">
												<div class="card">
													<div class="card-body depostit-card p-5">
														<div class="depostit-card-media flex justify-between relative z-[2]">
															<div>
																<h6 class="font-normal">Total Deposite</h6>
																<h3 class="font-semibold leading-[1.346]" id="x_deposite">0</h3>
															    &nbsp;
															</div>
															<div class="icon-box bg-primary text-white h-[2.5rem] w-[2.5rem] relative flex items-center justify-center rounded-md">
																<svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11.4642 13.7074C11.4759 12.1252 10.8504 10.8738 9.60279 9.99009C8.6392 9.30968 7.46984 8.95476 6.33882 8.6137C3.98274 7.89943 3.29927 7.52321 3.29927 6.3965C3.29927 5.14147 4.93028 4.69493 6.32655 4.69493C7.34341 4.69493 8.51331 5.01109 9.23985 5.47964L10.6802 3.24887C9.73069 2.6333 8.43112 2.21342 7.14783 2.0831V0H4.49076V2.22918C2.12884 2.74876 0.640949 4.29246 0.640949 6.3965C0.640949 7.87005 1.25327 9.03865 2.45745 9.86289C3.37331 10.4921 4.49028 10.83 5.56927 11.1572C7.88027 11.8557 8.81873 12.2813 8.80805 13.691L8.80799 13.7014C8.80799 14.8845 7.24005 15.3051 5.89676 15.3051C4.62786 15.3051 3.248 14.749 2.46582 13.9222L0.535522 15.7481C1.52607 16.7957 2.96523 17.5364 4.4907 17.8267V20.0001H7.14783V17.8735C9.7724 17.4978 11.4616 15.9177 11.4642 13.7074Z" fill="#fff"/>
																</svg>
															</div>
														</div>
														<br>
														<div class="progress-box mt-0">
															<div class="progress h-[5px] flex overflow-hidden rounded-md">
																<div class="progress-bar bg-primary" style="width:100%; height:5px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
												</div>	
											</div>

											<div class="sm:w-1/4">
												<div class="card">
													<div class="card-body depostit-card p-5">
														<div class="depostit-card-media flex justify-between relative z-[2]">
															<div>
																<h6 class="font-normal">Total Investment</h6>
																<h3 class="font-semibold leading-[1.346]" id="x_funded">0</h3>
																&nbsp;
																
															</div>
															<div class="icon-box bg-danger text-white h-[2.5rem] w-[2.5rem] relative flex items-center justify-center rounded-md">
																<svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11.4642 13.7074C11.4759 12.1252 10.8504 10.8738 9.60279 9.99009C8.6392 9.30968 7.46984 8.95476 6.33882 8.6137C3.98274 7.89943 3.29927 7.52321 3.29927 6.3965C3.29927 5.14147 4.93028 4.69493 6.32655 4.69493C7.34341 4.69493 8.51331 5.01109 9.23985 5.47964L10.6802 3.24887C9.73069 2.6333 8.43112 2.21342 7.14783 2.0831V0H4.49076V2.22918C2.12884 2.74876 0.640949 4.29246 0.640949 6.3965C0.640949 7.87005 1.25327 9.03865 2.45745 9.86289C3.37331 10.4921 4.49028 10.83 5.56927 11.1572C7.88027 11.8557 8.81873 12.2813 8.80805 13.691L8.80799 13.7014C8.80799 14.8845 7.24005 15.3051 5.89676 15.3051C4.62786 15.3051 3.248 14.749 2.46582 13.9222L0.535522 15.7481C1.52607 16.7957 2.96523 17.5364 4.4907 17.8267V20.0001H7.14783V17.8735C9.7724 17.4978 11.4616 15.9177 11.4642 13.7074Z" fill="#fff"/>
																</svg>
															</div>
														</div>
														<br>
														<div class="progress-box mt-0">
															<div class="progress h-[5px] flex overflow-hidden rounded-md">
																<div class="progress-bar bg-danger" style="width:100%; height:5px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
												</div>	
											</div>

											<div class="sm:w-1/4">
												<div class="card">
													<div class="card-body depostit-card p-5">
														<div class="depostit-card-media flex justify-between relative z-[2]">
															<div>
																<h6 class="font-normal">Total Earning</h6>
																<h3 class="font-semibold leading-[1.346]" id="x_earning">0</h3>
																&nbsp;
															
															</div>
															<div class="icon-box bg-success text-white h-[2.5rem] w-[2.5rem] relative flex items-center justify-center rounded-md">
																<svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11.4642 13.7074C11.4759 12.1252 10.8504 10.8738 9.60279 9.99009C8.6392 9.30968 7.46984 8.95476 6.33882 8.6137C3.98274 7.89943 3.29927 7.52321 3.29927 6.3965C3.29927 5.14147 4.93028 4.69493 6.32655 4.69493C7.34341 4.69493 8.51331 5.01109 9.23985 5.47964L10.6802 3.24887C9.73069 2.6333 8.43112 2.21342 7.14783 2.0831V0H4.49076V2.22918C2.12884 2.74876 0.640949 4.29246 0.640949 6.3965C0.640949 7.87005 1.25327 9.03865 2.45745 9.86289C3.37331 10.4921 4.49028 10.83 5.56927 11.1572C7.88027 11.8557 8.81873 12.2813 8.80805 13.691L8.80799 13.7014C8.80799 14.8845 7.24005 15.3051 5.89676 15.3051C4.62786 15.3051 3.248 14.749 2.46582 13.9222L0.535522 15.7481C1.52607 16.7957 2.96523 17.5364 4.4907 17.8267V20.0001H7.14783V17.8735C9.7724 17.4978 11.4616 15.9177 11.4642 13.7074Z" fill="#fff"/>
																</svg>
															</div>
														</div>
														<br>
														<div class="progress-box mt-0">
															<div class="progress h-[5px] flex overflow-hidden rounded-md">
																<div class="progress-bar bg-success" style="width:100%; height:5px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
												</div>	
											</div>
                                             
											<h1 style="text-align: center;padding:1%" >Top Performer Plans</h1>

											<div id="quick_plan" class="flex flex-wrap" style="padding:1%">

                                             
											</div>
											<br>
                                                <p style="text-align: center"><a href="/explore_plans"><button type="button" class="mr-1 mb-2 inline-block rounded font-medium xl:text-[15px] text-xs leading-5 xl:py-[0.719rem] xl:px-[1.563rem] py-2.5 px-4 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">View All</button></a></p>
											 <br>
											 <br>
											 <hr>

											<div class="md:w-1/2">
												
												<div class="card">
													<div class="flex items-center justify-between" style="padding: 3%">
														<h2 class="p-1">My Investments</h2>
													    <a href="/my_investments" class="text-primary">View All</a>

													</div>
													
												
													<div class="overflow-x-auto table-scroll">
														<table class="table mb-4 min-w-[36rem] w-full" id="x_investment">
															<thead>
																<tr>

																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Name</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Investment Id</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Amount</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Created At</strong></th>
																	</tr>
															</thead>
															<tbody>
																
															
															</tbody>
															
														</table>
														
													</div>
													
												</div>
												
													{{-- <a href="/my_investments"><button type="button" style="width:100%" class="mr-1 mb-2 inline-block rounded  font-semibold text-[15px] leading-5 py-[0.438rem] px-4 text-xs border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xs">View All Investments</button></a> --}}

											</div>

											<div class="md:w-1/2">
												
												<div class="card">
													<div class="flex items-center justify-between" style="padding: 3%">
														<h2 class="p-1">Transfers</h2>
													    <a href="/all_transfer" class="text-primary">View All</a>

													</div>
													<div class="overflow-x-auto table-scroll">
														<table class="table mb-4 min-w-[36rem] w-full" id="x_transfer">
															<thead>
																<tr>

																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Sent To</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Email</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Amount</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Transaction Id</strong></th>
                                                              	</tr>
															</thead>
															<tbody>
															
															
															</tbody>
															
														</table>
														
													</div>

												</div>
												{{-- <a href="/all_transfer"><button type="button" style="width:100%" class="mr-1 mb-2 inline-block rounded  font-semibold text-[15px] leading-5 py-[0.438rem] px-4 text-xs border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-xs">View All Investments</button></a> --}}

											</div>
											

											<div class="" style="padding-top: 5%">
												
												<div class="card">
													<div class="flex items-center justify-between" style="padding: 3%">
														<h2 class="p-1">Transaction History</h2>
													    <a href="/history" class="text-primary">View All</a>

													</div>
													<div class="overflow-x-auto table-scroll">
														<table class="table mb-4 min-w-[36rem] w-full" id="x_hist">
															<thead>
																<tr>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">ID</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Name</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Subject</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Amount</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Status</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Date/Time</strong></th>
	
																</tr>
															</thead>
															<tbody>
														
															</tbody>
														</table>
													</div>

												</div>
											</div>

											<br>
											<br>
											<br>
											<br>















									
									
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


<script>
	const appUrl = '{{ env('APP_URL') }}';
</script>

<script>
    // Fetch data from API using fetch API
    fetch(appUrl+'/api_dash')
        .then(response => response.json())
        .then(data => {
          
                document.getElementById('x_balance').innerHTML = `$${data.balance.toLocaleString()}`;
                document.getElementById('x_deposite').innerHTML = `$${data.deposite.toLocaleString()}`;
                document.getElementById('x_funded').innerHTML = `$${data.invested.toLocaleString()}`;
                document.getElementById('x_earning').innerHTML = `$${data.earning.toLocaleString()}`;

				const quickPlanDiv = document.getElementById('quick_plan');
quickPlanDiv.innerHTML = ''; // Clear existing content


data.plans.forEach(plan => {
    const newCard = `
        <div class="md:w-1/4" style="padding:0.5%">
            <div class="card sale-card">
                <div class="card-header flex justify-between sm:pt-6 pb-0 py-5 sm:px-5 px-4 relative flex-wrap items-baseline">
                    <div>
						<a href="/v_plan/${plan.id}"> <img src="${plan.image}" width="100" alt=""> </a>
                        <span class="text-sm text-body-color">${plan.name}</span>
                        <h4 class="mb-2">Total Invested: $${plan.total_invested} <i class="fa-solid fa-arrow-trend-up ml-1"></i></h4>
                    </div>
                    <span class="inline-block font-medium leading-[1.5] rounded text-xs py-[5px] px-3 text-white bg-primary">${plan.roi}<i class="fa-solid fa-caret-up ml-1"></i></span>
                </div>
                <div class="custome-tooltip">
                    <div id="totalSale"></div>
                </div>
                <div class="py-4 px-5">
					<a href="/v_plan/${plan.id}">
                    <span class="rounded-ee-[20px] rounded-ss-[80px] bottom-0 cursor-pointer h-10 absolute right-0 w-10 bg-primary">
                        <svg class="text-white h-[22px] left-0 mx-auto absolute right-0 top-[11px] w-[22px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                    </span>
				    </a>
                </div>
            </div>
        </div>
    `;
    quickPlanDiv.insertAdjacentHTML('beforeend', newCard);
});





            const topwithTable = document.getElementById('x_investment');
            const topwithBody = topwithTable.getElementsByTagName('tbody')[0];
            topwithBody.innerHTML = ''; // Clear existing table rows

            data.investment.forEach(investment => {
                const newRow = `
				<tr>
				
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">${investment.name}</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">${investment.investment_id}</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">$${investment.amount}</td>

																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">${investment.created_at}</td>
																
																</tr>
                `;
                topwithBody.insertAdjacentHTML('beforeend', newRow);
            });

            const topinvestor = document.getElementById('x_transfer');
            const topinvestorBody = topinvestor.getElementsByTagName('tbody')[0];
            topinvestorBody.innerHTML = ''; // Clear existing table rows

            data.transfer.forEach(transfer => {
                const newRow = `
				<tr>
				
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">${transfer.receiver_name}</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">${transfer.receiver_email}</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">$${transfer.amount}</td>

																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">${transfer.transaction_id}</td>
																
																</tr>
                `;
                topinvestorBody.insertAdjacentHTML('beforeend', newRow);
            });
			

    
        })

		
        .catch(error => console.error('Error fetching data:', error));
</script>


<script>
    // Fetch data from API using fetch API
    fetch(appUrl+'/api_dash')
        .then(response => response.json())
        .then(data => {
           
			 			const topwithTable = document.getElementById('x_hist');
            const topwithBody = topwithTable.getElementsByTagName('tbody')[0];
            topwithBody.innerHTML = ''; // Clear existing table rows

            data.transaction.forEach(transaction => {
                const newRow = `
				<tr>
				
					<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">#${transaction.id}</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">${transaction.name}</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">${transaction.subject}</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">$${transaction.amount}</td>
                                                                    <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">${transaction.status}</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">${transaction.created_at}</td>
																
																</tr>
                `;
                topwithBody.insertAdjacentHTML('beforeend', newRow);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
</script>

@else
<div class="xl:w-1/2 w-full" style="margin: auto">
	<div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent text-danger bg-danger-light dark:bg-[#ff5e5e26] dark:border-[#ff5e5e26] notification">
		<p class="text-danger mb-2"><strong>Suspended! </strong></p>
		<p class="mb-4 text-danger leading-[1.5]">Your account status has been suspended. Please contact our support team for further assistance.</p>
	   
	</div>
</div>  
@endif
@endsection