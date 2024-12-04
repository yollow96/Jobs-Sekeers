<div class="modal fade" id="emailJobToFriendModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('messages.job.email_to_friend') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form name="frm" id="emailJobToFriend">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="user_id"
                           value="{{ (getLoggedInUserId() !== null) ? getLoggedInUserId() : null }}">
                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                    <div class="form-group">
                        <label class="fs-16 text-secondary mb-2" for="jobUrl">{{ __('messages.job.job_url') }}</label>
                        <input type="text" class="form-control" name="job_url" id="jobUrl" readonly>
                    </div>

                    <div class="form-group">
                        <label class="fs-16 text-secondary mb-2" for="friendName">{{ __('messages.job.friend_name') }}</label>
                        <input type="text" class="form-control" name="friend_name" id="friendName" required>
                    </div>

                    <div class="form-group mb-0">
                        <label class="fs-16 text-secondary mb-2" for="friendEmail">{{ __('messages.job.friend_email') }}</label>
                        <input type="email" class="form-control" name="friend_email" id="friendEmail" required>
                    </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('messages.common.close') }}</button>
                    <button type="submit" class="btn btn-primary"
                            data-bs-loading-text="<span class='spinner-border spinner-border-sm'></span> {{__('messages.common.process')}}"
                            id="btnSendToFriend">{{ __('web.job_details.send_to_friend') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
