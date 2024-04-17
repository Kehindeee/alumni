<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Seminars</title>
    <style>
        /* Styling for JSON data */
        .contact-list {
            list-style: none;
            padding: 0;
        }
        
        .contact-item {
            margin-bottom: 20px;
            border-radius: 8px;
            background-color: #f8f9fa; /* Background color for the box */
            border: 1px solid #ced4da; /* Border color */
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Box shadow for depth */
        }
        
        .contact-item strong {
            color: #333;
        }
        
        /* Apply hover effect to seminar links */
        .contact-item a {
            color: #007bff;
            text-decoration: none;
        }
        
        .contact-item a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Masthead -->
    <header class="masthead">
        <div class="container">
            <h1 class="text-uppercase">Upcoming Seminars</h1>
            <hr class="divider">
        </div>
    </header>

    <!-- Contact Information Section -->
    <section class="page-section">
        <div class="container">
            <h2>Contact Information</h2>
            <ul class="contact-list" id="contactList"></ul>
        </div>
    </section>

    <!-- Fetching Data from API -->
    <script>
        // Fetch data from the API
        fetch('seminar.json')
            .then(response => {
                // Check if the response is successful
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                // Parse JSON data from the response
                return response.json();
            })
            .then(data => {
                // Display contact information
                const contactList = document.getElementById('contactList');
                data.forEach(seminar => {
                    const listItem = document.createElement('li');
                    listItem.classList.add('contact-item'); // Add class to the list item
                    listItem.innerHTML = `
                        <strong>Seminar:</strong> ${seminar.seminar}<br>
                        <strong>Speaker:</strong> ${seminar.speaker}<br>
                        <strong>Email:</strong> ${seminar.email}<br>
                        <strong>Phone:</strong> ${seminar.phone}<br>
                        <strong>Website:</strong> <a href="${seminar.website}" target="_blank">${seminar.website}</a><br>
                        <hr>
                    `;
                    contactList.appendChild(listItem);
                });
            })
            .catch(error => {
                // Display error if fetching data fails
                console.error('Error fetching data:', error);
            });
    </script>
</body>
</html>
