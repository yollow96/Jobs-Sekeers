<div class="d-flex justify-content-center">
    <a href="javascript:void(0)" title="{{__('messages.common.edit') }}"
       class="btn px-2 text-primary fs-3 ps-0 cities-edit-btn" data-id={{ $row->id }} data-bs-toggle="tooltip">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <button type="button" title="{{__('messages.common.delete')}}" data-id="{{ $row->id }}"
            class="cities-delete-btn btn px-2 text-danger fs-3 pe-0" id="deleteUser" data-bs-toggle="tooltip">
        <i class="fa-solid fa-trash"></i>
    </button>
</div>
