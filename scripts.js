// -------------------------------------------------navbar-----------------------------


$(window).scroll(function () {
    $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
});

$("a[href^='#']").click(function(e) {
    let ax = $(e.target).attr("href");
    let ay = $(ax).offset().top;
    $("body,html").animate({scrollTop:ay},1000)
})



$('body').scrollspy({target: '.navbar-fixed-top'})

