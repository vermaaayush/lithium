@extends('user.layout.main')
@section('title', 'Dashboard')
@section('main-container')

@if($u_info->kyc == 0)

<h1>Complete Your KYC</h1>
<h5>You’re ready to start trading soon! Help us safeguard your account by verifying your personal information.</h5>
<br>
<br>

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
                    <button type="button" class="btn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2" data-dz-modal="firstmodal">Start</button>
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
                    <button type="button" class="btn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2" data-dz-modal="secondmodal">Start</button>
                </div>
				@elseif( $u_info->id_status == 1)

                 <br>
				 <br>
				<h5 class="text-success">Thank you for submitting your proof of identity. Your request is now being reviewed by our team.</h5>
				

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
                    <button type="button" class="btn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2" data-dz-modal="thirdmodal">Start</button>
                </div>
				@elseif( $u_info->add_status == 1)
				<br>
				 <br>
				<h5 class="text-success">Thank you for submitting your proof of address. Your request is now being reviewed by our team.</h5>
				

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
				<h5 class="modal-title">Secure Authentication App</h5>
				<button type="button" class="btn-close p-4 text-xs">
				</button>
			</div>
			<div class="modal-body relative p-[1.875rem] text-body-color sm:text-sm text-xs">
			   <div class="basic-form">
				<form id="uploadForm" enctype="multipart/form-data">
					@csrf
					<div>
						<label for="ID">Upload Your ID:</label>
						<input type="file" id="ID" name="ID" required>
					</div>
					<div>
						
					</div>
					<button type="submit">Submit</button>
				</form>
				
				
				
			   </div>
			   
			   
			</div>
		  
		</div>
	</div>
</div>


<div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055]  dz-modal-box model-close" id="secondmodal">
   <div class="modal-dialog modal-dialog-centered h-full flex items-center py-5" role="document">
	   <div class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] w-full pointer-events-auto">
		   <div class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
			   <h5 class="modal-title">Identity Verification</h5>
			   <button type="button" class="btn-close p-4 text-xs">
			   </button>
		   </div>
		   <div class="modal-body relative p-[1.875rem] text-body-color sm:text-sm text-xs">
			  <div class="basic-form">
				<form action="/id_verification" method="post" enctype="multipart/form-data" id="myForm">
					@csrf
					<div class="mb-4">
						<label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Upload Your ID</label>
						<div class="flex items-stretch flex-wrap relative w-full">
							<input type="file" class="" name="id_image" id="ID" required>
						</div>
					</div>
				    
					<label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Take a Selfie</label>
					<br>
					<button type="button" id="start-camera" class="tn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2	">Start Camera</button>
					<video id="video" width="320" height="240" autoplay></video>
					<br>
					<button type="button" id="click-photo" class="tn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2">Click Photo</button>
					<canvas id="canvas" width="240" height="240" style="border-radius: 50%; border: 2px solid #333; display: none;"></canvas>
				
					<input type="hidden" id="image-data" name="image_data" required>
				   
					<button type="submit" class="tn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2">Submit</button>
				</form>
            </div>
			  
			  
		   </div>
		 
	   </div>
   </div>
</div>

<div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055]  dz-modal-box model-close" id="thirdmodal">
   <div class="modal-dialog modal-dialog-centered h-full flex items-center py-5" role="document">
	   <div class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] w-full pointer-events-auto">
		   <div class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
			   <h5 class="modal-title">Address Verification</h5>
			   <button type="button" class="btn-close p-4 text-xs">
			   </button>
		   </div>
		   <div class="modal-body relative p-[1.875rem] text-body-color sm:text-sm text-xs">
			  <div class="basic-form">
				  <form action="/add_verify" method="post" enctype="multipart/form-data" class="form-valide-with-icon needs-validation" >  
					@csrf
					  <div class="mb-4">
						  <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Upload Your Address Proof</label>
						  <div class="flex items-stretch flex-wrap relative w-full">
							
						   <input type="file" class="" name="address_proof" required>

						  </div>
					  </div>

					  
					 
					  <button type="submit" class="btn mr-2 inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Submit</button>
					 
				  </form>
			  </div>
			  
			  
		   </div>
		 
	   </div>
   </div>
</div>
{{-- modals code --}}

