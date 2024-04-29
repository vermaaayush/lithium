@php
  use App\Models\Config;
  $company = Config::first();
  
@endphp
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from yashadmin.dexignzone.com/tailwind/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Apr 2024 18:51:02 GMT -->
<head>	
	<!--Title-->
	<title>@yield('title') | {{$company->name}}</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="robots" content="index, follow">

	
	
	<meta name="format-detection" content="telephone=no">

  
  <!-- MOBILE SPECIFIC -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- FAVICONS ICON -->
  <link rel="shortcut icon" type="image/png" href="{{ $company->favicon }}">
  <!-- ICONS -->
  <link rel="stylesheet" href="{{ asset('user_assets/assets/icons/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('user_assets/assets/icons/line-awesome/css/line-awesome.min.css') }}">
  <!-- NICE SELECT -->
  <link href="{{ asset('user_assets/assets/vendor/niceselect/css/nice-select.css') }}" rel="stylesheet">
  <!-- STYLESHEETS -->
  <link href="{{ asset('user_assets/assets/vendor/powerful-calendar/style.css') }}" rel="stylesheet">
  <link href="{{ asset('user_assets/assets/vendor/powerful-calendar/theme.css') }}" rel="stylesheet">
  <link href="{{ asset('user_assets/assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
  <link href="{{ asset('user_assets/assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">	
  <link href="{{ asset('user_assets/assets/vendor/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
  
  <!-- STYLE CSS -->
  <link href="{{ asset('user_assets/assets/css/style.css') }}" rel="stylesheet">	
  
  <style>
	.fas, .fa-brands{
		font-size: 22px; margin-right: 5px;
		color: white;
	}
	
  </style>
  <script>
	// Function to update the clock
	function updateClock() {
		const now = new Date();
		const date = now.toDateString(); // Get the date in a human-readable format
		const hours = now.getHours().toString().padStart(2, '0');
		const minutes = now.getMinutes().toString().padStart(2, '0');
		const seconds = now.getSeconds().toString().padStart(2, '0');
		const currentTime = `${date} ${hours}:${minutes}:${seconds}`; // Combine date and time
		const clockElement = document.getElementById('clock');
		if (clockElement) {
			clockElement.innerText = currentTime;
		}
	}

	// Initial call to update the clock
	updateClock();

	// Refresh the clock every second (1000 milliseconds)
	setInterval(updateClock, 1000);
