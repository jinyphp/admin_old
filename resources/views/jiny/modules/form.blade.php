<div>
    <x-navtab class="mb-3 nav-bordered">

        <!-- formTab -->
        <x-navtab-item class="show active" >

            <x-navtab-link class="rounded-0 active">
                <span class="d-none d-md-block">기본정보</span>
            </x-navtab-link>


            <x-form-hor>
                <x-form-label>활성화</x-form-label>
                <x-form-item>
                    {!! xCheckbox()
                        ->setWire('model.defer',"forms.enable")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>코드</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"forms.code")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>
            <x-form-hor>
                <x-form-label>모듈명</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"forms.title")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>프로필 이미지</x-form-label>
                <x-form-item>
                    {{-- preload image--}}
                    @if(isset($form['image']))
                        @if (is_object($form['image']))
                            <!-- 업로드 미리보기 -->
                            <img src="{{$form['image']->temporaryUrl()}}" alt="">
                        @else
                            <!-- 저장된 이미지 보기 -->
                            <img src="/images/{{$form['image']}}" alt="">
                        @endif
                    @endif

                    <div
                        x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <!-- File Input -->
                        <input type="file" name="filename" wire:model.defer="forms.image1" class="form-control"/>

                        <!-- Progress Bar -->
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>

                    @error('filename') <span class="text-danger">{{$message}}</span> @enderror
                    {{--
                    <button wire:click="fileUpload" class="btn btn-success flot-right">Upload</button>
                    --}}
                </x-form-item>
            </x-form-hor>



            <x-form-hor>
                <x-form-label>버젼</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"forms.version")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>설치 url</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"forms.url")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

        </x-navtab-item>

        <!-- formTab -->
        <x-navtab-item >
            <x-navtab-link class="rounded-0">
                <span class="d-none d-md-block">메모</span>
            </x-navtab-link>


            <x-form-hor>
                <x-form-label>메모</x-form-label>
                <x-form-item>
                    {!! xTextarea()
                        ->setWire('model.defer',"forms.description")
                    !!}
                </x-form-item>
            </x-form-hor>


        </x-navtab-item>

    </x-navtab>
</div>
