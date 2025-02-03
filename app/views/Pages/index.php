<h1><?php echo $data['title'];?></h1>
<?php print_r($data); ?>
<ul>
    <?php foreach ($data['users'] as $user): ?>
    <li><?php echo $user->name ?></li>
    <?php endforeach;?>
</ul>