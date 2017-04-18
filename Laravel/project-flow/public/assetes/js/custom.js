$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(function () {
    // select 2 for selection
    $(".jsSelect2").select2();

    // date time picker
    $('.date_picker').datetimepicker({
       // viewMode: 'years',
        format: 'DD-MMMM-YYYY'
    });

    // color picker
    $('.color_picker').colorPicker({
        opacity: false,
    });

});

// work flow ajax call for dynamic content

function dynamic_workflow_load(url){
    $.ajax({
        type: "GET",
        url: url,
        success: function(data){
            $('#work-flow-container').html(data);
            $("#loading-pahse").hide();
        }
    });
}