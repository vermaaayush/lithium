@php
    
    use App\Models\Config;
    $company = Config::where('id', 1)->first(); 
   
@endphp
@extends('user.layout.main')
@section('title', 'Dashboard')
@section('main-container')
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

@if($u_info->add_status == 0 || $u_info->id_status== 0 || $u_info->id_status== 1 || $u_info->add_status== 1)
<div style="width:98%;margin:auto" class="alert py-3 px-5 mb-4 lg:text-lg text-lg rounded-md relative border border-transparent text-primary bg-primary-light">
	<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
	<strong>KYC!</strong> You’re ready to start trading soon! Help us safeguard your account by verifying your personal information.
	<a href="/authentication"><button type="button" class="remove-btn absolute right-0 py-5 px-4 top-[-5px] opacity-50 z-[2] dark:text-primary"><span><i class="fa-solid fa-arrow-right"></i></span>
	</button></a>
</div>
@endif

<div class="row">
	
	<div class="xl:w-3/4 col-xxl-12">
		<div class="row">
			<div class="w-full">
				<div class="row">  
					<div class="xl:w-1/2">
						<div class="row">
							<div class="sm:w-1/2">
								<div class="card bg-primary text-white">
									<div class="card-header flex justify-between sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
										<div class="revenue-date">
											<span class="text-sm">Total Balance</span>
											<h4 class="text-white text-2xl font-semibold" id="x_balance"></h4>
										</div>
										<div class="avatar-list avatar-list-stacked me-2">
											<span class="bg-white text-black justify-center text-xs inline-flex leading-[1.975rem] w-[2.375rem] h-[2.375rem] me-[-13px] rounded-full border-2 border-white dark:border-[#182237] relative object-cover duration-300 hover:z-[1]">
												<a href="/deposite_funds">
													<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M5.83333 6.27083V1.60417C5.83333 0.959834 6.35567 0.4375 7 0.4375C7.64433 0.4375 8.16667 0.959834 8.16667 1.60417V6.27083H12.8333C13.4777 6.27083 14 6.79317 14 7.4375C14 8.08183 13.4777 8.60417 12.8333 8.60417H8.16667V13.2708C8.16667 13.9152 7.64433 14.4375 7 14.4375C6.35567 14.4375 5.83333 13.9152 5.83333 13.2708V8.60417H1.16667C0.522334 8.60417 0 8.08183 0 7.4375C0 6.79317 0.522334 6.27083 1.16667 6.27083H5.83333Z" fill="#222B40"/>
													</svg>
												</a>
											</span>
										</div>
										
									</div>
									<div class="card-body sm:p-5 p-4 sm:pb-0 pb-0 flex flex-auto items-center custome-tooltip">
										
										<div>
											<img src="{{ asset('user_assets/g1.png') }}" width="200" alt="">
										</div>
									</div>
								</div>
							</div>
							<div class="sm:w-1/2">
								<div class="card bg-secondary text-white">
									<div class="card-header flex justify-between sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
										<div class="revenue-date">
											<span class="text-sm text-dark">Total Deposit</span>
											<h4 class="text-dark text-2xl font-semibold" id="x_deposite"></h4>
										</div>
										<div class="avatar-list avatar-list-stacked me-2">
											{{-- <span class="bg-white text-black justify-center text-xs inline-flex leading-[1.975rem] w-[2.375rem] h-[2.375rem] me-[-13px] rounded-full border-2 border-white dark:border-[#182237] relative object-cover duration-300 hover:z-[1]">
												<a href="#">
													<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M5.83333 6.27083V1.60417C5.83333 0.959834 6.35567 0.4375 7 0.4375C7.64433 0.4375 8.16667 0.959834 8.16667 1.60417V6.27083H12.8333C13.4777 6.27083 14 6.79317 14 7.4375C14 8.08183 13.4777 8.60417 12.8333 8.60417H8.16667V13.2708C8.16667 13.9152 7.64433 14.4375 7 14.4375C6.35567 14.4375 5.83333 13.9152 5.83333 13.2708V8.60417H1.16667C0.522334 8.60417 0 8.08183 0 7.4375C0 6.79317 0.522334 6.27083 1.16667 6.27083H5.83333Z" fill="#222B40"/>
													</svg>
												</a>
											</span> --}}
										</div>
										
									</div>
									<div class="card-body sm:p-5 p-4 sm:pb-0 pb-0 flex flex-auto items-center custome-tooltip">
										<div>
											<img src="{{ asset('user_assets/g2.png') }}" width="200" alt="">
										</div>
									</div>
								</div>
							</div>
						     
							<div class="sm:w-1/2">
								<div class="card chart-grd same-card overflow-hidden relative">
									<div class="card-body depostit-card p-0">
										<div class="depostit-card-media flex justify-between px-5 pt-[18px] relative z-[1]">
											<div>
												<h6 class="font-normal">Total Investment</h6>
												<h3 class="font-semibold leading-[1.346]" id="x_funded"></h3>
											</div>
											<div class="icon-box bg-primary text-white h-[2.5rem] w-[2.5rem] relative flex items-center justify-center rounded-md">
												<svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M11.4642 13.7074C11.4759 12.1252 10.8504 10.8738 9.60279 9.99009C8.6392 9.30968 7.46984 8.95476 6.33882 8.6137C3.98274 7.89943 3.29927 7.52321 3.29927 6.3965C3.29927 5.14147 4.93028 4.69493 6.32655 4.69493C7.34341 4.69493 8.51331 5.01109 9.23985 5.47964L10.6802 3.24887C9.73069 2.6333 8.43112 2.21342 7.14783 2.0831V0H4.49076V2.22918C2.12884 2.74876 0.640949 4.29246 0.640949 6.3965C0.640949 7.87005 1.25327 9.03865 2.45745 9.86289C3.37331 10.4921 4.49028 10.83 5.56927 11.1572C7.88027 11.8557 8.81873 12.2813 8.80805 13.691L8.80799 13.7014C8.80799 14.8845 7.24005 15.3051 5.89676 15.3051C4.62786 15.3051 3.248 14.749 2.46582 13.9222L0.535522 15.7481C1.52607 16.7957 2.96523 17.5364 4.4907 17.8267V20.0001H7.14783V17.8735C9.7724 17.4978 11.4616 15.9177 11.4642 13.7074Z" fill="#fff"/>
												</svg>
											</div>
										</div>
										<div id="NewExperience2"></div>
									</div>
								</div>
							</div>
							<div class="sm:w-1/2">
								<div class="card chart-grd same-card overflow-hidden relative">
									<div class="card-body depostit-card p-0">
										<div class="depostit-card-media flex justify-between px-5 pt-[18px] relative z-[1]">
											<div>
												<h6 class="font-normal">Total Earning</h6>
												<h3 class="font-semibold leading-[1.346]" id="x_earning"></h3>
											</div>
											<div class="icon-box bg-primary text-white h-[2.5rem] w-[2.5rem] relative flex items-center justify-center rounded-md">
												<svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M11.4642 13.7074C11.4759 12.1252 10.8504 10.8738 9.60279 9.99009C8.6392 9.30968 7.46984 8.95476 6.33882 8.6137C3.98274 7.89943 3.29927 7.52321 3.29927 6.3965C3.29927 5.14147 4.93028 4.69493 6.32655 4.69493C7.34341 4.69493 8.51331 5.01109 9.23985 5.47964L10.6802 3.24887C9.73069 2.6333 8.43112 2.21342 7.14783 2.0831V0H4.49076V2.22918C2.12884 2.74876 0.640949 4.29246 0.640949 6.3965C0.640949 7.87005 1.25327 9.03865 2.45745 9.86289C3.37331 10.4921 4.49028 10.83 5.56927 11.1572C7.88027 11.8557 8.81873 12.2813 8.80805 13.691L8.80799 13.7014C8.80799 14.8845 7.24005 15.3051 5.89676 15.3051C4.62786 15.3051 3.248 14.749 2.46582 13.9222L0.535522 15.7481C1.52607 16.7957 2.96523 17.5364 4.4907 17.8267V20.0001H7.14783V17.8735C9.7724 17.4978 11.4616 15.9177 11.4642 13.7074Z" fill="#fff"/>
												</svg>
											</div>
										</div>
										<div id="NewExperience"></div>
									</div>
								</div>
							</div>

							

							
						</div>	
					</div>
					<div class="xl:w-1/4 sm:w-1/2 w-full">
						<div class="card bg-success rainbow-box relative z-[1] flex flex-col" style="background-image: url({{ asset('user_assets/assets/images/rainbow.gif') }});background-size: cover;background-blend-mode: luminosity;">
							<div class="card-header flex justify-between sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
								<img src="{{ asset('user_assets/13.png') }}" width="80" alt="">
							</div>
							<div class="sm:p-5 p-4 sm:pt-0 pt-0 flex-auto">
								<div class="finance"> 

									<h4 class="text-white max-xl:text-xl text-2xl mb-2 leading-[1.5]">Begin Your Journey To A Funded Account</h4>
									<p class="text-white mb-4">
										Trade with our company's capital and get 80% of the profits.
									</p>
								</div>
								<div class="flex pt-4"> 
									
								</div>
							</div>
						</div>
					</div>
					<div class="xl:w-1/4 sm:w-1/2 w-full">
						<div class="card">
							<div class="sm:p-5 p-4">
								<div class="relative">
									<div id="redial">
									</div>
									<span class="right-sign absolute bottom-[-40px] left-[50%] translate-x-[-50%] z-[1]"> 
										<svg width="93" height="93" viewBox="0 0 93 93" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g filter="url(#filter0_d_3_700)">
											<circle cx="46.5" cy="31.5" r="16.5" fill="#F8B940"/>
											</g>
											<g clip-path="url(#clip0_3_700)">
											<path d="M52.738 25.3524C53.0957 24.9315 53.7268 24.8804 54.1476 25.2381C54.5684 25.5957 54.6196 26.2268 54.2619 26.6476L45.7619 36.6476C45.3986 37.0751 44.7549 37.1201 44.3356 36.7474L39.8356 32.7474C39.4228 32.3805 39.3857 31.7484 39.7526 31.3356C40.1195 30.9229 40.7516 30.8857 41.1643 31.2526L44.9002 34.5733L52.738 25.3524Z" fill="#222B40"/>
											</g>
											<defs>
											<filter id="filter0_d_3_700" x="0" y="0" width="93" height="93" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
											<feFlood flood-opacity="0" result="BackgroundImageFix"/>
											<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
											<feOffset dy="15"/>
											<feGaussianBlur stdDeviation="15"/>
											<feComposite in2="hardAlpha" operator="out"/>
											<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0"/>
											<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_3_700"/>
											<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_3_700" result="shape"/>
											</filter>
											<clipPath id="clip0_3_700">
											<rect width="24" height="24" fill="white" transform="translate(35 19)"/>
											</clipPath>
											</defs>
										</svg>
									</span>
								</div>
								<div class="redia-date text-center mt-[15px]">
									<h4 class="text-xl font-semibold mb-2">My Progress</h4>
									<p class="mb-4">
										Return On Total Investment
									</p>
									<a href="#" class="inline-block rounded font-medium xl:text-[15px] text-xs leading-5 xl:py-[0.719rem] xl:px-[1.375rem] py-2.5 px-4 border border-secondary text-dark bg-secondary">200%</a>
								</div>
							</div>

						</div>
					</div>
					<div class="xl:w-2/3 w-full">
						<div class="card">
							<div class="card-body p-0">
								<div class="overflow-x-auto active-projects task-table">
									<div class="flex justify-between sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
										<h4 class="text-base">Top Performer</h4>
									</div>
									<table  class="table mb-4 w-full market-update" id="x_plans">
										<thead>
											<tr>
												<th class="text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Program Name</th>
											
												<th class="text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">ROI</th>
												<th class="text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Minimum</th>
												<th class="text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Total Invested</th>

												<th class="text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Action</th>
											</tr>
										</thead>
										<tbody>
											
										  
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="xl:w-1/3 w-full">
						<div class="card">
							<div class="card-header flex justify-between sm:pt-6 pb-4 py-5 sm:px-5 px-4 items-center relative flex-wrap">
								<div>
									<h4 class="text-base">Portfolio</h4>
									<span class="text-sm text-body-color">My Investments</span>
								</div>	
							</div>
							<div class="pb-4">
								<ul class="overflow-y-scroll overflow-x-hidden h-[325px] dz-scroll" id="my_invest">
									
									
								</ul>
							</div>
						</div>
					</div>

					<div class="xl:w-1/2 col-xxl-12">
						<div class="card">
							<div class="card-body p-0">
								<div class="overflow-x-auto active-projects">
									<div class="sm:p-5 p-4">
										<h4 class="text-base" style="float: left">Last 10 Transaction</h4>

										<a href="/history" style="float: right" ><button type="button" class="mr-1 mb-2 inline-block rounded font-medium py-[5px] px-[15px] text-[13px] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-sm">View All</button></a>

									</div>
									<table id="projects-tbl" class="table">
										<thead>
											<tr>
												<th class="bg-primary-light text-[13px] py-2.5 px-5 text-primary capitalize font-medium bg-none whitespace-nowrap text-left">TXID</th>
												<th class="bg-primary-light text-[13px] py-2.5 px-5 text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Subject</th>
												<th class="bg-primary-light text-[13px] py-2.5 px-5 text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Description</th>
												<th class="bg-primary-light text-[13px] py-2.5 px-5 text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Amount</th>
												<th class="bg-primary-light text-[13px] py-2.5 px-5 text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Status</th>
												<th class="bg-primary-light text-[13px] py-2.5 px-5 text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Date / Time</th>
											</tr>
										</thead>
										<tbody>
											
											
										</tbody>
										
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
	
	
</div>
<script src="{{ asset('user_assets/assets/vendor/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('user_assets/assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('user_assets/assets/vendor/chart.js/chart.bundle.min.js') }}"></script>
<script src="{{ asset('user_assets/assets/vendor/apexchart/apexchart.js') }}"></script>