{{-- selfie script --}}
<script>
	let camera_button = document.querySelector("#start-camera");
	let video = document.querySelector("#video");
	let click_button = document.querySelector("#click-photo");
	let canvas = document.querySelector("#canvas");
	let imageDataInput = document.querySelector("#image-data");

	camera_button.addEventListener('click', async function() {
		let stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
		video.srcObject = stream;
	});

	click_button.addEventListener('click', function() {
		video.style.display = 'none'; // Hide the video element
		canvas.style.display = 'block'; // Show the canvas element
		canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
		let image_data_url = canvas.toDataURL('image/jpeg');

		// Display clicked image on the circular canvas
		let img = new Image();
		img.onload = function() {
			canvas.getContext('2d').drawImage(img, 0, 0, canvas.width, canvas.height);
		};
		img.src = image_data_url;

		// Save image data in the hidden input
		imageDataInput.value = image_data_url;

		// data url of the image
		console.log(image_data_url);
	});
</script>
{{-- selfie script --}}
@endif
                            
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
																<h3 class="font-semibold leading-[1.346]">$2000000</h3>
																<p>Add now</p>
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
																<h3 class="font-semibold leading-[1.346]">$2000000</h3>
																<p>Add now</p>
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
																<h3 class="font-semibold leading-[1.346]">$2000000</h3>
																<p>Add now</p>
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
																<h3 class="font-semibold leading-[1.346]">$2000000</h3>
																<p>Add now</p>
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
                                             
											<h1 style="text-align: center;padding:1%">Top Performer Plans</h1>

											<div class="md:w-1/4">
												<div class="card sale-card">
													<div class="card-header flex justify-between sm:pt-6 pb-0 py-5 sm:px-5 px-4 relative flex-wrap items-baseline">
														<div>
															<img src="{{ asset('user_assets/man.png') }}" width="100px" alt="">
															<span class="text-sm text-body-color">Total Sale</span>
															<h4 class="mb-2">$1,255 <i class="fa-solid fa-arrow-trend-up ml-1"></i></h4>
														</div>
														<span class="inline-block font-medium leading-[1.5] rounded text-xs py-[5px] px-3 text-white bg-primary">3.5<i class="fa-solid fa-caret-up ml-1"></i></span>
													</div>
													<div class="custome-tooltip">
														<div id="totalSale"></div>
													</div>
													<div class="py-4 px-5">
														<span class="rounded-ee-[20px] rounded-ss-[80px] bottom-0 cursor-pointer h-10 absolute right-0 w-10 bg-primary">
															<svg class="text-white h-[22px] left-0 mx-auto absolute right-0 top-[11px] w-[22px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
														</span>
													</div>	
												</div>
											</div>
											<div class="md:w-1/4">
												<div class="card sale-card">
													<div class="card-header flex justify-between sm:pt-6 pb-0 py-5 sm:px-5 px-4 relative flex-wrap items-baseline">
														<div>
															<img src="{{ asset('user_assets/man.png') }}" width="100px" alt="">
															<span class="text-sm text-body-color">Total Sale</span>
															<h4 class="mb-2">$1,255 <i class="fa-solid fa-arrow-trend-up ml-1"></i></h4>
														</div>
														<span class="inline-block font-medium leading-[1.5] rounded text-xs py-[5px] px-3 text-white bg-primary">3.5<i class="fa-solid fa-caret-up ml-1"></i></span>
													</div>
													<div class="custome-tooltip">
														<div id="totalSale"></div>
													</div>
													<div class="py-4 px-5">
														<span class="rounded-ee-[20px] rounded-ss-[80px] bottom-0 cursor-pointer h-10 absolute right-0 w-10 bg-primary">
															<svg class="text-white h-[22px] left-0 mx-auto absolute right-0 top-[11px] w-[22px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
														</span>
													</div>	
												</div>
											</div>
											<div class="md:w-1/4">
												<div class="card sale-card">
													<div class="card-header flex justify-between sm:pt-6 pb-0 py-5 sm:px-5 px-4 relative flex-wrap items-baseline">
														<div>
															<img src="{{ asset('user_assets/man.png') }}" width="100px" alt="">
															<span class="text-sm text-body-color">Total Purchase</span>
															<h4 class="mb-2">5,552k <i class="fa-solid fa-arrow-trend-down ml-1"></i></h4>
														</div>
														<span class="inline-block font-medium leading-[1.5] rounded text-xs py-[5px] px-3 text-white bg-secondary">5.5<i class="fa-solid fa-caret-down ml-1"></i></span>
													</div>
													<div class="custome-tooltip">
														<div id="totalPurchase"></div>
													</div>
													<div class="py-4 px-5">
														<span class="rounded-ee-[20px] rounded-ss-[80px] bottom-0 cursor-pointer h-10 absolute right-0 w-10 bg-primary">
															<svg class="text-white h-[22px] left-0 mx-auto absolute right-0 top-[11px] w-[22px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
														</span>
													</div>	
												</div>
											</div>
											<div class="md:w-1/4">
												<div class="card sale-card">
													<div class="card-header flex justify-between sm:pt-6 pb-0 py-5 sm:px-5 px-4 relative flex-wrap items-baseline">
														<div>
															<img src="{{ asset('user_assets/man.png') }}" width="100px" alt="">
															<span class="text-sm text-body-color">Active Customers</span>
															<h4 class="mb-2">3,431k <i class="fa-solid fa-arrow-trend-down ml-1"></i></h4>
														</div>
														<span class="inline-block font-medium leading-[1.5] rounded text-xs py-[5px] px-3 text-white bg-primary">6.5<i class="fa-solid fa-caret-down ml-1"></i></span>
													</div>
													<div class="custome-tooltip">
														<div id="activeCustomers"></div>
													</div>
													<div class="py-4 px-5">
														<span class="rounded-ee-[20px] rounded-ss-[80px] bottom-0 cursor-pointer h-10 absolute right-0 w-10 bg-info">
															<svg class="text-white h-[22px] left-0 mx-auto absolute right-0 top-[11px] w-[22px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
														</span>
													</div>	
												</div>
											</div>

                                             <br>
                                                <p style="text-align: center"><button type="button" class="mr-1 mb-2 inline-block rounded font-medium xl:text-[15px] text-xs leading-5 xl:py-[0.719rem] xl:px-[1.563rem] py-2.5 px-4 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">View All</button></p>
											 <br>
											 <br>
											 <br>
											 <br>
											 <hr>

											<div class="md:w-1/2">
												
												<div class="card">
													<h2 style="padding:1%">My Investments</h2>
													<div class="overflow-x-auto table-scroll">
														<table class="table mb-4 min-w-[36rem] w-full">
															<thead>
																<tr>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black" style="width:80px;"><strong class="font-medium text-[15px]">#</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">PATIENT</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">DR NAME</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">DATE</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">STATUS</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">PRICE</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><strong>01</strong></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Mr. Bobby</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Dr. Jackson</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">01 August 2020</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-success bg-success-light dark:text-white dark:bg-[#3a9b941a]">Successful</span></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">$21.56</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-right text-body-color">
																		<div class="dropdown">
																			<button type="button" class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-success rounded-md dz-dropdown bg-success-light hover:bg-success duration-300 light sharp" data-dz-dropdown="dropdown-1">
																				<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
																			</button>
																			<div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden" id="dropdown-1">
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Edit</a>
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Delete</a>
																			</div>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><strong>02</strong></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Mr. Bobby</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Dr. Jackson</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">01 August 2020</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-danger bg-danger-light">Canceled</span></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">$21.56</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-right text-body-color">
																		<div class="dropdown">
																			<button type="button" class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-danger rounded-md dz-dropdown bg-danger-light hover:bg-danger duration-300 light sharp" data-dz-dropdown="dropdown-2">
																				<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
																			</button>
																			<div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden" id="dropdown-2">
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Edit</a>
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Delete</a>
																			</div>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><strong>03</strong></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Mr. Bobby</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Dr. Jackson</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">01 August 2020</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-warning bg-warning-light">Pending</span></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">$21.56</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-right text-body-color">
																		<div class="dropdown">
																			<button type="button" class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-warning rounded-md dz-dropdown bg-warning-light hover:bg-warning duration-300 light sharp" data-dz-dropdown="dropdown-3">
																				<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
																			</button>
																			<div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden" id="dropdown-3">
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Edit</a>
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Delete</a>
																			</div>
																		</div>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>

												</div>
											</div>

											<div class="md:w-1/2">
												
												<div class="card">
													<h2 style="padding:1%">Transfers</h2>
													<div class="overflow-x-auto table-scroll">
														<table class="table mb-4 min-w-[36rem] w-full">
															<thead>
																<tr>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black" style="width:80px;"><strong class="font-medium text-[15px]">#</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">PATIENT</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">DR NAME</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">DATE</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">STATUS</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">PRICE</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><strong>01</strong></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Mr. Bobby</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Dr. Jackson</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">01 August 2020</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-success bg-success-light dark:text-white dark:bg-[#3a9b941a]">Successful</span></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">$21.56</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-right text-body-color">
																		<div class="dropdown">
																			<button type="button" class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-success rounded-md dz-dropdown bg-success-light hover:bg-success duration-300 light sharp" data-dz-dropdown="dropdown-1">
																				<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
																			</button>
																			<div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden" id="dropdown-1">
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Edit</a>
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Delete</a>
																			</div>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><strong>02</strong></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Mr. Bobby</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Dr. Jackson</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">01 August 2020</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-danger bg-danger-light">Canceled</span></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">$21.56</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-right text-body-color">
																		<div class="dropdown">
																			<button type="button" class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-danger rounded-md dz-dropdown bg-danger-light hover:bg-danger duration-300 light sharp" data-dz-dropdown="dropdown-2">
																				<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
																			</button>
																			<div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden" id="dropdown-2">
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Edit</a>
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Delete</a>
																			</div>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><strong>03</strong></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Mr. Bobby</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Dr. Jackson</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">01 August 2020</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-warning bg-warning-light">Pending</span></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">$21.56</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-right text-body-color">
																		<div class="dropdown">
																			<button type="button" class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-warning rounded-md dz-dropdown bg-warning-light hover:bg-warning duration-300 light sharp" data-dz-dropdown="dropdown-3">
																				<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
																			</button>
																			<div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden" id="dropdown-3">
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Edit</a>
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Delete</a>
																			</div>
																		</div>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>

												</div>
											</div>
											

											<div class="" style="padding-top: 5%">
												
												<div class="card">
													<h2 style="padding:1%">Transaction History</h2>
													<div class="overflow-x-auto table-scroll">
														<table class="table mb-4 min-w-[36rem] w-full">
															<thead>
																<tr>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black" style="width:80px;"><strong class="font-medium text-[15px]">#</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">PATIENT</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">DR NAME</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">DATE</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">STATUS</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">PRICE</strong></th>
																	<th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><strong>01</strong></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Mr. Bobby</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Dr. Jackson</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">01 August 2020</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-success bg-success-light dark:text-white dark:bg-[#3a9b941a]">Successful</span></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">$21.56</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-right text-body-color">
																		<div class="dropdown">
																			<button type="button" class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-success rounded-md dz-dropdown bg-success-light hover:bg-success duration-300 light sharp" data-dz-dropdown="dropdown-1">
																				<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
																			</button>
																			<div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden" id="dropdown-1">
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Edit</a>
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Delete</a>
																			</div>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><strong>02</strong></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Mr. Bobby</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Dr. Jackson</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">01 August 2020</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-danger bg-danger-light">Canceled</span></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">$21.56</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-right text-body-color">
																		<div class="dropdown">
																			<button type="button" class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-danger rounded-md dz-dropdown bg-danger-light hover:bg-danger duration-300 light sharp" data-dz-dropdown="dropdown-2">
																				<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
																			</button>
																			<div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden" id="dropdown-2">
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Edit</a>
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Delete</a>
																			</div>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><strong>03</strong></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Mr. Bobby</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">Dr. Jackson</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">01 August 2020</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-warning bg-warning-light">Pending</span></td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">$21.56</td>
																	<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-right text-body-color">
																		<div class="dropdown">
																			<button type="button" class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-warning rounded-md dz-dropdown bg-warning-light hover:bg-warning duration-300 light sharp" data-dz-dropdown="dropdown-3">
																				<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
																			</button>
																			<div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden" id="dropdown-3">
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Edit</a>
																				<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Delete</a>
																			</div>
																		</div>
																	</td>
																</tr>
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
					
	



@endsection