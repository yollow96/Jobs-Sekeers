<div id="editBoardModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.noticeboard.edit_noticeboard') }}</h3>
                <button type="button" aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>
            {{ Form::open(['id' => 'editBoardForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger fs-4 text-white d-flex align-items-center  d-none"
                     id="salaryPeriodValidationErrorsBox">
                    <i class="fa-solid fa-face-frown me-5"></i>
                </div>
                {{ Form::hidden('noticeboardId',null,['id'=>'noticeboardId']) }}
                <div class="mb-5">
                    {{ Form::label('title',__('messages.noticeboard.title').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::text('title', null, ['class' => 'form-control', 'required', 'id' => 'editTitle','placeholder' => __('messages.noticeboard.title')]) }}
                </div>
                <div class="mb-5">
                    {{ Form::label('description',__('messages.noticeboard.description').(':'),['class' => 'form-label']) }}
                    <span class="required"></span>
                    <div id="editNoticeboardDescriptionQuillData"></div>
                    {{ Form::hidden('description', null, ['id' => 'editBoardDescription']) }}
                </div>
                <div class="mb-5">
                    {{ Form::label('status',__('messages.common.status').(':'), ['class' => 'form-label']) }}
                    <br>
                    <div class="form-check form-switch mb-0">
                        <input class="form-check-input is-active" name="is_active" type="checkbox"
                               value="1"
                               tabindex="8" id="editIsActive" checked>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary m-0','id' => 'btnEditSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> ".__('messages.common.process')]) }}
                <button type="button" class="btn btn-secondary my-0 ms-5 me-0"
                        id="btnEditCancel"
                        data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
