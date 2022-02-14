import  {Calendar}  from "../../@fullcalendar/core/main.js";
import dayGridPlugin from "../../@fullcalendar/daygrid/main.js";
import interactionPlugin, { Draggable } from "../../@fullcalendar/interaction/main.js";
document.addEventListener('DOMContentLoaded', function() {
  let draggableEl = document.getElementById('mydraggable');
  let calendarEl = document.getElementById('calendar');

  let calendar = new Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    plugins: [ interactionPlugin ],
    droppable: true
  });

  calendar.render();

  new Draggable(draggableEl);
});



//     document.addEventListener('DOMContentLoaded', function() {
//           let draggableEl = document.getElementById('mydraggable');
//           let calendarEl = document.getElementById('mycalendar');
        
//           let calendar = new Calendar(calendarEl, {
//             plugins: [ interactionPlugin ],
//             droppable: true
//           });
        
//           calendar.render();
          
//           new Draggable(draggableEl);
//         });
        
        
// // import  { Calendar }  from "../@fullcalendar/core/main.cjs.js";