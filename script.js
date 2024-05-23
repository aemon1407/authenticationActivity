document.getElementById('reservation-form').addEventListener('submit', function(event) {
    event.preventDefault(); 


    const dateInput = document.getElementById('date').value;
    const timeInput = document.getElementById('time').value;
    const selectedDateTime = new Date(`${dateInput}T${timeInput}`);
    const currentDateTime = new Date();

    if (selectedDateTime <= currentDateTime) {
        alert('Reservation date and time must be in the future.');
        return;
    }

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;
    const guests = document.getElementById('guests').value;
    const requests = document.getElementById('requests').value;

    const reservationDetails = `
        <h3>Reservation Details</h3>
        <p><strong>Name:</strong> ${name}</p>
        <p><strong>Email:</strong> ${email}</p>
        <p><strong>Phone:</strong> ${phone}</p>
        <p><strong>Date:</strong> ${date}</p>
        <p><strong>Time:</strong> ${time}</p>
        <p><strong>Number of Guests:</strong> ${guests}</p>
        <p><strong>Special Requests:</strong> ${requests}</p>
    `;
    document.getElementById('reservation-details').innerHTML = reservationDetails;
});
