<div class="d-flex justify-content-center">
    <a title="{{ __('messages.common.edit') }}
            " class="btn px-2 text-primary fs-3 ps-0  board-edit-btn" data-id="{{ $row->id }}" data-bs-toggle="tooltip">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a title="{{ __('messages.common.delete') }}" data-id="{{ $row->id }}"
       class="board-delete-btn btn px-2 text-danger fs-3 pe-0" data-bs-toggle="tooltip">
        <i class="fa-solid fa-trash"></i>
    </a>
</div>
