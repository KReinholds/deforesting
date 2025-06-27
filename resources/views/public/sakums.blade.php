
<x-public-header/>

{{-- Hero --}}
<div class="w-full h-96 bg-center bg-cover"
    style="background-image: url(http://deforesting.test/img/mezs-panoramic.jpg);">
    <div class="container h-full mx-auto">
        <div class="h-full grid w-2/3 mx-auto content-end">
            <div class="content-end">
                <h1 class="text-7xl text-white text-center uppercase my-5">Laipni lūgti Deforesting platformā!</h1>
            </div>
        </div>
        
    </div>
</div>

<div class="w-full bg-gray-100 bg-[url('/img/mezs-panoramic.jpg')]">
    <div class="container mx-auto py-20">
        <div class="grid w-100 md:w-2/3 mx-auto">
                <p class="text-base text-center">
                    DEFORESTING.lv ir vadošā platforma, kas nodrošina visaptverošus risinājumus saistībā ar atmežošanu jeb meža zemes transformāciju citā zemes lietošanas veidā. Mēs neesam tikai platforma – mēs esam atmežošanas eksperti, kas ļauj klientiem realizēt savus būvniecības vai attīstības projektus, piedāvājot pilnu pakalpojumu klāstu un informāciju par atmežošanu regulējošajiem normatīviem aktiem.
                </p>
        </div>
    </div>
</div>
<section class="w-full pt-32 pb-16 bg-white">
    <div class="container mx-auto">
      <h1 class="text-degray text-5xl font-normal mb-10">DEFORESTING PLATFORMA:</h1>
        <div class="flex flex-row gap-10">
            <div class="basis-1/2">
                <hr class="py-4 border-t-2">
                <h3 class="text-2xl text-degreen pb-4">
                    IZDEVĪGĀKĀ CENA
                </h3>
                <p class="text-base pb-4 text-degray line-clamp-2">
                Iespēja izvēlēties  izdevīgāko cenas piedāvājumu meža zemes atmežošanai
                </p> 
                <x-button href="#" class="p-4">Uzzināt vairāk</x-button>
            </div>
            <div class="basis-1/2">
                <hr class="py-4 border-t-2">
                <h3 class="text-2xl text-degreen pb-4">
                    PAKALPOJUMU SNIEDZĒJI
                </h3>
               <p class="text-base pb-4">
                Ar atmežošanu saistīto pakalpojumu sniedzēju izvēle
                </p> 
                
            </div>
          </div>
    </div>
</section>
{{-- Ka tas strada --}}
<section class="w-full py-16 bg-white">
  <div class="container mx-auto">
    <h1 class="text-degray text-5xl font-normal mb-20 text-center">
      KĀ TAS STRĀDĀ
    </h1>
    <div class="grid grid-cols-5 gap-14">
      <div class="relative z-30 py-8 px-5 rounded-sm text-center text-degray bg-degraylight">
        {{-- <img class="absolute z-40 m-auto inset-y-0 -right-10 h-6" src="img/arrow-swiper.png" alt=""> --}}
        <img class="z-10 mx-auto h-16 mb-4" src="img/zeme.png" alt="">
        <h5 class="text-dered font-semibold text-base mb-4">ZEME</h5>
        <p class="text-base">Tev pieder zeme. Meža zeme vai aizaugusi lauksaimniecības zeme</p>
      </div>
      <div class="py-8 px-5 rounded-sm text-center text-degray bg-degraylight">
        <img class="mx-auto h-16 mb-4" src="img/plano.png" alt="">
        <h5 class="text-dered font-semibold text-base mb-4">PLĀNO</h5>
        <p class="text-base">Vēlies uzsākt celtniecību, nozāģēt krūmus, izraut celmus vai ierīkot ķiršu dārzu?</p>
      </div>
      <div class="py-8 px-5 rounded-sm text-center text-degray bg-degraylight">
        <img class="mx-auto h-16 mb-4" src="img/aizpildi.png" alt="">
        <h5 class="text-dered font-semibold text-base mb-4">AIZPILDI</h5>
        <p class="text-base">Tu, kā Pasūtītājs, DEFORESTING platformā aizpildi pasūtījuma formu</p>
      </div>
      <div class="py-8 px-5 rounded-sm text-center text-degray bg-degraylight">
        <img class="mx-auto h-16 mb-4" src="img/sanem.png" alt="">
        <h5 class="text-dered font-semibold text-base mb-4">SAŅEM</h5>
        <p class="text-base">Izpildītāji ierauga Tavu pasūtījumu un steidz iesniegt savus piedāvājumus </p>
      </div>
      <div class="py-8 px-5 rounded-sm text-center text-degray bg-degraylight">
        <img class="mx-auto h-16 mb-4" src="img/iegusti.png" alt="">
        <h5 class="text-dered font-semibold text-base mb-4">IEGŪSTI</h5>
        <p class="text-base">DEFORESTING tos apkopos un sagatavos labāko pakalpojuma cenas piedāvājumu tirgū</p>
      </div>
    </div>
  <div class="text-center pt-20">
    <h3 class="text-2xl text-degray pb-12 uppercase text-center">
      Veic vienkāršu, kvalitatīvu un salīdzinoši ātru cenas aptauju
  </h3>
  <x-button href="/orders/create">Izveidot pasūtījumu</x-button>
  </div>
  </div>
