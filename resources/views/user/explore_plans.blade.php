@extends('user.layout.main')
@section('title', 'Explore Plans    ')
@section('main-container')
<div class="">
    <div class="row">
        <div class="w-full">
            <div class="card">
                <div class="card-header flex justify-between px-5 pt-6 mb-4 relative z-[2] pb-0">
                    <h3 class="card-title  capitalize">All Investment Plans</h3>
                </div> 
                <div class="card-body p-0">
                    <div class="overflow-x-auto active-projects task-table">
                       
                        <table  class="table mb-4 w-full market-update">
                            <thead>
                                <tr>
                                    <th class="text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Program Name</th>

                                    <th class="text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">ROI</th>
                                    <th class="text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Timeline</th>

                                    <th class="text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Budget (Minimum)</th>
                                    <th class="text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Total Invested</th>
                                    <th class="text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Status</th>
                                    <th class="text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                <a href="#">
                                    <tr>
                                        
                                        <td class="border-b border-b-color dark:border-[#ffffff1a] py-2.5 pl-4 whitespace-nowrap text-left">
                                            <div class="flex items-center">
                                                <img src="{{ $data->image }}" class="inline-block w-9 min-w-[36px] h-9 rounded-md relative object-cover" alt="">
                                                <div class="ml-2 dr-data">
                                                    <h6 class="text-sm">{{ $data->name }}</h6>
                                                    <span class="text-body-color dark:text-white text-[13px]">ID: {{ $data->plan_id }}</span>
                                                </div>  
                                            </div>
                                        </td>
                                        
                                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-2.5 px-5 font-normal whitespace-nowrap text-success"><i class="fa-solid fa-arrow-trend-up me-1"></i> {{ $data->roi }}%</td>
                                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-2.5 px-5 font-normal whitespace-nowrap text-body-color">{{ $data->duration }} Days</td>
                                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-2.5 px-5 font-normal whitespace-nowrap text-body-color">${{ number_format($data->minimum_amount) }}</td>
                                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-2.5 px-5 font-normal whitespace-nowrap text-body-color">${{ number_format($data->total_invested) }}
                                           
                                        </td>
                                        @if ($data->status=="Active")
                                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] py-2.5 px-5 whitespace-nowrap"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] text-success bg-success-light dark:text-white dark:bg-[#3a9b941a]">Active</span></td>
                                        @else
                                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] py-2.5 px-5 whitespace-nowrap"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] text-danger bg-danger-light dark:text-white dark:bg-[#3a9b941a]">Inctive</span></td>
                                        @endif
                                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-2.5 px-5 font-normal whitespace-nowrap text-body-color"><a class="mr-1 mb-2 inline-block rounded font-medium py-[5px] px-[15px] text-[13px] border border-secondary text-white bg-secondary hover:bg-hover-secondary hover:border-hover-secondary duration-300 btn-sm" href="/v_plan/{{ $data->id }}">View</a>
                                        @if ($data->status=="Active")
                                        <a class="mr-1 mb-2 inline-block rounded font-medium py-[5px] px-[15px] text-[13px] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-sm" href="/trade_now/{{ $data->id }}">Invest Now</a>
                                        @endif
                                        </td>

                                    </tr>
                                </a>
                                @endforeach
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection