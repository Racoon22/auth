<?php require('layout/header.html') ?>

<div class="container-fluid">
    <div class="form-container">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <input name="token" type="hidden" value="<?php echo session_id() ?>" id="token">
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Имя</label>
                <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" id="name" placeholder="Имя">
                </div>
            </div>
            <div class="form-group">
                <label for="age" class="col-sm-3 control-label">Возраст</label>
                <div class="col-sm-9">
                    <input name="age" type="text" class="form-control" id="age" placeholder="Возраст">
                </div>
            </div>
            <div class="form-group">
                <label for="desc" class="col-sm-3 control-label">Описание</label>
                <div class="col-sm-9">
                    <textarea name="desc" class="form-control" id="age" placeholder="Описание"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="login" class="col-sm-3 control-label">Логин</label>
                <div class="col-sm-9">
                    <input name="login" type="text" class="form-control" id="login" placeholder="Логин">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Пароль</label>
                <div class="col-sm-9">
                    <input name="password" type="password" class="form-control" id="password" placeholder="Пароль">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Фото</label>
                <div class="col-sm-9">
                    <input name="photo" type="file" class="form-control" id="photo">
                </div>
            </div>
            <div class="form-group">
                <label for="confirm_password" class="col-sm-3 control-label">Пароль (Повтор)</label>
                <div class="col-sm-9">
                    <input name="confirm_password" type="password" class="form-control" id="confirm_password"
                           placeholder="Пароль">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button name="reg_btn" type="submit" class="btn btn-default" id="reg_btn"
                    ">Зарегистрироваться</button>
                    <br><br>
                    Зарегистрированы? <a href="index.html">Авторизируйтесь</a>
                </div>
            </div>
        </form>
    </div>

</div><!-- /.container -->
<?php require('layout/footer.html') ?>
