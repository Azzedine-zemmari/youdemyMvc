<?php require APPROOT . '/views/inc/header.php'; ?>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">title</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data['Category'] as $category): ?>
        <tr>
            <td><?= $category->nom ?></td>
            <td>
                <a href="<?= URLROOT ?>/Categorie/update/<?= $category->idcategory ?>">Update</a>
                <a href="<?= URLROOT ?>/Categorie/deleteCategory/<?= $category->idcategory ?>">Delete</a>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>