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
                            <x-form-patch action="{{route('admin.users.list.profile.update', [$user->id, $profile->id])}}">
                            <ul class="mb-3 nav nav-tabs nav-bordered">
                                <li class="nav-item">
                                    <a href="#form-tab-1" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#form-tab-2" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                        <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Others</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane show active" id="form-tab-1">
                                    <x-row>
                                        <div class="col-sm-10 col-md-8 col-lg-6">
                                            <x-form-hor>
                                                <x-form-label>
                                                    {{ __('Fistname') }}
                                                </x-form-label>
                                                <x-form-item>
                                                    <input class="form-control form-control-lg" type="text" name="firstname"
                                                        placeholder=""
                                                        value="{{old('firstname')}}@isset($profile){{$profile->firstname}}@endisset"
                                                        @error('firstname') is-invalid @enderror
                                                    >
                                                    @error('firstname') {{$message}} @enderror
                                                </x-form-item>
                                            </x-form-row>

                                            <x-form-hor>
                                                <x-form-label>
                                                    {{ __('Lastname') }}
                                                </x-form-label>
                                                <x-form-item>
                                                    <input class="form-control form-control-lg" type="text" name="lastname"
                                                        placeholder=""
                                                        value="{{old('lastname')}}@isset($profile){{$profile->lastname}}@endisset"
                                                        @error('lastname') is-invalid @enderror
                                                    >
                                                    @error('lastname') {{$message}} @enderror
                                                </x-form-item>
                                            </x-form-row>

                                            <x-form-hor>
                                                <x-form-label>
                                                    {{ __('Phone') }}
                                                </x-form-label>
                                                <x-form-item>
                                                    <input class="form-control form-control-lg" type="text" name="phone"
                                                        placeholder=""
                                                        value="{{old('phone')}}@isset($profile){{$profile->phone}}@endisset"
                                                        @error('phone') is-invalid @enderror
                                                    >
                                                    @error('phone') {{$message}} @enderror
                                                </x-form-item>
                                            </x-form-row>

                                            <x-form-hor>
                                                <x-form-label>
                                                    {{ __('Mobile') }}
                                                </x-form-label>
                                                <x-form-item>
                                                    <input class="form-control form-control-lg" type="text" name="mobile"
                                                        placeholder=""
                                                        value="{{old('mobile')}}@isset($profile){{$profile->mobile}}@endisset"
                                                        @error('mobile') is-invalid @enderror
                                                    >
                                                    @error('mobile') {{$message}} @enderror
                                                </x-form-item>
                                            </x-form-row>

                                            <x-form-hor>
                                                <x-form-label>
                                                    {{ __('fax') }}
                                                </x-form-label>
                                                <x-form-item>
                                                    <input class="form-control form-control-lg" type="text" name="fax"
                                                        placeholder=""
                                                        value="{{old('fax')}}@isset($profile){{$profile->fax}}@endisset"
                                                        @error('fax') is-invalid @enderror
                                                    >
                                                    @error('fax') {{$message}} @enderror
                                                </x-form-item>
                                            </x-form-row>

                                            <x-form-hor>
                                                <x-form-label>
                                                    {{ __('post') }}
                                                </x-form-label>
                                                <x-form-item>
                                                    <input class="form-control form-control-lg" type="text" name="post"
                                                        placeholder=""
                                                        value="{{old('post')}}@isset($profile){{$profile->post}}@endisset"
                                                        @error('post') is-invalid @enderror
                                                    >
                                                    @error('post') {{$message}} @enderror
                                                </x-form-item>
                                            </x-form-row>

                                            <x-form-hor>
                                                <x-form-label>
                                                    {{ __('address1') }}
                                                </x-form-label>
                                                <x-form-item>
                                                    <input class="form-control form-control-lg" type="text" name="address1"
                                                        placeholder=""
                                                        value="{{old('address1')}}@isset($profile){{$profile->address1}}@endisset"
                                                        @error('address1') is-invalid @enderror
                                                    >
                                                    @error('address1') {{$message}} @enderror
                                                </x-form-item>
                                            </x-form-row>

                                            <x-form-hor>
                                                <x-form-label>
                                                    {{ __('address2') }}
                                                </x-form-label>
                                                <x-form-item>
                                                    <input class="form-control form-control-lg" type="text" name="address2"
                                                        placeholder=""
                                                        value="{{old('address2')}}@isset($profile){{$profile->address2}}@endisset"
                                                        @error('address2') is-invalid @enderror
                                                    >
                                                    @error('address2') {{$message}} @enderror
                                                </x-form-item>
                                            </x-form-row>
                                        </div>
                                    </x-row>
                                </div>

                                <div class="tab-pane" id="form-tab-2">
                                    <x-row>
                                        <div class="col-sm-10 col-md-8 col-lg-6">
                                            <x-form-hor>
                                                <x-form-label>
                                                    {{ __('Country') }}
                                                </x-form-label>
                                                <x-form-item>
                                                    <input class="form-control form-control-lg" type="text" name="country"
                                                        placeholder=""
                                                        value="{{old('country')}}@isset($profile){{$profile->country}}@endisset"
                                                        @error('country') is-invalid @enderror
                                                    >
                                                    @error('country') {{$message}} @enderror
                                                </x-form-item>
                                            </x-form-row>

                                            <x-form-hor>
                                                <x-form-label>
                                                    {{ __('Language') }}
                                                </x-form-label>
                                                <x-form-item>
                                                    <input class="form-control form-control-lg" type="text" name="language"
                                                        placeholder=""
                                                        value="{{old('language')}}@isset($profile){{$profile->language}}@endisset"
                                                        @error('language') is-invalid @enderror
                                                    >
                                                    @error('language') {{$message}} @enderror
                                                </x-form-item>
                                            </x-form-row>

                                            <x-form-hor>
                                                <x-form-label>
                                                    {{ __('Timezone') }}
                                                </x-form-label>
                                                <x-form-item>
                                                    <input class="form-control form-control-lg" type="text" name="timezone"
                                                        placeholder=""
                                                        value="{{old('timezone')}}@isset($profile){{$profile->timezone}}@endisset"
                                                        @error('timezone') is-invalid @enderror
                                                    >
                                                    @error('timezone') {{$message}} @enderror
                                                </x-form-item>
                                            </x-form-row>


                                        </div>
                                    </x-row>

                                </div>

                            </div>


                                <x-form-submit class="btn btn-success">
                                    수정
                                </x-form-submit>

                                <x-button secondary href="{{route('admin.users.list.index')}}">목록</x-button>
                            </x-form-patch>
                        </x-card-body>
                    </x-card>
                </div>
            </x-row>


        </x-container-fluid>
    </x-theme-layout>
</x-theme>
