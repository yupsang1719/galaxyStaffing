
// Fetch the CSRF token when the page loads
let csrfToken;

fetch('http://127.0.0.1:8000/csrf-token')
    .then(response => response.json())
    .then(data => {
        csrfToken = data.csrf_token;
    })
    .catch(error => console.error('Error fetching CSRF token:', error));


// Form submission logic

document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const formData = new FormData(this);
    // console.log(csrfToken);
    // console.log(formData);

    fetch('http://127.0.0.1:8000/contact', { 
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json' // Expect JSON responses
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.errors) {
            // Display validation errors
            const errorMessages = Object.values(data.errors).flat().join('<br>');
            document.getElementById('response-message').innerHTML = `<p style="color: red;">${errorMessages}</p>`;
        } else {
            // Display success message
            document.getElementById('response-message').innerHTML = `<p style="color: green;">${data.success}</p>`;
            document.getElementById('contact-form').reset(); // Reset form after successful submission
        }
    })
    .catch(error => {
        document.getElementById('response-message').innerHTML = `<p style="color: red;">Something went wrong. Please try again later.</p>`;
        console.error('Error:', error);
        console.error(error.stack);
    });
});
