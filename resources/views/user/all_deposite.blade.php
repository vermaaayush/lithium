@extends('user.layout.main')
@section('title', 'All Deposites')
@section('main-container')

@if (session('success'))
<div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent text-success bg-success-light">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
    <strong>{{ session('success') }}</strong>
    
</div>

@endif

<h1>All Deposites</h1>
<div class="card">
    <div class="card-body p-0">
        <div class="overflow-x-auto active-projects task-table dz-scroll">
            <table class="table mb-4 min-w-[36rem] w-full">
                <thead>
                    <tr>
                        <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">#</th>
                        <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">Amount</th>
                        <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">Mode</th>
                        <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">Transaction Id</th>
                        <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">Date/Time</th>
                        <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">Status</th>
                        <!-- Remove the last empty header -->
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $data)
                    <tr>
                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">{{ $no++ }}</td>
                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">${{ $data->amount }}</td>
                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">{{ $data->pay_mode }}</td>
                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">{{ $data->transaction_id }}</td>
                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">
                            {{ $data->created_at }}
                        </td>
                        
                        @if ($data->status == 0)
                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">
                            <span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-warning bg-warning-light">Pending</span>
                        </td>
                        
                        @elseif ($data->status == 2)

                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">
                            <span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-warning bg-warning-light">Pending</span>
                        
                        </td>

                        @elseif ($data->status ==3 )

                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">
                            <span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-danger bg-danger-light">Rejected!</span>
                        
                        </td>

                        @else
                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">
                            <span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-success bg-success-light dark:text-white dark:bg-[#3a9b941a]">Successful</span>
                        </td>
                        @endif
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>












@endsection