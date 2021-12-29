<x-theme>

    <x-container>
        <h1 class="p-8 text-center text-9xl">404</h1>

        <x-row>
            <x-col-4>
                @livewire('AddPopupPage',['uri'=>$_SERVER['PATH_INFO']])
            </x-col-4>
            <x-col-4>
                <x-card class="h-100">
                    <x-card-body>
                        입력폼
                    </x-card-body>
                </x-card>
            </x-col-4>
            <x-col-4>
                <x-card class="h-100">
                    <x-card-body>
                        테이블
                    </x-card-body>
                </x-card>
            </x-col-4>
        </x-row>
    </x-container>


</x-theme>
