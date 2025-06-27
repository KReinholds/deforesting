<x-public-header/>
{{-- Hero --}}
<div class="w-full h-96 bg-center bg-cover"
    style="background-image: url(http://deforesting.test/img/pasutijumi-hero-50m.jpg);">
    <div class="container h-full mx-auto px-4">
        <div class="h-full grid w-full mx-auto content-end">
            <div class="content-end">
                <h1 class="text-7xl text-white text-left uppercase my-5">PASŪTĪJUMI</h1>
            </div>
        </div>
        
    </div>
</div>

<div class="w-full bg-gray-100">
    <div class="container mx-auto py-20 px-4">

{{-- @forelse($jobs as $job)

<ul>
  <li>{{ $job }}</li>
</ul>
@empty
 No Orders

@endforelse --}}

  {{-- Categories --}}
        <div class="flex flex-wrap gap-2 mb-20">
            <div class="">
                <a href="" type="button" class="group text-degreen bg-white border-1 border-degreen font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-end hover:text-dered uppercase hover:underline">
                    ATMEŽOŠANA
                </a>
            </div>
            <div class="">
                <a href="" type="button" class="group text-degreen bg-white border-1 border-degreen font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-end hover:text-dered uppercase hover:underline">
                    CELMU IZŅEMŠANA, UTILIZĀCIJA
                </a>
            </div>
            <div class="">
                <a href="" type="button" class="group text-degreen bg-white border-1 border-degreen font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-end hover:text-dered uppercase hover:underline">
                    KOKSNES UN APAUGUMA IZZĀĢĒŠANA
                </a>
            </div>
            <div class="">
                <a href="" type="button" class="group text-degreen bg-white border-1 border-degreen font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-end hover:text-dered uppercase hover:underline">
                    ARBORISTU PAKALPOJUMI
                </a>
            </div>
            <div class="">
                <a href="" type="button" class="group text-degreen bg-white border-1 border-degreen font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-end hover:text-dered uppercase hover:underline">
                    MĒRNIEKU PAKALPOJUMI
                </a>
            </div>
            <div class="">
                <a href="" type="button" class="group text-degreen bg-white border-1 border-degreen font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-end hover:text-dered uppercase hover:underline">
                    MEŽA IEAUDZĒŠANA, APZAĻUMOŠANA, STĀDI
                </a>
            </div>
            <div class="">
                <a href="" type="button" class="group text-degreen bg-white border-1 border-degreen font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-end hover:text-dered uppercase hover:underline">
                    ZEMES RAKŠANAS DARBI
                </a>
            </div>
            <div class="">
                <a href="" type="button" class="group text-degreen bg-white border-1 border-degreen font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-end hover:text-dered uppercase hover:underline">
                    SMILTS, GRANTS, MELNZEME
                </a>
            </div>
            <div class="">
                <a href="" type="button" class="group text-degreen bg-white border-1 border-degreen font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-end hover:text-dered uppercase hover:underline">
                    RĪKSTNIEKS, FEN ŠUI, CITI PAKALPOJUMI
                </a>
            </div>
            <div class="">
                <a href="" type="button" class="group text-degreen bg-white border-1 border-degreen font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-end hover:text-dered uppercase hover:underline">
                    KOMPLEKSAIS PAKALPOJUMS
                </a>
            </div>
          </div>

