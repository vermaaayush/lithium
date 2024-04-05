<!DOCTYPE html>
<html lang="en">

<head>
	
	<!--Title-->
	<title>YashAdmin - Sales Management System Tailwind CSS Admin Dashboard Template | DexignZone</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">

	<meta name="format-detection" content="telephone=no">

	<meta name="twitter:title" content="YashAdmin - Sales Management System Tailwind CSS Admin Dashboard Template | DexignZone">

	<meta name="twitter:image" content="../social-image.png">
	<meta name="twitter:card" content="summary_large_image">

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
	
</head>
<body class="h-[100vh] selection:text-white selection:bg-primary" style="background-image:url('{{ asset('user_assets/assets/images/bg.png') }}'); background-position:center;">
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
									<form action="https://yashadmin.dexignzone.com/tailwind/demo/index.html">
										<div class="mb-4">
											<label class="mb-1 form-label text-dark">Username</label>
											<input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="username">
										</div>
										
										<div class="mb-4">
											<label class="mb-1 form-label text-dark">Email</label>
											<input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="hello@example.com">
										</div>

										<div class="mb-4 relative">
											<label class="form-label text-dark" for="dz-password">Password</label>
											<input type="password" id="dz-password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="123456">
											<span class="show-pass eye absolute right-5 bottom-2.5 text-body-color text-sm">
												<i class="fa fa-eye-slash"></i>
												<i class="fa fa-eye"></i>
											</span>
										</div>
										<div class="text-center mt-6">
											<button type="submit" class="block w-full rounded font-bold h-[3.125rem] text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Sign me up</button>
										</div>
									</form>
									<div class="new-account mt-4">
										<p class="mb-4">Already have an account? <a class="text-primary" href="page-register.html">Sign Up</a></p>
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
	<script src="{{ asset('user_assets/assets/js/styleSwitcher.js') }}"></script>



</body>

</html>
