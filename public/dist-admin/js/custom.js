$(document).ready(function() {
    $('#country').select2({
        theme: 'bootstrap-5'
    });

    $('#skills').select2({
        placeholder: "Select your skills",
        allowClear: true,  // clear button সক্রিয় করতে
        theme: 'bootstrap-5'
    });

    $('#summernote').summernote({
        height: 200,
        dialogsInBody: true
    });
});