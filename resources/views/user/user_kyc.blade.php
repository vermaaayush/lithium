@extends('user.layout.main')
@section('title', 'Authentication')
@section('main-container')

<h1>Complete Your Account Authentication</h1>
<h5>You’re ready to start trading soon! Help us safeguard your account by verifying your personal information.</h5>
<br>
<br>
<hr>
<div class="xl:w-1/3 col-xxl-3 sm:w-1/2">
    <div class="card overflow-hidden">
        <div class="sm:p-5 p-4">
            <div class="c-con">
                <h4><strong>Verify Email</strong></h4>
                <span class="text-sm text-body-color">Secure Authentication App</span>
            </div>
            <div class="c-con-3d relative">
                <div class="mt-[18px]">
                    <h1 style="color:#f8b940">Pending!</h1>
                    <br>
                    <button type="button" class="btn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2" data-dz-modal="firstmodal">Start</button>
                </div>
              
            </div>	
        </div>
    </div>
</div>
<div class="xl:w-1/3 col-xxl-3 sm:w-1/2">
    <div class="card overflow-hidden">
        <div class="sm:p-5 p-4">
            <div class="c-con">
                <h4><strong>Identity Verification</strong></h4>
                <span class="text-sm text-body-color">Submit and verify your proof of identity to start trading.</span>
            </div>
            <div class="c-con-3d relative">
                <div class="mt-[18px]">
                    <h1 style="color:#f8b940">Pending!</h1>
                    <br>
                    <button type="button" class="btn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2" data-dz-modal="secondmodal">Start</button>
                </div>
              
            </div>	
        </div>
    </div>
</div>
<div class="xl:w-1/3 col-xxl-3 sm:w-1/2">
    <div class="card overflow-hidden">
        <div class="sm:p-5 p-4">
            <div class="c-con">
                <h4><strong>Address Verification</strong></h4>
                <span class="text-sm text-body-color">POA needs to be verified before you can make a withdrawal.</span>
            </div>
            <div class="c-con-3d relative">
                <div class="mt-[18px]">
                    <h1 style="color:#f8b940">Pending!</h1>
                    <br>
                    <button type="button" class="btn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2" data-dz-modal="thirdmodal">Start</button>
                </div>
              
            </div>	
        </div>
    </div>
</div>	
<div class="xl:w-1/3 col-xxl-3 sm:w-1/2">
    <div class="card overflow-hidden">
        <div class="sm:p-5 p-4">
            <div class="c-con">
                <h4><strong>Profile Picture</strong></h4>
                <span class="text-sm text-body-color">Click your picture for complete KYC.</span>
            </div>
            <div class="c-con-3d relative">
                <div class="mt-[18px]">
                    <h1 style="color:#f8b940">Pending!</h1>
                    <br>
                    <button type="button" class="btn btn-primary sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn mb-2" data-dz-modal="fourthmodal">Start</button>
                </div>
              
            </div>	
        </div>
    </div>
