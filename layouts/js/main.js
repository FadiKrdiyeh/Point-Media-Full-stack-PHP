$(function () {
  "use strict";

  let $direction = $("body").attr("dir");
  let $multiNumPosition = $direction === "ltr" ? 1 : -1;
  // console.log($multiNumPosition);
  // console.log($marginDirection);

  // Show And Hide Loading Layout When Loading Website
  // window.onload = function () {
  //   "use strict";
  //   // Loading Elements
  //   // Hide Spinner...
  //   $(".loading-container .loader").fadeOut(2000, function () {
  //     // Show Page Scroll...
  //     // $("body").css("overflow-y", "auto");
  //     $("body").css("overflow-y", "scroll");
  //     // Hide Loading Section...
  //     $(".loading-container").fadeOut(2000, function () {
  //       $(this).remove();
  //       // Remove Section...
  //     });
  //   });
  // };

  // Reset Body Position
  $("html").scrollLeft(0);
  $("body").css("overflow-x", "hidden");
  $(window).on("load", function () {
    $("html").scrollLeft(0);
  });

  // Show And Hide dropdown Menu On Hover
  $(".navbar .nav-item.dropdown").hover(
    function () {
      // $(".navbar .nav-item .dropdown-menu").addClass("show");
      $(this).children(".dropdown-menu").addClass("show");
    },
    function () {
      $(".navbar .nav-item .dropdown-menu").removeClass("show");
    }
  );

  // This For Check If This Is Home Page
  if ($("#home").length) {
    // console.log("Found");
    // For Animate Carousel
    (function () {
      let $slides = document.querySelectorAll(".slide");
      let $controls = document.querySelectorAll(".slider__control");
      let numOfSlides = $slides.length;
      let slidingAT = 1300; // sync this with scss variable
      let slidingBlocked = false;

      setInterval(function () {
        // $controls[1].trigger("click");
        $controls[1].click();
        // console.log("Triggered");
      }, 4000);

      [].slice.call($slides).forEach(function ($el, index) {
        let i = index + 1;
        $el.classList.add("slide-" + i);
        $el.dataset.slide = i;
      });

      [].slice.call($controls).forEach(function ($el) {
        $el.addEventListener("click", controlClickHandler);
      });

      function controlClickHandler() {
        if (slidingBlocked) return;
        slidingBlocked = true;

        let $control = this;
        let isRight = $control.classList.contains("m--right");
        let $curActive = document.querySelector(".slide.s--active");
        let index = +$curActive.dataset.slide;
        isRight ? index++ : index--;
        if (index < 1) index = numOfSlides;
        if (index > numOfSlides) index = 1;
        let $newActive = document.querySelector(".slide-" + index);

        $control.classList.add("a--rotation");
        $curActive.classList.remove("s--active", "s--active-prev");
        document.querySelector(".slide.s--prev").classList.remove("s--prev");

        $newActive.classList.add("s--active");
        if (!isRight) $newActive.classList.add("s--active-prev");

        let prevIndex = index - 1;
        if (prevIndex < 1) prevIndex = numOfSlides;

        document.querySelector(".slide-" + prevIndex).classList.add("s--prev");

        setTimeout(function () {
          $control.classList.remove("a--rotation");
          slidingBlocked = false;
        }, slidingAT * 0.75);
      }
    })();

    // Watch If Arrive To Statistics Element To Start Counter
    let isAnimated = false;
    let waypointStatistics = new Waypoint({
      element: document.getElementById("statisticsLocation"),
      handler: function () {
        // alert("done");
        if (!isAnimated) {
          $(".statistics .number .number-value").each(function () {
            $(this)
              .prop("Counter", 0)
              .animate(
                {
                  Counter: $(this).text(),
                },
                {
                  duration: 4000,
                  easing: "swing",
                  step: function (now) {
                    $(this).text(Math.ceil(now));
                  },
                }
              );
          });
          isAnimated = true;
        }
      },
      offset: "bottom-in-view",
    });

    // For Our Clients Slider
    let sliderClient = (function (document, $) {
      "use strict";
      // console.log($direction);
      let $sliderClients = $(".slider--clients"),
        $list = $("#list"),
        $listItems = $("#list li"),
        $nItems = $listItems.length,
        $nView = 3,
        autoSlider,
        $current = 0,
        $isAuto = true,
        $acAuto = 2500,
        _init = function () {
          _initWidth();
          _eventInit();
        },
        _initWidth = function () {
          $list.css({
            $marginDirection: ~~(100 / $nView) + "%",
            width: ~~(100 * ($nItems / $nView)) + "%",
            transform: `translateX(${(100 / $nItems) * $multiNumPosition}%)`,
          });
          $listItems.css("width", 100 / $nItems + "%");
        },
        _eventInit = function () {
          window.requestAnimFrame = (function () {
            return (
              window.requestAnimationFrame ||
              window.webkitRequestAnimationFrame ||
              window.mozRequestAnimationFrame ||
              window.oRequestAnimationFrame ||
              window.msRequestAnimationFrame ||
              function (callback, element) {
                window.setTimeout(callback, 1000 / 60);
              }
            );
          })();
          window.requestInterval = function (fn, delay) {
            if (
              !window.requestAnimationFrame &&
              !window.webkitRequestAnimationFrame &&
              !window.mozRequestAnimationFrame &&
              !window.oRequestAnimationFrame &&
              !window.msRequestAnimationFrame
            )
              return window.setInterval(fn, delay);
            let start = new Date().getTime(),
              handle = new Object();
            function loop() {
              let current = new Date().getTime(),
                delta = current - start;
              if (delta >= delay) {
                fn.call();
                start = new Date().getTime();
              }
              handle.value = requestAnimFrame(loop);
            }
            handle.value = requestAnimFrame(loop);
            return handle;
          };
          window.clearRequestInterval = function (handle) {
            window.cancelAnimationFrame
              ? window.cancelAnimationFrame(handle.value)
              : window.webkitCancelRequestAnimationFrame
              ? window.webkitCancelRequestAnimationFrame(handle.value)
              : window.mozCancelRequestAnimationFrame
              ? window.mozCancelRequestAnimationFrame(handle.value)
              : window.oCancelRequestAnimationFrame
              ? window.oCancelRequestAnimationFrame(handle.value)
              : window.msCancelRequestAnimationFrame
              ? msCancelRequestAnimationFrame(handle.value)
              : clearInterval(handle);
          };
          $.each($listItems, function (i) {
            let $this = $(this);
            $this.on("touchstart click", function (e) {
              e.preventDefault();
              _stopMove(i);
              _moveIt($this, i);
            });
          });
          autoSlider = requestInterval(_autoMove, $acAuto);
        },
        _moveIt = function (obj, x) {
          let n = x;
          obj.find("figure").addClass("active");
          $listItems.not(obj).find("figure").removeClass("active");
          function run(v) {
            $list.animate(v[0], {
              duration: 300,
              step: function (val) {
                $list.css("transform", `translateX(${val}%)`);
              },
              done: function () {},
            });
          }
          let param =
            $direction === "ltr"
              ? { y: (100 / $nItems) * -(n - 1) }
              : { y: (100 / $nItems) * (n - 1) };
          run([param]);
          // if ($direction === "ltr") {
          //   run([{ y: (100 / $nItems) * -(n - 1) }]);
          // } else {
          //   run([{ y: (100 / $nItems) * (n - 1) }]);
          // }
          // console.log(`translateX(${(100 / $nItems) * -1}%)`);
        },
        _autoMove = function (currentSlide) {
          if ($isAuto) $current = ~~(($current + 1) % $nItems);
          else $current = currentSlide;
          // console.log($current);
          _moveIt($listItems.eq($current), $current);
        },
        _stopMove = function (x) {
          clearRequestInterval(autoSlider);
          $isAuto = false;
          _autoMove(x);
        };
      $list.css({
        transform: `translateX(${(100 / $nItems) * $multiNumPosition}%)`,
        y: (100 / $nItems) * $multiNumPosition,
      });
      return {
        init: _init,
      };
    })(document, jQuery);
    sliderClient.init();

    // For Why Choose Us Slider
    let sliderChoose = (function (document, $) {
      "use strict";
      let $sliderChooseUs = $(".slider--why-choose-us"),
        $list = $("#chooseUsList"),
        $listItems = $("#chooseUsList li"),
        $nItems = $listItems.length,
        $nView = 3,
        autoSlider,
        $current = 0,
        $isAuto = true,
        $acAuto = 5000,
        _init = function () {
          _initWidth();
          _eventInit();
        },
        _initWidth = function () {
          $list.css({
            $marginDirection: ~~(100 / $nView) + "%",
            width: ~~(100 * ($nItems / $nView)) + "%",
            transform: `translateX(${(100 / $nItems) * $multiNumPosition}%)`,
          });
          $listItems.css("width", 100 / $nItems + "%");
        },
        _eventInit = function () {
          window.requestAnimFrame = (function () {
            return (
              window.requestAnimationFrame ||
              window.webkitRequestAnimationFrame ||
              window.mozRequestAnimationFrame ||
              window.oRequestAnimationFrame ||
              window.msRequestAnimationFrame ||
              function (callback, element) {
                window.setTimeout(callback, 1000 / 60);
              }
            );
          })();
          window.requestInterval = function (fn, delay) {
            if (
              !window.requestAnimationFrame &&
              !window.webkitRequestAnimationFrame &&
              !window.mozRequestAnimationFrame &&
              !window.oRequestAnimationFrame &&
              !window.msRequestAnimationFrame
            )
              return window.setInterval(fn, delay);
            let start = new Date().getTime(),
              handle = new Object();
            function loop() {
              let current = new Date().getTime(),
                delta = current - start;
              if (delta >= delay) {
                fn.call();
                start = new Date().getTime();
              }
              handle.value = requestAnimFrame(loop);
            }
            handle.value = requestAnimFrame(loop);
            return handle;
          };
          window.clearRequestInterval = function (handle) {
            window.cancelAnimationFrame
              ? window.cancelAnimationFrame(handle.value)
              : window.webkitCancelRequestAnimationFrame
              ? window.webkitCancelRequestAnimationFrame(handle.value)
              : window.mozCancelRequestAnimationFrame
              ? window.mozCancelRequestAnimationFrame(handle.value)
              : window.oCancelRequestAnimationFrame
              ? window.oCancelRequestAnimationFrame(handle.value)
              : window.msCancelRequestAnimationFrame
              ? msCancelRequestAnimationFrame(handle.value)
              : clearInterval(handle);
          };
          $.each($listItems, function (i) {
            let $this = $(this);
            $this.on("touchstart click", function (e) {
              e.preventDefault();
              _stopMove(i);
              _moveIt($this, i);
            });
          });
          autoSlider = requestInterval(_autoMove, $acAuto);
        },
        _moveIt = function (obj, x) {
          let n = x;
          obj.find("figure").addClass("active");
          $listItems.not(obj).find("figure").removeClass("active");
          function run(v) {
            $list.animate(v[0], {
              duration: 300,
              step: function (val) {
                $list.css("transform", `translateX(${val}%)`);
              },
              done: function () {},
            });
          }
          let param =
            $direction === "ltr"
              ? { y: (100 / $nItems) * -(n - 1) }
              : { y: (100 / $nItems) * (n - 1) };
          run([param]);
          // run([{ y: (100 / $nItems) * (n - 1) }]);
          // console.log(`translateX(${(100 / $nItems) * -1}%)`);
        },
        _autoMove = function (currentSlide) {
          if ($isAuto) $current = ~~(($current + 1) % $nItems);
          else $current = currentSlide;
          // console.log($current);
          _moveIt($listItems.eq($current), $current);
        },
        _stopMove = function (x) {
          clearRequestInterval(autoSlider);
          $isAuto = false;
          _autoMove(x);
        };
      $list.css({
        transform: `translateX(${(100 / $nItems) * $multiNumPosition}%)`,
        y: (100 / $nItems) * $multiNumPosition,
      });
      return {
        init: _init,
      };
    })(document, jQuery);
    sliderChoose.init();

    // Vanillajs
    VanillaTilt.init(document.querySelectorAll(".custom-card"), {
      max: 25,
      speed: 400,
      glare: true,
      "max-glare": 1,
    });
  }
});

// $(window).on("resize", function () {
//   // Change The Height Of Background Image And Overlay When Resize Document
//   let windowHeight = $(window).height();
//   $(".home .homebg").outerHeight(windowHeight);
//   $(".home .image-overlay").outerHeight(windowHeight);
// });

// $(document).ready(function () {
//   let homeDiv = $("#home");
//   let ourServicesDiv = $("#ourServices");
//   let ourWorksDiv = $("#ourWorks");
//   let ourClientsDiv = $("#ourClients");
//   let contactUsDiv = $("#contactUs");
//   let footer = $("#footer");
//   let position = window.scrollY;
//   let windowHeight = $(window).height();

//   $(window).on("scroll", function () {
//     let position = window.scrollY;
//     let windowHeight = $(window).height();

//     // Change Opacity For Header When Scroll
//     if (position < 100) {
//       let opacity = 0;
//       $(".header .navbar").css(
//         "background",
//         "rgba(30, 30, 30," + opacity + ")"
//       );
//       $(".header .navbar .navbar-collapse").css(
//         "background",
//         "rgba(30, 30, 30," + opacity + ")"
//       );
//       // console.log(opacity);
//     } else if (position < ourServicesDiv.position().top) {
//       let homeHeight = $("#home").height();
//       let opacity =
//         1 - ((homeHeight + 100 - position) / (windowHeight * 100)) * 100;
//       $(".header .navbar").css(
//         "background",
//         "rgba(30, 30, 30," + opacity + ")"
//       );
//       $(".header .navbar .navbar-collapse").css(
//         "background",
//         "rgba(30, 30, 30," + opacity + ")"
//       );
//       // console.log(opacity);
//     } else {
//       let opacity = 1;
//       $(".header .navbar").css(
//         "background",
//         "rgba(30, 30, 30," + opacity + ")"
//       );
//       $(".header .navbar .navbar-collapse").css(
//         "background",
//         "rgba(30, 30, 30," + opacity + ")"
//       );
//       // console.log(opacity);
//     }

