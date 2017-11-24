<?php require('layout/header.html') ?>
<div class="container">

    <div class="form-container">
        <form class="form-horizontal" action="" method="post">
            <input name="token" type="hidden" value="<?php echo session_id() ?>" id="token">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                <div class="col-sm-10">
                    <input id="login" name="login" type="text" class="form-control" id="inputEmail3" placeholder="Логин">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                <div class="col-sm-10">
                    <input id="password" name="password"  type="password" class="form-control" id="inputPassword3" placeholder="Пароль">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button id="auth_btn" type="submit" class="btn btn-default">Войти</button>
                    <br><br>
                    Нет аккаунта? <a href="reg.html">Зарегистрируйтесь</a>
                </div>
            </div>
        </form>
    </div>

</div><!-- /.container -->
<?php require('layout/footer.html') ?>