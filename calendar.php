<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Events Calendar</title>
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
  <style>
    /* Reset some defaults */
    * {
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0 20px 40px;
      color: #112d4e;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      overflow-x: hidden;
    }

    h1 {
      margin: 40px 0 20px;
      font-weight: 900;
      font-size: 3rem;
      letter-spacing: 1.3px;
      color: #fff;
      text-shadow: 0 3px 8px rgba(0, 0, 0, 0.4);
      animation: fadeSlideDown 1s ease forwards;
      opacity: 0;
      transform: translateY(-30px);
    }

    @keyframes fadeSlideDown {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    #calendar {
      max-width: 1100px;
      width: 100%;
      background-color: #ffffffdd;
      border-radius: 15px;
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.18);
      padding: 25px;
      animation: fadeInScale 0.8s ease forwards;
      opacity: 0;
      transform: scale(0.95);
      user-select: none;
    }

    @keyframes fadeInScale {
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    /* Customize FullCalendar header */
    .fc-header-toolbar {
      margin-bottom: 25px;
    }

    .fc-toolbar-title {
      font-size: 2rem;
      font-weight: 700;
      color: #0077b6;
      text-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
    }

    .fc-button {
      background: #0077b6;
      border: none;
      color: #fff;
      padding: 8px 15px;
      font-weight: 600;
      border-radius: 8px;
      transition: background-color 0.3s ease;
      box-shadow: 0 4px 10px rgba(0, 119, 182, 0.35);
      cursor: pointer;
    }
    .fc-button:hover {
      background: #023e8a;
      box-shadow: 0 6px 15px rgba(2, 62, 138, 0.5);
    }
    .fc-button:focus {
      outline: none;
      box-shadow: 0 0 8px 3px #90e0ef;
    }

    /* Day headers style */
    .fc-col-header-cell-cushion {
      color: #0077b6;
      font-weight: 700;
      font-size: 1.1rem;
      text-transform: uppercase;
      letter-spacing: 1.1px;
    }

    /* Event styles */
    .fc-daygrid-event {
      border-radius: 10px !important;
      padding: 6px 10px !important;
      box-shadow: 0 4px 8px rgb(0 119 182 / 0.3);
      cursor: pointer;
      font-weight: 700;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background: linear-gradient(135deg, #00b4d8, #0077b6);
      color: white !important;
      overflow: hidden;
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .fc-daygrid-event:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 20px rgb(0 119 182 / 0.6);
      z-index: 10;
    }

    /* Event title */
    .fc-event-title {
      white-space: nowrap;
      text-overflow: ellipsis;
      overflow: hidden;
      width: 100%;
    }

    /* Event images inside events */
    .fc-daygrid-event img {
      max-height: 70px;
      margin-top: 6px;
      border-radius: 8px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    .fc-daygrid-event:hover img {
      transform: scale(1.1);
    }

    /* Tooltip style */
    .tooltip {
      position: fixed;
      z-index: 9999;
      background: rgba(2, 62, 138, 0.9);
      color: #fff;
      padding: 12px 18px;
      border-radius: 12px;
      font-size: 1rem;
      pointer-events: none;
      opacity: 0;
      transition: opacity 0.25s ease;
      max-width: 280px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.35);
      line-height: 1.4;
      font-weight: 600;
      user-select: none;
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
    }
    .tooltip.visible {
      opacity: 1;
    }

    /* Responsive tweaks */
    @media (max-width: 700px) {
      h1 {
        font-size: 2.2rem;
      }
      .fc-toolbar-title {
        font-size: 1.5rem;
      }
      #calendar {
        padding: 15px;
      }
      .fc-daygrid-event img {
        max-height: 50px;
      }
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
            imageUrl: './assests/images/about1.jpg',
            detailsUrl: 'completed_event/tech_fest.php'
          },
          {
            id: '2',
            title: 'Ethical Hacking',
            start: '2025-05-10',
            description: 'Completed event on cyber security.',
            imageUrl: './assests/images/about1.jpg',
            detailsUrl: 'completed_event/ethical_hacking.php'
          },
          {
            id: '3',
            title: 'Code-a-thon',
            start: '2025-06-20',
            description: '24-hour coding marathon with exciting prizes.',
            imageUrl: './assests/images/about1.jpg',
            detailsUrl: 'completed_event/codeathon.php'
          },
          {
            id: '4',
            title: 'Oracle Workshop',
            start: '2025-05-29',
            description: 'Workshop on Oracle Database Security.',
            imageUrl: './assests/images/about1.jpg',
            detailsUrl: 'completed_event/oracle_workshop.php'
          },
          {
            id: '5',
            title: 'World Science Day',
            start: '2025-06-15',
            description: 'Celebration of science and innovation.',
            imageUrl: './assests/images/about1.jpg',
            detailsUrl: 'completed_event/world_science_day.php'
          }
        ],

        eventDidMount: function (info) {
          if (info.event.extendedProps.imageUrl) {
            const img = document.createElement('img');
            img.src = info.event.extendedProps.imageUrl;
            img.alt = info.event.title + ' image';
            info.el.appendChild(img);
          }

          const eventDate = new Date(info.event.start);
          const now = new Date();

          if (eventDate >= now) {
            info.el.addEventListener('mouseenter', (e) => {
              tooltip.classList.add('visible');
              tooltip.innerHTML = `<strong>${info.event.title}</strong><br>${info.event.extendedProps.description}`;
              positionTooltip(e);
            });

            info.el.addEventListener('mouseleave', () => {
              tooltip.classList.remove('visible');
            });
          }
        },

        eventClick: function (info) {
          const eventDate = new Date(info.event.start);
          const now = new Date();

          if (eventDate < now) {
            const url = info.event.extendedProps.detailsUrl;
            if (url) {
              window.location.href = url;
            } else {
              alert('No detail page found for this event.');
            }
          }
        }
      });

      calendar.render();

      function positionTooltip(e) {
        const tooltipRect = tooltip.getBoundingClientRect();
        let top = e.clientY + 15;
        let left = e.clientX + 15;

        if (top + tooltipRect.height > window.innerHeight) {
          top = e.clientY - tooltipRect.height - 15;
        }
        if (left + tooltipRect.width > window.innerWidth) {
          left = e.clientX - tooltipRect.width - 15;
        }

        tooltip.style.top = top + 'px';
        tooltip.style.left = left + 'px';
      }

      document.addEventListener('mousemove', function (e) {
        if (tooltip.classList.contains('visible')) {
          positionTooltip(e);
        }
      });
    });
  </script>
</body>
</html>
