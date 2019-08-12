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
        $('.calculate-order__count-person-current').text(parseInt(values[handle], 10));
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
        $('.calculate-order__works-current').text(parseInt(values[handle], 10));
      });

    });
  }

  toggleNav();

  // SVG
  svg4everybody({});
});