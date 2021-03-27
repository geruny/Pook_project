<? require_once DIR_PATH_APP.'/views/header.php'?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div>
                <div class="pass_error alert alert-danger d-none" role="alert">Пароли не совпадают!</div>
                <div class="server_error alert alert-danger d-none" role="alert"></div>
            </div>
            <form id="reg_form">
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" required="true">
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" class="form-control" id="login" name="login" required="true">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required="true">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" name="password" id="password" required="true">
                </div>
                <div class="mb-3">
                    <label for="passwordConfirm" class="form-label">Подтверждение пароля</label>
                    <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" required="true">
                </div>
                <button type="submit" class="btn btn-primary">Регистрация</button>
            </form>
        </div>
    </div>
</div>

<? require_once DIR_PATH_APP.'/views/footer.php'?>