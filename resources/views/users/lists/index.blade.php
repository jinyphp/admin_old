<x-theme theme="admin.sidebar2">
    <x-theme-layout>

        <!-- start page title -->
        <x-row >
            <x-col class="col-8">
                <div class="page-title-box">
                    <ol class="m-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>

                    <div class="mb-3">
                        <h1 class="align-middle h3 d-inline"><strong>회원</strong> 목록</h1>
                        <p></p>
                    </div>
                </div>
            </x-col>
        </x-row>
        <!-- end page title -->


        <div class="relative">
            <div class="absolute right-0 bottom-4">
                <a href="#" class="bg-white btn btn-light me-2">Invite a Friend</a>
                <a href="{{route('admin.users.list.create')}}" class="btn btn-primary">추가</a>
            </div>
        </div>


        {{--
        @can('logged-in')
        @endcan
        --}}

        @if(session('success'))
        <div>
            {{session('success')}}
        </div>
        @endif

        @if(session('error'))
            <div>
                {{session('error')}}
            </div>
        @endif


        <x-card>
            <x-card-header>
            </x-card-header>
            <x-card-body>
                <x-table>
                    <x-thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>regdate</th>
                        </tr>
                    </x-thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td><a href="{{route('admin.users.list.profile.index',[ $item->id ])}}">{{$item->name}}</a></td>
                                <td><a href="{{route('admin.users.list.edit', $item->id)}}">{{$item->email}}</a></td>
                                <td>{{$item->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>

                {{$users->links()}}
            </x-card-body>
        </x-card>


    </x-theme-layout>
</x-theme>

