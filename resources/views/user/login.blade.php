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
	<script src="https://cdn.tailwindcss.com"></script>

</head>






<body class="h-[100vh] selection:text-white selection:bg-primary" style="background-image:url('{{ asset('') }}'); background-size: cover;
background-repeat: no-repeat;">
	<nav class="bg-white shadow-md" >
        <div class=" bg-white mx-auto px-10 py-7 flex justify-between items-center">
            <!-- Left side: menu items -->
			<div>
				<a href="https://lithiumotc.com/"><img src="{{ $company->logo }}" alt="" class="w-[200px] inline-block"></a>
            </div>

            <div class="flex space-x-4">
                <a href="https://support.lithiumotc.com/" class="text-gray-700 hover:text-gray-900"><i class="fa-solid fa-phone"></i> Help Support</a>
                
            </div>
            <!-- Right side: logo -->
           
        </div>
    </nav>
	<div class="tradingview-widget-container">
		<div class="tradingview-widget-container__widget"></div>
	
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
	<div class="authincation fix-wrapper bg-primary-light min-h-screen flex py-[30px] items-center">
		<div class="container h-full">
			<div class="row justify-center h-full items-center">
				<div class="md:w-1/2">
					<div class="authincation-content bg-white dark:bg-[#182237] shadow-[0_0_2.1875rem_0_rgba(154,161,171,0.15)] rounded-md">
						<div class="row no-gutters">
							<div class="w-full">
								<div class="auth-form p-[3.125rem]">
									{{-- <div class="text-center mb-4">
										<a href="index.html"><img src="{{ $company->logo }}" alt="" class="w-[160px] inline-block"></a>
									</div> --}}
									<h2 class="text-center text-lg">CLIENT PORTAL</h2>
									<br>
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
										

										<div class="flex items-stretch flex-wrap relative w-full mb-4  input-info">
											<span class="input-group-text flex items-center justify-center py-1.5 px-3 text-sm font-normal border border-primary text-center whitespace-nowrap min-w-[3.125rem] bg-primary text-white rounded-s-md ml-[-1px]"><i class="fa-solid fa-envelope"></i></span>
                                            <input type="email" class="flex-1 w-[1%] relative text-[13px] h-[2.813rem] border border-primary dark:border-info block py-1.5 px-3 duration-500 focus:border-info outline-none rounded-e-md ml-[-1px]" name="email" placeholder="Email" required>
	
                                        </div>

										<div class="flex items-stretch flex-wrap relative w-full mb-4  input-info" >
											<span class="input-group-text flex items-center justify-center py-1.5 px-3 text-sm font-normal border border-primary text-center whitespace-nowrap min-w-[3.125rem] bg-primary text-white rounded-s-md ml-[-1px]"><i class="fa-solid fa-lock"></i></span>
                                            <input type="password" id="dz-password" class="flex-1 w-[1%] relative text-[13px] h-[2.813rem] border border-primary dark:border-info block py-1.5 px-3 duration-500 focus:border-info outline-none rounded-e-md ml-[-1px]" name="password" placeholder="Password" required>
	                                        <span class="show-pass eye absolute right-5 bottom-2.5 text-body-color text-sm">
                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                        
                                     
                                        {{-- <div class="form-row flex flex-wrap justify-between mb-2">
                                            <div class="form-group sm:mb-6 mb-1">
                                               
                                            </div>
                                            <div class="form-group ml-2">
                                                <a class="dark:text-white" href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                       --}}
										
										{{-- {{ env('NOCAPTCHA_SITEKEY') }} --}}
                                        <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}" data-callback="onCaptchaCompleted" ></div>

                                         <br>
                                        <div class="text-center">
                                            <button type="submit" id="submitButton" class="block w-full rounded font-bold h-[3.125rem] text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300" disabled>Sign In</button>
                                        </div>
                                    </form> 
									<div class="new-account mt-4">
										<p class="mb-4">Don't have an account? <a class="text-primary" href="/signup">Register</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<footer class="bg-white shadow-md py-4">
		<div class=" mx-auto text-center">
			<p class="text-gray-700">&copy; 2024 {{ $company->name }}. All rights reserved.</p>
		</div>
	</footer>
	
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
