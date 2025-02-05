<?php require APPROOT . '/views/inc/header.php'; ?>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">title</th>
        <th scope="col">description</th>
        <th scope="col">contenu</th>
        <th scope="col">dateCreation</th>
        <th scope="col">type</th>
        <th scope="col">price</th>
        <th scope="col">CategoryName</th>
        <th scope="col">UserName</th>
        <th scope="col">tag</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data['Courses'] as $cour): ?>
    <tr>
        <td><?= $cour->titre ?></td>
        <td><?= $cour->description ?></td>
        <td><?= $cour->contenu ?></td>
        <td><?= $cour->datecreation ?></td>
        <td><?= $cour->type ?></td>
        <td><?= $cour->price ?></td>
        <td><?= $cour->categoryname ?></td>
        <td><?= $cour->enseignant ?></td>
        <td><?= $cour->tags ?></td>
        <td>
            <a href="<?php URLROOT ?>/Course/update/<?= $cour->idcours ?>">Update</a>
            <a href="<?php URLROOT ?>/Course/delete/<?= $cour->idcours ?>">Delete</a>

        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>