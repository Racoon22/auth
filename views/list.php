<?php require('layout/header.html') ?>


<div class="container">
    <h1>Запретная зона, доступ только авторизированному пользователю</h1>
    <h2>Информация выводится из базы данных</h2>

    <?php
    require('components/userTable.php');
    ?>
</div><!-- /.container -->
<?php require('layout/footer.html') ?>