</section>


<div class="w-full bg-gray-100">
  <div class="container mx-auto py-20 px-4">
      <div class="grid mx-auto">

        <h3 class="text-xl text-degray pb-12 uppercase text-center">
          Uzsāc savu ceļu ar Deforesting.lv – platformu, kur visi gūst labumu no vienkāršības un efektivitātes!
        </h3> 

        

<div x-data="{ activeTab: 'text1' }" class="grid md:grid-cols-2 grid-cols-1 w-full gap-4 md:gap-30">
  <!-- Left column: Selectors -->
  <div class="flex flex-col text-right items-center md:items-end">
    <!-- Option 1 -->
    <div class="inline-flex pb-12">
      <label @click="activeTab = 'text1'" class="cursor-pointer inline-flex items-center gap-2">
        <h3
          :class="activeTab === 'text1' ? 'text-3xl' : 'text-2xl'"
          class="text-degreen uppercase text-right transition-all duration-200"
        >
          JA ESI PASŪTĪTĀJS
        </h3>
        <img
          :class="activeTab === 'text1' ? 'w-10' : 'w-8'"
          class="transition-all duration-200"
          src="img/arrow-rb.png"
          alt=""
        >
      </label>
    </div>

    <!-- Option 2 -->
    <div class="inline-flex pb-12">
      <label @click="activeTab = 'text2'" class="cursor-pointer inline-flex items-center gap-2">
        <h3
          :class="activeTab === 'text2' ? 'text-3xl' : 'text-2xl'"
          class="text-degreen uppercase text-right transition-all duration-200"
        >
          JA ESI IZPILDĪTĀJS
        </h3>
        <img
          :class="activeTab === 'text2' ? 'w-10' : 'w-8'"
          class="transition-all duration-200"
          src="img/arrow-rb.png"
          alt=""
        >
      </label>
    </div>
  </div>

  <!-- Right column: Content with fade only -->
  <div class="relative min-h-[250px]">
    <!-- Text1 -->
    <div
      x-show="activeTab === 'text1'"
      x-transition:enter="transition-opacity duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition-opacity duration-200"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      x-cloak
      class="absolute w-full"
    >
      <p class="text-base text-left pb-8">
        <strong>Izveido pasūtījumu.</strong> Tas ir ātri un bez maksas. Piesakies, reģistrējies un ar dažiem klikšķiem izveido savu pasūtījumu.
      </p>
      <p class="text-base text-left pb-8">
        <strong>Saņem piedāvājumus.</strong> Būs nepieciešama tikai viena nedēļa, lai saņemtu tirgus dalībnieku reālo cenu.
      </p>
      <p class="text-base text-left pb-8">
        <strong>Izvēlies izpildītāju.</strong> Izvēlies izpildītāju – atlasi un vienojies par darba apjomu un termiņiem.
      </p>
    </div>

    <!-- Text2 -->
    <div
      x-show="activeTab === 'text2'"
      x-transition:enter="transition-opacity duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition-opacity duration-200"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      x-cloak
      class="absolute w-full"
    >
      <p class="text-base text-left pb-8">
        <strong>Nopērc abonementu.</strong> Reģistrējies, izvēlies abonementu un norādi, kādus pasūtījumus vēlies saņemt.
      </p>
      <p class="text-base text-left pb-8">
        <strong>Saņem pasūtījumus.</strong> Nedēļas laikā izsaki piedāvājumus un konkurē par jauniem klientiem.
      </p>
      <p class="text-base text-left pb-8">
        <strong>Noslēdz vienošanos.</strong> Vienojies par izpildes nosacījumiem ar pasūtītāju un gūsti panākumus.
      </p>
    </div>
  </div>
