<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Events Management</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<style>
html, body {
  height: 100%;
  margin: 0;
  font-family: 'Segoe UI', sans-serif;
  background: #1c1f26; /* dark dashboard */
  color: #e6e6e6;
  display: flex;
  flex-direction: column;
}

/* Header */
.header {
  background: #2a2f3a;
  color: #f97316; /* orange highlight */
  padding: 16px 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0 2px 6px rgba(0,0,0,0.4);
}
.header h1 { margin: 0; font-size: 1.6rem; font-weight: 700; }
.header button {
  border-radius: 8px;
  font-weight: 500;
  background: #fff;
  color: #000;
  border: none;
  padding : 0.5rem
}
.header button:hover { background: #036549; }

/* Container */
.container-full {
  flex: 1;
  padding: 20px 30px;
  overflow-y: auto;
}

/* Stats cards */
.stats-container {
  display: grid;
  grid-template-columns: repeat(auto-fit,minmax(220px,1fr));
  gap: 20px;
  margin-bottom: 30px;
}
.stat-card {
  padding: 20px;
  border-radius: 14px;
  text-align: center;
  color: #fff;
  box-shadow: 0 4px 12px rgba(0,0,0,0.3);
}
.stat-card h2 { margin: 0; font-size: 1.8rem; font-weight: 700; }
.stat-card p { margin: 6px 0 0; font-size: 0.95rem; }
.stat-pending { background: #b45309; }
.stat-completed { background: #047857; }
.stat-hold { background: #1d4ed8; }
.stat-failed { background: #b91c1c; }

/* Table */
/* Table */
.table-container {
  background: #2a2f3a; /* solid black background for table container */
  /* border-radius: 12px; */
  overflow: hidden;
  /* box-shadow: 0 4px 12px rgba(0,0,0,0.3); */
}
.table thead {
  background: #f97316; /* orange header */
  color: #fff;
  font-weight: 600;
  text-align: center;
}
.table th, td, .table td {
  text-align: center;
  vertical-align: middle;
  font-size: 0.95rem;
  padding: 14px 10px;
  color: #e6e6e6; /* light text on black */
  background: #2a2f3a; /* black row background */
   border: 1px solid #e6e6e6;
}
.table tbody tr:hover { 
  background: #2a2f3a; /* slightly lighter black on hover */
}


/* Buttons */
.btn-primary {
  background: #047857 !important;
  border: none;
  color: #fff;
}
.btn-primary:hover { background: #036549 !important; }

.btn-danger {
  background: #b91c1c !important;
  border: none;
  color: #fff;
}
.btn-danger:hover { background: #8a1616 !important; }

/* Cards for mobile */
.card-container { display: none; }
.event-card {
  background: #2a2f3a;
  border-radius: 12px;
  padding: 16px;
  margin-bottom: 15px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.3);
  color: #e6e6e6;
}
.event-card h5 { margin: 0 0 6px; font-size: 1.1rem; font-weight: 600; color: #f97316; }
.event-meta { font-size: 0.9rem; color: #cbd5e1; margin-bottom: 10px; }
.card-buttons { display: flex; gap: 10px; }

/* Responsive */
@media (max-width: 991px) {
  .table-container { display: none; }
  .card-container { display: block; }
}

/* Scrollbar */
.container-full::-webkit-scrollbar { width: 8px; }
.container-full::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 4px; }
</style>
</head>
<body>

<div class="header">
  <h1>Events Management</h1>
  <button onclick="window.location.href='/organiser/createEvent'">+ Create Event</button>
</div>

<div class="container-full">
  <!-- Stats -->


  <!-- Table -->
  <div class="table-container table-responsive mb-4">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>S.No</th>
          <th>Title</th>
          <th>Date</th>
          <th>Time</th>
          <th>Duration</th>
          <th>Location</th>
          <th>Description</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody id="eventsTable"></tbody>
    </table>
  </div>

  <!-- Cards for mobile -->
  <div class="card-container" id="eventsCards"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
function loadEvents() {
  fetch("/api/events")
    .then(res => res.json())
    .then(events => {
      const tableBody = document.getElementById('eventsTable');
      const cardsContainer = document.getElementById('eventsCards');
      tableBody.innerHTML = "";
      cardsContainer.innerHTML = "";

      events.forEach((event, index) => {
        // Table Row
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${index + 1}</td>
          <td>${event.title}</td>
          <td>${event.event_date}</td>
          <td>${event.event_time}</td>
          <td>${event.duration}</td>
          <td>${event.location}</td>
          <td>${event.description || ''}</td>
          <td><button class="btn btn-sm btn-primary">Edit</button></td>
          <td><button class="btn btn-sm btn-danger">Delete</button></td>`;
        tableBody.appendChild(tr);

        // Card View
        const card = document.createElement('div');
        card.className = 'event-card';
        card.innerHTML = `
          <h5>${event.title}</h5>
          <p class="event-meta">📅 ${event.event_date} | ⏰ ${event.event_time} | ⏳ ${event.duration} | 📍 ${event.location}</p>
          <p>${event.description || ''}</p>
          <div class="card-buttons">
            <button class="btn btn-primary btn-sm flex-fill">Edit</button>
            <button class="btn btn-danger btn-sm flex-fill">Delete</button>
          </div>`;
        cardsContainer.appendChild(card);
      });
    });
}

loadEvents();
</script>
</body>
</html>
