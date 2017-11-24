<table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Пользователь(логин)</th>
            <th>Имя</th>
            <th>возраст</th>
            <th>описание</th>
            <th>Фотография</th>
            <th>Действия</th>
        </tr>
    <?php foreach ($users as $num => $user) :?>
        <tr>
            <td><?php echo $num ?></td>
            <td><?php echo $user['login'] ?></td>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['age'] ?></td>
            <td><?php echo $user['description'] ?></td>
            <td><img src="public/uploads/<?php echo $user['photo'] ?>" class="table-photo"></td>
            <td><a href="list.php?action=delete&id=<?php echo $user['id'] ?>">Удалить пользователя</a></td>
        </tr>
    <?php endforeach;?>
    </table>