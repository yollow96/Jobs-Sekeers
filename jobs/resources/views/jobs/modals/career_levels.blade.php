<div id="createCareerModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.career_level.new_career_level') }}</h3>
                <button type="button" aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>
            {{ Form::open(['id'=>'createCareerForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger fs-4 text-white d-flex align-items-center  d-none"
                     id="careerValidationErrorsBox">
                    <i class="fa-solid fa-face-frown me-5"></i>
                </div>
                <div class="col-sm-12">
                    {{ Form::label('level_name',__('messages.career_level.level_name').':', ['class' => 'form-label ']) }}
                    <span class="required"></span>
                    {{ Form::text('level_name', null, ['class' => 'form-control','required','placeholder' => __('messages.career_level.level_name')]) }}
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary m-0','id'=>'careerBtnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> ".__('messages.common.process')]) }}
                <button type="button" id="careerBtnCancel" class="btn btn-secondary my-0 ms-5 me-0"
                        data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
