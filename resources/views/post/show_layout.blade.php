<!--Title-->
<div class="text-center pt-16 md:pt-16">
    <h1 class="font-bold break-normal text-3xl md:text-5xl">{{$post->title}}</h1>
    <p class="text-sm md:text-base text-teal-500 font-bold">{{$post->publication_date}} </p>
</div>

<!--image-->
<div class="container w-full max-w-6xl mx-auto bg-white bg-cover mt-8 rounded" style="background-image:url('{{$post->image_url}}'); height: 75vh;"></div>

<!--Container-->
<div class="container max-w-6xl mx-auto -mt-32">
    
    <div class="mx-0 sm:mx-4">
        
        <div class="bg-white w-full p-8 md:p-24 text-xl md:text-2xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
            
            <!--Post Content-->

            <!--Description-->
            <p class="text-2xl md:text-3xl mb-5">
                {{$post->description}}
            </p>
            <!--end description -->
            <!--end post content -->
                    
        </div>
        
        
    </div>


</div>