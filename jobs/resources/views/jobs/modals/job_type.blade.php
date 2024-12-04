<div id="createJobTypeModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.job_type.new_job_type') }}</h3>
                <button type="button" aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>
            {{ Form::open(['id'=>'createJobTypeForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger fs-4 text-white d-flex align-items-center  d-none" id="jobTypeValidationErrorsBox">
                    <i class="fa-solid fa-face-frown me-5"></i>
                </div>
                    <div class="mb-5">
                        {{ Form::label('name',__('messages.job_type.name').(':'), ['class' => 'form-label required']) }}
                        {{ Form::text('name', null, ['id'=>'jobTypeName','class' => 'form-control','required', 'placeholder' => __('messages.job_type.name')]) }}
                    </div>
                    <div class="mb-5">
                        {{ Form::label('description', __('messages.marital_status.description').(':'),['class' => 'form-label required']) }}
                        <div id="addJobTypeDescriptionQuillData"></div>
                        {{ Form::hidden('description', null, ['id' => 'job_type_desc']) }}
                    </div>  
                </div>
                <div class="modal-footer pt-0">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary m-0','id' => 'jobTypeBtnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> ".__('messages.common.process')]) }}
                    <button type="button" class="btn btn-secondary my-0 ms-5 me-0"
                            id="maritalStatusBtnCancel"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
