$(document).ready(function () {
  $("#startdate").datepicker({ dateFormat: 'D, d M yy' });
  $("#startdatetime").timeEntry();
  $("#enddate").datepicker({ dateFormat: 'D, d M yy' });
  $("#enddatetime").timeEntry();

  $("input#all_day").change(function () {
    if ($("input#all_day")[0].checked) {
      $("#startdatetime").addClass("hide");
      $("#enddatetime").addClass("hide");
      $("#startdatetime")[0].value = "";
      $("#enddatetime")[0].value = "";
    }
    else {
      $("#startdatetime").removeClass("hide");
      $("#enddatetime").removeClass("hide");
    }
  }).change();
});
