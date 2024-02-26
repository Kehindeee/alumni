 <!-- Masthead -->
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                <h1 class="text-uppercase text-white font-weight-bold">Association</h1>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header>

<!-- Leadership Section -->
<section class="page-section">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Leadership</h2>
        <hr class="divider my-4" />
        <!-- Add content specific to the Leadership section here -->
    </div>
</section>

<!-- Testimonials Section -->
<section class="page-section bg-light">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Testimonials</h2>
        <hr class="divider my-4" />
        <!-- Add content specific to the Testimonials section here -->
    </div>
</section>

<!-- About Section -->
<section class="page-section">
    <div class="container">
        <?php echo html_entity_decode($_SESSION['system']['about_content']) ?>
    </div>
</section>
