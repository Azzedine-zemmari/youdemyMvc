<?php require APPROOT . '/views/inc/AdminNavigation.php'; ?>
<button class="btn btn-primary">
    <a class="text-white" href="<?php  echo URLROOT ?>/Tags/inserTag">Add Tag</a>
</button>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">title</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data['Tags'] as $tag): ?>
        <tr>
            <td><?= $tag->nom ?></td>
            <td>
                <a href="<?= URLROOT ?>/Tags/deleteCategory/<?= $tag->idtag ?>">Delete</a>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>