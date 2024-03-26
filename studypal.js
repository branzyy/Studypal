fetch('/upcoming_events')
  .then(response => response.json())
  .then(data => {
    const upcomingEventsList = document.getElementById('upcoming-events');
    data.forEach(event => {
      const listItem = document.createElement('li');
      listItem.textContent = `${event.title} - ${event.date} at ${event.time}`;
      upcomingEventsList.appendChild(listItem);
    });
  });