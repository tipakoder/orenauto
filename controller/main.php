<?php

function home_page(){
    load_view("home_page", "Главная");
}

function catalog_page(){
    if($_GET["mark"] != null){
        $mark = $_GET["mark"];
        $cars = dbQuery("SELECT car.*, car_equipment.*, car_mark.name as mark, car_model.name as name, car_model.image as image FROM car, car_equipment, car_mark, car_model WHERE car_equipment.id = car.equipment_id AND car_mark.id = car.mark_id AND car_model.id = car.model_id AND car.mark_id = '{$mark}'");
    }
    
    $marks = dbQuery("SELECT * FROM car_mark");
    load_view("catalog", "Каталог", ["CARS" => $cars, "MARKS" => $marks]);
}

function probeg_page(){
    load_view("probeg", "Авто с пробегом");
}

function reviews_page(){
    $reviews = dbQuery("SELECT * FROM review");
    load_view("reviews", "Отзывы", ["REVIEWS" => $reviews]);
}

function reviews_add(){
    $name = verify_field("name", $_POST['name'], 4, 240);
    $text = verify_field("text", $_POST['text'], 4, 2000);
    if(dbExecute("INSERT INTO review (name, text) VALUES ('{$name}', '{$text}')")){
        send_answer([], true);
    }
    send_answer([]);
}

function contacts_page(){
    load_view("contacts", "Конакты");
}