//     // Add And Remove Class Active From Links When Scroll
//     if (position < ourServicesDiv.position().top) {
//       $(".navbar .nav-item .nav-link").removeClass("active");
//       $(".home-link").addClass("active");
//       window.history.pushState("state", "Home", "/#home");
//       // return;
//     } else if (
//       position >= ourServicesDiv.position().top &&
//       position < ourWorksDiv.position().top
//     ) {
//       $(".navbar .nav-item .nav-link").removeClass("active");
//       $(".our-services-link").addClass("active");
//       window.history.pushState("state", "Our Services", "/#ourServices");
//       // return;
//     } else if (
//       position >= ourWorksDiv.position().top &&
//       position < ourClientsDiv.position().top
//     ) {
//       $(".navbar .nav-item .nav-link").removeClass("active");
//       $(".our-works-link").addClass("active");
//       window.history.pushState("state", "Our Works", "/#ourWorks");
//       // return;
//     } else if (
//       position >= ourClientsDiv.position().top &&
//       position < contactUsDiv.position().top
//     ) {
//       $(".navbar .nav-item .nav-link").removeClass("active");
//       $(".our-clients-link").addClass("active");
//       window.history.pushState("state", "Our Clients", "/#ourClients");
//       // return;
//     } else if (
//       position >= contactUsDiv.position().top &&
//       position < footer.position().top
//     ) {
//       $(".navbar .nav-item .nav-link").removeClass("active");
//       $(".contact-us-link").addClass("active");
//       window.history.pushState("state", "Contact Us", "/#contactUs");
//       // return;
//     } else {
//       $(".navbar .nav-item .nav-link").removeClass("active");
//       $(".home-link").addClass("active");
//       window.history.pushState("state", "Home", "/#home");
//       // return;
//     }
//   });