{{-- Pasutijums 1 --}}
    <div class="flex border border-degreen rounded-sm p-1 mb-1">
        <div class="basis-full md:basis-1/4 self-center justify-items-center text-center">
            <p class="text-degray">
            ID Nr. 02_00002
            <br>
            00.00.0000.
            </p>
        </div>
        <div class="basis-full md:basis-1/4">
          <img class="object-cover w-48 h-32 md:h-32 md:w-48 rounded-sm" src="/img/zemes-raksana.png" alt="">
        </div>
        <div class="basis-full md:basis-1/2 self-center text-left pl-4">
          <p class="text-lg text-degreen mb-2">NEPIECIEŠAMA ATMEŽOŠANA</p>
          <p class="mb-2 text-degray">Pēteris Ļ.</p>
          <div class="flex items-center space-x-6">
            <img class="w-10" src="/img/location.svg" alt="">
            <p class="text-degray">Amatas nov.</p>
          </div>
        </div>
        <div class="basis-full md:basis-1/4 self-center text-center">
            <div class="flex text-center justify-center">
              <p class="text-lg text-degreen mr-1">SKATĪT</p>
              <img class="h-4 self-center" src="/img/arrow-green.png" alt="">
            </div>
          
          <p class="text-degray">Aktīvs līdz 00.00.0000. </p>
        </p>
        </div>
      </div>

      {{-- Pasutijums 2 --}}
    <div class="flex border border-degreen rounded-sm p-1 mb-1">
        <div class="basis-full md:basis-1/4 self-center justify-items-center text-center">
            <p class="text-degray">
            ID Nr. 02_00002
            <br>
            00.00.0000.
            </p>
        </div>
        <div class="basis-full md:basis-1/4">
          <img class="object-cover w-48 h-32 md:h-32 md:w-48 rounded-sm" src="/img/zemes-raksana.png" alt="">
        </div>
        <div class="basis-full md:basis-1/2 self-center text-left pl-4">
          <p class="text-lg text-degreen mb-2">NEPIECIEŠAMA ATMEŽOŠANA</p>
          <p class="mb-2 text-degray">Pēteris Ļ.</p>
          <div class="flex items-center space-x-6">
            <img class="w-10" src="/img/location.svg" alt="">
            <p class="text-degray">Amatas nov.</p>
          </div>
        </div>
        <div class="basis-full md:basis-1/4 self-center text-center">
            <div class="flex text-center justify-center">
              <p class="text-lg text-degreen mr-1">SKATĪT</p>
              <img class="h-4 self-center" src="/img/arrow-green.png" alt="">
            </div>
          
          <p class="text-degray">Aktīvs līdz 00.00.0000. </p>
        </p>
        </div>
      </div>
      {{-- Pasutijums 3 --}}
    <div class="flex border border-degreen rounded-sm p-1 mb-1">
        <div class="basis-full md:basis-1/4 self-center justify-items-center text-center">
            <p class="text-degray">
            ID Nr. 02_00002
            <br>
            00.00.0000.
            </p>
        </div>
        <div class="basis-full md:basis-1/4">
          <img class="object-cover w-48 h-32 md:h-32 md:w-48 rounded-sm" src="/img/zemes-raksana.png" alt="">
        </div>
        <div class="basis-full md:basis-1/2 self-center text-left pl-4">
          <p class="text-lg text-degreen mb-2">NEPIECIEŠAMA ATMEŽOŠANA</p>
          <p class="mb-2 text-degray">Pēteris Ļ.</p>
          <div class="flex items-center space-x-6">
            <img class="w-10" src="/img/location.svg" alt="">
            <p class="text-degray">Amatas nov.</p>
          </div>
        </div>
        <div class="basis-full md:basis-1/4 self-center text-center">
            <div class="flex text-center justify-center">
              <p class="text-lg text-degreen mr-1">SKATĪT</p>
              <img class="h-4 self-center" src="/img/arrow-green.png" alt="">
            </div>
          
          <p class="text-degray">Aktīvs līdz 00.00.0000. </p>
        </p>
        </div>
      </div>
      {{-- Pasutijums 4 --}}
    <div class="flex border border-degreen rounded-sm p-1 mb-1">
        <div class="basis-full md:basis-1/4 self-center justify-items-center text-center">
            <p class="text-degray">
            ID Nr. 02_00002
            <br>
            00.00.0000.
            </p>
        </div>
        <div class="basis-full md:basis-1/4">
          <img class="object-cover w-48 h-32 md:h-32 md:w-48 rounded-sm" src="/img/zemes-raksana.png" alt="">
        </div>
        <div class="basis-full md:basis-1/2 self-center text-left pl-4">
          <p class="text-lg text-degreen mb-2">NEPIECIEŠAMA ATMEŽOŠANA</p>
          <p class="mb-2 text-degray">Pēteris Ļ.</p>
          <div class="flex items-center space-x-6">
            <img class="w-10" src="/img/location.svg" alt="">
            <p class="text-degray">Amatas nov.</p>
          </div>
        </div>
        <div class="basis-full md:basis-1/4 self-center text-center">
            <div class="flex text-center justify-center">
              <p class="text-lg text-degreen mr-1">SKATĪT</p>
              <img class="h-4 self-center" src="/img/arrow-green.png" alt="">
            </div>
          
          <p class="text-degray">Aktīvs līdz 00.00.0000. </p>
        </p>
        </div>
      </div>


{{-- Pagination --}}
  <nav class="mt-10" aria-label="Page navigation example">
    <ul class="flex items-center justify-center -space-x-px h-10 text-base">
      <li>
        <a href="#" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500   rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
          <span class="sr-only">Previous</span>
          <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
        </a>
      </li>
      <li>
        <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-degreen">1</a>
      </li>
      <li>
        <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-degreen">2</a>
      </li>
      <li>
        <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-4 h-10 leading-tight text-white rounded-sm bg-degraylight hover:text-white ">3</a>
      </li>
      <li>
        <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-degreen">4</a>
      </li>
      <li>
        <a href="#" class="flex items-center justify-center px-4 h-10 leading-tight text-degreen">5</a>
      </li>
      <li>
        <a href="#" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500   rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
          <span class="sr-only">Next</span>
          <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
        </a>
      </li>
    </ul>
  </nav>
  




    </div>
</div>

{{-- Footer --}}
<x-footer />





<!-- Modal toggle -->
<button data-modal-target="static-modal" data-modal-toggle="static-modal" class="hidden block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-hidden focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
  Toggle modal
</button>

<!-- Main modal -->
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Static modal
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="static-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <button data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-hidden focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">I accept</button>
                <button data-modal-hide="static-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-hidden bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Decline</button>
            </div>
        </div>
    </div>
</div>


 <!-- Swiper JS -->
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

 <!-- Initialize Swiper -->
 <script>
   var swiper = new Swiper(".mySwiper", {
     slidesPerView: 3,
     spaceBetween: 30,
     navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
   });
 </script> 
</body>
</html>