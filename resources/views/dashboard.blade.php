<x-theme theme="admin.sidebar2">
    <x-theme-layout>
        <!-- start page title -->
        @if (isset($actions['view_title']) && !empty($actions['view_title']))
            @includeIf($actions['view_title'])
        @else
            @include("jinytable::title")
        @endif
        <!-- end page title -->


        <x-row>
            <x-col-3 class="mb-3">
                <x-card class="h-100">
                    <x-card-header>
                        <h5 class="card-title">
                            <a href="#">Actions</a>
                        </h5>
                        <h6 class="card-subtitle text-muted"></h6>
                    </x-card-header>
                    <x-card-body>

                    </x-card-body>
                </x-card>
            </x-col-3>
            <x-col-3 class="mb-3">
                <x-card class="h-100">
                    <x-card-header>
                        <h5 class="card-title">
                            <a href="#">Laravel</a>
                        </h5>
                        <h6 class="card-subtitle text-muted"></h6>
                    </x-card-header>
                    <x-card-body>
                        <ul>
                            <li><a href="/admin/laravel/migration">Migration</a></li>
                        </ul>
                    </x-card-body>
                </x-card>
            </x-col-3>
            <x-col-3 class="mb-3">
                <x-card class="h-100">
                    <x-card-header>
                        <h5 class="card-title">
                            <a href="#">Auth Users</a>
                        </h5>
                        <h6 class="card-subtitle text-muted"></h6>
                    </x-card-header>
                    <x-card-body>
                        <ul>
                            <li>사용자</li>
                            <li>권한</li>
                            <li>팀</li>
                            <li>예약된</li>
                            <li>약관</li>
                            <li>설정</li>
                        </ul>
                    </x-card-body>
                </x-card>
            </x-col-3>

            {{-- 지니모듈--}}
            <x-col-3 class="mb-3">
                <x-card class="h-100">
                    <x-card-header>
                        <h5 class="card-title">
                            <a href="/hr/admin">Hr</a>
                        </h5>
                        <h6 class="card-subtitle text-muted">회사 구성원을 관리합니다.</h6>
                    </x-card-header>
                    <x-card-body>

                    </x-card-body>
                </x-card>
            </x-col-3>
            <x-col-3 class="mb-3">
                <x-card class="h-100">
                    <x-card-header>
                        <h5 class="card-title">
                            <a href="#">Service</a>
                        </h5>
                        <h6 class="card-subtitle text-muted"></h6>
                    </x-card-header>
                    <x-card-body>

                    </x-card-body>
                </x-card>
            </x-col-3>
            <x-col-3 class="mb-3">
                <x-card class="h-100">
                    <x-card-header>
                        <h5 class="card-title">UI Demo</h5>
                        <h6 class="card-subtitle text-muted">aaa</h6>
                    </x-card-header>
                    <x-card-body>
                        <x-link href="/jinyui">move</x-link>
                    </x-card-body>
                </x-card>
            </x-col-3>
            <x-col-3 class="mb-3">
                <x-card class="h-100">
                    <x-card-header>
                        <h5 class="card-title">Pages</h5>
                        <h6 class="card-subtitle text-muted">content</h6>
                    </x-card-header>
                    <x-card-body>
                        /admin/pages/list

                    </x-card-body>
                </x-card>
            </x-col-3>

            {{-- 지니모듈--}}
            <x-col-3 class="mb-3">
                <x-card class="h-100">
                    <x-card-header>
                        <h5 class="card-title">
                            <a href="/admin/jiny">Jiny</a>
                        </h5>
                        <h6 class="card-subtitle text-muted">지니ERP만의 특별한 기능들을 관리합니다.</h6>
                    </x-card-header>
                    <x-card-body>
                        <ul>
                            <li>모듈관리</li>
                        </ul>
                    </x-card-body>
                </x-card>
            </x-col-3>
        </x-row>










        {{-- Admin Rule Setting --}}
        @include('jinytable::setActionRule')
    </x-theme-layout>
</x-theme>
