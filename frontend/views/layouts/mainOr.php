<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Look My Bet</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <link href="css/look-icon-fonts/style.css" rel="stylesheet">
    <link href="css/main.min.css" rel="stylesheet">
</head>
<body class="home-page">
    <header class="header-main">
        <div class="header-inner">
            <div class="logo-block">
                <a href="/">
                    <img src="images/logo.svg" alt="Look My bet">
                </a>
            </div>
            <div class="menu-block">
                <div class="menu-inner">
                    <ul class="top-menu" id="menu-slide">
                        <li data-menuanchor="textScreen">
                            <a href="#textScreen"><span class="icon-play"></span> Видео</a>
                        </li>
                        <li data-menuanchor="aboutScreen">
                            <a href="#aboutScreen">О Проекте</a>
                        </li>
                        <li data-menuanchor="reviewScreen">
                            <a href="#reviewScreen">Отзывы</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="user-block">
                <div class="user-inner">
                    <div class="user-status">
                        <div class="user-status-icon">
                            <span class="icon-user"></span>
                        </div>
                        <div class="user-status-text">Вы вошли как гость</div>
                    </div>
                    <div class="user-btn">
                        <a href="#" class="btn btn-small btn-primary"  data-toggle="modal" data-target="#modal-auth"><i class="icon-user"></i> <span>ВОЙТИ</span></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="home-page-wrapper">
        <div class="main-background">
            <div id="scene">
                <div data-depth="0.2" class="background-image" style="background-image: url(/images/back-body.jpg)"></div>
            </div>
        </div>
        <div class="home-page-inner">
            <div class="pagination-wrapper">
                <div class="pagination-inner">
                    <div class="block-screen-count">
                        <div class="active-screen">
                            0<span>1</span>
                        </div>
                    </div>
                    <div class="line-pagination">
                        <ul class="line-list" id="nav-line">
                            <li class="active"><a href="#mainScreen" data-index="1"></a></li>
                            <li><a href="#textScreen" data-index="2"></a></li>
                            <li><a href="#aboutScreen" data-index="3"></a></li>
                            <li><a href="#reviewScreen" data-index="4"></a></li>
                        </ul>
                    </div>
                    <div class="block-screen-count">
                        <div class="total-screen">
                            0<span>4</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="home-scroll">
                <div class="section first-screen">
                    <div class="content-block">
                        <div class="content-block-inner">
                            <div class="content-container">
                                <div class="row">
                                    <div class="active image-first-screen">
                                        <img class="next-particle"
                                             id="logo"
                                             data-mouse-force="300"
                                             data-width="1200"
                                             data-height="1200"
                                             data-max-width="70%"
                                             data-particle-gap="6"
                                             src="images/logo-big.png" alt="">
                                    </div>
                                    <div class="column-12">
                                        <h1 class="h1">Первая социальная сеть в СНГ <br>для любителей ставок на спорт</h1>
                                        <p>Создай команду единомышленников и зарабатывай</p>
                                        <div class="button-block">
                                            <a href="#" class="btn big-btn btn-primary btn-hover" data-toggle="modal" data-target="#modal-auth">
                                                <i class="icon-man"></i>
                                                Присоединиться
                                                <span></span>
                                            </a>
                                            <a href="#" class="btn big-btn btn-default btn-hover" data-toggle="modal" data-target="#modal-auth">
                                                <i class="icon-network"></i>
                                                Войти Через Соцсеть
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section video-section">
                    <div class="content-block">
                        <div class="content-block-inner">
                            <!--<div class="image-background-section image-two-screen image-background-section-2" style="background-image: url(images/football_img.jpg)"></div>-->
                            <!--<div class="back-two-slide-wrapepr">-->
                                <!--<div class="back-two-slide">-->
                                    <!--<div class="image-back" style="background-image: url(images/football_img.jpg)"></div>-->
                                <!--</div>-->
                            <!--</div>-->
                            <div class="content-container">
                                <div class="row">
                                    <div class="column-6">
                                        <div class="play-video-block">
                                            <div class="video-wrapper">
                                                <div class="video-wrapper-border">
                                                    <span class="left-top"></span>
                                                    <span class="left-bottom"></span>
                                                    <span class="right-bottom"></span>
                                                    <span class="right-top"></span>
                                                    <iframe width="100%" src="https://www.youtube.com/embed/Hbd8ghFICJk?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column-4 video-text">
                                        <p>The complexity of mining crypto currency is growing rapidly, and many
                                            crypto-currencies initially use POS or plan to switch to POW instead.
                                            The financial well-being of miners is under threat.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section section-about">
                    <div class="content-block">
                        <div class="content-block-inner">
                            <div class="content-container">
                                <div class="row">
                                    <div class="column-12">
                                        <h2 class="h1">О проекте</h2>
                                    </div>
                                    <div class="column-3">
                                        <div class="tab-list">
                                            <ul class="tab">
                                                <li class="active">
                                                    <a href="#" data-target="#tab1" class="btn-tab btn-hover">
                                                        <i class="icon-arrow_right"></i>
                                                        Как Пользоваться?
                                                        <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-target="#tab2" class="btn-tab btn-hover">
                                                        <i class="icon-arrow_right"></i>
                                                        общение
                                                        <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-target="#tab3" class="btn-tab btn-hover">
                                                        <i class="icon-arrow_right"></i>
                                                        заработок
                                                        <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-target="#tab4" class="btn-tab btn-hover">
                                                        <i class="icon-arrow_right"></i>
                                                        контроль
                                                        <span></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="column-6">
                                        <div class="tab-content">
                                            <div class="tab-panel active" id="tab1">
                                                <div class="toggle-tabs-mobile active">
                                                    <h4 class="h2">
                                                        Как Пользоваться?
                                                        <i class="icon-arrow_down"></i>
                                                    </h4>
                                                </div>
                                                <div class="tab-panel-inner">
                                                    <p>
                                                        The complexity of mining crypto currency is growing rapidly, and many crypto-currencies
                                                        initially use POS or plan to switch to POW instead. The financial well-being of miners is under
                                                        threat.
                                                    </p>
                                                    <p>
                                                        MARK.SPACE means hundreds of thousands of high-end renders, which requires terabytes
                                                        of content to create. We have created a protocol for decentralized rendering and data
                                                        storage. Miners will be able to download our program to perform the rendering. For data
                                                        storage they will receive rewards in the form of MRK tokens. In addition, our ecosystem
                                                        implies a great number of transactions.
                                                    </p>
                                                    <p>
                                                        The complexity of mining crypto currency is growing rapidly, and many crypto-currencies
                                                        initially use POS or plan to switch to POW instead.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="tab-panel" id="tab2">
                                                <div class="toggle-tabs-mobile">
                                                    <h4 class="h2">
                                                        общение
                                                        <i class="icon-arrow_down"></i>
                                                    </h4>
                                                </div>
                                                <div class="tab-panel-inner">
                                                    <p>
                                                        The complexity of mining crypto currency is growing rapidly, and many crypto-currencies
                                                        initially use POS or plan to switch to POW instead. The financial well-being of miners is under
                                                        threat.
                                                    </p>
                                                    <p>
                                                        MARK.SPACE means hundreds of thousands of high-end renders, which requires terabytes
                                                        of content to create. We have created a protocol for decentralized rendering and data
                                                        storage. Miners will be able to download our program to perform the rendering. For data
                                                        storage they will receive rewards in the form of MRK tokens. In addition, our ecosystem
                                                        implies a great number of transactions.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="tab-panel" id="tab3">
                                                <div class="toggle-tabs-mobile">
                                                    <h4 class="h2">
                                                        заработок
                                                        <i class="icon-arrow_down"></i>
                                                    </h4>
                                                </div>
                                                <div class="tab-panel-inner">
                                                    <p>
                                                        The complexity of mining crypto currency is growing rapidly, and many crypto-currencies
                                                        initially use POS or plan to switch to POW instead. The financial well-being of miners is under
                                                        threat.
                                                    </p>
                                                    <p>
                                                        MARK.SPACE means hundreds of thousands of high-end renders, which requires terabytes
                                                        of content to create. We have created a protocol for decentralized rendering and data
                                                        storage. Miners will be able to download our program to perform the rendering. For data
                                                        storage they will receive rewards in the form of MRK tokens. In addition, our ecosystem
                                                        implies a great number of transactions.
                                                    </p>
                                                    <p>
                                                        The complexity of mining crypto currency is growing rapidly, and many crypto-currencies
                                                        initially use POS or plan to switch to POW instead.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="tab-panel" id="tab4">
                                                <div class="toggle-tabs-mobile">
                                                    <h4 class="h2">
                                                        контроль
                                                        <i class="icon-arrow_down"></i>
                                                    </h4>
                                                </div>
                                                <div class="tab-panel-inner">
                                                    <p>
                                                        MARK.SPACE means hundreds of thousands of high-end renders, which requires terabytes
                                                        of content to create. We have created a protocol for decentralized rendering and data
                                                        storage. Miners will be able to download our program to perform the rendering. For data
                                                        storage they will receive rewards in the form of MRK tokens. In addition, our ecosystem
                                                        implies a great number of transactions.
                                                    </p>
                                                    <p>
                                                        The complexity of mining crypto currency is growing rapidly, and many crypto-currencies
                                                        initially use POS or plan to switch to POW instead.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column-12 btn-block">
                                        <a href="#" class="btn-round btn-primary" data-toggle="modal" data-target="#modal-auth">
                                            <span class="icon-man"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section review-section">
                    <div class="content-block">
                        <div class="content-block-inner">
                            <div class="content-container">
                                <div class="row">
                                    <div class="column-12">
                                        <h2 class="h1">Отзывы Пользователей</h2>
                                    </div>
                                    <div class="slider-rev-block column-10">
                                        <div class="rev-slider">
                                            <div class="item-rev">
                                                <div class="review-inner">
                                                    <div class="avatar-block">
                                                        <div class="avatar">
                                                            <img src="images/ava1.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-review">
                                                        <h4>john.wick.49</h4>
                                                        <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                            социальная сеть, где можно заработать денег,
                                                            не рискуя своими.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-rev">
                                                <div class="review-inner">
                                                    <div class="avatar-block">
                                                        <div class="avatar">
                                                            <img src="images/ava2.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-review">
                                                        <h4>john.wick.49</h4>
                                                        <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                            социальная сеть, где можно заработать денег,
                                                            не рискуя своими.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-rev">
                                                <div class="review-inner">
                                                    <div class="avatar-block">
                                                        <div class="avatar">
                                                            <img src="images/ava3.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-review">
                                                        <h4>john.wick.49</h4>
                                                        <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                            социальная сеть, где можно заработать денег,
                                                            не рискуя своими.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-rev">
                                                <div class="review-inner">
                                                    <div class="avatar-block">
                                                        <div class="avatar">
                                                            <img src="images/ava4.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-review">
                                                        <h4>john.wick.49</h4>
                                                        <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                            социальная сеть, где можно заработать денег,
                                                            не рискуя своими.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-rev">
                                                <div class="review-inner">
                                                    <div class="avatar-block">
                                                        <div class="avatar">
                                                            <img src="images/ava3.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-review">
                                                        <h4>john.wick.49</h4>
                                                        <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                            социальная сеть, где можно заработать денег,
                                                            не рискуя своими.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-rev">
                                                <div class="review-inner">
                                                    <div class="avatar-block">
                                                        <div class="avatar">
                                                            <img src="images/ava2.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-review">
                                                        <h4>john.wick.49</h4>
                                                        <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                            социальная сеть, где можно заработать денег,
                                                            не рискуя своими.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-rev">
                                                <div class="review-inner">
                                                    <div class="avatar-block">
                                                        <div class="avatar">
                                                            <img src="images/ava1.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-review">
                                                        <h4>john.wick.49</h4>
                                                        <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                            социальная сеть, где можно заработать денег,
                                                            не рискуя своими.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-rev">
                                                <div class="review-inner">
                                                    <div class="avatar-block">
                                                        <div class="avatar">
                                                            <img src="images/ava4.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-review">
                                                        <h4>john.wick.49</h4>
                                                        <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                            социальная сеть, где можно заработать денег,
                                                            не рискуя своими.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-rev">
                                                <div class="review-inner">
                                                    <div class="avatar-block">
                                                        <div class="avatar">
                                                            <img src="images/ava1.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-review">
                                                        <h4>john.wick.49</h4>
                                                        <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                            социальная сеть, где можно заработать денег,
                                                            не рискуя своими.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-rev">
                                                <div class="review-inner">
                                                    <div class="avatar-block">
                                                        <div class="avatar">
                                                            <img src="images/ava4.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-review">
                                                        <h4>john.wick.49</h4>
                                                        <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                            социальная сеть, где можно заработать денег,
                                                            не рискуя своими.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-rev">
                                                <div class="review-inner">
                                                    <div class="avatar-block">
                                                        <div class="avatar">
                                                            <img src="images/ava3.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-review">
                                                        <h4>john.wick.49</h4>
                                                        <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                            социальная сеть, где можно заработать денег,
                                                            не рискуя своими.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-rev">
                                                <div class="review-inner">
                                                    <div class="avatar-block">
                                                        <div class="avatar">
                                                            <img src="images/ava2.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-review">
                                                        <h4>john.wick.49</h4>
                                                        <p>Уже 47 лет зависаю на look my bet. Очень крутая
                                                            социальная сеть, где можно заработать денег,
                                                            не рискуя своими.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column-12 btn-block">
                                        <a href="#" class="btn-round btn-primary" data-toggle="modal" data-target="#modal-auth">
                                            <span class="icon-man"></span>
                                        </a>
                                        <div class="arrow-review"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section footer-section fp-auto-height">
                    <div class="footer-block">
                        <div class="content-container">
                            <div class="row">
                                <div class="column-12 text-err">
                                    <div class="background-text">
                                        <div class="icon-18-plus"></div>
                                        <!--<button class="close-text"><span class="icon-close"></span></button>-->
                                        <p>Играйте ответственно. При признаках зависимости обратитесь к специалисту.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="main-footer">
                        <div class="main-footer-inner">
                            <div class="logo-footer">
                                <a href="/">
                                    <img src="images/logo.svg" alt="Look My Bet">
                                </a>
                            </div>
                            <div class="menu-footer">
                                <ul class="bottom-menu">
                                    <li><a href="conf.html">политика конфиденциальности</a></li>
                                    <li><a href="term.html">Условия использования сайта</a></li>
                                    <li><a href="help.html">Помощь</a></li>
                                    <li><a href="contact.html">Контакты</a></li>
                                </ul>
                            </div>
                            <div class="btn-footer">
                                <a href="#" class="user-btn" data-toggle="modal" data-target="#modal-auth">
                                    <span class="icon-man"></span>
                                </a>
                                <a href="#" class="shared-btn">
                                    <span class="icon-network"></span>
                                </a>
                            </div>
                            <div class="copy-footer">
                                <p>&copy; 2018 Look My Bet</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed-footer">
        <div class="fixed-footer-inner">
            <div class="social-block">
                <ul class="social-list">
                    <li>
                        <a href="#" target="_blank">
                            <span class="icon-youtube"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <span class="icon-telegram"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <span class="icon-mail"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="arrow-main-slider">
                <a href="#" class="arrow-down">
                    <span class="icon-arrow_down"></span>
                </a>
                <a href="#" class="arrow-up">
                    <span class="icon-arrow_up"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="modal-wrapper user-modal" id="modal-auth">
        <div class="modal-inner">
            <div class="modal-content">
                <div class="modal-content-inner">
                    <div class="header-modal">
                        <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
                    </div>
                    <div class="body-modal">
                        <div class="body-modal-inner">
                            <div class="left-side-login big-side-login">
                                <div class="left-side-inner register-inner">
                                    <h2>Стань частью Look My Bet</h2>
                                    <div class="social-login">
                                        <ul class="soc-login">
                                            <li><a href="#" class="soc-tw"><span class="icon-tw"></span></a></li>
                                            <li><a href="#" class="soc-fb"><span class="icon-fb"></span></a></li>
                                            <li><a href="#" class="soc-gp"><span class="icon-G"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="line-text">
                                        <span>или создайте аккаунт с помощью e-mail</span>
                                    </div>
                                    <div class="form-wrapper">
                                        <div class="form-inner">
                                            <form action="#">
                                                <div class="input-row">
                                                    <input type="text">
                                                    <label class="placeholder">Ваше Имя</label>
                                                </div>
                                                <div class="input-row">
                                                    <input type="text">
                                                    <label class="placeholder">Никнейм</label>
                                                </div>
                                                <div class="input-row">
                                                    <input type="email">
                                                    <label class="placeholder">Email</label>
                                                </div>
                                                <div class="input-row">
                                                    <input type="text">
                                                    <label class="placeholder">Пароль - <span>минимум 6 символов</span></label>
                                                </div>
                                                <div class="checkbox-row">
                                                    <input type="checkbox" id="konf">
                                                    <label for="konf" class="check-text">
                                                        Я прочитал <a href="#">Политику Конфиденциальности</a> сервиса Look My Bet
                                                    </label>
                                                </div>
                                                <div class="input-row btn-row">
                                                    <button type="submit" class="btn big-btn btn-primary btn-hover">
                                                        СОЗДАТЬ АККАУНТ
                                                        <span></span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-side-inner login-inner">
                                    <h2>Авторизируйтесь</h2>
                                    <div class="social-login">
                                        <ul class="soc-login">
                                            <li><a href="#" class="soc-tw"><span class="icon-tw"></span></a></li>
                                            <li><a href="#" class="soc-fb"><span class="icon-fb"></span></a></li>
                                            <li><a href="#" class="soc-gp"><span class="icon-G"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="line-text">
                                        <span>или войдите с помощью e-mail</span>
                                    </div>
                                    <div class="form-wrapper">
                                        <div class="form-inner">
                                            <form action="#">
                                                <div class="input-row">
                                                    <input type="email">
                                                    <label class="placeholder">Email</label>
                                                </div>
                                                <div class="input-row">
                                                    <input type="text">
                                                    <label class="placeholder">Пароль</label>
                                                </div>
                                                <div class="input-row btn-row">
                                                    <button type="submit" class="btn big-btn btn-primary btn-hover">
                                                        ВОЙТИ
                                                        <span></span>
                                                    </button>
                                                </div>
                                                <div class="input-row text-center text-row">
                                                    <a href="#" class="forgot-btn">Забыли пароль?</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-side-inner forgot-inner">
                                    <h2>Забыли Пароль?</h2>
                                    <div class="line-text">
                                        <p>Введите почту, на которую зарегистрирован ваш аккаунт,
                                            и получите дальнейшие инструкци.</p>
                                    </div>
                                    <div class="form-wrapper">
                                        <div class="form-inner">
                                            <form action="#">
                                                <div class="input-row">
                                                    <input type="email">
                                                    <label class="placeholder">Email</label>
                                                </div>
                                                <div class="input-row btn-row">
                                                    <button type="submit" class="btn big-btn btn-primary btn-hover">
                                                        Восстановить
                                                        <span></span>
                                                    </button>
                                                </div>
                                                <div class="input-row text-center text-row">
                                                    <a href="#" class="auth-btn">Вернуться к авторизации</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right-side-login small-side-login">
                                <div class="right-side-inner">
                                    <div class="logo-popup">
                                        <img src="images/logo_red.svg" alt="">
                                    </div>
                                    <div class="text-left">
                                        <p>Look My Bet - Первая социальная сеть в СНГ для
                                            любителей ставок на спорт</p>
                                    </div>
                                    <div class="from-block">
                                        <h3>Для чего нужна авторизация?</h3>
                                        <ul class="list-answer">
                                            <li>Lorem ipsum dolor sit amet, consectetur</li>
                                            <li>Sed do eiusmod tempor incididunt ut labore</li>
                                            <li>Duis aute irure dolor in reprehenderit in</li>
                                        </ul>
                                    </div>
                                    <div class="toggle-type-block">
                                        <div class="login-block active">
                                            <h2>Есть Аккаунт?</h2>
                                            <a href="#" class="btn btn-default btn-hover" id="show-login">
                                                <b>Войти</b>
                                                <span></span>
                                            </a>
                                        </div>
                                        <div class="register-block">
                                            <h2>Нет Аккаунта?</h2>
                                            <a href="#" class="btn btn-default btn-hover" id="show-register">
                                                <b>РЕГИСТРАЦИЯ</b>
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-wrapper video-modal" id="main-video">
        <div class="modal-inner">
            <button class="close" data-toggle="modal-dismiss"><span class="icon-close2"></span></button>
            <div class="modal-content">
                <div class="modal-content-inner">
                    <div class="body-modal">
                        <div class="video-wrapper">
                            <div class="video-wrapper-border">
                                <span class="left-top"></span>
                                <span class="left-bottom"></span>
                                <span class="right-bottom"></span>
                                <span class="right-top"></span>
                                <iframe width="100%" src="https://www.youtube.com/embed/Hbd8ghFICJk?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="text-video-modal">
                            <h2>Первая социальная сеть в СНГ </h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto laborum libero ratione suscipit vitae? Amet dolores eaque minima, nesciunt optio quae quaerat rerum sit! Ab dolor eligendi illo ipsam tempore.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto laborum libero ratione suscipit vitae? Amet dolores eaque minima, nesciunt optio quae quaerat rerum sit! Ab dolor eligendi illo ipsam tempore.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.min.js"></script>
</body>
</html>