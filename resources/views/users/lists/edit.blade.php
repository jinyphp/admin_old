<x-theme theme="admin.sidebar2">
    <x-theme-layout>
        <x-container-fluid>


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

<x-card>
    <x-card-header>
        회원 추가
    </x-card-header>
    <x-card-body>

        <x-row>
            <div class="col-sm-10 col-md-8 col-lg-6">

            <x-form-patch action="{{route('admin.users.list.update', $user->id)}}">

                <x-form-hor>
                    <x-form-label>
                        {{ __('Name') }}
                    </x-form-label>
                    <x-form-item>
                        <input class="form-control form-control-lg" type="text" name="name"
                            placeholder="회원 이름을 입력해 주세요."
                            value="{{old('name')}}@isset($user){{$user->name}}@endisset"
                            @error('name') is-invalid @enderror
                        >
                        @error('name') {{$message}} @enderror
                    </x-form-item>
                </x-form-row>

                <x-form-hor>
                    <x-form-label>
                        {{ __('Email') }}
                    </x-form-label>
                    <x-form-item>
                        <input class="form-control form-control-lg" type="text" name="email"
                            placeholder="이메일 주소를 입력해 주세요."
                            value="{{old('email')}}@isset($user){{$user->email}}@endisset"
                            @error('email') is-invalid @enderror
                        >
                        @error('email') {{$message}} @enderror
                    </x-form-item>
                </x-form-row>



                    <div>
                        @foreach ($roles as $role)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="roles[]"
                                    value="{{$role->id}}"
                                    id="{{$role->name}}"
                                    @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset
                                >
                                <label class="form-check-label" for="{{$role->name}}">{{$role->name}}</label>

                            </div>
                        @endforeach
                    </div>

                    <x-form-submit class="btn btn-success">
                        수정
                    </x-form-submit>

                </x-form-post>

                <a href="" onclick="event.preventDefault(); document.getElementById('delete-user-form-{{$user->id}}').submit()">Delete</a>
                <form id="delete-user-form-{{$user->id}}"
                    action="{{ route('admin.users.list.destroy', $user->id)}}" method="POST"
                    style="display: none">
                    @csrf
                    @method("DELETE")
                </form>

            </div>
        </x-row>
    </x-card-body>
</x-card>


        </x-container-fluid>
    </x-theme-layout>
</x-theme>
