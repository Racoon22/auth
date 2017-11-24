<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Название файла</th>
        <th>Фотография</th>
        <th>Действия</th>
    </tr>

    <?php foreach ($users as $num => $user) : ?>
        <?php if(($user['photo'] == '')) continue ?>
        <tr>
            <td><?php echo $num ?></td>
            <td><?php echo $user['photo'] ?></td>
            <td><img src="public/uploads/<?php echo $user['photo'] ?>" class="table-photo"></td>
            <td><a href="filelist.php?action=delete&id=<?php echo $user['id'] ?>">Удалить пользователя</a></td>
        </tr>
    <?php endforeach; ?>
</table>