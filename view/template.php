<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$SYS_TITLE?></title>
    <link rel="stylesheet" href="/view/res/css/fonts.css">
    <link rel="stylesheet" href="/view/res/css/main.css">
</head>
<body>
    <div id="page-wrapper">
        <header>
            <div class="container">
                <a href="/"><img src="/view/res/img/full-logotype.png" alt="" class="header-logotype"></a>

                <div class="header-info">
                    <div class="item">
                        <div class="f-icon">
                            <div class="mi-icons">place</div>
                        </div>
                        <p class="text">г. Оренбург,<br>ул. Чкалова 11</p>
                    </div>

                    <div class="item">
                        <div class="f-icon">
                            <div class="mi-icons">search</div>
                        </div>
                        <p class="text">На карте</p>
                    </div>

                    <div class="item">
                        <div class="f-icon">
                            <div class="mi-icons">schedule</div>
                        </div>
                        <p class="text"><b>Ежедневно</b><br>с 08.30 до 17.00</p>
                    </div>

                    <div class="item">
                        <div class="f-icon">
                            <div class="mi-icons">phone_callback</div>
                        </div>
                        <p class="text"><b>8 (3532) 31-72-39</b><br>По России бесплатно</p>
                    </div>
                </div>
            </div>
        </header>

        <nav>
            <div class="container">
                <ul>
                    <?php if($AUTH){ ?><li><a href="/admin/">Панель администратора</a></li><?php } ?>
                    <li><a href="/catalog/">Новые авто</a></li>
                    <li><a href="/probeg/">Авто с пробегом</a></li>
                    <li><a href="/credit/">Автокредит</a></li>
                    <li><a href="/tradein/">Trade-in</a></li>
                    <li><a href="/reviews/">Отзывы</a></li>
                    <li><a href="/contacts/">Контакты</a></li>
                </ul>
            </div>
        </nav>

        <main>
            <?php require_once "view/{$SYS_PAGE}.php"; ?>
        </main>

        <footer>
            <div class="container">
                <div class="footer-brand">
                    <img src="/view/res/img/full-logotype_white.png" alt="" class="footer-logotype">
                </div>

                <div class="footer-nav">
                    <h3 class="footer-title">Навигация</h3>
                    <div class="nav-tabs">
                        <?php if($AUTH){ ?><a class="tab" href="/admin/">Панель администратора</a><?php } ?>
                        <a class="tab" href="/catalog/">Новые авто</a>
                        <a class="tab" href="/probeg/">Авто с пробегом</a>
                        <a class="tab" href="/credit/">Автокредит</a>
                        <a class="tab" href="/tradein/">Trade-in</a>
                        <a class="tab" href="/reviews/">Отзывы</a>
                        <a class="tab" href="/contacts/">Контакты</a>
                    </div>
                </div>

                <div class="footer-contacts">
                    <h3 class="footer-title">Контакты</h3>
                    <ul>
                        <li>
                            <span class="main-text">8 (3532) 31-72-39</span>
                            <span class="sub-text">По России бесплатно</span>
                        </li>

                        <li>
                            <span class="main-text">г. Оренбург, Чкалова 11</span>
                            <span class="sub-text link">Смотреть на карте</span>
                        </li>

                        <li>
                            <span class="main-text">Ежедневно</span>
                            <span class="sub-text">с 08.30 до 17.00</span>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    <script src="/view/res/js/main.js"></script>
</body>
</html>