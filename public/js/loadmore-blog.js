/* LOAD MORE IN BLOGS */
$(function () {
    $(".Blogs-Limit").slice(0, 2).show();
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".Blogs-Limit:hidden").slice(0, 2).slideDown();
        if ($(".Blogs-Limit:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1000);
    });
});