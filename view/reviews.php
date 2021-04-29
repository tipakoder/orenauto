<link rel="stylesheet" href="/view/res/css/reviews.css">

<section id="new-review">
    <div class="container">
        <h2 class="section-title">Новый отзыв</h2>
        <form action="/reviews/add/" functionToDo="location.reload();">
            <input name="name" type="text" placeholder="Фамилия Имя" required>
            <textarea name="text" placeholder="Отзыв" rows="10"></textarea>
            <button>Отправить</button>
        </form>
    </div>
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