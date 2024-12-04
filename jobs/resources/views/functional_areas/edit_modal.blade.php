<div class="modal fade" tabindex="-1" role="dialog" id="editFunctionalAreaModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.functional_area.edit_functional_area') }}</h3>
                <button type="button" aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>
            {{ Form::open(['id' => 'editFunctionalAreaForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger fs-4 text-white d-flex align-items-center  d-none"
                     id="editValidationErrorsBox">
                    <i class="fa-solid fa-face-frown me-5"></i>
                </div>
                {{ Form::hidden('functionalAreaId',null,['id'=>'functionalAreaId']) }}
                <div class="mb-5">
                    {{ Form::label('name',__('messages.functional_area.name').':', ['class' => 'form-label']) }}<span
                            class="required"></span>
                    {{ Form::text('name', null, ['class' => 'form-control','required','id' => 'editName','placeholder' => __('messages.functional_area.name')]) }}
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary m-0','id'=>'editFunctionalAreaSaveBtn','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> ".__('messages.common.process')]) }}
                <button type="button" id="btnEditCancel" class="btn btn-secondary my-0 ms-5 me-0"
                        data-bs-dismiss="modal">{{ __('messages.common.cancel') }}
                </button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
