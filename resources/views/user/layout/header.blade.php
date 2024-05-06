@php
  use App\Models\Config;
  use App\Models\Notification;
  use App\Models\Accesscontrol;
  $company = Config::first();
  
  $userId = session('s_user')['user_id'];
  $data = Notification::where('user_id', $userId)->orderBy('created_at', 'desc')->limit(8)->get();
  $ac = Accesscontrol::find(1);
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
										
										<div >
											
											<div class="card-body p-0">
												<div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1 overflow-y-scroll overflow-x-hidden h-[23.125rem] my-6 px-6 relative">
													<ul class="timeline relative" id="api_noti">

														@foreach ($data as $data)	
														<li class="relative mb-[0.9375rem]">
															<div class="timeline-badge rounded-[50%] h-[1.275rem] absolute top-[0.625rem] w-[1.275rem] bg-white border-2 border-primary-light p-1 primary"></div>
															<a class="timeline-panel text-muted" href="/notifications">
																<span class="text-xs block mb-[0.3125rem] opacity-80 tracking-[0.0625rem] text-body-color">{{$data->created_at->format('Y-m-d')}}</span>
																<h6 class="text-[13px]">{{ Str::limit($data->message, 50, ' ....') }}</h6>
															</a>
														</li>

														@endforeach
														
														
														
														
													</ul>
												</div>
											</div>
										</div>
										<a class="dropdown-item pt-[0.9375rem] px-[1.875rem] pb-[14px] text-center block border-t text-[13px] text-primary border-[#f1f1f1] dark:border-[#ffffff1a]" href="/notifications">See all notifications <i class="ti-arrow-end"></i></a> 
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
													<a href="/profile" class="dropdown-item py-[0.6rem] px-[1.25rem] block w-full ai-icon hover:bg-primary-light group">
														<svg class="inline-block" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M11.9848 15.3462C8.11714 15.3462 4.81429 15.931 4.81429 18.2729C4.81429 20.6148 8.09619 21.2205 11.9848 21.2205C15.8524 21.2205 19.1543 20.6348 19.1543 18.2938C19.1543 15.9529 15.8733 15.3462 11.9848 15.3462Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
														<path fill-rule="evenodd" clip-rule="evenodd" d="M11.9848 12.0059C14.5229 12.0059 16.58 9.94779 16.58 7.40969C16.58 4.8716 14.5229 2.81445 11.9848 2.81445C9.44667 2.81445 7.38857 4.8716 7.38857 7.40969C7.38 9.93922 9.42381 11.9973 11.9524 12.0059H11.9848Z" stroke="var(--primary)" stroke-width="1.42857" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
	
														<span class="ml-2 text-[13px] text-body-color group-hover:text-primary">Profile </span>
													</a>

													@if (session('s_user')['status'] == 'Active')
													<a href="/portfolio" class="dropdown-item py-[0.6rem] px-[1.25rem] block w-full ai-icon hover:bg-primary-light group">
														<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart inline-block"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
	
														<span class="ml-2 text-[13px] text-body-color group-hover:text-primary">My Portfolio</span>
															</a>

													<a href="/manage_password" class="dropdown-item py-[0.6rem] px-[1.25rem] block w-full ai-icon hover:bg-primary-light group">
														<svg class="inline-block" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path fill-rule="evenodd" clip-rule="evenodd" d="M20.8066 7.62355L20.1842 6.54346C19.6576 5.62954 18.4907 5.31426 17.5755 5.83866V5.83866C17.1399 6.09528 16.6201 6.16809 16.1307 6.04103C15.6413 5.91396 15.2226 5.59746 14.9668 5.16131C14.8023 4.88409 14.7139 4.56833 14.7105 4.24598V4.24598C14.7254 3.72916 14.5304 3.22834 14.17 2.85761C13.8096 2.48688 13.3145 2.2778 12.7975 2.27802H11.5435C11.0369 2.27801 10.5513 2.47985 10.194 2.83888C9.83666 3.19791 9.63714 3.68453 9.63958 4.19106V4.19106C9.62457 5.23686 8.77245 6.07675 7.72654 6.07664C7.40418 6.07329 7.08843 5.98488 6.8112 5.82035V5.82035C5.89603 5.29595 4.72908 5.61123 4.20251 6.52516L3.53432 7.62355C3.00838 8.53633 3.31937 9.70255 4.22997 10.2322V10.2322C4.82187 10.574 5.1865 11.2055 5.1865 11.889C5.1865 12.5725 4.82187 13.204 4.22997 13.5457V13.5457C3.32053 14.0719 3.0092 15.2353 3.53432 16.1453V16.1453L4.16589 17.2345C4.41262 17.6797 4.82657 18.0082 5.31616 18.1474C5.80575 18.2865 6.33061 18.2248 6.77459 17.976V17.976C7.21105 17.7213 7.73116 17.6515 8.21931 17.7821C8.70746 17.9128 9.12321 18.233 9.37413 18.6716C9.53867 18.9488 9.62708 19.2646 9.63043 19.5869V19.5869C9.63043 20.6435 10.4869 21.5 11.5435 21.5H12.7975C13.8505 21.5 14.7055 20.6491 14.7105 19.5961V19.5961C14.7081 19.088 14.9088 18.6 15.2681 18.2407C15.6274 17.8814 16.1154 17.6806 16.6236 17.6831C16.9451 17.6917 17.2596 17.7797 17.5389 17.9393V17.9393C18.4517 18.4653 19.6179 18.1543 20.1476 17.2437V17.2437L20.8066 16.1453C21.0617 15.7074 21.1317 15.1859 21.0012 14.6963C20.8706 14.2067 20.5502 13.7893 20.111 13.5366V13.5366C19.6717 13.2839 19.3514 12.8665 19.2208 12.3769C19.0902 11.8872 19.1602 11.3658 19.4153 10.9279C19.5812 10.6383 19.8213 10.3981 20.111 10.2322V10.2322C21.0161 9.70283 21.3264 8.54343 20.8066 7.63271V7.63271V7.62355Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															<circle cx="12.175" cy="11.889" r="2.63616" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>
														
	
														<span class="ml-2 text-[13px] text-body-color group-hover:text-primary">Change Password</span>
													</a>
													@endif
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

					@if (session('s_user')['status'] == 'Active')
						
					
					
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
					@if ($ac->referral==1)
					<li>
						<a href="/my_referrals" class="" aria-expanded="false">
							<i class="fas fa-user"></i>
							<!-- Added margin-right: 5px to create space between icon and text -->
							<span class="nav-text">My Referrals</span>
						</a>
					</li>
					@endif

					@endif
					<li>
						<a href="/contact_us" class="" aria-expanded="false">
							<i class="fas fa-envelope"></i>
							<!-- Added margin-right: 5px to create space between icon and text -->
							<span class="nav-text">Help / Support</span>
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
		

		 
