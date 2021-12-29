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
                        ->setWire('model.defer',"form.enable")
                    !!}
                </x-form-item>
            </x-form-hor>


            <x-form-hor>
                <x-form-label>uri</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"form.uri")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>컨트롤러</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"form.controller")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>테이블</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"form.table")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>페이징</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"form.paging")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>조건</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"form.where")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>


            <x-form-hor>
                <x-form-label>view_main</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"form.view_main")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>view_title</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"form.view_title")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>view_filter</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"form.view_filter")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>view_list</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"form.view_list")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>view_edit</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"form.view_edit")
                        ->setWidth("standard")
                    !!}
                </x-form-item>
            </x-form-hor>

            <x-form-hor>
                <x-form-label>view_form</x-form-label>
                <x-form-item>
                    {!! xInputText()
                        ->setWire('model.defer',"form.view_form")
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
                        ->setWire('model.defer',"form.description")
                    !!}
                </x-form-item>
            </x-form-hor>


        </x-navtab-item>

    </x-navtab>
</div>