<script src="{{ asset('user_assets/assets/js/dashboard/dashboard-1.js') }}"></script>
<script src="{{ asset('user_assets/assets/vendor/draggable/draggable.js') }}"></script>
<script src="{{ asset('user_assets/assets/vendor/swiper/js/swiper-bundle.min.js') }}"></script>




	<script>
		const appUrl = '{{ env('APP_URL') }}';

		const formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
});
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
	
					const x_pansdiv = document.getElementById('x_plans');
					const x_panswithBody = x_pansdiv.getElementsByTagName('tbody')[0];
	                x_panswithBody.innerHTML = ''; 
					data.plans.forEach(plan => {
					const newRow = `
					

					                <tr>
                                        
                                        <td class="border-b border-b-color dark:border-[#ffffff1a] py-2.5 pl-4 whitespace-nowrap text-left">
                                            <div class="flex items-center">
                                                <img src="${plan.image}" class="inline-block w-9 min-w-[36px] h-9 rounded-md relative object-cover" alt="">
                                                <div class="ml-2 dr-data">
                                                    <h6 class="text-sm">${plan.plan_id}</h6>
                                                    <span class="text-body-color dark:text-white text-[13px]">ID: ${plan.id}</span>
                                                </div>  
                                            </div>
                                        </td>

                                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-2.5 px-5 font-normal whitespace-nowrap text-success"><i class="fa-solid fa-arrow-trend-up me-1"></i> ${plan.roi}%</td>
                                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-2.5 px-5 font-normal whitespace-nowrap text-body-color">${formatter.format(plan.minimum_amount)}</td>
  
                                      
                                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] py-2.5 px-5 whitespace-nowrap"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] text-success bg-success-light dark:text-white dark:bg-[#3a9b941a]">Active</span></td>
                                       
                                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-2.5 px-5 font-normal whitespace-nowrap text-body-color"><a class="mr-1 mb-2 inline-block rounded font-medium py-[5px] px-[15px] text-[13px] border border-secondary text-white bg-secondary hover:bg-hover-secondary hover:border-hover-secondary duration-300 btn-sm" href="/v_plan/${plan.id}">View</a>
                                       
                                        <a class="mr-1 mb-2 inline-block rounded font-medium py-[5px] px-[15px] text-[13px] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-sm" href="/trade_now/${plan.id}">Invest Now</a>
                                   
                                        </td>

                                    </tr>
					`;
					x_panswithBody.insertAdjacentHTML('beforeend', newRow);
				});
	
	

				const topinvestor = document.getElementById('projects-tbl');
				const topinvestorBody = topinvestor.getElementsByTagName('tbody')[0];
				topinvestorBody.innerHTML = ''; // Clear existing table rows
	
				data.transaction.forEach(transaction => {
					const newRow = `
					
					<tr>
												<td class="border-b border-b-color text-[13px] font-normal py-2.5 pl-4 pr-0 whitespace-nowrap">#${transaction.id}</td>
												<td class="border-b border-b-color text-[13px] font-normal py-2.5 px-5 whitespace-nowrap text-body-color">
													<div class="flex items-center">
														
														<p class="ml-2 dark:text-white text-[13px]">${transaction.subject}</p>	
													</div>
												</td>
												<td class="border-b border-b-color text-[13px] py-2.5 pl-4 pr-0 font-normal">
													<div class="flex items-center">
														<p class="ml-2 dark:text-white text-[13px]">${transaction.name}</p>
													</div>
												</td>
												<td class="border-b border-b-color text-[13px] py-2.5 pl-4 pr-0 font-normal">
													<p class="ml-2 dark:text-white text-[13px]">${formatter.format(transaction.amount)}</p>
												</td>
												<td class="border-b border-b-color text-[13px] py-2.5 pl-4 pr-0 font-normal">
													${transaction.status == 'Credit' ? 
                               ' <span class="bg-success-light text-success text-xs py-[5px] px-3 rounded leading-[1.5]">Credit</span> '
                                : 
                                '<span class="bg-danger-light text-danger text-xs py-[5px] px-3 rounded leading-[1.5]">Debit</span>'
                            }
	
												</td>
												<td class="border-b border-b-color text-[13px] font-normal py-2.5 px-5 whitespace-nowrap text-body-color">
													<p class="ml-2 dark:text-white text-[13px]">${new Date(transaction.created_at).toLocaleString('en-US', { year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric'})}</p>
												</td>
											</tr>
											
					`;
					topinvestorBody.insertAdjacentHTML('beforeend', newRow);
				});
				
	
		
			})
	
			
			.catch(error => console.error('Error fetching data:', error));
	</script>

