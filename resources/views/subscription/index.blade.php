<x-public-header />



<div class="w-full bg-gray-100 ">
    <div class="container mx-auto pt-20 px-4 text-center">
        <h1 class="text-5xl md:text-5xl text-degreen uppercase">Abonēšanas noteikumi</h1>
        <section class="container py-10 md:py-10 px-4 text-center">
            
            <div class="bg-degraylight border border-degreenlight text-degray rounded py-16 px-16 mb-12">
                <div class="flex items-start justify-center gap-2">
                    <img src="/img/alert-icon.svg" class="w-5 h-5 mt-1" alt="">
                    <span class="text-dered text-xl font-normal">
                        PASŪTĪJUMA IZVEIDE IR BEZMAKSAS PAKALPOJUMS.<br> PASŪTĪTĀJS IZVEIDO PASŪTĪJUMU BEZ MAKSAS.
                    </span>
                </div>
            </div>

            
                <div class="py-10 text-left">
                  <h2 class="text-degreen text-3xl text-left font-normal mb-10 uppercase">Abonementu maksas plāns ir saistošs:</h2>
                    <div class="flex flex-row gap-10">
                        <div class="basis-1/2">
                            <hr class="py-4 border-t-2">
                            <h3 class="text-2xl text-degreenlight pb-4">
                                1.
                            </h3>
                            <p class="text-base pb-4 text-degray line-clamp-2">
                                Potenciālajiem pasūtījumu izpildītājiem, kas vēlas pieteikties pasūtījuma izpildei
                            </p> 
                        </div>
                        <div class="basis-1/2">
                            <hr class="py-4 border-t-2">
                            <h3 class="text-2xl text-degreenlight pb-4">
                                2.
                            </h3>
                           <p class="text-base text-degray pb-4">
                            visiem, kas vēlas detalizēti apskatīt izveidotos piedāvājumus
                            </p> 
                            
                        </div>
                      </div>
                </div>


                <div class="py-10 text-left">
                    <h2 class="text-degray text-3xl text-center font-normal mb-10 uppercase">ABONEMENTU PLĀNU PRIEKŠROCĪBAS</h2>

                        <div class="grid grid-cols-3 gap-x-16 mb-20">
                            <div class="bg-white p-8 border-2 border-degraylight rounded-sm">
                                <img class="w-12 justify-self-end pb-4" src="img/badge-check.svg" alt="">
                                <p class="text-base text-degray text-center">
                                    Iegādājoties Deforesting abonementu, tā darbības laikā būs <span class="font-bold text-degreen">aktīva sadaļa</span>  “Izteikt piedāvājumu” pakalpojumam, kuru spējat un vēlaties nodrošināt.

                                </p>
                            </div>
                            <div class="bg-white p-8 border-2 border-degraylight rounded-sm">
                                <img class="w-12 justify-self-end pb-4" src="img/badge-check.svg" alt="">
                                <p class="text-base text-degray text-center">
                                    Izvēlieties vienu no plāniem un <span class="font-bold text-degreen uppercase">iegūstiet jaunus klientus</span> visā Latvijā!
                                </p>
                            </div>
                            <div class="bg-white p-8 border-2 border-degraylight rounded-sm">
                                <img class="w-12 justify-self-end pb-4" src="img/badge-check.svg" alt="">
                                <p class="text-base text-dered text-center">
                                    Abonementa maksa tiek piemērota visiem pakalpojumiem, lai izteiktu savu darbu izpildes piedāvājumu un izvērsti varētu apskatīt pasūtītāja pasūtījumu. 
                                </p>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <h3 class="text-xl text-degray pb-12 uppercase text-center">
                                Piedāvājiet labākus pakalpojumus un piesaistiet vairāk klientu ar mūsu izdevīgajiem abonementu plāniem!
                            </h3>
                            <x-button-link href="{{ route('subscription.choose') }}" class="mt-4 inline-flex">
                                Izvēlēties abonementu
                            </x-button-link>
                        </div>
                        
                    </div>
        </section>
    </div>
</div>


<x-footer />
