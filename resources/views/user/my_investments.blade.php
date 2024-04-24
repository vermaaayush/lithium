@php

    use App\Models\Plan;
    use Carbon\Carbon; 
@endphp
@extends('user.layout.main')
@section('title', 'My Investments')
@section('main-container')

<div class="w-full">
    <div class="card">
        <div class="card-body p-0">
            <div class="overflow-x-auto active-projects task-table dz-scroll">
                <div class="p-5">
                    <h4 class="text-base">Task</h4>
                </div>
                <table  class="table mb-4 min-w-[36rem] w-full">
                    <thead>
                        
                        <tr>
                           
                            <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">#</th>
                            <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">Name</th>
                            <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">Status</th>
                            <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">Start Date</th>
                            {{-- <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">End Date</th> --}}
                            <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">Investment</th>
                            <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">View</th>
 
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach ($data as $data)
                        <tr>
                           
                            <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap"><span class="text-[13px] font-normal text-body-color dark:text-white">{{ $no++ }}</span></td>
                            <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">
                                <div class="products">
                                    <div>
                                        @php
                                        $p_data = Plan::where('plan_id', $data->plan_id)->first(); 
                                        @endphp
                                        <h6 class="text-sm">{{$p_data->name}}</h6>
                                        <span class="text-[13px] font-normal text-body-color dark:text-white">ID-{{$data->investment_id}}</span>
                                    </div>	
                                </div>
                            </td>
                            @if ($data->status==1)
                            <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap"><span class="text-[13px] font-normal text-body-color dark:text-white"><span class="mr-[0.3125rem] mb-[0.3125rem] inline-block font-medium leading-[0.6875rem] rounded text-[0.6875rem] py-[0.3125rem] px-2 border border-success-light-3 dark:border-transparent badge-sm bg-success-light text-success">Completed!</span></span></td>
                            
                            @else
                            <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap"><span class="mr-[0.3125rem] mb-[0.3125rem] inline-block font-medium leading-[0.6875rem] rounded text-[0.6875rem] py-[0.3125rem] px-2 border border-primary-light-3 dark:border-transparent badge-sm bg-primary-light text-primary">In Progress</span></td>
                            @endif
                            
                            <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap"><span class="text-[13px] font-normal text-body-color dark:text-white">{{$data->start_date}}</span></td>
                            {{-- <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">
                                <span class="text-[13px] font-normal text-body-color dark:text-white">{{$data->end_date}}</span>
                            </td> --}}
                            <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">
                                <span class="text-[13px] font-normal text-body-color dark:text-white">${{number_format($data->amount)}}</span>
                            </td>
                            
                            @if ($data->status==0)
                            <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">
                                <a href="/view_mystock/{{$data->investment_id}}" class="inline-block rounded font-medium xl:text-[15px] text-xs leading-5 xl:py-[0.719rem] xl:px-[1.375rem] py-2.5 px-4 border border-secondary text-dark bg-secondary">View Now</a>
                            </td>
                            @endif
                           
                           
                            
                        </tr>
                        @endforeach 
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection