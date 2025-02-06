<?php require APPROOT . '/views/inc/header.php'; ?>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">status</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data['Enseignants'] as $enseignant): ?>
    <tr>
        <td><?= $enseignant->name ?></td>
        <td><?= $enseignant->email ?></td>
        <td><?= $enseignant->status ?></td>
        <td>
            <a href="<?= URLROOT ?>/Users/updateStatusToActive/<?= $enseignant->id ?>">Active</a>
            <a href="<?= URLROOT ?>/Users/updateStatusToDesactive/<?= $enseignant->id ?>">Desactive</a>

        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>