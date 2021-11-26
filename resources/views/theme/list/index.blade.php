<x-theme theme="admin.sidebar2">
    <x-theme-layout>

        <!-- start page title -->
        <x-row >
            <x-col class="col-8">
                <div class="page-title-box">
                    <ol class="m-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Theme</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>

                    <div class="mb-3">
                        <h1 class="align-middle h3 d-inline"><strong>테마</strong> 목록</h1>
                        <p></p>
                    </div>
                </div>
            </x-col>
        </x-row>
        <!-- end page title -->


        <div class="relative">
            <div class="absolute right-0 bottom-4">
                <a href="#" class="bg-white btn btn-light me-2">Invite a Friend</a>
                <a href="{{route('admin.theme.list.create')}}" class="btn btn-primary">추가</a>
            </div>
        </div>


        <x-row>
            <div class="col-lg-2">
                @include("jinyadmin::theme.submenu")
            </div>
            <div class="col-lg-10">

                @livewire('LiveTreeJson')

            </div>
        </x-row>


    </x-theme-layout>
</x-theme>




