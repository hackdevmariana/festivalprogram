import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js'; 


import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function () {
    let calendarEl = document.getElementById('calendar');

    let calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        selectable: true,
        dateClick: function(info) {
            fetch(`/api/events/${info.dateStr}`)
                .then(response => response.json())
                .then(data => {
                    // Muestra los eventos de ese día como quieras (modal, lista, etc.)
                    console.log(data);
                });
        },
        events: '/api/events', // Carga eventos desde backend
    });

    calendar.render();
});
