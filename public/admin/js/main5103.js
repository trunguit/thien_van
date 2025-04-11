(function ($) {
  "use strict";
  
  // 1. Xử lý menu dropdown (chỉ chạy nếu tồn tại phần tử)
  var $menuLinks = $(".menu-item.has-submenu .menu-link");
  if ($menuLinks.length) {
    $menuLinks.on("click", function (e) {
      e.preventDefault();
      var $submenu = $(this).next(".submenu");
      if ($submenu.is(":hidden")) {
        $(this).parent(".has-submenu").siblings().find(".submenu").slideUp(200);
      }
      $submenu.slideToggle(200);
    });
  }

  // 2. Xử lý offcanvas trigger
  $("[data-trigger]").on("click", function (e) {
    e.preventDefault();
    e.stopPropagation();
    var target = $(this).attr("data-trigger");
    $(target).toggleClass("show");
    $("body").toggleClass("offcanvas-active");
    $(".screen-overlay").toggleClass("show");
  });

  // 3. Đóng offcanvas
  $(".screen-overlay, .btn-close").click(function (e) {
    $(".screen-overlay").removeClass("show");
    $(".mobile-offcanvas, .show").removeClass("show");
    $("body").removeClass("offcanvas-active");
  });

  // 4. Xử lý minimize aside
  $(".btn-aside-minimize").on("click", function () {
    if (window.innerWidth < 768) {
      $("body").removeClass("aside-mini")
        .removeClass("offcanvas-active");
      $(".screen-overlay").removeClass("show");
      $(".navbar-aside").removeClass("show");
    } else {
      $("body").toggleClass("aside-mini");
    }
  });

  // 5. Khởi tạo Select2 nếu có
  if (typeof $.fn.select2 !== 'undefined' && $(".select-nice").length) {
    $(".select-nice").select2();
  }

  // 6. Khởi tạo PerfectScrollbar nếu có
  if (typeof PerfectScrollbar !== 'undefined' && $("#offcanvas_aside").length) {
    try {
      new PerfectScrollbar(document.getElementById("offcanvas_aside"), {
        suppressScrollX: true
      });
    } catch (e) {
      console.error("PerfectScrollbar init error:", e);
    }
  }

})(jQuery);