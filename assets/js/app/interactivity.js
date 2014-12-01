/**
 * This script sets up the event handlers and animations that make up most
 * of the interactivity of the app.
 */

/* globals $,console */

(function () {

  'use strict';

  if (window.app !== undefined) {
    console.log('Warning: namespace conflict: window.app is already defined.');
  }

  window.app = {
    editMode: true
  };

  var animationSpeeds = {
    timeTable: 500,
    day:       250,
    timeSlot:  100
  };

  function switchText(element, text) {
    $(element).fadeOut(function() {
        $(this).text(text);
      }).fadeIn();
  }

  function switchClickability($day) {
    if ($day.hasClass('clickable')) {
      $day.removeClass('clickable');
      $day.children('h1')
        .addClass('clickable');
    } else {
      $day.children('h1').removeClass('clickable');
      $day.addClass('clickable');
    }
  }

  $('#switch-mode').on('click', function () {
    if (!window.app.editMode) {
      /* enter edit mode */

      switchText('#switch-mode', 'View Group Availability');

      $('#weekview-container .view-mode').switchClass('view-mode', 'edit-mode', 'slow');
      $('#weekview-container').find('thead, th, td').hide();
      $('#weekview-container').find('.day:first-of-type th').show();
      $('#weekview-container').find('td:first-of-type').show();
      $('#weekview-container .timetable').show('slow');
      $('#weekview-container .clickable').removeClass('clickable');
    } else {
      /* enter view mode */

      switchText('#switch-mode', 'Edit Availability');

      $('#weekview-container .day:not(.large) .timetable').hide('slow', function () {
        $('#weekview-container').find('thead, th, td').show();
      });
      $('#weekview-container .day.large .timetable').find('thead, th, td').show();
      $('#weekview-container .edit-mode').switchClass('edit-mode', 'view-mode', 'slow');
      $('#weekview-container .day:not(.large)').addClass('clickable');
      $('#weekview-container .day.large h1').addClass('clickable');
    }

    window.app.editMode = !window.app.editMode;
  });

  function createDropDown(parent, menu) {
    $(parent).on('click', function () {
      var $menu = $(menu);
      if (!$menu.is(':visible')) {
        $menu.slideDown();
      } else {
        $menu.slideUp();
      }
    });
  }

  /* dropdown for help menu */
  createDropDown('#help-toggle', '#help-menu ul');

  /* dropdown for controls */
  createDropDown('#show-controls', '#controls');

  /* enlarge a day view */
  $('#weekview-container .day').on('mousedown', function () {
    var $day = $(this);
    if ($day.is(':not(.large).view-mode')) {

      /* unenlarge other days */
      $day.siblings('.large, .view-mode')
        .children('.timetable')
        .hide(animationSpeeds.timeTable, function () {
          $(this).parent()
            .switchClass('large', 'small', animationSpeeds.day)
            .children('h1')
            .addClass('small', animationSpeeds.day);
      });

      /* unshrink and enlarge self then show timeslots */
      $day.switchClass('small', 'large', animationSpeeds.day, function () {
          $day.children('.timetable')
              .show(animationSpeeds.timeTable);
        })
        .children('h1')
        .removeClass('small', animationSpeeds.day);

      /* shrink all other days */
      $day.siblings(':not(.large)')
        .addClass('small', animationSpeeds.day)
        .children('h1')
        .addClass('small', animationSpeeds.day);

      /* switch self clickability from div to h1 */
      switchClickability($day);
    }
  });

  /* unenlarge a day view */
  $('#weekview-container .day h1').on('mousedown', function () {
    var $day = $(this).parent();
    if ($day.is('.large.view-mode')) {

      /* hide own timeslots */
      $day.children('.timetable').hide(animationSpeeds.timeTable, function () {
        /* unshrink all other days */
        $day.siblings()
            .removeClass('small', animationSpeeds.day)
            .children('h1')
            .removeClass('small', animationSpeeds.day);

        /* unenlarge self */
        $day.removeClass('large', animationSpeeds.day);

        /* switch self clickability from h1 to div */
        switchClickability($day);
      });
    }
  });

  /* prevent right-click menu */
  $('#weekview-container .day').on('contextmenu', function () {
    return false;
  });

  /* enter timeslot edit mode */
  $('#weekview-container .timeslot').on('mousedown', function (e) {
    if (e.which === 1) {
      window.app.buttonClicked = 'left';
    } else if (e.which === 3) {
      window.app.buttonClicked = 'right';
    }
    window.app.mousedown = true;
    $(this).trigger('mouseenter');
  });

  /* leave timeslot edit mode */
  $('body').on('mouseup', function () {
    window.app.mousedown = false;
  });

  /* modify timeslots when in edit mode */
  $('#weekview-container .timeslot').on('mouseenter', function () {
    if (window.app.mousedown) {
      if (window.app.buttonClicked == 'left') {
        $(this).switchClass('busy', 'free', animationSpeeds.timeSlot);
      } else {
        $(this).switchClass('free', 'busy', animationSpeeds.timeSlot);
      }
    }
  });

}());