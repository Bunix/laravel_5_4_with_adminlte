$(document).ready(function() {


  //Date range picker
  // $('#reservation').daterangepicker();

  //   //Date picker
  $('#reservation').datepicker({
    minViewMode: 1,
    format: 'mm/yyyy',
    setDate: new Date(),
    startDate : new Date('2015-01-01'),
    endDate : new Date(),
    autoclose: true,
    fixedColumns:   true,
  });
  
  //Date picker
  $('.datepicker').datepicker({
    dateFormat: 'Y/m/d',
    setDate: new Date(),
    autoclose: true
  });

  //Timepicker
  $(".timepicker").timepicker({
   showInputs: false
  });

  //color picker with addon
  $(".colorpicker").colorpicker();

  $('#tbldatas').DataTable({
      "paging": true,
      // "lengthChange": true,
      "searching": true,
      "ordering": false,
      // "info": true,
      // "autoWidth": true,
      "scrollX": true,
      "responsive": true,
      "select": true,
    });

  $('#tblreports').DataTable({
      "paging": false,
      "searching": false,
      "ordering": false,
      "scrollX": false,
      "responsive": true,
      "select": true,
    });

  //Initialize Select2 Elements
    $(".select2").select2();
    $('.select2-selection').css('border-radius','0px');
    $('.select2-container').children().css('border-radius','0px');

    $(document.body).on("change","#service_provider",function(){
      if(this.value == "Outsourced") {
        $('#outsourced_supplier_id').prop( "disabled", false );
      } else {
        $('#outsourced_supplier_id').prop( "disabled", true );
      }
    });

    // On load purposes
    if( $('#service_provider').val() == "Outsourced") {
      $('#outsourced_supplier_id').prop( "disabled", false );
    } else {
      $('#outsourced_supplier_id').prop( "disabled", true );
    }

    

  // $('#myModal').on('shown.bs.modal', function () {
  //   $('#myModal').focus()
  // });

  // $('#myModall').modal({
  //                       backdrop: 'static',
  //                       keyboard: true, 
  //                       show: true
  //               });


/* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
      defaultView: 'agendaWeek',
      firstDay: '1',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      //Random default events
      events: [
        {
          title: 'All Day Event',
          start: new Date(y, m, 1),
          backgroundColor: "#f56954", //red
          borderColor: "#f56954" //red
        },
        {
          title: 'Long Event',
          start: new Date(y, m, d - 5),
          end: new Date(y, m, d - 2),
          backgroundColor: "#f39c12", //yellow
          borderColor: "#f39c12" //yellow
        },
        {
          title: 'Meeting',
          start: new Date(y, m, d, 10, 30),
          allDay: false,
          backgroundColor: "#0073b7", //Blue
          borderColor: "#0073b7" //Blue
        },
        {
          title: 'Lunch',
          start: new Date(y, m, d, 12, 0),
          end: new Date(y, m, d, 14, 0),
          allDay: false,
          backgroundColor: "#00c0ef", //Info (aqua)
          borderColor: "#00c0ef" //Info (aqua)
        },
        {
          title: 'Birthday Party',
          start: new Date(y, m, d + 1, 19, 0),
          end: new Date(y, m, d + 1, 22, 30),
          allDay: false,
          backgroundColor: "#00a65a", //Success (green)
          borderColor: "#00a65a" //Success (green)
        },
        {
          title: 'Click for Google',
          start: new Date(y, m, 28),
          end: new Date(y, m, 29),
          url: 'http://google.com/',
          backgroundColor: "#3c8dbc", //Primary (light-blue)
          borderColor: "#3c8dbc" //Primary (light-blue)
        }
      ],
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar !!!
      drop: function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }

      }
    });

    /* ADDING EVENTS */
    var currColor = "#3c8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      //Save color
      currColor = $(this).css("color");
      //Add color effect to button
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
      e.preventDefault();
      //Get value and make sure it is not null
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }

      //Create events
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);

      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    });


});

