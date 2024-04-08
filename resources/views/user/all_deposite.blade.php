@extends('user.layout.main')
@section('title', 'All Deposites')
@section('main-container')

@if (session('success'))
<div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent text-success bg-success-light">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
    <strong>{{ session('success') }}</strong>
    
</div>

@endif
<div class="overflow-x-auto table-scroll">
    <table class="table mb-4 min-w-[36rem] w-full">
        <thead>
            <tr>
                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black" style="width:80px;"><strong class="font-medium text-[15px]">#</strong></th>
                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Amount</strong></th>
                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Mode</strong></th>
                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Transaction Id</strong></th>
                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Description</strong></th>
                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"><strong class="font-medium text-[15px]">Status</strong></th>
                <th class="dark:bg-transparent py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-base text-sm font-normal text-left text-black"></th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach ($data as $data)
            <tr>
                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><strong>{{ $no++ }}</strong></td>
                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">$ {{ $data->amount }}</td>
                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">{{ $data->pay_mode }}</td>
                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">{{ $data->transaction_id }}</td>
                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><textarea name="" id="" cols="30" rows="3" readonly>{{ $data->description }}</textarea></td>
                @if ($data->status==0)
                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-warning bg-warning-light">Pending</span></td>
                @else
                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-success bg-success-light dark:text-white dark:bg-[#3a9b941a]">Successful</span></td>
                @endif
                
                {{-- <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-right text-body-color">
                    <div class="dropdown">
                        <button type="button" class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-warning rounded-md dz-dropdown bg-warning-light hover:bg-warning duration-300 light sharp" data-dz-dropdown="dropdown-3">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                        </button>
                        <div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden" id="dropdown-3">
                            <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Edit</a>
                            <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);">Delete</a>
                        </div>
                    </div>
                </td> --}}
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection