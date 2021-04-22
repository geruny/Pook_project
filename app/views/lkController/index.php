<? require_once DIR_PATH_APP.'/views/header.php'?>

<div class="container">
    <h1>Личный кабинет <?= Libs\User::getLogin() ?></h1>

    <h2>Данные о аккаунте</h2>
    <h3>Логин: <?= Libs\User::getLogin() ?></h3>
    <h3>Имя: <?= Libs\User::getName() ?></h3>
    <h3>E-mail: <?= Libs\User::getEmail() ?></h3>
</div>

<? require_once DIR_PATH_APP.'/views/footer.php'?>