<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Events Calendar</title>
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
    }

    h1 {
      text-align: center;
      padding: 20px;
    }

    #calendar {
      max-width: 1000px;
      margin: 0 auto;
      background-color: white;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .fc-event-title {
      font-weight: bold;
    }

    .fc-daygrid-event img {
      width: 100%;
      margin-top: 5px;
      border-radius: 5px;
    }

    .tooltip {
      position: absolute;
      z-index: 9999;
      background: #333;
      color: #fff;
      padding: 8px;
      border-radius: 4px;
      font-size: 14px;
      display: none;
    }
  </style>
</head>
<body>

<h1>Upcoming Events</h1>
<div id="calendar"></div>
<div class="tooltip" id="tooltip"></div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const tooltip = document.getElementById('tooltip');

    const calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      height: 'auto',
      events: [
        {
          id: '1',
          title: 'Tech Fest',
          start: '2025-06-10',
          description: 'A big technical event with workshops and talks.',
          imageUrl: './assests/images/about1.jpg'
        },
        {
          id: '2',
          title: 'Ethical Hacking',
          start: '2025-05-10',
          description: 'Completed event on cyber security.',
          imageUrl: './assests/images/about1.jpg'
        },
        {
          id: '3',
          title: 'Code-a-thon',
          start: '2025-06-20',
          description: '24-hour coding marathon with exciting prizes.',
          imageUrl: './assests/images/about1.jpg'
        }
      ],

      eventDidMount: function (info) {
        if (info.event.extendedProps.imageUrl) {
          const img = document.createElement('img');
          img.src = info.event.extendedProps.imageUrl;
          info.el.appendChild(img);
        }

        // Tooltip on hover for upcoming events
        const eventDate = new Date(info.event.start);
        const now = new Date();
        if (eventDate >= now) {
          info.el.addEventListener('mouseenter', (e) => {
            tooltip.style.display = 'block';
            tooltip.innerHTML = `<strong>${info.event.title}</strong><br>${info.event.extendedProps.description}`;
            tooltip.style.top = e.pageY + 10 + 'px';
            tooltip.style.left = e.pageX + 10 + 'px';
          });
          info.el.addEventListener('mouseleave', () => {
            tooltip.style.display = 'none';
          });
        }
      },

      eventClick: function (info) {
        const eventDate = new Date(info.event.start);
        const now = new Date();
        if (eventDate < now) {
          // Redirect to event details page
          window.location.href = `event-details.php?id=${info.event.id}`;
        }
      }
    });

    calendar.render();

    // Move tooltip with mouse
    document.addEventListener('mousemove', function (e) {
      tooltip.style.top = e.pageY + 10 + 'px';
      tooltip.style.left = e.pageX + 10 + 'px';
    });
  });
</script>
</body>
</html>
