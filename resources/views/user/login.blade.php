@php
  use App\Models\Config;
  $company = Config::first();
  
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
	
	<!--Title-->
	<title>Login Now | {{$company->name}}</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">


	<meta name="format-detection" content="telephone=no">


	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ $company->favicon }}">

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
										<a href="index.html"><img src="{{ $company->logo }}" alt="" class="w-[160px] inline-block"></a>
									</div>
									<h4 class="text-center mb-6">Log in your account</h4>
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
									
									<form action="/login" method="post" id="myForm" onsubmit="onSubmitForm(event)">
                                        @csrf
                                        <div class="mb-4">
                                            <label class="mb-1 form-label">Email</label>
                                            <input type="email" name="email" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  required>
                                        </div>
                                        
                                        <div class="mb-4 relative">
                                            <label class="form-label" for="dz-password">Password</label>
                                            <input type="password" id="dz-password" name="password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" required>
                                            <span class="show-pass eye absolute right-5 bottom-2.5 text-body-color text-sm">
                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                        <div class="form-row flex flex-wrap justify-between mb-2">
                                            <div class="form-group sm:mb-6 mb-1">
                                               
                                            </div>
                                            <div class="form-group ml-2">
                                                <a class="dark:text-white" href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <br>
										
										{{-- {{ env('NOCAPTCHA_SITEKEY') }} --}}
                                        <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}" data-callback="onCaptchaCompleted" ></div>

                                         <br>
                                        <div class="text-center">
                                            <button type="submit" id="submitButton" class="block w-full rounded font-bold h-[3.125rem] text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300" disabled>Sign In</button>
                                        </div>
                                    </form> 
									<div class="new-account mt-4">
										<p class="mb-4">Don't have an account? <a class="text-primary" href="/signup">Signup</a></p>
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

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function onCaptchaCompleted() {
            console.log('hi');
            document.getElementById('submitButton').removeAttribute('disabled');
            console.log('dude');
        }
    </script>
        

</body>

</html>
