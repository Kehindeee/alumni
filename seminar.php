<!-- Masthead -->
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                <h1 class="text-uppercase text-white font-weight-bold">About Us</h1>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header>

<section class="page-section">
    <div class="container">
        <h2>Contact Information</h2>
        <ul id="contactList"></ul>
    </div>
</section>

<script>
    // Fetch data from the API
    fetch('contact.json')
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
            data.forEach(contact => {
                const listItem = document.createElement('li');
                listItem.innerHTML = `
                    <strong>Name:</strong> ${contact.name}<br>
                    <strong>Username:</strong> ${contact.username}<br>
                    <strong>Email:</strong> ${contact.email}<br>
                    <strong>Address:</strong> ${contact.address.street}, ${contact.address.suite}, ${contact.address.city}, ${contact.address.zipcode}<br>
                    <strong>Phone:</strong> ${contact.phone}<br>
                    <strong>Website:</strong> ${contact.website}<br>
                    <strong>Company:</strong> ${contact.company.name}<br>
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
