@extends('user.layout.main')
@section('title', 'Identity Information')
@section('main-container')


<!-- row -->
        <div class="row">
            <div class="w-full col-xxl-12">
                <div class="card">
                    <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
                        <h4 class="card-title text-base capitalize">Identity Information</h4>
                    </div>
                    <div class="sm:p-5 p-4">
                        <div id="smartwizard" class="form-wizard order-create border-0">
                            
                            <div class="tab-content">
                                <div id="wizard_Service" class="tab-pane active show" role="tabpanel">
                                    <form action="/id_verification" method="post" enctype="multipart/form-data" id="myForm">
                                        @csrf
                                    <div class="row">
                                        <div class="lg:w-1/2 mb-2">
                                            <div class="mb-4">
                                                <label class="text-body-color dark:text-white">Full Name<span class="required text-danger">*</span></label>
                                                <input type="text" name="fname" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Full Name" required>
                                            </div>
                                        </div>
                                        <div class="lg:w-1/2 mb-2">
                                            <div class="mb-4">
                                                <label class="text-body-color dark:text-white">ID Type<span class="required text-danger">*</span></label>
                                                <select name="id_type" class="relative h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" required>
                                                    <option value="" disabled selected>Select a ID Type</option>
                                                    <option value="National ID Card">National ID Card</option>
                                                    <option value="Driving License">Driving License</option>
                                                    <option value="Other">Other</option>
                                                    <!-- Add more options as needed -->
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="lg:w-1/2 mb-2">
                                            <div class="mb-4">
                                                <label class="text-body-color dark:text-white">Nationality<span class="required text-danger">*</span></label>
                                                <input type="text" name="nationality" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Nationality" required>
                                            </div>
                                        </div>
                                        <div class="lg:w-1/2 mb-2">
                                            <div class="mb-4">
                                                <label class="text-body-color dark:text-white">ID Serial Number<span class="required text-danger">*</span></label>
                                                <input type="text" name="id_no" class="relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="ID Serial Number" required>
                                            </div>
                                        </div>

                                        <div class="lg:w-1/2 mb-2">
                                            <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Upload Your ID</label>
                                            <div class="flex items-stretch flex-wrap relative w-full">
                                                <input type="file" class="" name="id_image" id="ID" required>
                                            </div>
                                        </div>
                                        
                                        <div style="width: 50%;margin:auto">
                                        
                                        
                                        <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Take a Selfie</label>
                                        <br>
                                        <button type="button" id="start-camera" class="tn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2	">Start Camera</button>
                                        <video id="video" width="320" height="240" autoplay></video>
                                        <br>
                                        <button type="button" id="click-photo" class="tn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2">Click Photo</button>
                                        <canvas id="canvas" width="240" height="240" style="border-radius: 50%; border: 2px solid #333; display: none;"></canvas>
                                    
                                        <input type="hidden" id="image-data" name="image_data" required>
                                       
                                        <button type="submit" class="tn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2">Submit</button>
                    
                                        </div>
                                        {{-- <button type="button" class="mr-1 mb-2 inline-block rounded font-medium xl:text-[15px] text-xs leading-5 xl:py-[0.719rem] xl:px-[1.563rem] py-2.5 px-4 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Primary</button> --}}
                                      
                                    </div>
                                    </form>
                                </div>
                                
                               
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let camera_button = document.querySelector("#start-camera");
            let video = document.querySelector("#video");
            let click_button = document.querySelector("#click-photo");
            let canvas = document.querySelector("#canvas");
            let imageDataInput = document.querySelector("#image-data");
        
            camera_button.addEventListener('click', async function() {
                let stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
                video.srcObject = stream;
            });
        
            click_button.addEventListener('click', function() {
                video.style.display = 'none'; // Hide the video element
                canvas.style.display = 'block'; // Show the canvas element
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                let image_data_url = canvas.toDataURL('image/jpeg');
        
                // Display clicked image on the circular canvas
                let img = new Image();
                img.onload = function() {
                    canvas.getContext('2d').drawImage(img, 0, 0, canvas.width, canvas.height);
                };
                img.src = image_data_url;
        
                // Save image data in the hidden input
                imageDataInput.value = image_data_url;
        
                // data url of the image
                console.log(image_data_url);
            });
        </script>
@endsection