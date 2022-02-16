<x-theme theme="admin.sidebar2">
    <x-theme-layout>

        <!-- start page title -->
        @if (isset($actions['view_title']))
            @includeIf($actions['view_title'])
        @endif
        <!-- end page title -->

        <div class="relative">
            <div class="absolute right-0 bottom-4">
                <div class="btn-group">
                    <x-button danger >Reset</x-button>
                    <x-button danger >Rollback</x-button>
                </div>
            </div>
        </div>



        @livewire('WireTable', ['actions'=>$actions])

        @livewire('Popup-LiveForm', ['actions'=>$actions])

        @livewire('Popup-LiveManual')



    </x-theme-layout>
</x-theme>
