
$(function(){
    $('.stars-container').rating(function(vote, event){
        // we have vote and event variables now, lets send vote to server.
        $.ajax({
            url: "woocommerce/single-product/rating.php",
            type: "GET",
            data: {rate: vote},
        });
    });
});

$(".my-rating").starRating({
  totalStars: 5,
  strokeColor: '#894A00',
  strokeWidth: 10,
  starSize: 23,
  // starShape: 'rounded',
  // starSize: 25,
  // emptyColor: 'lightgray',
  hoverColor: 'salmon',
  // activeColor: 'crimson',
  // useGradient: false
});

$('.mgallery > span').mouseover(function () {
    var tabs = $(this).index();
    var tabItem = $('.gallery_full > .gallery_fullView');
    $(this).siblings().removeClass('active');
    $(this).addClass('active');
    $('.gallery_full').fadeOut(300, function () {
        tabItem.removeClass('active');
        tabItem.eq(tabs).addClass('active');
        $(this).fadeIn(300);
    });
});

  $('[data-fancybox="gallery"]').fancybox({
  // Options will go here
});
$(function(){
    var button = $('.characters .toggler'),
        animateTime = 140;

    $(button).click(function () {
        reset(animateTime);
        $('.characters .toggler').text("развернуть");

        var text = $(this).parent().find('div.characters-item');
        if (text.height() === 140) {
            autoHeightAnimate(text, animateTime);
            $(this).text("свернуть");
        $('.characters .toggler').addClass("open");

        } else {
        $('.characters .toggler').removeClass("open");

            text.stop().animate({ height: '140px' }, animateTime);
            $('.characters .toggler').text("развернуть");
        }
    });
});

 /* Function to animate height: auto */
    function autoHeightAnimate(element, time) {

        var curHeight = element.height(), // Get Default Height
            autoHeight = element.css('height', 'auto').height(); // Get Auto Height
        element.height(curHeight); // Reset to Default Height
        element.stop().animate({ height: autoHeight }, time); // Animate to Auto Height
    }
    function reset(time){
        $('.characters .toggler').addClass("open");
        $('.characters-item').animate({'height':'550'}, time);
    }


$(".desc-block").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'), top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 500);
    });

 
$(document).ready(function(){
    $(".book-desc").on("click","a", function (event) {
        //отменяем стандартную обработку нажатия по ссылке
        event.preventDefault();

        //забираем идентификатор бока с атрибута href
        var id  = $(this).attr('href'),

        //узнаем высоту от начала страницы до блока на который ссылается якорь
            top = $(id).offset().top;
        
        //анимируем переход на расстояние - top за 1500 мс
        $('body,html').animate({scrollTop: top}, 1500);
    });
});


