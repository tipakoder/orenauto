<link rel="stylesheet" href="/view/res/css/admin.css">

<div id="popup-window">
    <div class="window container" name="new_mark">
        <div class="title">Добавление новой марки</div>

        <form action="/admin/mark/add/" functionToDo="location.reload();">
            <input type="text" placeholder="Название" name="name" required>
            <label for="">Иконка</label>
            <input type="file" name="icon" required>
            <button>Сохранить</button>
        </form>
    </div>

    <div class="window container" name="new_model">
        <div class="title">Добавление новой модели</div>

        <form action="/admin/model/add/" functionToDo="location.reload();">
            <select name="mark_id" required>
                <option value="null" selected disabled>Марка</option>
                <?php foreach($MARKS as $mark): ?>
                    <option value="<?=$mark['id']?>"><?=$mark['name']?></option>
                <?php endforeach; ?>
            </select>
            <input type="text" placeholder="Название модели" name="name" required>
            <label for="">Картинка модели</label>
            <input type="file" name="image" required>
            <button>Сохранить</button>
        </form>
    </div>

    <div class="window container" name="new_auto">
        <div class="title">Добавление нового автомобиля</div>

        <form id="catalog_add" action="/admin/catalog/add/" functionToDo="location.reload();">
            <input type="number" name="id" disabled style="display: none;">

            <select name="mark_id" required>
                <option value="null" selected disabled>Марка</option>
                <?php foreach($MARKS as $mark): ?>
                    <option value="<?=$mark['id']?>"><?=$mark['name']?></option>
                <?php endforeach; ?>
            </select>

            <select name="model_id" required>
                <option value="null" selected disabled>Модель</option>
                <?php foreach($MODELS as $model): ?>
                    <option value="<?=$model['id']?>"><?=$model['name']?></option>
                <?php endforeach; ?>
            </select>

            <input type="number" placeholder="Год" name="year" required>

            <select name="engine_type" required>
                <option value="null" selected disabled>Тип двигателя</option>
                <option value="patrol">Бензиновый</option>
                <option value="electric">Электрический</option>
                <option value="hybrid">Гибридный</option>
            </select>

            <div class="field-change">
                <input id="range_power" type="text" value="0 л" readonly>
                <input for="range_power" eg="л" type="range" step="0.1" name="power">
            </div>

            <select name="transmission" required>
            <option value="null" selected disabled>Трансмиссия</option>
                <option value="mechanic">Механическая</option>
                <option value="electric">Электромеханическая</option>
                <option value="hybrid">Гибридная</option>
            </select>

            <input type="number" placeholder="Объём топливного бака (л)" name="fuel_tank" required>
            <input type="number" placeholder="Кол-во передач" name="gears_count" required>

            <select name="drive_unit" required>
                <option value="null" selected disabled>Привод</option>
                <option value="front">Передний</option>
                <option value="back">Задний</option>
                <option value="full">Полный</option>
            </select>

            <input type="number" placeholder="Мощность (л.с.)" name="volume" required>
            
            <select name="fuel_grade_id" required>
                <option value="null" selected disabled>Марка топлива</option>
                <option value="1">АИ-80</option>
                <option value="2">АИ-92</option>
                <option value="3">АИ-95</option>
                <option value="4">АИ-95+</option>
                <option value="5">АИ-98</option>
                <option value="6">АИ-100</option>
            </select>

            <input type="number" placeholder="Максимальная скорость (км/ч)" name="max_speed" required>
            <input type="number" placeholder="Время разгона (до 100 км/ч)" name="acceleration_time" required>
            <input type="number" placeholder="Расход в городе (л/100км)" name="fuel_consumption_city" required>
            <input type="number" placeholder="Расход смешанный (л/100км)" name="fuel_consumption_mixed" required>
            <input type="number" placeholder="Расход загородом (л/100км)" name="fuel_consumption_country" required>
            <input type="number" placeholder="Дорожный просвет (мм)" name="suspension_height" required>
            <input type="text" placeholder="Передняя подвеска" name="suspension_front" required>
            <input type="text" placeholder="Задняя подвеска" name="suspension_back" required>
            <input type="text" placeholder="Размер колёс" name="wheel_size" required>
            <input type="number" placeholder="Длина (мм)" name="length" required>
            <input type="number" placeholder="Высота (мм)" name="height" required>
            <input type="number" placeholder="Ширина (мм)" name="width" required>
            <input type="number" placeholder="Колёсная база (мм)" name="wheelbase" required>
            <input type="number" placeholder="Объём багажника (л)" name="trunk_volume" required>
            <input type="number" placeholder="Снаряжённая масса (кг)" name="curb_weight" required>
            <input type="number" placeholder="Полная масса (кг)" name="full_mass" required>
            <input type="number" placeholder="Кол-во мест" name="seats_count" required>
            <input type="number" placeholder="Кол-во дверей" name="doors_count" required>
            
            <select name="country_origin_id" required>
                <option value="null" selected disabled>Страна производства</option>
                <option value="1">Россия</option>
                <option value="2">Китай</option>
                <option value="3">Германия</option>
            </select>

            <input type="number" placeholder="Цена (руб)" name="price" required>
            
            <button>Сохранить</button>
        </form>
    </div>
</div>

<section id="dashboard-catalog">
    <div class="container">
        <h2 class="section-title">Каталог автомобилей</h2>
        <div class="db-table">
            <div class="row power">
                <div class="content">
                    <div class="st" onclick="showPopup('new_mark')">Добавить марку</div>
                    <div class="st" onclick="showPopup('new_model')">Добавить модель</div>
                    <div class="st" onclick="formWrite(null, 'catalog_add', '/admin/catalog/add/'); showPopup('new_auto');">Добавить автомобиль</div>
                </div>
            </div>

            <div class="row header">
                <div class="content">
                    <div class="st">ID</div>
                    <div class="st">Марка</div>
                    <div class="st">Модель</div>
                    <div class="st">Год</div>
                    <div class="st">Комплектация</div>
                </div>
            </div>

            <?php 
            if(count($CARS) > 0){
            foreach($CARS as $car): ?>
                <div class="row">
                    <div class="content">
                        <div class="st"><?=$car['id']?></div>
                        <div class="st"><?=$car['mark']?></div>
                        <div class="st"><?=$car['name']?></div>
                        <div class="st"><?=$car['year']?></div>
                        <div class="st"><button onclick='formWrite(`<?=json_encode($car)?>`, "catalog_add", "/admin/catalog/update/"); showPopup("new_auto")'>Показать</button></div>
                    </div>

                    <div class="content add">
                        <img src="<?=$car['image']?>" alt="">
                    </div>
                </div>
            <?php endforeach; 
            }
            ?>
        </div>
    </div>
</section>