</div>

           
             
      </div>
  </div>
</div>

{{-- Pakalpojumu saraksts --}}
<div class="w-full bg-white">
<section class="container mx-auto py-20 px-4 text-center">
  <h1 class="text-degray text-5xl font-normal mb-20 text-center">
    PIEEJAMIE PAKALPOJUMI
  </h1>
  <div class="grid md:grid-cols-3 sm:grid-cols-2 md:gap-14 gap-4">
    {{-- Pakalpojums 1 --}}
    <a href="/atmezosana">
    <div class="flex flex-col items-center rounded-sm bg-red border-2 border-degreen">
    <img class="object-cover border-b-2 border-degreen" src="/img/atmezosana.png" alt="">
    <h3 class="text-xl text-degray uppercase text-center py-4 px-4">
      Atmezošana
    </h3> 
  </div>
    </a>
    {{-- Pakalpojums 2 --}}
  <div class="flex flex-col items-center rounded-sm bg-red border-2 border-degreen">
    <img class="object-cover border-b-2 border-degreen" src="/img/pakalpojumi-celmi.png" alt="">
    <h3 class="text-xl text-degray uppercase text-center py-4 px-4">
      Celmu izņemšana, utilizācija
    </h3> 
  </div>
   {{-- Pakalpojums 3 --}}
  <div class="flex flex-col items-center rounded-sm bg-red border-2 border-degreen">
    <img class="object-cover border-b-2 border-degreen" src="/img/pakalpojumi-izzagesana.png" alt="">
    <h3 class="text-xl text-degray uppercase text-center py-4 px-4">
      Koksnes un apauguma izzāģēšana
    </h3> 
  </div>
  {{-- Pakalpojums 4 --}}
  <div class="flex flex-col items-center rounded-sm bg-red border-2 border-degreen">
    <img class="object-cover border-b-2 border-degreen" src="/img/arboristu-pakalpojumi.png" alt="">
    <h3 class="text-xl text-degray uppercase text-center py-4 px-4">
      Arboristu pakalpojumi
    </h3> 
  </div>
  {{-- Pakalpojums 5 --}}
  <div class="flex flex-col items-center rounded-sm bg-red border-2 border-degreen">
    <img class="object-cover border-b-2 border-degreen" src="/img/mernieka-pakalpojumi.png" alt="">
    <h3 class="text-xl text-degray uppercase text-center py-4 px-4">
      Mērnieka pakalpojumi
    </h3> 
  </div>
  {{-- Pakalpojums 6 --}}
  <div class="flex flex-col items-center rounded-sm bg-red border-2 border-degreen">
    <img class="object-cover border-b-2 border-degreen" src="/img/ieaudzesana.png" alt="">
    <h3 class="text-xl text-degray uppercase text-center py-4 px-4">
      Meža ieaudzēšana, apzaļumošana, stādi
    </h3> 
  </div>
  {{-- Pakalpojums 7 --}}
  <div class="flex flex-col items-center rounded-sm bg-red border-2 border-degreen">
    <img class="h-auto max-w-full border-b-2 border-degreen" src="/img/zemes-raksana.png" alt="">
    <h3 class="text-xl text-degray uppercase text-center py-4 px-4 ">
      Zemes rakšanas darbi
    </h3> 
  </div>
  {{-- Pakalpojums 8 --}}
  <div class="flex flex-col items-center rounded-sm bg-red border-2 border-degreen">
    <img class="h-auto max-w-full border-b-2 border-degreen" src="/img/melnzeme.png" alt="">
    <h3 class="text-xl text-degray uppercase text-center py-4 px-4">
      Smilts, grants, melnzeme
    </h3> 
  </div>
  {{-- Pakalpojums 9 --}}
  <div class="flex flex-col items-center rounded-sm bg-red border-2 border-degreen">
    <img class="h-auto max-w-full border-b-2 border-degreen" src="/img/rikstnieks.png" alt="">
    <h3 class="text-xl text-degray uppercase text-center py-4 px-4">
      Rīkstnieks, fen šui, citi pakalpojumi
    </h3> 
  </div>
  