</script>
</head>
<body class="selection:text-white selection:bg-primary">

    <!-- Preloader start  -->
    <div id="preloader" class="bg-white dark:bg-[#182237] p-0 m-0 h-full fixed z-[99999] w-full flex items-center justify-center">
		<div>
			<img src="{{ $company->favicon}}" alt=""> 
		</div>
    </div>
    <!-- Preloader end -->

   <!-- Main wrapper start -->
    <div id="main-wrapper" class="relative">
        <!-- Nav header start -->
        <div class="nav-header">
            <a href="#" class="brand-logo">
				<img src="{{$company->logo}}" alt="">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line">
						<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M10.7468 5.58925C11.0722 5.26381 11.0722 4.73617 10.7468 4.41073C10.4213 4.0853 9.89369 4.0853 9.56826 4.41073L4.56826 9.41073C4.25277 9.72622 4.24174 10.2342 4.54322 10.5631L9.12655 15.5631C9.43754 15.9024 9.96468 15.9253 10.3039 15.6143C10.6432 15.3033 10.6661 14.7762 10.3551 14.4369L6.31096 10.0251L10.7468 5.58925Z" fill="#452B90"/>
							<path opacity="0.3" d="M16.5801 5.58924C16.9056 5.26381 16.9056 4.73617 16.5801 4.41073C16.2547 4.0853 15.727 4.0853 15.4016 4.41073L10.4016 9.41073C10.0861 9.72622 10.0751 10.2342 10.3766 10.5631L14.9599 15.5631C15.2709 15.9024 15.798 15.9253 16.1373 15.6143C16.4766 15.3033 16.4995 14.7762 16.1885 14.4369L12.1443 10.0251L16.5801 5.58924Z" fill="#452B90"/>
						</svg>
					</span>
                </div>
            </div>
        </div>
        <!-- Nav header end -->


		
		<!-- Header start -->
		<div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="navbar-collapse justify-between">
                        <div class="header-left">
							<div class="dashboard_bar max-md:hidden dark:text-white">
                               <span id="clock" class="text-primary"></span>
                            </div>
                        </div>
                        <div class="header-right flex items-center h-full">
							{{-- <div class="input-group search-area flex flex-wrap items-stretch relative max-xl:hidden">
								<a class="btn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2" href="">Fund Your Account</a>
							</div> --}}
							<ul class="flex flex-row">
								<li class="nav-item dropdown notification_dropdown flex items-center relative">
									<a class="nav-link relative sm:w-[45px] w-[40px] sm:h-[45px] h-[40px] mx-[5px] max-sm:mr-0 text-center p-2 text-[#464a53] rounded-md sm:text-lg block duration-500 bell dz-theme-mode" href="javascript:void(0);">
										<svg id="icon-light" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" fill-rule="nonzero"/>
												<path d="M19.5,10.5 L21,10.5 C21.8284271,10.5 22.5,11.1715729 22.5,12 C22.5,12.8284271 21.8284271,13.5 21,13.5 L19.5,13.5 C18.6715729,13.5 18,12.8284271 18,12 C18,11.1715729 18.6715729,10.5 19.5,10.5 Z M16.0606602,5.87132034 L17.1213203,4.81066017 C17.7071068,4.22487373 18.6568542,4.22487373 19.2426407,4.81066017 C19.8284271,5.39644661 19.8284271,6.34619408 19.2426407,6.93198052 L18.1819805,7.99264069 C17.5961941,8.57842712 16.6464466,8.57842712 16.0606602,7.99264069 C15.4748737,7.40685425 15.4748737,6.45710678 16.0606602,5.87132034 Z M16.0606602,18.1819805 C15.4748737,17.5961941 15.4748737,16.6464466 16.0606602,16.0606602 C16.6464466,15.4748737 17.5961941,15.4748737 18.1819805,16.0606602 L19.2426407,17.1213203 C19.8284271,17.7071068 19.8284271,18.6568542 19.2426407,19.2426407 C18.6568542,19.8284271 17.7071068,19.8284271 17.1213203,19.2426407 L16.0606602,18.1819805 Z M3,10.5 L4.5,10.5 C5.32842712,10.5 6,11.1715729 6,12 C6,12.8284271 5.32842712,13.5 4.5,13.5 L3,13.5 C2.17157288,13.5 1.5,12.8284271 1.5,12 C1.5,11.1715729 2.17157288,10.5 3,10.5 Z M12,1.5 C12.8284271,1.5 13.5,2.17157288 13.5,3 L13.5,4.5 C13.5,5.32842712 12.8284271,6 12,6 C11.1715729,6 10.5,5.32842712 10.5,4.5 L10.5,3 C10.5,2.17157288 11.1715729,1.5 12,1.5 Z M12,18 C12.8284271,18 13.5,18.6715729 13.5,19.5 L13.5,21 C13.5,21.8284271 12.8284271,22.5 12,22.5 C11.1715729,22.5 10.5,21.8284271 10.5,21 L10.5,19.5 C10.5,18.6715729 11.1715729,18 12,18 Z M4.81066017,4.81066017 C5.39644661,4.22487373 6.34619408,4.22487373 6.93198052,4.81066017 L7.99264069,5.87132034 C8.57842712,6.45710678 8.57842712,7.40685425 7.99264069,7.99264069 C7.40685425,8.57842712 6.45710678,8.57842712 5.87132034,7.99264069 L4.81066017,6.93198052 C4.22487373,6.34619408 4.22487373,5.39644661 4.81066017,4.81066017 Z M4.81066017,19.2426407 C4.22487373,18.6568542 4.22487373,17.7071068 4.81066017,17.1213203 L5.87132034,16.0606602 C6.45710678,15.4748737 7.40685425,15.4748737 7.99264069,16.0606602 C8.57842712,16.6464466 8.57842712,17.5961941 7.99264069,18.1819805 L6.93198052,19.2426407 C6.34619408,19.8284271 5.39644661,19.8284271 4.81066017,19.2426407 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
											</g>
										</svg>
										<svg id="icon-dark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"/>
											<path d="M12.0700837,4.0003006 C11.3895108,5.17692613 11,6.54297551 11,8 C11,12.3948932 14.5439081,15.9620623 18.9299163,15.9996994 C17.5467214,18.3910707 14.9612535,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 C12.0233848,4 12.0467462,4.00010034 12.0700837,4.0003006 Z" fill="#000000"/>
										</g>
										</svg>	
									</a>
								</li>								
								<li class="nav-item dropdown notification_dropdown flex items-center relative">
									<a data-dz-dropdown="DzNotificationDropdown" class="dz-dropdown nav-link relative sm:w-[45px] w-[40px] sm:h-[45px] h-[40px] mx-[5px] max-sm:mr-0 text-center p-2 text-[#464a53] rounded-md sm:text-lg block duration-500" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
										<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 12H19C19.8284 12 20.5 12.6716 20.5 13.5C20.5 14.3284 19.8284 15 19 15H6C5.17157 15 4.5 14.3284 4.5 13.5C4.5 12.6716 5.17157 12 6 12H7.5L8.05827 6.97553C8.30975 4.71226 10.2228 3 12.5 3C14.7772 3 16.6903 4.71226 16.9417 6.97553L17.5 12Z" fill="#222B40"/>
											<path opacity="0.3" d="M14.5 18C14.5 16.8954 13.6046 16 12.5 16C11.3954 16 10.5 16.8954 10.5 18C10.5 19.1046 11.3954 20 12.5 20C13.6046 20 14.5 19.1046 14.5 18Z" fill="#222B40"/>
										</svg>
									</a>
									<div id="DzNotificationDropdown" class="dz-dropdown-menu absolute z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] w-[18.5rem] pt-4 mt-0.5 top-full max-md-top-[45px] md:right-0 rounded-md bg-white dark:bg-[#182237] hidden">
										<div id="DZ_W_Notification1" class="widget-media dz-scroll overflow-y-scroll overflow-x-hidden relative p-4" style="height:380px;">
											<ul class="timeline">
												<li>
													<div class="timeline-panel flex items-center relative rounded-md py-[0.8rem] px-3 mx-[-5px] duration-500 hover:bg-[#0d99ff0d]">
														<div class="media flex items-center justify-center w-[2.188rem] h-[2.188rem] bg-[#eee] rounded-full text-[13px] text-center overflow-hidden font-semibold self-start mr-2">
															<img alt="image" width="50" src="assets/images/avatar/1.jpg">
														</div>
														<div class="media-body">
															<h6 class="mb-1 text-[13px] leading-4">Dr sultads Send you Photo</h6>
															<small class="block text-bs-dropdown-color">29 July 2020 - 02:26 PM</small>
														</div>
													</div>
												</li>
												
												
											</ul>
										</div>
										<a class="dropdown-item pt-[0.9375rem] px-[1.875rem] pb-[14px] text-center block border-t text-[13px] text-primary border-[#f1f1f1] dark:border-[#ffffff1a]" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a> 
									</div>
								</li>
								
								<li class="nav-item pl-4 flex items-center relative">
									<div class="dropdown header-profile2">
										<a data-dz-dropdown="DzinfoDropdown" class="dz-dropdown nav-link relative p-2 max-sm:p-0 text-[#464a53] text-lg leading-[1] block duration-500 bg-transparent" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
											<div class="header-info2 flex items-center text-right">
												<div class="header-media">
												@php
													$userImage = session('s_user')['image'];
												@endphp
												
												@if($userImage && file_exists(public_path($userImage)))
													<img src="{{ $userImage }}" alt="" class="w-[45px] h-[45px] max-sm:w-[40px] max-sm:h-[40px] rounded-md mx-auto">
												@else
													<!-- Default image -->
													<img src="{{ asset('user_assets/man.png') }}" alt="" class="w-[45px] h-[45px] max-sm:w-[40px] max-sm:h-[40px] rounded-md mx-auto">
												@endif
												
												</div>
											</div>
										</a>
										<div id="DzinfoDropdown" class="dz-dropdown-menu dropdown-menu dropdown-menu-end bg-white dark:bg-[#182237] absolute rounded-md w-[275px] right-0 top-full z-[9] shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] py-2 hidden">
											<div class="card border-0 mb-0">
												<div class="card-header relative flex items-center justify-between bg-transparent py-2 sm:px-[1.25rem] px-4 border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
													<div class="flex items-center">
													@php
														$userImage = session('s_user')['image'];
													@endphp
													
													@if($userImage && file_exists(public_path($userImage)))
														<img src="{{ $userImage }}" class="avatar avatar-md mr-2.5 h-[2.813rem] w-[2.813rem] inline-block object-cover rounded-md mx-auto" alt="">
													@else
														<!-- Default image -->
														<img src="{{ asset('user_assets/man.png') }}" class="avatar avatar-md mr-2.5 h-[2.813rem] w-[2.813rem] inline-block object-cover rounded-md mx-auto" wid alt="">
													@endif
													
														<div>
															<h6 class="text-sm">{{ session('s_user')['name'] }}</h6>
															<span class="text-xs text-body-color">{{ session('s_user')['email'] }}</span>	
														</div>	
													</div>
														
												</div>
												<div class="card-body sm:py-2 border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
													<a href="#" class="dropdown-item py-[0.6rem] px-[1.25rem] block w-full ai-icon hover:bg-primary-light group">
														<svg class="inline-block" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M11.9848 15.3462C8.11714 15.3462 4.81429 15.931 4.81429 18.2729C4.81429 20.6148 8.09619 21.2205 11.9848 21.2205C15.8524 21.2205 19.1543 20.6348 19.1543 18.2938C19.1543 15.9529 15.8733 15.3462 11.9848 15.3462Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
														<path fill-rule="evenodd" clip-rule="evenodd" d="M11.9848 12.0059C14.5229 12.0059 16.58 9.94779 16.58 7.40969C16.58 4.8716 14.5229 2.81445 11.9848 2.81445C9.44667 2.81445 7.38857 4.8716 7.38857 7.40969C7.38 9.93922 9.42381 11.9973 11.9524 12.0059H11.9848Z" stroke="var(--primary)" stroke-width="1.42857" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
	
														<span class="ml-2 text-[13px] text-body-color group-hover:text-primary">Profile </span>
													</a>
													<a href="/portfolio" class="dropdown-item py-[0.6rem] px-[1.25rem] block w-full ai-icon hover:bg-primary-light group">
														<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart inline-block"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
	
														<span class="ml-2 text-[13px] text-body-color group-hover:text-primary">My Portfolio</span>
															</a>
													
													<a href="/notifications" class="dropdown-item py-[0.6rem] px-[1.25rem] block w-full ai-icon hover:bg-primary-light group">
														<svg class="inline-block" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path fill-rule="evenodd" clip-rule="evenodd" d="M12 17.8476C17.6392 17.8476 20.2481 17.1242 20.5 14.2205C20.5 11.3188 18.6812 11.5054 18.6812 7.94511C18.6812 5.16414 16.0452 2 12 2C7.95477 2 5.31885 5.16414 5.31885 7.94511C5.31885 11.5054 3.5 11.3188 3.5 14.2205C3.75295 17.1352 6.36177 17.8476 12 17.8476Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															<path d="M14.3888 20.8572C13.0247 22.372 10.8967 22.3899 9.51947 20.8572" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>
	
														<span class="ml-2 text-[13px] text-body-color group-hover:text-primary">Notification </span>
													</a>
												</div>
												<div class="card-footer px-0 py-2">
													
													<a href="/user_logout" class="dropdown-item py-[0.6rem] px-[1.25rem] text-base block w-full ai-icon">
														<svg class="profle-logout inline-block" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ff7979" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
														<span class="ml-2 text-danger text-[13px]">Logout </span>
													</a>
												</div>
											</div>
											
										</div>
									</div>
								</li>
							</ul>
                        </div>
                    </div>
				</nav>
			</div>
		</div>
        <!-- Header end -->

        <!-- Sidebar start -->
		<div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
		
					{{-- <li><a href="/user_kyc" class="" aria-expanded="false">
						<i class="fa-brands fa-keycdn"></i>
							<span class="nav-text">Authentication</span>
						</a>
					</li> --}}
					<li><a href="/dashboard" class="" aria-expanded="false">
						<i class="fas fa-house"></i>
							<span class="nav-text">Dashboard</span>
						</a>
					</li>

					
					
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">
							<i class="fas fa-chart-column"></i>
						</div>	
						<span class="nav-text">Investment Plans</span>
						</a>
						<ul aria-expanded="false">
							
							<li><a href="/explore_plans">Explore Plans</a></li>
							<li><a href="/my_investments">My Investments</a></li>
							
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">
							<i class="fas fa-money-check-dollar"></i>
						</div>	
						<span class="nav-text">Funds</span>
						</a>
						<ul aria-expanded="false">
							
							<li><a href="/deposite_funds">Deposite Funds</a></li>
							<li><a href="/all_deposite">All Deposites</a></li>
							<li><a href="/withraw_funds">Withrawal Funds</a></li>
							<li><a href="/all_withrawal">All Withrawals</a></li>
							
						</ul>
					</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">
							<i class=" fas fa-solid fa-money-bill-transfer"></i>
						</div>	
						<span class="nav-text">Transfer</span>
						</a>
						<ul aria-expanded="false">
							
							<li><a href="/transfer">Fund Transfer</a></li>
							<li><a href="/all_transfer">All Transfers</a></li>
							
						</ul>
					</li>
					
					<li><a href="/history" class="" aria-expanded="false">
						<i class=" fas fa-solid fa-book"></i>
							<span class="nav-text">Transaction History</span>
						</a>
					</li>
					<li><a href="/notifications" class="" aria-expanded="false">
						<i class="fas fa-list-check"></i>
							<span class="nav-text">NewsLetter</span>
						</a>
					</li>
					<li>
						<a href="#" class="" aria-expanded="false">
							<i class="fas fa-user"></i>
							<!-- Added margin-right: 5px to create space between icon and text -->
							<span class="nav-text">Referral</span>
						</a>
					</li>
					<li>
						<a href="#" class="" aria-expanded="false">
							<i class="fas fa-envelope"></i>
							<!-- Added margin-right: 5px to create space between icon and text -->
							<span class="nav-text">Contact Us</span>
						</a>
					</li>
					<li>
						<a href="/user_logout" class="" aria-expanded="false">
							<i class="fas fa-sign-out"></i>
							<!-- Added margin-right: 5px to create space between icon and text -->
							<span class="nav-text">Logout</span>
						</a>
					</li>
					
					
					
				</ul>
				
			</div>
        </div>		
        <!-- Sidebar end -->
		<div class="content-body">
			<!-- row -->			
			<div class="container-fluid">
				<div class="row">
					<div class="xl:w-3/4 col-xxl-12">
						<div class="row">
		

		 
