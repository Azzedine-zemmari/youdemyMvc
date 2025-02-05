<?php require APPROOT . '/views/inc/header.php'; ?>
<?php var_dump($data); ?>
    <section class="min-vh-100 bg-light">
        <div class="container px-4 px-sm-6 px-xxl-0 mx-auto">
            <!-- Hero Section -->
            <div class="d-flex flex-column justify-content-center align-items-center justify-content-lg-between pt-5 pt-lg-10 gap-5 flex-lg-row">
                <div class="max-w-660" data-aos="fade-right">
                    <div class="position-relative group cursor-pointer">
                        <img src="/api/placeholder/600/400" alt="Learning Platform" class="position-relative z-10 rounded-3 shadow-lg transition-transform group-hover-scale-105 duration-300">
                        <div class="position-absolute inset-0 bg-gradient-to-r from-success to-info rounded-3 blur opacity-30 group-hover-opacity-50 transition duration-300"></div>
                        <div class="position-absolute end-0 bottom-0 w-24 h-24 bg-success rounded-circle animate-pulse opacity-50"></div>
                        <div class="position-absolute start-0 top-0 w-16 h-16 bg-info rounded-circle animate-pulse opacity-50 delay-150"></div>
                    </div>
                </div>

                <div class="max-w-660" data-aos="fade-left">
                    <h2 class="display-4 fw-bold text-dark mb-4">
                        Join <span class="text-success position-relative">World's largest
                        <svg class="position-absolute bottom-0 start-0 w-100" viewBox="0 0 100 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 10 Q 25 0, 50 10 T 100 10" stroke="currentColor" fill="none" stroke-width="2" />
                        </svg>
                    </span> learning platform
                    </h2>
                    <p class="lead text-secondary mb-4">
                        Start your learning journey today with our expert-led courses
                    </p>
                    <button class="btn btn-success btn-lg position-relative overflow-hidden">
                        <span class="position-relative z-10">Start Learning Now</span>
                        <div class="position-absolute inset-0 translate-x-n100 group-hover-translate-x-0 bg-gradient-to-r from-info to-success transition-transform duration-300"></div>
                    </button>
                </div>
            </div>

            <!-- Search Bar Section -->
            <div class="mt-5 mb-4">
                <form action="" method="post">
                    <div class="w-100 max-w-md mx-auto d-flex align-items-center bg-white p-3 rounded-pill shadow">
                        <input type="text" id="searchInput" name="searchInput" class="form-control flex-grow-1 me-3 py-2 px-4 text-lg text-secondary placeholder-secondary rounded-pill focus-outline-none focus-ring-2 focus-ring-success" placeholder="Search for courses...">
                        <button id="searchButton" name="submitSearch" class="btn btn-link text-success text-decoration-none hover-text-success">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M11 6C13.7614 6 16 8.23858 16 11M16.6588 16.6549L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="#4CAF50" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Course Cards -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4 mt-5 mb-4">
                <?php foreach ($data['Courses'] as $cour): ?>
                    <!-- Course Card 1 -->
                    <div class="col">
                        <div class="card bg-white rounded-3 shadow-lg overflow-hidden transform hover-translate-y-n2 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                            <div class="position-relative">
                                <video width="320" height="240" alt="Course" class="card-img-top w-100 h-48 object-cover transition-transform duration-300 group-hover-scale-110">
                                    <source src="../../uploads/<?= $cour->vedeo ?>" type="video/mp4">
                                </video>
                                <div class="position-absolute top-0 end-0 bg-success text-white px-3 py-1 rounded-pill small fw-medium m-3">
                                    Popular
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="text-secondary small">• 12 weeks</span>
                                </div>
                                <h3 class="h5 fw-bold text-dark mb-2"><?= $cour->titre ?></h3>
                                <p class="text-secondary mb-3"><?= $cour->description ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="h4 fw-bold text-success">$<?= $cour->price ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php require APPROOT . '/views/inc/footer.php'; ?>