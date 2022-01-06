@if($fk != null)
<footer class="bg-bookmark-foot font-Poppins w-full">
    <div class="container px-12 py-4 mx-auto">
        <div class="lg:flex py-9">
            <div class="w-full lg:w-2/5  gap-20">
                <div class="px-6">
                  
                    <div>
                      <img src="{{asset('images/boddas-foot.png')}}" alt="">
                        {{-- <a href="#" class="text-xl font-bold text-white-800 dark:text-white hover:text-gray-700 dark:hover:text-gray-300">Brand</a> --}}
                    </div>
                   
                      <p class="max-w-md mt-2 text-white">
                        Address
                      </p>
                      <p class="max-w-md mt-2 text-white">
                      
                          {{$fk->address_name}}
                      </p>
                    
                
                </div>
            </div>

            <div class="mt-6 lg:mt-0 lg:flex-1">
                <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 md:grid-cols-3">
                    <div class="">
                        <h3 class="
                          text-white
                          capitalize 
                          font-Poppins 
                          font-bold
                          items-center
                          mb-1
                          text-2xl
                          ">kontak kami</h3>
                        <div class="block py-1">
                          {{-- <span class="w-7 mt-10 text-white ">
                          </span> --}}
                           <p class="inline py-9 text-sm text-white font-Poppins">{{$fk->num_phone}}</p>
                        </div>

                        <div class="block py-1">
                          <span class="w-7 mt-10 ">
                             
                          </span>
                           <p class="inline py-9 text-sm text-white font-Poppins">{{$fk->email}}</p>
                        </div>

                       

                    </div>

                    <div class="">
                        <h3 class="text-white capitalize font-Poppins font-bold
                        mb-1
                        text-2xl
                        ">menu</h3>
                        <a href="#" class="block mt-2 text-sm text-white hover:underline">Tec</a>
                        <a href="#" class="block mt-2 text-sm text-white hover:underline">Music</a>
                        <a href="#" class="block mt-2 text-sm text-white hover:underline">Videos</a>
                    </div>

                    <div class="">
                        <h3 class="text-white Capitalize font-Poppins font-bold  mb-1
                        text-2xl">Join Member</h3>
                        <a href="#" class="block mt-2 text-sm text-white hover:underline">Mega cloud</a>
                        <a href="#" class="block mt-2 text-sm text-white hover:underline">boddas </a>
                        <a href="#" class="block mt-2 text-sm text-white hover:underline">boddas</a>
                    </div>
                  {{-- 
                    <div>
                        <h3 class="text-white-700 Capitalize font-Poppins font-bold">Contact</h3>
                        <span class="block mt-2 text-sm text-white-600 dark:text-white-400 hover:underline">+1 526 654 8965</span>
                        <span class="block mt-2 text-sm text-white-600 dark:text-white-400 hover:underline">example@email.com</span>
                    </div> --}}
                </div>
            </div>
            
        </div>
        <div class="text-center flex justify-center">
           <a href="{{$fk->facebook}}">
            <span class="text-center py-2 px-2 ">
              <i class="stroke-2 fab fa-facebook-f text-bookmark-foot stroke-5 w-11 h-11 rounded-full 
                items-center py-3 px-2 border border-white rounded-full bg-white"></i>  
             </span>
           </a>
           <a href="{{$fk->instagram}}">
            <span class="text-center py-2 px-2 ">
              <i class="stroke-2 fab fa-instagram text-bookmark-foot stroke-5 w-11 h-11 rounded-full 
                items-center py-3 px-2 border border-white rounded-full bg-white"></i>  
          </span>
           </a>

            <a href="#">
              <span class="text-center py-2 px-2 ">
                <i class="stroke-2  fab fa-twitter text-bookmark-foot stroke-5 w-11 h-11 rounded-full 
                  items-center py-3 px-2 border border-white rounded-full bg-white"></i>  
            </span>
            </a>

            <a href="{{$fk->youtube}}">
              <span class="text-center py-2 px-2 ">
                <i class="stroke-2 fab fa-youtube text-bookmark-foot stroke-5 w-11 h-11 rounded-full 
                  items-center py-3 px-2 border border-white rounded-full bg-white"></i>  
            </span>
            </a>
           
              
              
           
           </div>
            
             
           
        {{-- <hr class="h-px my-6 bg-white-300 border-none dark:bg-white-700"> --}}

        {{-- <div>
            <p class="text-center text-gray-800 dark:text-white">© Brand 2020 - All rights reserved</p>
        </div> --}}
    </div>
