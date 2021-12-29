<div>
    <x-datatable>
        <x-data-table-thead>
                <th>uri</th>
                <th width='200'>등록일자</th>
        </x-data-table-thead>

        @if(!empty($rows))
        <tbody>
        @foreach ($rows as $item)
            <x-data-table-tr :item="$item" :selected="$selected">
                <td>
                    {!! $popupEdit($item, $item->uri) !!}
                </td>
                <td width='200'>{{$item->created_at}}</td>
            </x-data-table-tr>
            @endforeach
        </tbody>
        @endif

    </x-datatable>

    @if(count($rows)==0)
    <div class="text-center">
        목록이 없습니다.
    </div>
    @endif
</div>
