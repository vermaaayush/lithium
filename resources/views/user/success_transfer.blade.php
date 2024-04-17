@extends('user.layout.main')
@section('title', 'Success')
@section('main-container')

<div class="w-full  " style="margin:auto">
    <div class="card">
       
        <div class="sm:p-5 p-4">
            <div class="basic-form" style="text-align: center">
                
                <div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent border-l-4 border-l-success text-success bg-success-light alert-alt dark:bg-[#ff5e5e26] dark:border-[#ff5e5e26]">
                   
                    <h3 class="text-center">The funds have been transferred successfully.</h3>
                </div>
                <p class=" flex items-center justify-center"><img src="{{ asset('user_assets/verified.gif') }}" width="28%" alt=""></p>
               
                <div class="overflow-x-auto table-scroll  lg:w-1/2" style="margin: auto">
                    <table class="table mb-4 min-w-[30rem] w-full">
                        <thead>
                            <tr class="border-t border-b-color">
                              </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap border-x border-x-[#E6E6E6] sm:text-sm text-xs font-normal border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><strong>To: </strong></td>
                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap border-x border-x-[#E6E6E6] sm:text-sm text-xs font-normal border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">{{ $data['receiver'] }}</td>

                            </tr>

                            <tr>
                                
                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap border-x border-x-[#E6E6E6] sm:text-sm text-xs font-normal border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><strong>Email: </strong></td>
                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap border-x border-x-[#E6E6E6] sm:text-sm text-xs font-normal border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">{{ $data['receiver_email'] }}</td>

                            </tr>

                            <tr>
                                
                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap border-x border-x-[#E6E6E6] sm:text-sm text-xs font-normal border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><strong>Amount: </strong></td>
                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap border-x border-x-[#E6E6E6] sm:text-sm text-xs font-normal border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">${{ number_format($data['amount']) }}</td>

                            </tr>

                            <tr>
                                
                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap border-x border-x-[#E6E6E6] sm:text-sm text-xs font-normal border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><strong>Transaction ID: </strong></td>
                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap border-x border-x-[#E6E6E6] sm:text-sm text-xs font-normal border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">{{$data['transaction_id']}}</td>

                            </tr>

                            <tr >
                                <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap border-x border-x-[#E6E6E6] sm:text-sm text-xs font-normal border-b border-[#E6E6E6] dark:border-[#ffffff1a]  text-body-color" colspan="2"><strong>COMPANY NAME</strong></td>
                            </tr>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>     

@endsection