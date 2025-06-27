<x-public-header/>
<x-client.submenu />

<div class="container mx-auto py-6">
    <div class="flex flex-col md:flex-row align-center px-4 h-10 gap-1">
        <div class="">
            <h3 class="text-3xl text-degreenlight uppercase text-right">
                Mani lietotāja dati 
            </h3>
        </div>
        <div>
            <img class="w-12 -mt-2" src="img/arrow-degreenlight-low.svg" alt="">
        </div> 
    </div>
</div>

<div class="container mx-auto pt-5 pb-20">
    <div class="flex flex-col md:flex-row align-center px-4 gap-1">
        <div class="w-full sm:max-w-2xl px-20 py-16 mx-auto bg-white border-degree rounded-sm">
            @include('profile.partials.update-profile-information-form')
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>


<x-footer/>
