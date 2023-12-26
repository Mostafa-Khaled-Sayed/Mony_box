
//  on('click', '#portfolio-flters li', function(e) {
//          e.preventDefault();
//          portfolioFilters.forEach(function (el) {
//          el.classList.remove('filter-active');

//      });
//         });
function autoScrollDown(){
    $(".inner").css({top:-$(".outer").outerHeight()}) // jump back
               .animate({top:0},8000,"linear", autoScrollDown); // and animate
}
function autoScrollUp(){
    $(".inner").css({top:0}) // jump back
               .animate({top:-$(".outer").outerHeight()},8000,"linear", autoScrollUp); // and animate
}
// fix hight of outer:
$('.outer').css({maxHeight: $('.inner').height()});
// duplicate content of inner:
$('.inner').html($('.inner').html() + $('.inner').html());
autoScrollUp();

$('.toggle-password').click(function(){
    $(this).children().toggleClass('mdi-eye-outline mdi-eye-off-outline');
    let input = $(this).prev();
    input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
});
  const input = document.querySelector("#phonekey");
  window.intlTelInput(input, {
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
  });

  $('.service-list .serviceKey').on('click', function (e) {
    $(this).toggleClass('active').siblings().removeClass('active')
    var serviceKey = $(this).text();
    $('#serviceKey').text(serviceKey);

  });
  
 $('.country-item').on('click', function (e) {
    $(this).toggleClass('active').siblings().removeClass('active')
    var countryName = $(this).find('.select-name').text();
    var countryPound = $(this).find('.countryPound').text();
    $('#countryName').text(countryName);
    $('#countryPound').text(countryPound);

  });
  
  
  
  
  
  
  
  
  