</footer>
@else
<footer class="bg-bookmark-foot font-Poppins w-full">
  <div class="container px-12 py-4 mx-auto">
      <div class="lg:flex py-9">
          <div class="w-full lg:w-2/5  gap-20">
              <div class="px-6">
                
                  <div>
                    <img src="{{asset('images/boddas-foot.png')}}" alt="">
                      {{-- <a href="#" class="text-xl font-bold text-white-800 dark:text-white hover:text-gray-700 dark:hover:text-gray-300">Brand</a> --}}
                  </div>
                 
                    <p class="max-w-md mt-2 text-white">
                      Address
                    </p>
                    <p class="max-w-md mt-2 text-white">
                    
                       
                    </p>
                  
              
              </div>
          </div>

          <div class="mt-6 lg:mt-0 lg:flex-1">
              <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 md:grid-cols-3">
                  <div class="">
                      <h3 class="
                        text-white
                        Capitalize 
                        font-Poppins 
                        font-bold
                        items-center
                        mb-1
                        text-2xl
                        ">Get In Touch</h3>
                      <div class="block py-1">
                        {{-- <span class="w-7 mt-10 text-white ">
                        </span> --}}
                         <p class="inline py-9 text-sm text-white font-Poppins"></p>
                      </div>

                      <div class="block py-1">
                        <span class="w-7 mt-10 ">
                           
                        </span>
                         <p class="inline py-9 text-sm text-white font-Poppins"></p>
                      </div>
                  </div>

                  <div class="">
                      <h3 class="text-white Capitalize font-Poppins font-bold
                      mb-1
                      text-2xl
                      ">Join Members</h3>
                      <a href="#" class="block mt-2 text-sm text-white hover:underline">Reseller</a>
                      <a href="#" class="block mt-2 text-sm text-white hover:underline">Afiliate</a>
                      <a href="#" class="block mt-2 text-sm text-white hover:underline">Videos</a>
                  </div>

                  <div class="">
                      <h3 class="text-white Capitalize font-Poppins font-bold  mb-1
                      text-2xl">Campaign</h3>
                      <a href="#" class="block mt-2 text-sm text-white hover:underline">Mega cloud</a>
                      <a href="#" class="block mt-2 text-sm text-white hover:underline">boddas </a>
                      <a href="#" class="block mt-2 text-sm text-white hover:underline">boddas</a>
                  </div>
                {{-- 
                  <div>
                      <h3 class="text-white-700 Capitalize font-Poppins font-bold">Contact</h3>
                      <span class="block mt-2 text-sm text-white-600 dark:text-white-400 hover:underline">+1 526 654 8965</span>
                      <span class="block mt-2 text-sm text-white-600 dark:text-white-400 hover:underline">example@email.com</span>
                  </div> --}}
              </div>
          </div>
          
      </div>
      <div class="text-center flex justify-center">
         <a href="">
          <span class="text-center py-2 px-2 ">
            <i class="stroke-2 fab fa-facebook-f text-bookmark-foot stroke-5 w-11 h-11 rounded-full 
              items-center py-3 px-2 border border-white rounded-full bg-white"></i>  
           </span>
         </a>
         <a href="">
          <span class="text-center py-2 px-2 ">
            <i class="stroke-2 fab fa-instagram text-bookmark-foot stroke-5 w-11 h-11 rounded-full 
              items-center py-3 px-2 border border-white rounded-full bg-white"></i>  
        </span>
         </a>

          <a href="#">
            <span class="text-center py-2 px-2 ">
              <i class="stroke-2  fab fa-twitter text-bookmark-foot stroke-5 w-11 h-11 rounded-full 
                items-center py-3 px-2 border border-white rounded-full bg-white"></i>  
          </span>
          </a>

          <a href="">
            <span class="text-center py-2 px-2 ">
              <i class="stroke-2 fab fa-youtube text-bookmark-foot stroke-5 w-11 h-11 rounded-full 
                items-center py-3 px-2 border border-white rounded-full bg-white"></i>  
          </span>
          </a>
         
            
            
         
         </div>
          
           
         
      {{-- <hr class="h-px my-6 bg-white-300 border-none dark:bg-white-700"> --}}

      {{-- <div>
          <p class="text-center text-gray-800 dark:text-white">© Brand 2020 - All rights reserved</p>
      </div> --}}
  </div>
</footer>


@endif
  <!-- footer -->

  
