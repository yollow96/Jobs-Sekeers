
@if($row->admin)
<span class="badge bg-light-warning">{{$row->admin->full_name}}</span>
@else
    <span class="badge bg-secondary">{{__('messages.common.n/a')}}</span>
@endif
