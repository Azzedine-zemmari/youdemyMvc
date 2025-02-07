<?php require APPROOT . '/views/inc/AdminNavigation.php'; ?>
<button class="btn btn-primary">
    <a class="text-white" href="<?php  echo URLROOT ?>/Categorie/insertCategory">Add Category</a>
</button>
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
                <a href="<?= URLROOT ?>/Categorie/deleteCategory/<?= $category->idcategory ?>">Delete</a>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>