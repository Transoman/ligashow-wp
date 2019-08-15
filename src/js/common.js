'use strict';

// global.jQuery = require('jquery');
let svg4everybody = require('svg4everybody'),
  popup = require('jquery-popup-overlay'),
  Swiper = require('swiper'),
  noUiSlider = require('nouislider'),
  iMask = require('imask');

jQuery(document).ready(function($) {
  // Toggle nav menu
  let toggleNav = function () {
    let toggle = $('.nav-toggle');
    let nav = $('.header__nav');
    let closeNav = $('.nav__close');
    let overlay = $('.nav-overlay');

    toggle.on('click', function (e) {
      e.preventDefault();
      nav.toggleClass('open');
      overlay.toggleClass('is-active');
    });

    closeNav.on('click', function (e) {
      e.preventDefault();
      nav.removeClass('open');
      overlay.removeClass('is-active');
    });

    overlay.on('click', function (e) {
      e.preventDefault();
      nav.removeClass('open');
      $(this).removeClass('is-active');
    });

  };

  // Modal
  $('.modal').popup({
    transition: 'all 0.3s',
    color: '#1b244e',
    opacity: 0.9,
    onclose: function() {
      $(this).find('label.error').remove();
    }
  });

  // Input mask
  let phoneInputs = $('input[type="tel"]');
  let maskOptions = {
    mask: '+{7} (000) 000-0000'
  };

  if (phoneInputs) {
    phoneInputs.each(function(i, el) {
      IMask(el, maskOptions);
    });
  }

  // Slider
  let heroSlider = document.querySelector('.hero-slider');
  let sliderSpeed = 500;
  if (heroSlider) {
    let sliderSpeed = parseInt(heroSlider.getAttribute('data-speed'), 10);
  }

  new Swiper('.hero-slider', {
    speed: sliderSpeed,
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    thumbs: {
      swiper: {
        el: '.hero-thumb-slider',
        slidesPerView: 6,
        spaceBetween: 55,
        breakpoints: {
          1395: {
            spaceBetween: 30,
          },
          1200: {
            slidesPerView: 5,
            spaceBetween: 30,
          }
        }
      }
    }
  });

  new Swiper('.portfolio-slider', {
    slidesPerView: 'auto',
    spaceBetween: 75,
    slidesOffsetBefore: -400,
    centeredSlides: true,
    navigation: {
      nextEl: '.portfolio-slider-wrap .swiper-button-next',
      prevEl: '.portfolio-slider-wrap .swiper-button-prev',
    },
    pagination: {
      el: '.portfolio-slider-wrap .swiper-pagination',
      type: 'progressbar',
    },
    breakpoints: {
      1395: {
        slidesOffsetBefore: -300,
      },
      1200: {
        slidesOffsetBefore: -185,
      },
      992: {
        slidesOffsetBefore: -70,
      },
      767: {
        slidesPerView: 1,
        centeredSlides: false,
        slidesOffsetBefore: 0
      }
    }
  });

  new Swiper('.popular-order-slider', {
    slidesPerView: 'auto',
    spaceBetween: 35,
    slidesOffsetBefore: -470,
    centeredSlides: true,
    navigation: {
      nextEl: '.s-popular-order .swiper-button-next',
      prevEl: '.s-popular-order .swiper-button-prev',
    },
    pagination: {
      el: '.s-popular-order .swiper-pagination',
      type: 'progressbar',
    },
    breakpoints: {
      1395: {
        slidesOffsetBefore: -370,
      },
      1200: {
        slidesOffsetBefore: -255,
      },
      992: {
        slidesOffsetBefore: -130,
      },
      767: {
        slidesPerView: 1,
        centeredSlides: false,
        slidesOffsetBefore: 0
      }
    }
  });

  new Swiper('.partners-slider', {
    slidesPerView: 6,
    speed: 1000,
    loop: true,
    autoplay: {
      delay: 5000,
    },
    breakpoints: {
      1200: {
        slidesPerView: 5,
      },
      992: {
        slidesPerView: 4,
      },
      767: {
        slidesPerView: 1,
      }
    }
  });


  let calculateOrder = function () {
    let parentBlocks = $('.calculate-order__item');

    if (parentBlocks) {
      parentBlocks.each(function(i, el) {

        let countPersonRange = $(el).find('.calculate-order__range--count-person');
        let worksRange = $(el).find('.calculate-order__range--works');
        let total = $(el).find('.calculate-order__total-price');
        let countPerson = $(el).find('.calculate-order__count-person-current');
        let countWorks = $(el).find('.calculate-order__works-current');
        let pricesBlock = $(el).find('script');
        let bar = $(el).find('.switch');
        let btn = $(el).find('.btn');
        let timePrice = 0;
        let sum = 0;
        let barValue = '';

        let calc = function() {
          if (pricesBlock) {
            let p = 'prices' + i;

            for (let key in window[p]) {
              if (countPerson.text() >= window[p][key].person_from && countPerson.text() <= window[p][key].person_to) {
                timePrice = window[p][key].price;
              } else if (countPerson.text() > window[p][key].person_to) {
                timePrice = window[p][key].price;
              }
            }
          }

          if (bar.is(':checked')) {
            sum = (countPerson.text() * countWorks.text() * timePrice)  * 1.15;
            barValue = 'нужна';
          }
          else {
            sum = (countPerson.text() * countWorks.text() * timePrice);
            barValue = 'не нужна';
          }

          total.find('span').text(new Intl.NumberFormat('ru-RU').format(parseInt(sum, 10)));
        };

        if (countPersonRange) {
          noUiSlider.create(countPersonRange[0], {
            start: parseInt(countPersonRange.data('max') / 3, 10),
            connect: [true, false],
            step: 1,
            range: {
              'min': parseInt(countPersonRange.data('min'), 10),
              'max': parseInt(countPersonRange.data('max'), 10)
            }
          });

          countPersonRange[0].noUiSlider.on('update', function (values, handle) {
            countPerson.text(parseInt(values[handle], 10));
            calc();
          });
        }

        if (worksRange) {
          noUiSlider.create(worksRange[0], {
            start: parseInt(worksRange.data('max') / 3, 10),
            connect: [true, false],
            step: 1,
            range: {
              'min': parseInt(worksRange.data('min'), 10),
              'max': parseInt(worksRange.data('max'), 10)
            }
          });

          worksRange[0].noUiSlider.on('update', function (values, handle) {
            countWorks.text(parseInt(values[handle], 10));
            calc();
          });
        }

        bar.change(function() {
          if ($(this).is(':checked')) {
            $(this).next().parent().find('.calculate-order__switch-val-on').show();
            $(this).next().parent().find('.calculate-order__switch-val-off').hide();
          }
          else {
            $(this).next().parent().find('.calculate-order__switch-val-on').hide();
            $(this).next().parent().find('.calculate-order__switch-val-off').show();
          }
          calc();
        });

        calc();

        btn.click(function() {
          let popupName = $(this).data('popup-name');
          if (popupName) {
            $('#' + popupName).find('input[name="person"]').val(parseInt(countPerson.text(), 10));
            $('#' + popupName).find('input[name="time"]').val(parseInt(countWorks.text(), 10));
            $('#' + popupName).find('input[name="service"]').val($('.calculate-order-list li.active').text());
            $('#' + popupName).find('input[name="sum"]').val(total.find('span').text());
            $('#' + popupName).find('input[name="bar"]').val(barValue);
          }

        });

      });
    }

  };

  // Tabs
  $('.calculate-order-list').on('click', 'li:not(.active)', function(e) {
    e.preventDefault();
    $(this)
        .addClass('active').siblings().removeClass('active')
        .closest('.calculate-order').find('.calculate-order__item').removeClass('active').eq($(this).index()).addClass('active');
  });

  $('.services-cat-list__item').hover(function() {
    $('.services-cat-list__item').removeClass('is-active');
    $(this).addClass('is-active');
  });

  let toggleLocation = function() {
    $('.location__head').click(function() {
      $(this).next('.location__body').toggleClass('is-active');
    });

    $(window).mouseup(function(e) {
      if (e.target != 'location' && $(e.target).parents('.location').length == 0) {
        $('.location__head').next('.location__body').removeClass('is-active');
      }
    });

  };

  $('form input[name="region"]').each(function() {
    $(this).val(document.querySelector('.location__title').innerHTML);
  });

  // Smooth scroll to anchor
  $('a[href*="#"]')
  // Remove links that don't actually link to anything
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function(event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
        ) {
          // Figure out element to scroll to
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

          // Does a scroll target exist?
          if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000);
          }
        }
      });

  toggleNav();
  toggleLocation();
  calculateOrder();

  // SVG
  svg4everybody({});
});