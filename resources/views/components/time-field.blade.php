@if($data != null)
<td>
    {{ $data->done_on }}
</td>
<td>
    {{ $data->date_of_expiry }}
</td>
@else
<td>
    -
</td>
<td>
    -
</td>


@endif
