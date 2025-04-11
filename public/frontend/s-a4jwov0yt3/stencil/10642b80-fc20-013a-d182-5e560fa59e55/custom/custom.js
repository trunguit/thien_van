$(document).ready(function(){
    function makeTimer(pro_id) {
        

        var endTime = new Date($('.webi-count-'+pro_id).data('dates'));

        endTime = (Date.parse(endTime) / 1000);

        var now = new Date();
        now = (Date.parse(now) / 1000);

        var timeLeft = endTime - now;

        var days = Math.floor(timeLeft / 86400); 
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

        if (hours < "10") { hours = "0" + hours; }
        if (minutes < "10") { minutes = "0" + minutes; }
        if (seconds < "10") { seconds = "0" + seconds; }
        var webi_html = "<div class='webi-timer'>";
        webi_html += "<div class='webi-div'><div class='webi-days countdown-amount'>"+ days +"</div><div class='webi-days-text'>Days</div></div>";
        webi_html += "<div class='webi-div'><div class='webi-hours countdown-amount'>"+ hours +"</div><div class='webi-hours-text'>Hrs</div></div>";
        webi_html += "<div class='webi-div'><div class='webi-minutes countdown-amount'>"+ minutes +"</div><div class='webi-minutes-text'>Mins</div></div>";
        webi_html += "<div class='webi-div'><div class='webi-seconds countdown-amount'>"+ seconds +"</div><div class='webi-seconds-text'>Secs</div></div>";
        webi_html += "</div>";
        $(".webi-count-"+pro_id).html(webi_html);

    }
    $('[data-dates]').each(function() {
        var $this = $(this);
        setInterval(function() {
            makeTimer($this.data('product-id'));
        }, 1000);
    });

    // Start Winter Infotech 18-12-2020
    $('.winter-review').each(function() {
        if(typeof($(this).children('span').data('review')) !== "undefined") {
            $(this).parent().find('.winter-count').text($(this).children('span').attr('data-review'));
        }
    });
    // End Winter Infotech 18-12-2020
    /* loader */
   var o = $('#page-preloader');
    if (o.length > 0) {
        $(window).on('load', function() {
            $('#page-preloader').removeClass('visible');
        });
    }
    // go to top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#scroll').fadeIn();
        } else {
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });

    // search
    $(".first").click(function(){
        $(".sec").addClass("newadd");
    });
    
      $(".sec").click(function(){
        $(".first").addClass("newrem");
        $(this).removeClass("newadd");
    });


    // list-grid
    $("#gridProduct").click(function(event) {
        $('.productList').hide();
        $('.productGrid').show();
        $("#gridProduct").addClass("active");
        $("#listProduct").removeClass("active");
    });
    $("#listProduct").click(function(event) {
       $('.productGrid').hide();
       $('.productList').show() ;
       $("#listProduct").addClass("active");
       $("#gridProduct").removeClass("active");
    });

     /* sticky header */
  if ($(window).width() >= 801) {
      $(window).scroll(function () {
        if ($(this).scrollTop() > 120) {
            $('.header-top').addClass('fixed fadeInDown animated container');          

        } else {
            $('.header-top').removeClass('fixed fadeInDown animated container');
        }
      });
};

// append js
if ($(window).width() <= 800) {
    $('#facetedSearch').appendTo('.xs-filter');
    $('.page-sidebar').appendTo('.page-content');
  }

 

  if ($(window).width() <= 800) {
   $('.cate-navlg').appendTo('.cate-nav');
   $('.head-nav').appendTo('.hidenavcol');
    
  }

});

// curruncy dropdown
    $(document).ready(function () {
         $('.navUser-action--currencySelector').on("click", function(e)  {
             $(this).next('ul').toggle();
             e.stopPropagation();
             e.preventDefault();
         });
 });
 
 $('#myTab a').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
  })
 
/* responsive menu */
// function openNav() {
//     $('body').addClass("active");
//     document.getElementById("mySidenav").style.width = "280px";
// }
// function closeNav() {
//     $('body').removeClass("active");
//     document.getElementById("mySidenav").style.width = "0";
// }
/* responsive menu */

$(document).ready(function(){
    $(".wb-compare").click(function(){
        
        var pro_id = $(this).data("compare-id"); 
        var oldUrl = $(".navUser-item .navUser-item--compare").attr('href');
        if ( $(this).hasClass('active') ) {
            $(this).removeClass('active');
            var newUrl = oldUrl.replace(pro_id + "/", "");
            //oldUrl = newUrl;
            // console.log(newUrl.replace(/\/$/, "") + " --- ");
            // console.log(pro_id);
            $(".navUser-item .navUser-item--compare").attr('href',newUrl);
        }
        else {
            $(this).addClass('active');
            var url_a = $(".navUser-item .navUser-item--compare").attr('href');
            var url_b = url_a.replace(/\/$/, "") + "/" + pro_id + "/";
            //console.log("Hello");
            //console.log($(this).data("compare-id"));

            $(".navUser-item .navUser-item--compare").attr('href',url_b);
            $(".navUser-item .navUser-item--compare").show();
        }
        //console.log(oldUrl);
    });

});



// Brand section js
    $(document).ready(function() {
    $("#brand").owlCarousel({
    itemsCustom : [
    [0, 2],
    [475, 3],
    [600, 4],
    [768, 5],
    [1200, 6],
    [1589, 6]
    ],
      autoPlay: 2500,
      loop: true,
      navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      navigation : false,
      pagination:false
    });
    });

// more menu js
$(document).ready(function() {
if ($(window).width() >= 801){
     var count_block = $('.allleftmenu .navPages-list .navPages-item').length;
     var number_blocks = 10;
     if(count_block < number_blocks){
          return false; 
     } else {
          
          $('.allleftmenu .navPages-list .navPages-item').each(function(i,n){
                if(i == number_blocks) {
                     $('.allleftmenu .navPages-list').append('<li class="view_more"><a class="dropdown-item"><i class="fa fa-plus"></i> More Categories</a></li>');
                }
                if(i> number_blocks) {
                     $(this).addClass('wr_hide_menu');
                }
          })
          $('.wr_hide_menu').hide();
          $('.view_more').click(function() {
                $(this).toggleClass('active');
                $('.wr_hide_menu').slideToggle();
          });
     }
}

});

$(document).ready(function () {
// video-js
    $('.modal').on('hide.bs.modal', function() {
      var memory = $(this).html();
      $(this).html(memory);
    });
// video-js
});


function openSearch() {
    $('body').addClass("active-search");
    document.getElementById("search").style.height = "auto";
    $('#search').addClass("sideb");
    $('.search_query').attr('autofocus', 'autofocus').focus();
}
function closeSearch() {
    $('body').removeClass("active-search");
    document.getElementById("search").style.height = "0";
    $('#search').addClass("siden");
    $('.search_query').removeAttr('autofocus', 'autofocus').focus();
}
