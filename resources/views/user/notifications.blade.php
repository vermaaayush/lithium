@extends('user.layout.main')
@section('title', 'NewsLetter')
@section('main-container')

<div style="padding: 0% 8% 0% 8%">
    <div class="card">
        <div class="card-header flex justify-between px-5 pt-6 relative z-[2] pb-0">
            <h3 class="card-title capitalize">NewsLetters</h3>
        </div> 
        <div class="p-0">
            <div id="DZ_W_TimeLine" class="widget-timeline dz-scroll overflow-y-scroll overflow-x-hidden h-[23.125rem] my-6 px-6">
                <ul class="timeline relative">
                    @foreach ($data as $data)
                    <li class="mb-[0.9375rem] relative">
                        <div class="timeline-badge rounded-full h-[1.275rem] left-0 absolute top-[0.625rem] w-[1.275rem] border-2 border-primary-light bg-white primary p-1"></div>
                        <a class="timeline-panel bg-primary-light border-primary-light" href="javascript:void(0);">
                            <span class="text-xs block mb-[0.3125rem] opacity-80 tracking-[0.0625rem] text-body-color">{{$data->created_at}}</span>
                            <h6 class="text-[13px]">{{$data->message}}</h6>
                        </a>
                    </li>
                    @endforeach 
                    
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection