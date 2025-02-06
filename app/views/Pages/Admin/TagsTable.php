<?php require APPROOT . '/views/inc/header.php'; ?>
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