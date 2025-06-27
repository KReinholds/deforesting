<x-public-header/>



<div class="w-full bg-gray-100">
    <div class="container mx-auto py-10 px-4">


{{-- Breadcrumb --}}
<nav class="flex pb-10" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-3 md:space-x-2 rtl:space-x-reverse italic uppercase">
      <li class="inline-flex items-center">
        <a href="/" class="text-lg text-degray uppercase">
          SĀKUMS
        </a>
      </li>
      <li class="inline-flex items-center">
        <img class="" src="/img/dark-arrow.svg" alt="">
      </li>
      <li>
        <div class="flex items-center">
            <a href="/orders" class="text-lg text-degray">Pakalpojumi</a>
        </div>
      </li>
      <li class="inline-flex items-center">
        <img class="" src="/img/dark-arrow.svg" alt="">
      </li>
      <li aria-current="page">
        <div class="flex items-center">
            <a href="" class="text-lg text-degray text-degreenlight">Izveidot pasutījumu</a>
        </div>
      </li>
    </ol>
</nav>
  


        <h1 class="text-degray text-5xl font-normal mb-10 uppercase">
            Izveidot pasūtījumu
        </h1>
        <section class="">
            <div class="mx-auto">
                <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full bg-white grid gap-4 py-10 px-24 mb-10 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-4">
                            <label for="title" class="block mb-2 text-sm font-medium text-degray"><span class="sup text-red-500">*</span> Pasūtījuma nosaukums</label>
                            <input type="text" name="title" id="name" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="Ierakstiet pasūtījuma nosaukumu" required="">
                        </div>
                        <div class="sm:col-span-4">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900"><span class="sup text-red-500">*</span> Kategorija</label>
                            <select id="category" name="category_id" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" >
                                <option disabled selected>Izvēlieties kategoriju</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                            </select>
                        </div>
                        {{-- <option selected="">Izvēlieties kategoriju</option>
                                <option value="TV">ATMEŽOŠANA</option>
                                <option value="PC">CELMU IZŅEMŠANA, UTILIZĀCIJA</option>
                                <option value="GA">KOKSNES UN APAUGUMA IZZĀĢĒŠANA</option>
                                <option value="PH">ARBORISTU PAKALPOJUMI</option>
                                <option value="PH">MĒRNIEKU PAKALPOJUMI</option>
                                <option value="PH">MEŽA IEAUDZĒŠANA, APZAĻUMOŠANA, STĀDI</option>
                                <option value="PH">ZEMES RAKŠANAS DARBI</option>
                                <option value="PH">SMILTS, GRANTS, MELNZEME</option>
                                <option value="PH">RĪKSTNIEKS, FEN ŠUI, CITI PAKALPOJUMI</option>
                                <option value="PH">KOMPLEKSAIS PAKALPOJUMS</option> --}}
                        <div class="sm:col-span-2">
                            <label for="kadastrs" class="block mb-2 text-sm font-medium text-gray-900"><span class="sup text-red-500">*</span> Kadastra Nr.</label>
                            <input type="text" name="kadastrs" id="brand" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="Kadastra Nr.">
                        </div>
                        <div class="sm:col-span-1">
                            <label for="platiba" class="block mb-2 text-sm font-medium text-gray-900">Platība</label>
                            <input type="text" name="platiba" id="price" class="bg-gray-50 border bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="0000" >
                        </div>
                        <div class="sm:col-span-1">
                            <label for="mervieniba" class="block mb-2 text-sm font-medium text-gray-900">Mērvienība</label>
                            <input type="text" name="mervieniba" id="price" class="bg-gray-50 border bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="Mērvienība">
                        </div>
                        <div class="sm:col-span-4">
                            <label for="pazimes" class="inline-flex items-end mb-2 text-sm font-medium text-degray"><span class="sup text-red-500">*</span> Aizsargjoslas, aizsardzības pazīmes <img class="w-6 ml-2" src="/img/alert-icon.svg" alt=""></label>
                            <input type="text" name="pazimes" id="name" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="" >
                        </div>
                    </div>
                    {{-- Block 2 --}}
                    <div class="w-full bg-white grid gap-4 py-10 px-24 mb-10 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-4">
                            <label for="pilseta" class="block mb-2 text-sm font-medium text-degray"><span class="sup text-red-500">*</span> Pilsēta, novads</label>
                            <input type="text" name="pilseta" id="name" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="Pilsēta, novads" >
                        </div>
                        <div class="sm:col-span-1">
                            <label for="tel" class="block mb-2 text-sm font-medium text-gray-900"><span class="sup text-red-500">*</span> Kontakttālrunis</label>
                            <input type="text" name="tel" id="brand" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="+371 00000000">
                        </div>
                        <div class="sm:col-span-3">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900"><span class="sup text-red-500">*</span> E-pasts</label>
                            <input type="text" name="email" id="price" class="bg-gray-50 border bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="">
                        </div>
                        {{-- <div class="sm:col-span-4">
                            
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar" for="multiple_files">Pievienojamie dokumenti</label>
                            <input class="block w-full text-sm text-degray border border-degreen rounded-sm cursor-pointer bg-gray-50 focus:outline-none" 
                            type="file"
                            name="documents[]"
                            id="documents"
                            multiple>
                            <div class="inline-flex mt-4 w-150 text-sm text-degray" id="user_avatar_help">Atmežojamās zemes uzmērījumu plāns, zemes robežu plāns, īpašuma tiesības apliecinošs dokuments, vietas foto fiksācija dabā, u.c., ja tādi ir pieejami <img class="w-6 ml-2" src="/img/alert-icon.svg" alt=""> </div>
                        </div> --}}
                    </div>
                    {{-- Block 3 --}}
                    <div class="w-full bg-white grid gap-4 py-10 px-24 mb-10 sm:grid-cols-2 sm:gap-6">                    
                        <div class="sm:col-span-4">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900"><span class="sup text-red-500">*</span> Īss darbu apraksts</label>
                            <textarea id="description" name="description" rows="8" class="bg-gray-50 border bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder=""></textarea>
                        </div>
                        <div class="sm:col-span-4 mx-auto">
                        <button type="submit" class="group text-white bg-degreen hover:bg-degreenlight font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-end hover:text-degreen uppercase">
                            Publicēt
                            <img class="block group-hover:hidden w-6" src="/img/white-arrow.png" alt="">
                            <img class="hidden group-hover:block w-6" src="/img/green-arrow.png" alt="">
                        </button>
                        </div>
                    </div>
                </form>
            </div>
          </section>
        
        
    </div>
</div>

    @if (session('show_success_modal'))
            <div id="successModal" tabindex="-1" aria-hidden="true"
            class="fixed inset-0 z-50 hidden flex justify-center items-center"
            style="background: linear-gradient(to bottom, rgba(153, 153, 153, 0.6), rgba(255, 255, 255, 0.6));">
           <div class="relative w-full max-w-sm max-h-full">
               <div class="relative bg-white rounded-sm border-degreen shadow px-6 py-16 text-center">
                   <button data-modal-hide="testModal" type="button"
                           class="absolute top-4 right-4">
                       <img src="/img/close.svg" alt="">
                   </button>
                   <p class="text-sm text-gray-600 mb-4">Jūsu pasūtījums ar ID Nr. “<b>{{ session('order_id') }}</b>” ir izveidots un nosūtīts DEFORESTING komandai, kas ar Jums sazināsies tuvākajā laikā.</p>
                   <x-button-link href="/orders">Doties uz pasūtījumu sadaļu</x-button-link>
                   
               </div>
           </div>
       </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const modal = new Modal(document.getElementById('successModal'));
                    modal.show();
                });
            </script>
        @endif

<x-footer />