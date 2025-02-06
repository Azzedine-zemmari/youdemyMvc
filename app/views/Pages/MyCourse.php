<?php require APPROOT. '/views/inc/header.php';?>
<div class="container mt-5">
    <h2 class="mb-4">Enrolled Courses</h2>

    <?php if (isset($data['Courses']) && !empty($data['Courses'])): ?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($data['Courses'] as $course): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($course->titre); ?></h5>
                            <p class="card-text"><?php echo nl2br(htmlspecialchars($course->description)); ?></p>
                        </div>
                        <div class="card-footer text-muted">
                            Enrolled on: <?php echo htmlspecialchars(date('F j, Y', strtotime($course->date_ajout))); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info mt-4" role="alert">
            No courses found.
        </div>
    <?php endif; ?>
</div>