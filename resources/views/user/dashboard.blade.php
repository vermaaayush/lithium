@extends('user.layout.main')
@section('title', 'Dashboard')
@section('main-container')

                      
                            <div class="accordion accordion-danger-solid accordion-wrapper">
                               
                                <div class="accordion-item mb-5">
                                    <div class="accordion-header dark:text-white bg-danger-light dark:bg-[#ff5e5e26] text-black py-[0.7rem] px-3 border border-transparent rounded-md relative cursor-pointer text-sm duration-500 accordion-btn" data-dz-item="collapseTwo1">
                                        <span class="accordion-header-icon"></span>
                                        <span class="accordion-header-text">Accordion Header Two</span>
                                        <span class="accordion-header-indicator"></span>
                                    </div>
                                    <div id="collapseTwo1" class="accordion-content border-2 border-danger border-t-0 rounded-es-md rounded-ee-md hide">
                                        <div class="accordion-body-text py-3.5 px-3 sm:text-sm text-xs text-body-color">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
							<div class="w-full">
								<div class="row">  
									<div class="xl:w-1/2">
										<div class="row">
											<div class="sm:w-1/2">
												<div class="card bg-primary text-white">
													<div class="card-header flex justify-between sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
														<div class="revenue-date">
															<span class="text-sm">Wallet Balance</span>
															<h4 class="text-white text-2xl font-semibold">$ {{ session('s_user')['balance'] }}</h4>
														</div>
                                                        <div class="avatar-list avatar-list-stacked me-2">
															<span class="bg-white text-black justify-center text-xs inline-flex leading-[1.975rem] w-[2.375rem] h-[2.375rem] me-[-13px] rounded-full border-2 border-white dark:border-[#182237] relative object-cover duration-300 hover:z-[1]">
																<a href="#">
																	<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" clip-rule="evenodd" d="M5.83333 6.27083V1.60417C5.83333 0.959834 6.35567 0.4375 7 0.4375C7.64433 0.4375 8.16667 0.959834 8.16667 1.60417V6.27083H12.8333C13.4777 6.27083 14 6.79317 14 7.4375C14 8.08183 13.4777 8.60417 12.8333 8.60417H8.16667V13.2708C8.16667 13.9152 7.64433 14.4375 7 14.4375C6.35567 14.4375 5.83333 13.9152 5.83333 13.2708V8.60417H1.16667C0.522334 8.60417 0 8.08183 0 7.4375C0 6.79317 0.522334 6.27083 1.16667 6.27083H5.83333Z" fill="#222B40"/>
																	</svg>
																</a>
															</span>
														</div>
														
														
													</div>
													<div class="card-body sm:p-5 p-4 sm:pb-0 pb-0 flex flex-auto items-center custome-tooltip">
														<div id="chartBar" class="chartBar -mt-10 ml-[-21px]"></div>
														<div>
															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																<circle cx="10" cy="10" r="10" fill="white"/>
																<g clip-path="url(#clip0_3_443)">
																<path opacity="0.3" d="M13.0641 7.54535C13.3245 7.285 13.3245 6.86289 13.0641 6.60254C12.8038 6.34219 12.3817 6.34219 12.1213 6.60254L6.46445 12.2594C6.2041 12.5197 6.2041 12.9419 6.46445 13.2022C6.7248 13.4626 7.14691 13.4626 7.40726 13.2022L13.0641 7.54535Z" fill="black"/>
																<path d="M7.40729 7.26921C7.0391 7.26921 6.74062 6.97073 6.74062 6.60254C6.74062 6.23435 7.0391 5.93587 7.40729 5.93587H13.0641C13.4211 5.93587 13.7147 6.21699 13.7302 6.57358L13.9659 11.9947C13.9819 12.3626 13.6966 12.6737 13.3288 12.6897C12.961 12.7057 12.6498 12.4205 12.6338 12.0526L12.4258 7.26921H7.40729Z" fill="black"/>
																</g>
																<defs>
																<clipPath id="clip0_3_443">
																<rect width="16" height="16" fill="white" transform="matrix(-1 0 0 -1 18 18)"/>
																</clipPath>
																</defs>
															</svg>
														
														</div>
													</div>
												</div>
											</div>
											<div class="sm:w-1/2">
												<div class="card bg-secondary text-white">
													<div class="card-header flex justify-between sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
														<div class="revenue-date">
															<span class="text-sm text-dark">Total Deposite</span>
															<h4 class="text-dark text-2xl font-semibold">$ {{ session('s_user')['total_deposite'] }}</h4>
														</div>
														
														
													</div>
													<div class="card-body sm:p-5 p-4 sm:pb-0 pb-0 flex flex-auto items-center custome-tooltip">
														<div id="expensesChart" class="chartBar -mt-10 ml-[-21px]"></div>
														<div>
															<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																<circle cx="10" cy="10" r="10" fill="#222B40"/>
																<g clip-path="url(#clip0_3_473)">
																<path opacity="0.3" d="M13.0641 7.54535C13.3245 7.285 13.3245 6.86289 13.0641 6.60254C12.8038 6.34219 12.3817 6.34219 12.1213 6.60254L6.46446 12.2594C6.20411 12.5197 6.20411 12.9419 6.46446 13.2022C6.72481 13.4626 7.14692 13.4626 7.40727 13.2022L13.0641 7.54535Z" fill="white"/>
																<path d="M7.40728 7.26921C7.03909 7.26921 6.74061 6.97073 6.74061 6.60254C6.74061 6.23435 7.03909 5.93587 7.40728 5.93587H13.0641C13.4211 5.93587 13.7147 6.21699 13.7302 6.57358L13.9659 11.9947C13.9819 12.3626 13.6966 12.6737 13.3288 12.6897C12.9609 12.7057 12.6498 12.4205 12.6338 12.0526L12.4258 7.26921H7.40728Z" fill="white"/>
																</g>
																<defs>
																<clipPath id="clip0_3_473">
																<rect width="16" height="16" fill="white" transform="matrix(-1 0 0 -1 18 18)"/>
																</clipPath>
																</defs>
															</svg>
															
														</div>
													</div>
												</div>
											</div>
											<div class="sm:w-1/2">
												<div class="card">
													<div class="card-body depostit-card p-5">
														<div class="depostit-card-media flex justify-between relative z-[2]">
															<div>
																<h6 class="font-normal">Tasks Not Finisheds</h6>
																<h3 class="font-semibold leading-[1.346]">20</h3>
															</div>
															<div class="icon-box bg-secondary h-[2.5rem] w-[2.5rem] relative flex items-center justify-center rounded-md">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<g clip-path="url(#clip0_3_566)">
																	<path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M8 3V3.5C8 4.32843 8.67157 5 9.5 5H14.5C15.3284 5 16 4.32843 16 3.5V3H18C19.1046 3 20 3.89543 20 5V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V5C4 3.89543 4.89543 3 6 3H8Z" fill="#222B40"/>
																	<path fill-rule="evenodd" clip-rule="evenodd" d="M10.875 15.75C10.6354 15.75 10.3958 15.6542 10.2042 15.4625L8.2875 13.5458C7.90417 13.1625 7.90417 12.5875 8.2875 12.2042C8.67083 11.8208 9.29375 11.8208 9.62917 12.2042L10.875 13.45L14.0375 10.2875C14.4208 9.90417 14.9958 9.90417 15.3792 10.2875C15.7625 10.6708 15.7625 11.2458 15.3792 11.6292L11.5458 15.4625C11.3542 15.6542 11.1146 15.75 10.875 15.75Z" fill="#222B40"/>
																	<path fill-rule="evenodd" clip-rule="evenodd" d="M11 2C11 1.44772 11.4477 1 12 1C12.5523 1 13 1.44772 13 2H14.5C14.7761 2 15 2.22386 15 2.5V3.5C15 3.77614 14.7761 4 14.5 4H9.5C9.22386 4 9 3.77614 9 3.5V2.5C9 2.22386 9.22386 2 9.5 2H11Z" fill="#222B40"/>
																	</g>
																	<defs>
																	<clipPath id="clip0_3_566">
																	<rect width="24" height="24" fill="white"/>
																	</clipPath>
																	</defs>
																</svg>
															</div>
														</div>
														<div class="progress-box mt-0">
															<div class="flex justify-between">
																<p class="mb-0">Complete Task</p>
																<p class="mb-0">20/28</p>
															</div>
															<div class="progress h-[5px] flex overflow-hidden rounded-md">
																<div class="progress-bar bg-secondary" style="width:50%; height:5px; border-radius:4px;" role="progressbar"></div>
															</div>
														</div>
													</div>
												</div>	
											</div>
											<div class="sm:w-1/2">
												<div class="card chart-grd same-card overflow-hidden relative">
													<div class="card-body depostit-card p-0">
														<div class="depostit-card-media flex justify-between px-5 pt-[18px] relative z-[1]">
															<div>
																<h6 class="font-normal">Total Deposit</h6>
																<h3 class="font-semibold leading-[1.346]">$1200.00</h3>
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
										<div class="card bg-success rainbow-box relative z-[1] flex flex-col" style="background-image: url(assets/images/rainbow.gif);background-size: cover;background-blend-mode: luminosity;">
											<div class="card-header flex justify-between sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
												<svg width="43" height="40" viewBox="0 0 43 40" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M41.605 3.94728L34.9548 0.107383C34.7065 -0.0357944 34.4007 -0.0357944 34.1525 0.107383C26.172 4.71641 16.338 4.71713 8.35679 0.108821L8.35391 0.107383C8.10569 -0.0357944 7.7999 -0.0357944 7.55168 0.107383L0.901472 3.94656C0.65325 4.08974 0.5 4.35451 0.5 4.64159V12.3207C0.5 12.6077 0.65325 12.8725 0.901472 13.0157C8.88345 17.6225 13.8004 26.1384 13.8004 35.355V35.3579C13.8004 35.6442 13.9537 35.9097 14.2019 36.0529L20.8521 39.8928C20.9766 39.9647 21.1147 40 21.2536 40C21.3924 40 21.5306 39.964 21.655 39.8928L28.3053 36.0529C28.5535 35.9097 28.7067 35.645 28.7067 35.3579C28.706 26.1413 33.623 17.6247 41.605 13.0164L41.6064 13.0157C41.8546 12.8725 42.0079 12.6077 42.0079 12.3207V4.6423C42.0057 4.35523 41.8532 4.09046 41.605 3.94728ZM40.4013 11.858L20.8514 23.1453C20.6032 23.2885 20.4499 23.5533 20.4499 23.8403V29.8891C19.8168 30.2013 19.3923 30.8712 19.439 31.6345C19.4944 32.5325 20.2139 33.2627 21.1118 33.3304C22.1788 33.4109 23.0696 32.5684 23.0696 31.5187C23.0696 30.8035 22.6559 30.1848 22.0551 29.8883C22.0551 26.4319 23.8991 23.2381 26.8922 21.5099L27.0994 21.3905L27.1001 34.8952L21.2521 38.2718L15.4042 34.8952V12.3214C15.4042 12.035 15.2509 11.7695 15.0027 11.6264L9.76338 8.60163C9.76626 8.56206 9.7677 8.52249 9.7677 8.4822C9.7677 7.45549 8.91583 6.62736 7.88049 6.66694C6.93868 6.70291 6.17171 7.46988 6.13573 8.41169C6.09616 9.44703 6.92429 10.2996 7.951 10.2996C8.32513 10.2996 8.67264 10.1867 8.96115 9.99312C11.9542 11.7213 13.7983 14.9151 13.7983 18.3715V18.6097L2.10229 11.8587V5.10637L7.95028 1.72982L27.5002 13.0171C27.7484 13.1603 28.0542 13.1603 28.3024 13.0171L33.541 9.9924C33.8324 10.1881 34.1842 10.3011 34.5619 10.2989C35.5526 10.2931 36.3664 9.47581 36.3678 8.48508C36.3693 7.47996 35.5555 6.66549 34.5511 6.66549C33.5474 6.66549 32.7344 7.47923 32.7344 8.4822C32.7344 8.52249 32.7359 8.56206 32.7387 8.60163C29.745 10.3298 26.0569 10.3298 23.0631 8.60163L22.8573 8.48292L34.5511 1.72982L40.3991 5.10637V11.858H40.4013Z" fill="white"/>
												</svg>
											</div>
											<div class="sm:p-5 p-4 sm:pt-0 pt-0 flex-auto">
												<div class="finance"> 
													<h4 class="text-white max-xl:text-xl text-2xl mb-2 leading-[1.5]">Your Finances, safe and Secure</h4>
													<p class="text-white mb-4">
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
													</p>
												</div>
												<div class="flex pt-4"> 
													<div class="avatar-list avatar-list-stacked">
														<img src="{{ asset('user_assets/assets/images/contacts/pic555.jpg')}}" class="inline-block w-[2.375rem] h-[2.375rem] me-[-13px] rounded-full border-2 border-white dark:border-[#182237] relative object-cover duration-300 hover:z-[1]" alt="">
														<img src="{{ asset('user_assets/assets/images/contacts/pic666.jpg')}}" class="inline-block w-[2.375rem] h-[2.375rem] me-[-13px] rounded-full border-2 border-white dark:border-[#182237] relative object-cover duration-300 hover:z-[1]" alt="">
														<img src="{{ asset('user_assets/assets/images/contacts/pic777.jpg')}}" class="inline-block w-[2.375rem] h-[2.375rem] me-[-13px] rounded-full border-2 border-white dark:border-[#182237] relative object-cover duration-300 hover:z-[1]" alt="">
													</div>
													<div class="ratting-data ml-5">
														<h4 class="text-base text-white font-semibold">15k+</h4>
														<span class="text-xs text-white">Happy Clients</span>
													</div>
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
														Lorem ipsum dolor sit amet, consectetur
													</p>
													<a href="crm.html" class="inline-block rounded font-medium xl:text-[15px] text-xs leading-5 xl:py-[0.719rem] xl:px-[1.375rem] py-2.5 px-4 border border-secondary text-dark bg-secondary">More Details</a>
												</div>
											</div>

										</div>
									</div>
									<div class="xl:w-2/3 w-full">
										<div class="card overflow-hidden flex flex-col">
											<div class="card-header text-center flex justify-between sm:pt-6 pt-5 sm:px-5 px-4 items-center relative flex-wrap">
												<h4 class="text-base">Projects Overview</h4>
												<ul class="nav nav-pills mix-chart-tab flex flex-wrap max-sm:mt-2.5 dz-tab-area" id="pills-tab" role="tablist">
													<li class="nav-item" role="presentation">
													  <button class="nav-link mx-1 bg-[#F2F2F2] rounded py-[5px] px-[15px] text-[13px] text-primary duration-500 tab-btn active" data-tab="tab-Week" data-series="week" id="pills-week-tab">Week</button>
													</li>
													<li class="nav-item" role="presentation">
													  <button class="nav-link mx-1 bg-[#F2F2F2] rounded py-[5px] px-[15px] text-[13px] text-primary duration-500 tab-btn" data-tab="tab-Month"  data-series="month" id="pills-month-tab">Month</button>
													</li>
													<li class="nav-item" role="presentation">
													  <button class="nav-link mx-1 bg-[#F2F2F2] rounded py-[5px] px-[15px] text-[13px] text-primary duration-500 tab-btn" data-tab="tab-Year" data-series="year" id="pills-year-tab">Year</button>
													</li>
													 <li class="nav-item" role="presentation">
													  <button class="nav-link mx-1 bg-[#F2F2F2] rounded py-[5px] px-[15px] text-[13px] text-primary duration-500 tab-btn" data-tab="tab-All" data-series="all" id="pills-all-tab">All</button>
													</li>
												  </ul>
											</div>
											<div class="card-body relative custome-tooltip">
												<div id="overiewChart"></div>
												<div class="ttl-project flex justify-around py-[15px] text-center border-t border-[#E6E6E6] dark:border-[#ffffff1a] overflow-hidden max-sm:hidden">
													<div class="pr-data relative">
														<h5>12,721</h5>
														<span class="text-sm text-body-color">Number of Projects</span>
													</div>
													<div class="relative pr-data">
														<h5 class="text-primary">721</h5>
														<span class="text-sm text-body-color">Active Projects</span>
													</div>
													<div class="pr-data relative">
														<h5>$2,50,523</h5>
														<span class="text-sm text-body-color">Revenue</span>
													</div>
													<div class="pr-data after:hidden">
														<h5 class="text-success">12,275h</h5>
														<span class="text-sm text-body-color">Working Hours</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>			
					
	



@endsection