//   // Change Opacity For Header
//   if (position < 100) {
//     let opacity = 0;
//     $(".header .navbar").css("background", "rgba(30, 30, 30," + opacity + ")");

//     $(".header .navbar .navbar-collapse").css(
//       "background",
//       "rgba(30, 30, 30," + opacity + ")"
//     );
//   } else if (position < ourServicesDiv.position().top) {
//     let homeHeight = $("#home").height();
//     let opacity =
//       1 - ((homeHeight + 100 - position) / (windowHeight * 100)) * 100;
//     $(".header .navbar").css("background", "rgba(30, 30, 30," + opacity + ")");
//     $(".header .navbar .navbar-collapse").css(
//       "background",
//       "rgba(30, 30, 30," + opacity + ")"
//     );
//   } else {
//     let opacity = 1;
//     $(".header .navbar").css("background", "rgba(30, 30, 30," + opacity + ")");
//     $(".header .navbar .navbar-collapse").css(
//       "background",
//       "rgba(30, 30, 30," + opacity + ")"
//     );
//   }

//   // Set The Height Of Background Image And Overlay When Document Ready
//   $(".home .homebg").outerHeight(windowHeight);
//   $(".home .image-overlay").outerHeight(windowHeight);

//   // Show And Hide dropdown Menu On Hover
//   $(".navbar .nav-item.dropdown").hover(
//     function () {
//       $(".navbar .nav-item .dropdown-menu").addClass("show");
//     },
//     function () {
//       $(".navbar .nav-item .dropdown-menu").removeClass("show");
//     }
//   );

//   // Add And Remove Class active From Links
//   $(".navbar .nav-item .add-active-onclick").on("click", function () {
//     $(".navbar .nav-item .nav-link").removeClass("active");
//     $(this).addClass("active");
//   });

//   $(".btn-custom").on("mousemove", function (e) {
//     const x = e.pageX - $(this).offset().left;
//     const y = e.pageY - $(this).offset().top;

//     $(".btn-custom").css({
//       "--x": x + "px",
//       "--y": y + "px",
//     });
//   });

//   // Prev And Next Buttons In Our Works Part
//   let count = 0;
//   // let $elem = $(".nav-tabs");
//   $(".our-works-nav .prev-chevron-nav").on("click", function () {
//     if (count < 0) {
//       count += 200;
//       $(".nav-tabs").scrollLeft(count);
//       console.log(count);
//     }
//   });

//   $(".our-works-nav .next-chevron-nav").on("click", function () {
//     if (
//       count > -($(".nav-tabs")[0].scrollWidth - $(".nav-tabs")[0].clientWidth)
//     ) {
//       count -= 200;
//       $(".nav-tabs").scrollLeft(count);
//       console.log(count);
//     }
//   });
// });
