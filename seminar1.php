
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                <h1 class="text-uppercase text-white font-weight-bold">Upcoming Seminar</h1>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header>

<body>
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

