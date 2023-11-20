/* http://keith-wood.name/calendars.html
   Arabic localisation for UmmAlQura calendar for jQuery v2.1.0.
   Written by Amro Osama March 2013.
   Updated by Fahad Alqahtani April 2016. */
   (function ($) {
    'use strict';
    $.calendars.calendars.coptic.prototype.regionalOptions.ar = {
      name: 'Coptic', // The calendar name
      epochs: ['BAM', 'AM'],
      monthNames: ['توت', 'بابة', 'هاتور', 'كيهك', 'طوبة', 'امشير',
				'برمهات', 'برمودة', 'بشنس', 'بوؤنة', 'ابيب', 'مسرى', 'نسئ'],
      monthNamesShort: ['توت', 'بابة', 'هاتور', 'كيهك', 'طوبة', 'امشير',
      'برمهات', 'برمودة', 'بشنس', 'بوؤنة', 'ابيب', 'مسرى', 'نسئ'],
      dayNames: ['Tkyriaka', 'Pesnau', 'Pshoment', 'Peftoou', 'Ptiou', 'Psoou', 'Psabbaton'],
      dayNamesShort: ['Tky', 'Pes', 'Psh', 'Pef', 'Pti', 'Pso', 'Psa'],
      dayNamesMin: ['Tk', 'Pes', 'Psh', 'Pef', 'Pt', 'Pso', 'Psa'],
      digits: null,
      dateFormat: 'yyyy/MM/dd',
      firstDay: 1,
      isRTL: true
    };
  })(jQuery);