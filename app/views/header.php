<!DOCTYPE html>

<?use Libs\App?>

<html>

<head>
    <script>
        window.BASE_DIR_AJAX = "<?= BASE_DIR_AJAX ?>";
    </script>
    <title><?= $this->getTitle(); ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link href="<?= TEMPLATE_PATH ?>/style.css?<?= rand() ?>" rel="stylesheet">
    <link href="<?= MAIN_PREFIX ?>/app/css/preLoader4.css" rel="stylesheet">


    <script src="<?= TEMPLATE_PATH ?>/script.js?<?= rand() ?>"></script>

    <?if(isset($this->addjs)):?>
    <script type="text/javascript" src="<?= $this->addjs ?>?<?= rand() ?>"></script>
    <?endif?>

    <?if(isset($this->addcss)):?>
    <link href="<?= $this->addcss ?><?= rand() ?> rel=" stylesheet"">
    <?endif?>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= MAIN_PREFIX ?>/">POOK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= MAIN_PREFIX ?>/">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= MAIN_PREFIX ?>/catalog">Каталог</a>
                    </li>
                    <?if(Libs\User::isLogin()):?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= MAIN_PREFIX ?>/lk"><?= Libs\User::getLogin() ?></a>
                    </li>
                    <?endif;?>
                    <li class="nav-item">
                        <?if(Libs\User::isLogin()):?>
                        <a class="nav-link" href="<?= MAIN_PREFIX ?>/reg/logout">Выйти</a>
                        <?else:?>
                        <a class="nav-link login_link" href="javascript:;" onclick="openDialogLogin()">Войти</a>
                        <?endif;?>
                    </li>
                    <?if(!Libs\User::isLogin()):?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= MAIN_PREFIX ?>/reg">Регистрация</a>
                    </li>
                    <?endif;?>
                    <?if(Libs\User::isAdmin()):?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= MAIN_PREFIX ?>/admin">Админ панель</a>
                    </li>
                    <?endif;?>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>



        </div>
    </nav>

    <div class="container"></div>