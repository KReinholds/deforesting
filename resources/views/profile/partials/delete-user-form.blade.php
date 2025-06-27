<section class="space-y-6">
    
    <p class="mt-3 flex items-center justify-end text-lg text-degray text-right">
    <button class="italic uppercase text-dered"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Dzēst profilu') }}</button>
    <img class="h-5 ml-3 inline" src="/img/bin.svg" alt="">
    </p>

    <x-modal class="w-full sm:max-w-xs" name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')
            <div class="flex flex-col justify-items-center text-center ">
            <h2 class="text-lg font-medium text-gray-900">
                Vai tiešām vēlaties to darīt?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Ja nospiedīsies pogu “Dzēst profilu”, Jūsu profils tiks neatgriezeniski dzēsts.
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Ievadiet paroli') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block "
                    placeholder="{{ __('Ievadiet paroli') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-center gap-4">
                <a href="" variants="secondary" class="uppercase text-degreen border border-degreen bg-transparent font-semibold rounded-sm text-sm px-5 py-3 gap-x-2.5 text-center inline-flex items-center"" x-on:click="$dispatch('close')">
                    Atcelt
                </a>

                <x-primary-button class="">
                    {{ __('Dzēst profilu') }}
                </x-primary-button>
            </div>
        </div>
        </form>
    </x-modal>
</section>
