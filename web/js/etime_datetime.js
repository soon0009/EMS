$(function () {
  $("#startdate").datepicker({ dateFormat: 'D, d M yy' });
  $("#startdatetime").timeEntry();
  $("#enddate").datepicker({ dateFormat: 'D, d M yy' });
  $("#enddatetime").timeEntry();
});
