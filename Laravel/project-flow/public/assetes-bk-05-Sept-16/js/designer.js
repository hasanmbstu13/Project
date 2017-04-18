$(function () {

    // Popover user leading data

    $('.popper').popover({
        placement: 'right',
        container: 'body',
        html: true,
        content: function () {
             // e.stopPropagation();
            // $(".popper-content").hide();
            return $(this).next('.popper-content').html();
        }
    });

    // $('.popper-content').click(function(e) {
    //     e.preventDefault();
    //     // if ($(this.target).is('popper-content')){
    //        // $(".popper").previous().hide();
    //        $("popper-content").prev().hide();
    //     // }
    // });

    calender_height_fix();

    // Clender toogler

    $('.cal-toogller').on('click',function(){
        $('.changeablewidth').toggleClass('col-md-8 col-md-4');
        $('.hiddenablewidth').toggleClass('hidden');
        calender_height_fix();
    });

    $('body').on('click', '.popper-2nd',function(){
        console.log('hi');
        $(this).next('.project-details-pop').css('display','block');
    });

});

function calender_height_fix(height){
    $(".fc-day").each(function(index, value) {
        if (typeof(height)==='undefined') {
            height_here = $(this).closest('.working-data-row').height();
        }else{
            height_here = height;
        }
        //console.log(height_here);
        $(this).css('height',height_here);
    });
}

// Fill modal with content from link href
$("#briefModal").on("show.bs.modal", function(e) {
    var link = $(e.relatedTarget);
    $(this).find(".modal-content").load(link.attr("href"));
});


// Fill modal with content from link href
$("#prstatusModal").on("show.bs.modal", function(e) {
    // e.preventDefault();
    // $("#briefModal").modal('hide');
    var link = $(e.relatedTarget);
    $(this).find(".modal-content").load(link.attr("href"));
});