<script>
document.addEventListener('DOMContentLoaded', async () => {
const apiUrl = appUrl+'/api_portfolio';
const tbody = document.querySelector('#my_invest');

// Define a function to fetch and update data
const fetchDataAndUpdate = async () => {
try {
const response = await fetch(apiUrl);
const data = await response.json();
// console.log(data);
tbody.innerHTML = '';

data.investments.forEach(async (investment) => {
const {cp_value, stock_value, t_investment, plan_name, investment_id, img } = investment;



// Create table row
let newRowHTML = `
<li class="flex px-5 mb-3">
										<div class="country-flag">
										  <img src="${img}" alt="" class="inline-block w-10">
										</div>
										<div class="flex flex-wrap items-center justify-between w-full">
										  <div class="ml-2">
											<h6 class="mb-0">${plan_name}</h6>
											<small class="text-body-color">${formatter.format(t_investment)}</small>
										  </div>
											<span class="inline-block font-medium leading-[1.5] rounded text-xs py-[5px] px-3 text-white bg-success ml-2">${formatter.format(cp_value)}<i class="fa-solid fa-chevron-up ml-2 text-white"></i></span>
										</div>
									</li>
`;




// Append row to table
tbody.insertAdjacentHTML('beforeend', newRowHTML);
});
} catch (error) {
console.error('Error fetching or updating data:', error);
}
};

// Call fetchDataAndUpdate initially
fetchDataAndUpdate();

// Call fetchDataAndUpdate every 2 seconds (2000 milliseconds)
setInterval(fetchDataAndUpdate, 3000);
});

</script>
@endsection