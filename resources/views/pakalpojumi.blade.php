<x-public-header/>


<div class="w-full bg-gray-100">
    <div class="container mx-auto py-20 px-4 text-center">
        <h1 class="text-7xl text-degray uppercase">PAKALPOJUMI</h1>
        <section class="container mx-auto py-20 px-4 text-center">
            <div class="grid md:grid-cols-3 sm:grid-cols-2 md:gap-14 gap-4">
              {{-- Pakalpojums 1 --}}
            
              <div class="flex flex-col items-center rounded-sm bg-red border-2 border-degreen">
                <a href="/atmezosana">
                <img class="object-cover border-b-2 border-degreen" src="/img/atmezosana.png" alt="">
                
              <h3 class="text-xl text-degray uppercase text-center py-4 px-4">
                Atmezošana
              </h3> 
            </a>
            </div>
         
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
</div>




<x-footer />