</div>
<a href="/services" class="mt-12 text-degreen border border-degreen bg-transparent font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-center">
  UZ PAKALPOJUMIEM
  <img class="w-7" src="/img/arrow-green.png" alt="">
</a>
{{-- Kompleksais pakalpojums --}}
<div class="flex relative md:w-2/3 items-center mx-auto mt-20 mb-12">
  <img class="w-full" src="img/kompleksais-pakalpojums.jpg">
  <h3 class="absolute text-xl font-bold px-4 text-lg text-white m-auto left-0 right-0 uppercase">
      <p>Kas ir kompleksais pakalpojums?</p>
  </h3>
</div>
<x-button href="/orders/create">PIETEIKTIES KOMPLEKSAM PAKALPOJUMAM</x-button>
</section>
</div>


{{-- Pasutijumi --}}
<section class="py-20 bg-gray-100">
  <div class="container mx-auto text-center px-4">
    <h1 class="text-degray text-5xl font-normal mb-10 text-center">
      PASŪTĪJUMI
    </h1>
    <p class="mb-10 text-degreen border border-degreenlight bg-transparent font-normal rounded-sm text-xl px-5 py-3 gap-x-2.5 text-center inline-flex items-center uppercase">
      {{ $uniqueClients }} pasūtītāji jau gaida tavu piedāvājumu
    </p>
    {{-- Pasutijums 1 --}}
    <div class="flex border border-degreen rounded-sm p-1 mb-1">
      <div class="basis-1/4 self-center">
          <p class="">
          ID Nr. 02_00002
          <br>
          00.00.0000.
          </p>
      </div>
      <div class="basis-1/4">
        <img class="object-cover w-48 h-32 md:h-32 md:w-48 rounded-sm" src="/img/zemes-raksana.png" alt="">
      </div>
      <div class="basis-1/2 self-center text-left pl-4">
        <p class="text-lg text-degreen mb-2">NEPIECIEŠAMA ATMEŽOŠANA</p>
        <p class="mb-2">Pēteris Ļ.</p>
        <div class="flex items-center space-x-6">
          <img class="w-10" src="/img/location.svg" alt="">
          <p class="">Amatas nov.</p>
        </div>
      </div>
      <div class="basis-1/4 self-center text-center">
          <div class="flex text-center justify-center">
            <p class="text-lg text-degreen mr-1">SKATĪT</p>
            <img class="h-4 self-center" src="/img/arrow-green.png" alt="">
          </div>
        
        <p>Aktīvs līdz 00.00.0000. </p>
      </p>
      </div>
    </div>
    {{-- Pasutijums 2 --}}
    <div class="flex border border-degreen rounded-sm p-1 mb-12">
      <div class="basis-1/4 self-center">
          <p class="">
          ID Nr. 02_00002
          <br>
          00.00.0000.
          </p>
      </div>
      <div class="basis-1/4">
        <img class="object-cover w-48 h-full md:h-full md:w-48 rounded-sm" src="/img/kompleksais-pakalpojums.jpg" alt="">
      </div>
      <div class="basis-1/2 self-center text-left pl-2">
        <p class="text-lg text-degreen mb-2">NEPIECIEŠAMS KOMPLEKSAIS PAKALPOJUMS</p>
        <p class="mb-2">Pēteris Ļ.</p>
        <div class="flex items-center space-x-6">
          <img class="w-10" src="/img/location.svg" alt="">
          <p class="">Amatas nov.</p>
        </div>
      </div>
      <div class="basis-1/4 self-center text-center">
          <div class="flex text-center justify-center">
            <p class="text-lg text-degreen mr-1">SKATĪT</p>
            <img class="h-4 self-center" src="/img/arrow-green.png" alt="">
          </div>
        
        <p>Aktīvs līdz 00.00.0000. </p>
      </p>
      </div>
    </div>
    <x-button href="/orders">UZ CITIEM PASŪTĪJUMIEM</x-button>
  </div>
  
