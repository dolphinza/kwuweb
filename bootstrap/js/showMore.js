//this will execute on page load(to be more specific when document ready event occurs)
if ($('.ulas').length > 3) {
    $('.ulas:gt(2)').hide();
    $('.show-more').show();
}

$('.show-more').on('click', function () {
    //toggle elements with class .ty-compact-list that their index is bigger than 2
    $('.ulas:gt(2)').toggle();
    //change text of show more element just for demonstration purposes to this demo
    $(this).text() === 'Show more' ? $(this).text('Show less') : $(this).text('Show more');
});