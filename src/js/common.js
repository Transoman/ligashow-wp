'use strict';

// global.jQuery = require('jquery');
let svg4everybody = require('svg4everybody'),
  popup = require('jquery-popup-overlay'),
  Swiper = require('swiper'),
  noUiSlider = require('nouislider');

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
    onclose: function() {
      $(this).find('label.error').remove();
    }
  });

  let sliderSpeed = parseInt(document.querySelector('.hero-slider').getAttribute('data-speed'), 10);
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

  let portfolioSlider = new Swiper('.portfolio-slider', {
    // slidesPerView: 3.15,
    slidesPerView: 'auto',
    spaceBetween: 75,
    slidesOffsetBefore: -400,
    // width: 1920,
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

  let offsetSlider = function(container, slider, slidesView) {
    let sliderWidth = $(slider.$el[0]).width();
    let sliderOffset = $(container).offset().left;

    if ($(window).width() > 767) {
      slider.params.slidesOffsetBefore = - (680.83 - sliderOffset - 15);
      slider.update();
    }
  };

  let calculateOrder = function(people, time, elItem) {
    let total = $(elItem).parents('.calculate-order__item').find('.calculate-order__total-price');
    let timePrice = total.data('time-price');
    let bar = $(elItem).parents('.calculate-order__item').find('.switch');
    let sum = 0;

    if (bar.is(':checked')) {
      sum = (people * time * timePrice);
    }
    else {
      sum = (people * time * timePrice) * 0.15;
    }

    total.find('span').text(parseInt(sum, 10));

  };

  let countPersonRange = $('.calculate-order__range--count-person');

  if (countPersonRange) {
    countPersonRange.each(function(i, el) {
      noUiSlider.create(this, {
        start: parseInt($(this).data('max') / 3, 10),
        connect: [true, false],
        step: 1,
        range: {
          'min': parseInt($(this).data('min'), 10),
          'max': parseInt($(this).data('max'), 10)
        }
      });

      this.noUiSlider.on('update', function (values, handle) {
        $(el).parents('.calculate-order__item').find('.calculate-order__count-person-current').text(parseInt(values[handle], 10));
        calculateOrder(parseInt(values[handle], 10), parseInt($(el).parents('.calculate-order__item').find('.calculate-order__works-current').text(), 10), el);
      });

    });
  }

  let worksRange = $('.calculate-order__range--works');

  if (worksRange) {
    worksRange.each(function(i, el) {
      noUiSlider.create(this, {
        start: parseInt($(this).data('max') / 3, 10),
        connect: [true, false],
        step: 1,
        range: {
          'min': parseInt($(this).data('min'), 10),
          'max': parseInt($(this).data('max'), 10)
        }
      });

      this.noUiSlider.on('update', function (values, handle) {
        $(el).parents('.calculate-order__item').find('.calculate-order__works-current').text(parseInt(values[handle], 10));
        calculateOrder(parseInt($(el).parents('.calculate-order__item').find('.calculate-order__count-person-current').text(), 10), parseInt(values[handle], 10), el);
      });

    });
  }

  let calculateOrderItems = $('.calculate-order__item');

  if (calculateOrderItems) {
    calculateOrderItems.each(function(i, el) {
      calculateOrder(parseInt($(el).find('.calculate-order__count-person-current').text(), 10), parseInt($(el).find('.calculate-order__works-current').text(), 10), el);

      $(this).find('.btn').click(function() {
        let popupName = $(this).data('popup-name');
        if (popupName) {
          $('#' + popupName).find('input[name="person"]').val(parseInt($(el).find('.calculate-order__count-person-current').text(), 10));
          $('#' + popupName).find('input[name="time"]').val(parseInt($(el).find('.calculate-order__works-current').text(), 10));
          $('#' + popupName).find('input[name="service"]').val($('.calculate-order-list li.active').text());
          $('#' + popupName).find('input[name="sum"]').val(parseInt($(el).find('.calculate-order__total-price span').text(), 10));
          let bar = $(el).find('.switch').is(':checked') ? 'Да' : 'Нет';
          $('#' + popupName).find('input[name="bar"]').val(bar);
        }

      });

    });
  }

  $('.calculate-order__item .switch').change(function() {
    if ($(this).is(':checked')) {
      $(this).next().parent().find('.calculate-order__switch-val-on').show();
      $(this).next().parent().find('.calculate-order__switch-val-off').hide();
    }
    else {
      $(this).next().parent().find('.calculate-order__switch-val-on').hide();
      $(this).next().parent().find('.calculate-order__switch-val-off').show();
    }
  });

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

  toggleNav();
  // offsetSlider('.s-project .container', portfolioSlider);
  //
  // $(window).resize(function() {
  //   offsetSlider('.s-project .container', portfolioSlider);
  // });

  // SVG
  svg4everybody({});
});