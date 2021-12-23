@extends('layouts.frontend.app')

@push('css')
    
@endpush

@section('content')
    <section class="bg-hero-color w-full overflow-hidden ">
        <div class="mx-auto">
           <div class="grid grid-cols1 md:grid-cols-2 lg:grid-cols-2  border">
               <div class="flex justify-center lg:place-content-end pt-16">
                   <img class="lg:object-center bg-center h-96 w-fit"
                    src="{{asset('images/handsome11.png')}}" alt="">
               </div>
               <div class="flex flex-col mx-5">
                   <h1 class="font-inter font-semibold capitalize text-xl mt-16">founder</h1>
                   <p class="font-inter text-md py-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat velit vitae consequat condimentum. Suspendisse et ipsum ac felis pellentesque fermentum. Fusce vitae erat dui. Ut id pulvinar odio. Etiam eu magna nec tortor sagittis laoreet. Donec eu lobortis erat, nec fringilla odio. Morbi enim tellus, dictum non vehicula vel, volutpat nec ligula.

                    Cras lacinia tellus eget dictum porttitor. Nam rutrum accumsan velit, eget scelerisque risus ullamcorper in. Proin mollis felis sed urna dictum feugiat. Nullam mollis augue id commodo volutpat. Nulla ut nibh elementum, varius nisl non, vestibulum lorem. Cras sed leo vitae nulla fringilla mattis. Aliquam sit amet leo tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed auctor euismod nibh eget maximus. Pellentesque volutpat nisi pulvinar ipsum pretium, sed dapibus neque venenatis. Aliquam sed rutrum tortor. Fusce quis diam tellus. Integer at mi porttitor, rhoncus magna ut, blandit lacus.</p>
               </div>
           </div>
        </div>
    </section>

    <section class="bg-white flex flex-col w-full mx-auto px-5 lg:px-12 mb-5 ">
        <div class="mt-10">
            <h1 class="font-inter font-semibold capitalize text-center text-2xl">Visi</h1>
            <p class="font-inter text-center text-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat velit vitae consequat condimentum. Suspendisse et ipsum ac felis pellentesque fermentum. Fusce vitae erat dui. Ut id pulvinar odio. Etiam eu magna nec tortor sagittis laoreet. Donec eu lobortis erat, nec fringilla odio. Morbi enim tellus, dictum non vehicula vel, volutpat nec ligula.
                Cras lacinia tellus eget dictum porttitor. Nam rutrum accumsan velit, eget scelerisque risus ullamcorper in. Proin mollis felis sed urna dictum feugiat. Nullam mollis augue id commodo volutpat. Nulla ut nibh elementum, varius nisl non, vestibulum lorem. Cras sed leo vitae nulla fringilla mattis. Aliquam sit amet leo tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed auctor euismod nibh eget maximus. Pellentesque volutpat nisi pulvinar ipsum pretium, sed dapibus neque venenatis. Aliquam sed rutrum tortor. Fusce quis diam tellus. Integer at mi porttitor, rhoncus magna ut, blandit lacus.</p>
        </div>

        <div class="mt-10">
            <h1 class="font-inter font-semibold capitalize text-center text-2xl ">Misi</h1>
            <p class="font-inter text-center text-md ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat velit vitae consequat condimentum. Suspendisse et ipsum ac felis pellentesque fermentum. Fusce vitae erat dui. Ut id pulvinar odio. Etiam eu magna nec tortor sagittis laoreet. Donec eu lobortis erat, nec fringilla odio. Morbi enim tellus, dictum non vehicula vel, volutpat nec ligula.
                Cras lacinia tellus eget dictum porttitor. Nam rutrum accumsan velit, eget scelerisque risus ullamcorper in. Proin mollis felis sed urna dictum feugiat. Nullam mollis augue id commodo volutpat. Nulla ut nibh elementum, varius nisl non, vestibulum lorem. Cras sed leo vitae nulla fringilla mattis. Aliquam sit amet leo tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed auctor euismod nibh eget maximus. Pellentesque volutpat nisi pulvinar ipsum pretium, sed dapibus neque venenatis. Aliquam sed rutrum tortor. Fusce quis diam tellus. Integer at mi porttitor, rhoncus magna ut, blandit lacus.
            </p>
        </div>

    </section>
@endsection
@push('js')
    
@endpush