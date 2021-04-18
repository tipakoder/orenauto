<link rel="stylesheet" href="/view/res/css/old_auto.css">

<section id="sort-oldauto">
    <div class="container">
        <h2 class="section-title">Подобрать авто с пробегом</h2>
        <div class="content">
            <div class="search-bar">
                <div class="option">
                    <label for="mark_section">Марка</label>
                    <div class="content">
                        <select id="mark_section">
                            <option value="null" selected disabled>Любая</option>
                            <option value="lada">Lada</option>
                            <option value="kia">Kia</option>
                        </select>
                    </div>
                </div>

                <div class="option">
                    <label for="model_section">Модель</label>
                    <div class="content">
                        <select id="model_section">
                            <option value="null" selected disabled>Любая</option>
                            <option value="rio">Rio</option>
                            <option value="k5">K5</option>
                            <option value="sorento">Sorento</option>
                            <option value="sportage">Sportage</option>
                        </select>
                    </div>
                </div>

                <div class="option">
                    <label for="yearof_section">Год выпуска</label>
                    <div class="content">
                        <select id="yearof_section">
                            <option value="null" selected disabled>От</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                        <select id="yearto_section">
                            <option value="null" selected disabled>До</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                    </div>
                </div>

                <div class="option">
                    <label for="yearof_section">Цена</label>
                    <div class="content">
                        <select id="yearof_section">
                            <option value="null" selected disabled>От</option>
                            <option value="190000">190 000 руб.</option>
                            <option value="290000">290 000 руб.</option>
                            <option value="390000">390 000 руб.</option>
                        </select>
                        <select id="yearto_section">
                            <option value="null" selected disabled>До</option>
                            <option value="190000">190 000 руб.</option>
                            <option value="290000">290 000 руб.</option>
                            <option value="390000">390 000 руб.</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="additional-filters">
                <div class="option">
                    <label for="body_section">Тип кузова</label>
                    <div class="content">
                        <select id="body_section">
                            <option value="null" selected disabled>Любой</option>
                            <option value="outroad">Внедорожник</option>
                            <option value="liftback">Лифтбек</option>
                            <option value="sedan">Седан</option>
                        </select>
                    </div>
                </div>

                <div class="option">
                    <label for="engine_section">Тип двигателя</label>
                    <div class="content">
                        <select id="engine_section">
                            <option value="null" selected disabled>Любой</option>
                            <option value="rio">Бензин инжектор</option>
                        </select>
                    </div>
                </div>

                <div class="option">
                    <label for="volumeof_section">Мощность</label>
                    <div class="content">
                        <select id="volumeof_section">
                            <option value="null" selected disabled>От</option>
                            <option value="80">80 л.с.</option>
                            <option value="100">100 л.с.</option>
                            <option value="125">125 л.с.</option>
                            <option value="150">150 л.с.</option>
                            <option value="177">177 л.с.</option>
                        </select>
                        <select id="volumeto_section">
                            <option value="null" selected disabled>До</option>
                            <option value="80">80 л.с.</option>
                            <option value="100">100 л.с.</option>
                            <option value="125">125 л.с.</option>
                            <option value="150">150 л.с.</option>
                            <option value="177">177 л.с.</option>
                        </select>
                    </div>
                </div>

                <div class="option">
                    <label for="engine_section">Тип КПП</label>
                    <div class="content">
                        <select id="engine_section">
                            <option value="null" selected disabled>Любая</option>
                            <option value="auto">Автомат</option>
                            <option value="auto_robot">Автомат робот</option>
                            <option value="mechanic">Механика</option>
                        </select>
                    </div>
                </div>

                <div class="option">
                    <label for="engine_section">Тип привода</label>
                    <div class="content">
                        <select id="engine_section">
                            <option value="null" selected disabled>Любой</option>
                            <option value="front">Передний</option>
                            <option value="mixed">Полный</option>
                            <option value="back">Задний</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="search-result">
    <div class="container">
        <div class="search-header">
            <h3 class="title">Найдено 6 автомобилей</h3>

            <div class="add-sort">
                <label for="add-sort-result-select">Сортировать: </label>
                <select id="add-sort-result-select">
                    <option value="price_low">По цене (сначала дешевле)</option>
                    <option value="price_high">По цене (сначала дороже)</option>
                    <option value="year_low">По году (сначала новые)</option>
                    <option value="year_high">По году (сначала старые)</option>
                    <option value="mileage">По пробегу</option>
                    <option value="add_date">По дате добавления</option>
                </select>
            </div>
        </div>

        <div class="search-content">
            <div class="card">
                <div class="card-img">
                    <img src="/view/res/img/oldcars/kalina_1.jpg" alt="">
                </div>

                <div class="card-body">
                    <div class="card-main">
                        <h3 class="title">Lada Kalina, 2013 г.</h3>
                        <p class="sub-text selection">190 000 руб.</p>
                    </div>

                    <div class="card-footer">
                        <p class="text">1.6 MT (81 л.с.), бензин инжектор, передний привод, пробег 101 708 км</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-img">
                    <img src="/view/res/img/oldcars/granta_1.jpg" alt="">
                </div>

                <div class="card-body">
                    <div class="card-main">
                        <h3 class="title">Lada Granta, 2015 г.</h3>
                        <p class="sub-text selection">395 000 руб.</p>
                    </div>

                    <div class="card-footer">
                        <p class="text">1.6 MT (82 л.с.), бензин инжектор, передний привод, пробег 82 355 км</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-img">
                    <img src="/view/res/img/oldcars/granta_2.jpg" alt="">
                </div>

                <div class="card-body">
                    <div class="card-main">
                        <h3 class="title">Lada Granta, 2021 г.</h3>
                        <p class="sub-text selection">436 500 руб.</p>
                    </div>

                    <div class="card-footer">
                        <p class="text">1.6 MT (87 л.с.), бензин инжектор, передний привод, пробег 501 км</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-img">
                    <img src="/view/res/img/oldcars/granta_3.jpg" alt="">
                </div>

                <div class="card-body">
                    <div class="card-main">
                        <h3 class="title">Lada Granta, 2020 г.</h3>
                        <p class="sub-text selection">437 000 руб.</p>
                    </div>

                    <div class="card-footer">
                        <p class="text">1.6 MT (87 л.с.), бензин инжектор, передний привод, пробег 422 км</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>