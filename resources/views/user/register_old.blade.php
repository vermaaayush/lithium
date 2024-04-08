<!DOCTYPE html>
<html lang="en">

<head>
	
	<!--Title-->
	<title>Signup Now | DexignZone</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">

	<meta name="format-detection" content="telephone=no">


	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('user_assets/assets/images/favicon.png') }}">

	<link rel="stylesheet" href="{{ asset('user_assets/assets/icons/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('user_assets/assets/icons/line-awesome/css/line-awesome.min.css') }}">
	
	<link rel="stylesheet" href="{{ asset('user_assets/assets/icons/themify-icons/css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('user_assets/assets/vendor/datatables/css/jquery.dataTables.min.css') }}">

	<!-- NICE SELECT -->
	<link href="{{ asset('user_assets/assets/vendor/niceselect/css/nice-select.css') }}" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

	<!-- Style css -->
	<link href="{{ asset('user_assets/assets/css/style.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">

	
</head>
<body class="h-[100vh] selection:text-white selection:bg-primary" style="background-image:url('{{ asset('') }}'); background-position:center;background-repeat: no-repeat;">
	<div class="authincation fix-wrapper bg-primary-light min-h-screen flex py-[30px] items-center">
		<div class="container h-full">
			<div class="row justify-center h-full items-center">
				<div class="md:w-1/2">
					<div class="authincation-content bg-white dark:bg-[#182237] shadow-[0_0_2.1875rem_0_rgba(154,161,171,0.15)] rounded-md">
						<div class="row no-gutters">
							<div class="w-full">
								<div class="auth-form p-[3.125rem]">
									<div class="text-center mb-4">
										<a href="index.html"><img src="{{ asset('user_assets/assets/images/logo/logo-full.png') }}" alt="" class="w-[160px] inline-block"></a>
									</div>
									<h4 class="text-center mb-6">Sign up your account</h4>
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
									
									<form action="/signup" method="post"   enctype="multipart/form-data">
										@csrf
										<div class="mb-4">
											<label class="mb-1 form-label text-dark">Full Name</label>
											<input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Enter your full name" name="name" required>
										</div>
										
										<div class="mb-4">
											<label class="mb-1 form-label text-dark">Email</label>
											<input type="email" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="hello@example.com" name="email" required>
										</div>
									
										<div class="mb-4">
											<label class="mb-1 form-label text-dark">Phone</label>
											<input type="tel" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Enter your phone number" name="phone" required>
										</div>
									
										<div class="mb-4">
											<label class="mb-1 form-label text-dark">Password</label>
											<input type="password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Enter your password" name="password" required>
										</div>
									
										<div class="mb-4">
											<label class="mb-1 form-label text-dark">Confirm Password</label>
											<input type="password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Confirm your password" name="password_confirmation" required>
										</div>
									
										<div class="mb-4">
											<label class="mb-1 form-label text-dark">Country</label>
											<select class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" name="address" >
												<option value="">Select your country</option>
												<!-- Add options for countries here -->
											</select>
										</div>

										<div class="mb-4">
											<label class="mb-1 form-label text-dark">Profile Image</label>
											<input type="file" class="form-control "  name="user_pic" required>
										</div>
									
										<div class="mb-4">
											<label class="mb-1 form-label text-dark">Referral ID</label>
											<input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Enter your referral ID" name="referral_id">
										</div>
									
										<div class="text-center mt-6">
											<button type="submit" class="block w-full rounded font-bold h-[3.125rem] text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Sign me up</button>
										</div>
									</form>
									<div class="new-account mt-4">
										<p class="mb-4">Already have an account? <a class="text-primary" href="page-register.html">Login</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="{{ asset('user_assets/assets/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('user_assets/assets/vendor/niceselect/js/jquery.nice-select.min.js') }}"></script> <!-- nice-select -->
	<script src="{{ asset('user_assets/assets/js/custom.min.js') }}"></script>
	<script src="{{ asset('user_assets/assets/js/deznav-init.js') }}"></script>
	<script src="{{ asset('user_assets/assets/js/demo.js') }}"></script>




</body>

</html>