</section>

{{-- Aktualitates --}}
{{-- <section class="container mx-auto py-20 px-4 text-center">
  <h1 class="text-degray text-5xl font-normal mb-20 text-center uppercase">
    Aktualitātes
  </h1>
  <div class="flex gap-10">
    <div class="basis-1/2">
      <img class="rounded-sm" src="img/aktualitates_1.jpg" alt="">
    </div>
    <div class="basis-1/2 text-left self-end">
      <p class="text-lg text-degray mb-2">LOREM IPSUM</p>
      <p class="text-base text-degray mb-2">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim... 
      </p>
      <p class="text-base text-degray mb-2">
          <a href="" class="uppercase text-degreen text-sm"><i>Turpināt lasīt</i></a>
      </p>
    </div>
  </div>
</section> --}}


{{-- Atsauksmes --}}
{{-- <section class="py-20 bg-gray-100">
  <div class="container mx-auto text-center px-4">
  <h1 class="text-degray text-5xl font-normal mb-20 text-center uppercase">
    Atsauksmes
  </h1>
  <div class="flex gap-10">
    <!-- Swiper -->
<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <div class="flex flex-col h-96 border border-degreen rounded-sm p-6">
        <div class="flex mb-4">
            <img class="object-cover w-32 h-40 md:h-40 md:w-32 rounded-sm" src="img/atsauksme1.jpg" alt="">
            <p class="pl-4 text-base self-center">SIA "Nosaukums"</p>
        </div>
        <div>
          <p class="text-base text-left text-degray mb-2">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
          </p>
          <p class="text-base text-degray text-right">
            <a href="" class="uppercase text-degreen text-base"><i>SKATĪT</i></a>
        </p>
        </div>
      </div>
    </div>
    <div class="swiper-slide">
      <div class="flex flex-col h-96 border border-degreen rounded-sm p-6 ">
        <div class="flex mb-4">
            <img class="object-cover w-32 h-40 md:h-40 md:w-32 rounded-sm" src="img/atsauksme1.jpg" alt="">
            <p class="pl-4 text-base self-center">SIA "Nosaukums"</p>
        </div>
        <div class="flex-col">
          <p class="text-base text-left text-degray mb-2">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.
          </p>
          <p class="text-base text-degray text-right self-end">
            <a href="" class="uppercase text-degreen text-base"><i>SKATĪT</i></a>
        </p>
        </div>
      </div>
    </div>
    <div class="swiper-slide">
      <div class="basis-1/2">
        <img class="rounded-sm" src="img/aktualitates_1.jpg" alt="">
      </div>
    </div>
    <div class="swiper-slide">
      <div class="basis-1/2">
        <img class="rounded-sm" src="img/aktualitates_1.jpg" alt="">
      </div>
    </div>
    <div class="swiper-slide">
      <div class="basis-1/2">
        <img class="rounded-sm" src="img/aktualitates_1.jpg" alt="">
      </div>
    </div>
    <div class="swiper-slide">
      <div class="basis-1/2">
        <img class="rounded-sm" src="img/aktualitates_1.jpg" alt="">
      </div>
    </div>
    
  </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
    
    
  </div>
  </div>
</section> --}}

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