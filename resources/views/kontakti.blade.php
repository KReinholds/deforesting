<x-public-header/>


<div class="w-full bg-gray-100">
    <div class="container mx-auto pt-20 px-4 text-center">
        <h1 class="text-5xl md:text-7xl text-degray uppercase">Kontakti</h1>
        <section class="container py-10 md:py-20 px-4 text-center">
            
            <div class="grid grid-cols-12 gap-4">
                
                <div class="col-span-12 md:col-span-7 border px-10 md:px-20 py-10 md:py-20 text-left border-degreen text-degray text-sm rounded-sm">
                    <h3 class="text-2xl md:text-3xl text-degreen mb-4 md:mb-10 uppercase text-center md:text-left">
                        Sazinieties ar mums!
                    </h3>
                    <form action="/kontakti" method="POST">
                        @csrf
                            <div class="mb-4">
                                <label for="name" class="block mb-2 text-sm font-medium text-degray"><span class="sup text-red-500">*</span> Vārds, uzvārds / Nosaukums</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="Vārds, uzvārds / Nosaukums" required="">
                            </div> 
                            <div class="mb-4">
                                <label for="email" class="block mb-2 text-sm font-medium text-degray"><span class="sup text-red-500">*</span> E-pasts</label>
                                <input type="email" name="email" id="name" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="E-pasts" required="">
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="block mb-2 text-sm font-medium text-degray">Tālrunis</label>
                                <input type="phone" name="phone" id="name" class="bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder="Tālrunis" required="">
                            </div>   
                            <div class="mb-4">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900"> Ziņas teksts</label>
                                <textarea id="description" name="description" rows="8" class="bg-gray-50 border bg-gray-50 border border-degreen text-degray text-sm rounded-sm focus:ring-degreen focus:border-degreen block w-full p-2.5 placeholder:text-degraylight" placeholder=""></textarea>
                            </div>        
                            <div class="text-center md:text-right">
                                <button type="submit" class="group text-white bg-degreen hover:bg-degreenlight font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-end hover:text-degreen uppercase">
                                    SŪTĪT ZIŅU
                                    <img class="block group-hover:hidden w-6" src="/img/white-arrow.png" alt="">
                                    <img class="hidden group-hover:block w-6" src="/img/green-arrow.png" alt="">
                                </button>
                            </div>
                    </form>
                </div>
                <div class="col-span-12 md:col-span-5 bg-degreen rounded-sm px-10 md:px-20 py-10 md:py-20">
                    <h3 class="text-2xl md:text-3xl text-white mb-10 uppercase">
                        Kontaktinformācija
                    </h3>
                    <div class="flex flex-row items-center justify-items-center mb-10 gap-4">
                        <div class="basis-1/4">
                            <img src="/img/location-contacts.svg" alt="">
                        </div>
                        <div class="basis-3/4">
                            <p class="text-white text-lg md:text-xl text-left">Adreses iela 2, Rīga</p>    
                        </div>
                      </div>
                      <div class="flex flex-row items-center  mb-10 gap-4">
                        <div class="basis-1/4 justify-self-center">
                            <img class="" src="/img/mail.svg" alt="">
                        </div>
                        <div class="basis-3/4">
                            <p class="text-white text-lg md:text-xl text-left">info@deforesting.lv</p>    
                        </div>
                      </div>
                      <div class="flex flex-row items-center gap-4">
                        <div class="basis-1/4">
                            <img src="/img/phone.svg" alt="">
                        </div>
                        <div class="basis-3/4">
                            <p class="text-white text-lg md:text-xl text-left">+371 21234567</p>    
                        </div>
                      </div>
                </div>
               
              </div> 
        </section>
    </div>
</div>




<x-footer />