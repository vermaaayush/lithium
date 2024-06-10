@extends('user.layout.main')
@section('title', 'All Deposits')
@section('main-container')

@if (session('success'))
<div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent text-success bg-success-light">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
    <strong>{{ session('success') }}</strong>
    
</div>

@endif

<div class="card">
    <div class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-4">
        <h3 class="card-title  capitalize">All Withrawals</h3>
    </div> 
    <div class="card-body p-0">
        <div class="overflow-x-auto active-projects task-table dz-scroll">
            <table class="table mb-4 min-w-[36rem] w-full">
                <thead>
                    <tr>
                        <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">#</th>
                        <th class="text-[13px] py-[0.625rem] px-5 bg-primary-light text-primary capitalize font-medium bg-none text-left whitespace-nowrap">Amount</th>

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
                        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">${{ number_format($data->amount) }}</td>

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
                            <button type="button" class="btn btn-primary sm:py-[0.719rem] px-2 sm:px-[1rem] py-1.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2" data-dz-modal="firstmodal">Upload Proof</button>
                        </td>

                        <div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055]  dz-modal-box model-close" id="firstmodal">
                            <div class="modal-dialog modal-dialog-centered h-full flex items-center py-5" role="document">
                                <div class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] w-full pointer-events-auto">
                                    <div class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
                                        <h5 class="modal-title">Upload Payment Proof</h5>
                                        <button type="button" class="btn-close p-4 text-xs">
                                        </button>
                                    </div>
                                    <div class="modal-body relative p-[1.875rem] text-body-color sm:text-sm text-xs">
                                       <div class="basic-form">
                                        <form action="/upload_bw_proof/{{ $data->transaction_id }}" method="post" id="uploadForm" enctype="multipart/form-data">
                                            @csrf
                                            <div>
                                                
                                                <input type="file" id="ID" name="img" required>
                                            </div>
                                            <div>
                                                
                                            </div>
                                            <br>
                                            <br>
                                            <button type="submit" class="btn btn-primary sm:py-[0.719rem] px-2 sm:px-[1.5rem] py-1.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2">Submit</button>
                                            
                                        </form>
                                        
                                        
                                        
                                       </div>
                                       
                                       
                                    </div>
                                  
                                </div>
                            </div>
                        </div>

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