<link rel="stylesheet" href="/view/res/css/constructor.css">

<section id="constructor-car">
    <div class="container">
        <div class="content">
            <div class="block">
                <h2 class="section-title">Заявка на Trade-in</h2>
                <form action="#">
                    <select name="model">
                        <option value="null" selected disabled>Выберите модель</option>
                        <option value="1">Лада</option>
                        <option value="2">Kia</option>
                    </select>

                    <select name="complectation">
                        <option value="null" selected disabled>Выберите комплектацию</option>
                        <option value="1">Rio</option>
                        <option value="2">Sportage</option>
                        <option value="3">K5</option>
                    </select>

                    <input name="fullname" type="text" placeholder="ФИО">
                    <input name="telephone" type="tel" placeholder="Телефон">
                    <button>Отправить заявку</button>
                </form>
            </div>

            <div class="block view-car">
                <img src="/view/res/img/no-auto.png" alt="">
            </div>
        </div>
    </div>
</section>