</div>


 
 <div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055]  dz-modal-box model-close" id="firstmodal">
     <div class="modal-dialog modal-dialog-centered h-full flex items-center py-5" role="document">
         <div class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] w-full pointer-events-auto">
             <div class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
                 <h5 class="modal-title">Secure Authentication App</h5>
                 <button type="button" class="btn-close p-4 text-xs">
                 </button>
             </div>
             <div class="modal-body relative p-[1.875rem] text-body-color sm:text-sm text-xs">
                <div class="basic-form">
                    <form class="form-valide-with-icon needs-validation" >  
                        <div class="mb-4">
                            <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Email</label>
                            <div class="flex items-stretch flex-wrap relative w-full">
                              
                                <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="{{ session('s_user')['amail'] }}" name="email" readonly>
                               
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">OTP</label>
                            <div class="flex items-stretch flex-wrap relative w-full">
                              
                                <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter the otp" name="otp" required>
                               
                            </div>
                        </div>

                       
                        <button type="submit" class="btn mr-2 inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Submit</button>
                       
                    </form>
                </div>
                
                
             </div>
           
         </div>
     </div>
 </div>


 <div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055]  dz-modal-box model-close" id="secondmodal">
    <div class="modal-dialog modal-dialog-centered h-full flex items-center py-5" role="document">
        <div class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] w-full pointer-events-auto">
            <div class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
                <h5 class="modal-title">Identity Verification</h5>
                <button type="button" class="btn-close p-4 text-xs">
                </button>
            </div>
            <div class="modal-body relative p-[1.875rem] text-body-color sm:text-sm text-xs">
               <div class="basic-form">
                   <form class="form-valide-with-icon needs-validation" >  
                       <div class="mb-4">
                           <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Upload Your ID</label>
                           <div class="flex items-stretch flex-wrap relative w-full">
                             
                               <input type="file" class="" name="ID" required>
                              
                           </div>
                       </div>

                     

                      
                       <button type="submit" class="btn mr-2 inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Submit</button>
                      
                   </form>
               </div>
               
               
            </div>
          
        </div>
    </div>
</div>

<div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055]  dz-modal-box model-close" id="thirdmodal">
    <div class="modal-dialog modal-dialog-centered h-full flex items-center py-5" role="document">
        <div class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] w-full pointer-events-auto">
            <div class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
                <h5 class="modal-title">Address Verification</h5>
                <button type="button" class="btn-close p-4 text-xs">
                </button>
            </div>
            <div class="modal-body relative p-[1.875rem] text-body-color sm:text-sm text-xs">
               <div class="basic-form">
                   <form class="form-valide-with-icon needs-validation" >  
                       <div class="mb-4">
                           <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Upload Your Address Proof</label>
                           <div class="flex items-stretch flex-wrap relative w-full">
                             
                            <input type="file" class="" name="address_proof" required>

                           </div>
                       </div>

                       
                      
                       <button type="submit" class="btn mr-2 inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Submit</button>
                      
                   </form>
               </div>
               
               
            </div>
          
        </div>
    </div>
</div>

<div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055]  dz-modal-box model-close" id="fourthmodal">
    <div class="modal-dialog modal-dialog-centered h-full flex items-center py-5" role="document">
        <div class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] w-full pointer-events-auto">
            <div class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
                <h5 class="modal-title">Profile Picture</h5>
                <button type="button" class="btn-close p-4 text-xs">
                </button>
            </div>
            <div class="modal-body relative p-[1.875rem] text-body-color sm:text-sm text-xs">
               <div class="basic-form">
                   <form class="form-valide-with-icon needs-validation" >  
                       <div class="mb-4">
                           <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Click Your Image</label>
                           <div>
                            <video id="video" width="100%" height="auto" autoplay></video>
                            <button id="captureBtn">Capture</button>
                            <canvas id="canvas" style="display:none;"></canvas>
                            <img id="photo" src="" alt="Your captured photo will appear here."/>
                            <button id="saveBtn">Save</button>
                        </div>
                       </div>

                       

                      
                       <button type="submit" class="btn mr-2 inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Submit</button>
                      
                   </form>
               </div>
               
               
            </div>
          
        </div>
    </div>
</div>


<script>
    // Get access to the camera and start video stream
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
            var video = document.getElementById('video');
            video.srcObject = stream;
            video.play();
        })
        .catch(function (err) {
            console.log("An error occurred: " + err);
        });
    
    // Capture image from video stream
    document.getElementById('captureBtn').addEventListener('click', function () {
        var video = document.getElementById('video');
        var canvas = document.getElementById('canvas');
        var photo = document.getElementById('photo');
        var context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        photo.src = canvas.toDataURL('image/png');
        photo.style.display = 'inline-block';
    });
    
    // Save the captured image
    document.getElementById('saveBtn').addEventListener('click', function () {
        var photo = document.getElementById('photo');
        var a = document.createElement('a');
        a.href = photo.src;
        a.download = 'captured_selfie.png';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    });
    </script>
@endsection