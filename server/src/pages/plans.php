<?php
if (!$_COOKIE['user_id']) {
  header('Location: /src/pages/auth.php');
}
?>

<!DOCTYPE html>
<html lang="en" style="overflow-x:hidden;">

  <!-- Head -->
  <?php require('../../src/components/head.php'); ?>

<body style='overflow-x:hidden; background-color: #fff' id="snow-animation-container">
  <!-- Header -->
  <?php require('../../src/components/header.php'); ?>

  <!-- Footer -->
  <?php require('../../src/components/footer.php'); ?>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

  <script>
    $(document).ready(function() {
      var calendar = $('#calendar').fullCalendar({
        editable: true,
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        events: './calendary/load.php',
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
          var title = prompt("Введите название события");
          if (title) {
            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
            $.ajax({
              url: "./calendary/insert.php",
              type: "POST",
              data: {
                title: title,
                start: start,
                end: end
              },
              success: function() {
                calendar.fullCalendar('refetchEvents');
                $('#liveToastChangeAdd').toast('show');
              }
            })
          }
        },
        editable: true,
        eventResize: function(event) {
          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
          var title = event.title;
          var id = event.id;
          $.ajax({
            url: "./calendary/update.php",
            type: "POST",
            data: {
              title: title,
              start: start,
              end: end,
              id: id
            },
            success: function() {
              calendar.fullCalendar('refetchEvents');
              $('#liveToastChange').toast('show');
            }
          })
        },

        eventDrop: function(event) {
          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
          var title = event.title;
          var id = event.id;
          $.ajax({
            url: "./calendary/update.php",
            type: "POST",
            data: {
              title: title,
              start: start,
              end: end,
              id: id
            },
            success: function() {
              calendar.fullCalendar('refetchEvents');
              $('#liveToastChange').toast('show');
            }
          });
        },

        eventClick: function(event) {
          if (confirm("Ты действительно хочешь удалить событие?")) {
            var id = event.id;
            $.ajax({
              url: "./calendary/dalete.php",
              type: "POST",
              data: {
                id: id
              },
              success: function() {
                calendar.fullCalendar('refetchEvents');
                $('#liveToastChangeRem').toast('show');
              }
            })
          }
        },

      });
    });
  </script>
  <div class="container mt-2 mb-6">
    <div id="calendar"></div>
  </div>





  <!--alert good-->
  <div class="position-fixed end-0" style="z-index: 5; bottom: 0; margin-bottom: 70px">
    <div id="liveToastChange" class="toast bg-success hide" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-body">
        Событие обновлено!
        <button type="button" class="btn-close float-right" data-bs-dismiss="toast" aria-label="Закрыть"></button>
      </div>
    </div>
  </div>

  <!--alert good-->
  <div class="position-fixed end-0" style="z-index: 5; bottom: 0; margin-bottom: 70px">
    <div id="liveToastChangeAdd" class="toast bg-success hide" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-body">
        Событие добавлено!
        <button type="button" class="btn-close float-right" data-bs-dismiss="toast" aria-label="Закрыть"></button>
      </div>
    </div>
  </div>

  <!--alert good-->
  <div class="position-fixed end-0" style="z-index: 5; bottom: 0; margin-bottom: 70px">
    <div id="liveToastChangeRem" class="toast bg-success hide" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-body">
        Событие удалено!
        <button type="button" class="btn-close float-right" data-bs-dismiss="toast" aria-label="Закрыть"></button>
      </div>
    </div>
  </div>
</body>
</html>