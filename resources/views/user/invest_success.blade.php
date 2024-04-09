@extends('user.layout.main')
@section('title', 'Success')
@section('main-container')
   
<div style="margin:auto">
    <div class="xl:w-1/2 w-full">
		<div class="alert py-3 px-4 mb-4 sm:text-sm text-xs rounded-md relative border border-transparent text-success bg-success-light left-icon-big alert-dismissible">
			<button type="button" class="remove-btn absolute right-0 py-5 px-4 top-[-5px] opacity-50 z-[2] dark:text-white"><span><i class="fa-solid fa-xmark scale-[0.9]"></i></span>
			</button>
			<div class="flex items-start">
				<div class="self-center mr-[0.9375rem] social-icon">
					<span><i class="text-[2.1875rem] leading-[1] mdi mdi-check-circle-outline"></i></span>
				</div>
				<div class="media-body">
					<h5 class="mt-1 mb-2">Congratulations!</h5>
					<p class="mb-0 text-success">You amount has been invested successfull.</p>
				</div>
			</div>
		</div>
	</div>
</div>
       
@endsection