
// $(window ).resize(function() {
//   if ((this).width() >= 960) { 

    
//   } else {

//   } 
// });

  $(".main").onepage_scroll({
    sectionContainer: "section",
    loop: true,
    responsiveFallback: 1500
  });

// скролл

function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}




// выпадающее верхнее меню
function setMenuWidth() {
var windowWidth = $(window).width();
$('.dropdown__toggle_catalog').width(windowWidth);
}
$(window).resize(function(){
setMenuWidth();
});
setMenuWidth();


$('.navbar-toggler').on('click', function(){
  $('.slide1 .header_navbar_list .dropdown__toggle_catalog').slideDown().addClass("active");

  $('.close').on('click', function(){
  $('.header_navbar_list .dropdown__toggle_catalog').slideUp().removeClass("active");

});
});




$("[data-fancybox]").fancybox({
    // Options will go here
  });