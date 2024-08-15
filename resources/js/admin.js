// resources/js/admin.js

document.addEventListener('DOMContentLoaded', function() {
    const contentDiv = document.getElementById('admin-content');

    // Load dashboard content by default
    fetch('/admin/dashboard')
        .then(response => response.text())
        .then(html => {
            contentDiv.innerHTML = html;
        })
        .catch(error => {
            contentDiv.innerHTML = '<p>Error loading dashboard content.</p>';
            console.error('Error fetching dashboard content:', error);
        });

    // Set up links to load other content dynamically
    const links = document.querySelectorAll('.sidebar .list-group-item a');
    links.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            const url = this.getAttribute('href');

            // Fetch the content and load it into the admin-content div
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    contentDiv.innerHTML = html;
                })
                .catch(error => {
                    contentDiv.innerHTML = '<p>Error loading content.</p>';
                    console.error('Error fetching content:', error);
                });
        });
    });
});
