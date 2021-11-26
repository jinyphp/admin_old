<x-theme theme="admin.sidebar2">
    <x-theme-layout>

        <!-- start page title -->
        <x-row>
            <x-col class="col-8">
                <div class="page-title-box">
                    <ol class="m-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>

                    <div class="mb-3">
                        <h1 class="align-middle h4 d-inline">회원 권환설정</h1>
                        <p>가입된 회원을 단계별 등급을 통하여 구분할 수 있습니다.</p>
                    </div>
                </div>
            </x-col>
        </x-row>
        <!-- end page title -->

        <div class="relative">
            <div class="absolute right-0 bottom-4">
                <a href="{{route('admin.users.role.create')}}" class="btn btn-primary">추가</a>
            </div>
        </div>

        <x-row>
            <div class="col-lg-2">
                @include("jinyadmin::users.submenu")
            </div>
            <div class="col-lg-10">
                <x-row>
                    <x-col>
                        <x-card>
                            <x-card-header>

                            </x-card-header>
                            <x-card-body>
                                <x-table>
                                    <x-thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                        </tr>
                                    </x-thead>
                                    <tbody>
                                        @foreach ($roles as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td><a href="{{route('admin.users.role.edit', $item->id)}}">{{$item->name}}</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </x-table>
                            </x-card-body>
                        </x-card>
                    </x-col>
                </x-row>
            </div>
        </x-row>



    </x-theme-layout>
</x-theme>
