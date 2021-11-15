<x-theme theme="admin.sidebar2">
    <x-theme-layout>
        <x-container-fluid>


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

            <x-card>
                <x-card-header>

                </x-card-header>
                <x-card-body>

                    <x-row>
                        <div class="col-sm-10 col-md-8 col-lg-6">

                        <x-form-patch action="{{route('admin.users.role.update', $role->id)}}">

                            <x-form-hor>
                                <x-form-label>
                                    {{ __('Name') }}
                                </x-form-label>
                                <x-form-item>
                                    <input class="form-control form-control-lg" type="text" name="name"
                                        placeholder=""
                                        value="{{old('name')}}@isset($role){{$role->name}}@endisset"
                                        @error('name') is-invalid @enderror
                                    >
                                    @error('name') {{$message}} @enderror
                                </x-form-item>
                            </x-form-row>

                                <x-form-submit class="btn btn-success">
                                    수정
                                </x-form-submit>

                            </x-form-post>

                            <a href="" onclick="event.preventDefault(); document.getElementById('delete-user-form-{{$role->id}}').submit()">Delete</a>
                            <form id="delete-user-form-{{$role->id}}"
                                action="{{ route('admin.users.role.destroy', $role->id)}}" method="POST"
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
