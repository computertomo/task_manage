<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link href="{{asset('fullcalendar/main.css')}}" rel='stylesheet' />

  </head>
  <body>
    <div id='calendar'></div>
    <div id='draggable-el' data-event='{ "title": "my event", "duration": "02:00" }'>drag me</div>
    <script src="{{asset('/fullcalendar/main.js')}}"></script>
    <script src="{{asset('/@fullcalendar/interaction/main.js')}}"></script>
    <!--<script type="module" src="{{asset('/js/task_calendar.js')}}"></script>-->
    <script>
      //   document.addEventListener('DOMContentLoaded', function() {
      //   var calendarEl = document.getElementById('calendar');
      //   var calendar = new FullCalendar.Calendar(calendarEl, {
      //     initialView: 'dayGridMonth'
      //   });
      //   calendar.render();
      // });
    document.addEventListener('DOMContentLoaded', function() {
      let draggableEl = document.getElementById('mydraggable');
      let calendarEl = document.getElementById('calendar');
    
      let calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ interactionPlugin ],
        droppable: true
      });
    
      calendar.render();
    
      new Draggable(draggableEl);
    });
    </script>
  </body>
</html>
<!--<!DOCTYPE html>-->
<!--<html lang='en'>-->
<!--  <head>-->
<!--    <meta charset='utf-8' />-->
<!--    <link href="{{ asset('/fullcalendar/main.css') }}" rel='stylesheet' />-->
<!--  </head>-->
<!--  <body>-->
<!--    <div id='calendar'></div>-->
<!--    <script src="{{ asset('/fullcalendar/main.js') }}"></script>-->
<!--    <script src="{{ asset('/js/calendar.js') }}"></script>-->
<!--    <script src="{{ asset('/js/js_calendar/core/main.js') }}"></script>-->
<!--    <script src="{{ asset('/js/js_calendar/daygrid/main.js') }}"></script>-->
<!--    <script src="{{ asset('/js/js_calendar/interaction/main.js') }}"></script>-->
<!--  </body>-->
<!--</html>-->



        <!--import { Calendar } from "{{ asset('node_modules/@fullcalendar/core') }}";-->
        <!--import dayGridPlugin from "{{ asset('node_modules/@fullcalendar/daygrid') }}";-->
        <!--import timeGridPlugin from "{{ asset('node_modules/@fullcalendar/timegrid') }}";-->
        <!--import listPlugin from "{{ asset('node_modules/@fullcalendar/list') }}";-->
        <!--document.addEventListener('DOMContentLoaded', function() {-->
        <!--var calendarEl = document.getElementById('calendar');-->
        <!--let calendar = new Calendar(calendarEl, {-->
        <!--  plugins: [ dayGridPlugin, timeGridPlugin, listPlugin ],-->
        <!--  initialView: 'dayGridMonth',-->
        <!--  headerToolbar: {-->
        <!--    left: 'prev,next today',-->
        <!--    center: 'title',-->
        <!--    right: 'dayGridMonth,timeGridWeek,listWeek'-->
        <!--  }-->
        <!--});-->
        <!--calendar.render();-->
        <!--});-->