<link rel="stylesheet" href="/view/res/css/home.css">
<link rel="stylesheet" href="/view/res/css/new_auto.css">
<link rel="stylesheet" href="/view/res/css/contacts.css">
<link rel="stylesheet" href="/view/res/css/reviews.css">

<section id="home">
    <div class="container">
        <section id="brands">
            <div class="content">
                <div class="list">
                    <?php foreach($MARKS as $mark): ?>
                        <div class="item link" href="/catalog/?mark=<?=$mark['id']?>/">
                            <img src="<?=$mark['icon']?>" alt="" class="brand-image">
                            <p class="brand-name"><?=$mark['name']?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>

    <section id="contacts">
        <div class="container"><h2 class="section-title">Контакты</h2> </div>
        <div class="container content">
            <div class="brand-graph">
                <img src="/view/res/img/contacts_image.jpg" alt="" class="logotype">
            </div>

            <div class="brand-information">
                <ul>
                    <li>
                        <div class="f-icon">
                            <div class="mi-icons">place</div>
                        </div>

                        <div class="content">
                            <span class="main-text">г. Оренбург,<br>Чкалова 11</span>
                        </div>
                    </li>

                    <li>
                        <div class="f-icon">
                            <div class="mi-icons">schedule</div>
                        </div>

                        <div class="content">
                            <span class="main-text"><b>Ежедневно</b><br>с 08.30 до 17.00</span>
                        </div>
                    </li>

                    <li>
                        <div class="f-icon">
                            <div class="mi-icons">phone_callback</div>
                        </div>

                        <div class="content">
                            <span class="main-text"><b>8 (3532) 31-72-39</b><br>По России бесплатно</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <iframe class="map-place" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2469.156357562338!2d55.11865261536265!3d51.76674869952885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x417bf0b87ed5ec81%3A0x553b786163633dc6!2z0YPQuy4g0KfQutCw0LvQvtCy0LAsIDExLCDQntGA0LXQvdCx0YPRgNCzLCDQntGA0LXQvdCx0YPRgNCz0YHQutCw0Y8g0L7QsdC7LiwgNDYwMDI0!5e0!3m2!1sru!2sru!4v1618634428076!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>

    <section id="reviews">
        <div class="container">
            <h2 class="section-title">Отзывы</h2>
        </div>
        <div class="container">
            <?php foreach($REVIEWS as $review): ?>
                <div class="card">
                    <div class="card-img">
                        <img src="/view/res/img/reviews/1.jpeg" alt="">
                    </div>

                    <div class="card-body">
                        <div class="card-main">
                            <p class="mini-text selection"><?=$review['date']?></p>
                            <h3 class="title"><?=$review['name']?></h3>
                            <p class="add-text"><?=$review['text']?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</section>