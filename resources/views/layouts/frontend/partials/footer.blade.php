@if($fk != null)
<footer class="bg-bookmark-foot font-Poppins w-full">
    <div class="container px-12 py-4 mx-auto">
        <div class="lg:flex py-9">
            <div class="w-full lg:w-1/3 gap-20">
                <div class="flex px-6 justify-center items-center h-full">
                    <div class="flex justify-center items-center w-full">
                      <img src="{{asset('images/boddas-foot.png')}}"  class="object-cover" alt="">
                    </div>
                </div>
            </div>

            <div class="mt-6 lg:mt-0 lg:flex-1">
                <div class="grid grid-cols-1 gap-2 sm:grid-cols-3 md:grid-cols-3">
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
                        
                          <div class="flex flex-row py-1 gap-3">
                            <div class="flex w-8 h-8 border justify-center items-center rounded-full">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                              </svg>
                            </div>
                             <p class="text-sm my-2 text-white font-Poppins">{{$fk->email}}</p>
                          </div>
                          <div class="flex flex-row py-1  gap-3">
                            <div class="flex w-8 h-8 border justify-center items-center rounded-full">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                              </svg>
                            </div>
                             <p class="text-sm my-2 text-white font-Poppins">{{$fk->num_phone}}</p>
                          </div>
                          <div class="flex flex-row py-1  gap-3">
                            <div class="flex w-8 h-8 border justify-center items-center rounded-full">
                              {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="white">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                              </svg> --}}
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                              </svg>
                            </div>
                            <p class="text-sm my-2 text-white font-Poppins">{{$fk->address_name}}</p>
                          </div>

                       
                    </div>

                    <!--menu -->
                    <div class="">
                        <h3 class="text-white capitalize font-Poppins font-bold
                        mb-1
                        text-2xl
                        ">menu</h3>
                        <a href="{{route('home.index')}}" class="block mt-2 text-sm text-white hover:underline">Beranda</a>
                        <a href="{{route('show_shop')}}" class="block mt-2 text-sm text-white hover:underline">Produk</a>
                        <a href="{{route('show_blog')}}" class="block mt-2 text-sm text-white hover:underline">Blog</a>
                        <a href="{{route('tentang_kami')}}" class="block mt-2 text-sm text-white hover:underline">Tentang Kami</a>
                        <a href="{{route('kontak')}}" class="block mt-2 text-sm text-white hover:underline">Kontak kami</a>
                    </div>
                    <!-- join -->
                    <div class="">
                        <h3 class="text-white Capitalize font-Poppins font-bold  mb-1
                        text-2xl">Join Member</h3>
                        <a href="{{route('register_reseller')}}" class="block mt-2 text-sm text-white hover:underline">Reseller</a>
                        <a href="{{route('register_distributor')}}" class="block mt-2 text-sm text-white hover:underline">Distributor </a>
                        <a href="{{route('register_customer')}}" class="block mt-2 text-sm text-white hover:underline">Customer</a>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- sosial -->
        <div class="text-center flex justify-center">
           <a href="{{$fk->facebook}}">
            <span class="text-center py-2 px-2 ">
              <i class="stroke-2 fab fa-facebook-f text-bookmark-foot stroke-5 w-11 h-11  
                items-center py-3 px-2 border border-white rounded-full bg-white"></i>  
             </span>
           </a>
           <a href="{{$fk->instagram}}">
            <span class="text-center py-2 px-2 ">
              <i class="stroke-2 fab fa-instagram text-bookmark-foot stroke-5 w-11 h-11
                items-center py-3 px-2 border border-white rounded-full bg-white"></i>  
            </span>
           </a>

           

            <a href="{{$fk->youtube}}">
              <span class="text-center py-2 px-2 ">
                <i class="stroke-2 fab fa-youtube text-bookmark-foot stroke-5 w-11 h-11 
                  items-center py-3 px-2 border border-white rounded-full bg-white"></i>  
              </span>
            </a>

        </div>
            
             
           
  
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
            <i class="stroke-2 fab fa-facebook-f text-bookmark-foot stroke-5 w-11 h-11 
              items-center py-3 px-2 border border-white rounded-full bg-white"></i>  
           </span>
         </a>
         <a href="">
          <span class="text-center py-2 px-2 ">
            <i class="stroke-2 fab fa-instagram text-bookmark-foot stroke-5 w-11 h-11 
              items-center py-3 px-2 border border-white rounded-full bg-white"></i>  
        </span>
         </a>
         
          <a href="">
            <span class="text-center py-2 px-2 ">
              <i class="stroke-2 fab fa-youtube text-bookmark-foot stroke-5 w-11 h-11 
                items-center py-3 px-2 border border-white rounded-full bg-white"></i>  
          </span>
          </a>
         
            
            
         
         </div>
          
           
         
      {{-- <hr class="h-px my-6 bg-white-300 border-none dark:bg-white-700"> --}}

      {{-- <div>
          <p class="text-center text-gray-800 dark:text-white">?? Brand 2020 - All rights reserved</p>
      </div> --}}
  </div>
</footer>


@endif
  <!-- footer -->

  
