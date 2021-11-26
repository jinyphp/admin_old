<x-theme theme="admin.sidebar2">
    <x-theme-layout>
        <x-container-fluid>


            <!-- start page title -->
            <x-row>
                <x-col class="col-8">
                    <div class="page-title-box">
                        <ol class="m-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.users.list.index')}}">Users</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>

                        <div class="mb-3">
                            <h1 class="align-middle h4 d-inline">회원 추가정보</h1>
                            <p>가입된 회원을 단계별 등급을 통하여 구분할 수 있습니다.</p>
                        </div>
                    </div>
                </x-col>
            </x-row>
            <!-- end page title -->

            <x-row>
                <div class="col-lg-2">
                    @include("jinyadmin::users.submenu")
                </div>
                <div class="col-lg-10">
                    <x-card>
                        <x-card-header>
                            {{$user->name}} <br>
                            {{$user->email}}
                        </x-card-header>
                        <x-card-body>
                            <x-row>
                                <div class="col-sm-10 col-md-8 col-lg-6">

                                    <x-form-post action="{{route('admin.users.list.profile.store', $user->id)}}">

                                        <x-form-hor>
                                            <x-form-label>
                                                {{ __('Phone') }}
                                            </x-form-label>
                                            <x-form-item>
                                                <input class="form-control form-control-lg" type="text" name="phone"
                                                    placeholder="" :value="old('phone')" @error('phone') is-invalid @enderror
                                                    autofocus>
                                                @error('phone') {{$message}} @enderror
                                            </x-form-item>
                                        </x-form-hor>

                                        <x-form-submit class="btn btn-primary">
                                            저장
                                        </x-form-submit>
                                    </x-form-post>
                                </div>
                            </x-row>
                        </x-card-body>
                    </x-card>
                </div>
            </x-row>


        </x-container-fluid>
    </x-theme-layout>
</x-theme>
