// $(document).ready(function () {
//     // Initialize form validation
//     $('#addCandidateResumeForm').validate({
//         rules: {
//             'title': {
//                 required: true,
//                 maxlength: 150
//             },
//             'file': {
//                 required: true,
//                 extension: 'pdf,doc,docx'
//             }
//         },
//         messages: {
//             'file': {
//                 required: 'Please choose a file',
//                 extension: 'Please upload a valid document file (PDF/DOC/DOCX)'
//             }
//         }
//     });

//     // Handle file input change with size validation
//     $('#customFile').on('change', function () {
//         const file = this.files[0];
//         const maxSize = 5 * 1024 * 1024; // 5MB in bytes
        
//         if (file) {
//             if (file.size > maxSize) {
//                 displayErrorMessage('File size must not exceed 5MB');
//                 $(this).val('');
//                 return;
//             }

//             // Auto-fill title if empty
//             const title = $('#uploadResumeTitle').val();
//             if (!title) {
//                 $('#uploadResumeTitle').val(file.name.replace(/\.[^/.]+$/, ''));
//             }
//         }
//     });

//     // Handle form submission with progress
//     $('#addCandidateResumeForm').on('submit', function (e) {
//         e.preventDefault();

//         if (!$(this).valid()) {
//             return false;
//         }

//         const loadingButton = $('#candidateSaveBtn');
//         loadingButton.prop('disabled', true);
//         loadingButton.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...');

//         const formData = new FormData(this);
        
//         $.ajax({
//             url: route('candidate.resume.upload'),
//             type: 'POST',
//             data: formData,
//             processData: false,
//             contentType: false,
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             success: function (result) {
//                 if (result.success) {
//                     $('#candidateResumeModal').modal('hide');
//                     displaySuccessMessage(result.message);
                    
//                     // Refresh the resume list
//                     window.livewire.emit('refresh');
//                 } else {
//                     displayErrorMessage(result.message);
//                 }
//             },
//             error: function (xhr) {
//                 let errorMessage = 'Something went wrong';
//                 if (xhr.responseJSON && xhr.responseJSON.message) {
//                     errorMessage = xhr.responseJSON.message;
//                 }
//                 displayErrorMessage(errorMessage);
//             },
//             complete: function () {
//                 loadingButton.prop('disabled', false);
//                 loadingButton.html('Save');
//             }
//         });
//     });

//     // Reset form on modal hidden
//     $('#candidateResumeModal').on('hidden.bs.modal', function () {
//         $('#addCandidateResumeForm')[0].reset();
//         $('#validationErrorsBox').addClass('d-none');
//         $('#uploadResumeTitle').val('');
//         $('#default').prop('checked', false);
        
//         // Reset file input
//         $('#customFile').val('');
        
//         // Reset validation errors
//         const form = $('#addCandidateResumeForm');
//         form.validate().resetForm();
//         form.find('.error').removeClass('error');
//     });
// });