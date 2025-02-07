<?php require APPROOT . '/views/inc/AdminNavigation.php'; ?>
<!-- Top Three Teachers Section -->
<div class="container mt-5">
    <h2 class="mb-4">Top Three Teachers</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($data['Teachers'] as $teacher): ?>
            <div class="col">
                <div class="card h-100 shadow-sm border-primary">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo htmlspecialchars($teacher->name); ?></h5>
                        <p class="card-text"><strong>Enrolled Students:</strong> <?php echo htmlspecialchars($teacher->enrolle_count); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Top Three Teachers Section -->
<div class="container mt-5">
    <h2 class="mb-4">Course Count</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 shadow-sm border-success">
                    <div class="card-body text-center">
                        <h3>Cours Count</h3>
                        <h5 class="card-title"><?php echo $data['CountCours']->total; ?></h5>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- All Enseignants Table -->
<div class="container mt-5">
    <h2 class="mb-4">All Enseignants</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['Enseignants'] as $enseignant): ?>
            <tr>
                <td><?php echo htmlspecialchars($enseignant->name); ?></td>
                <td><?php echo htmlspecialchars($enseignant->email); ?></td>
                <td><?php echo htmlspecialchars($enseignant->status); ?></td>
                <td>
                    <a href="<?php echo URLROOT; ?>/Users/updateStatusToActive/<?php echo htmlspecialchars($enseignant->id); ?>" class="btn btn-success btn-sm">Active</a>
                    <a href="<?php echo URLROOT; ?>/Users/updateStatusToDesactive/<?php echo htmlspecialchars($enseignant->id); ?>" class="btn btn-danger btn-sm">Deactivate</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>