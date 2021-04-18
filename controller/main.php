<?php

function home_page(){
    load_view("home_page", "Главная");
}

function catalog_page(){
    $cars = dbQuery("SELECT car.*, car_equipment.*, car_mark.name as mark, car_model.name as name, car_model.image as image FROM car, car_equipment, car_mark, car_model WHERE car_equipment.id = car.equipment_id AND car_mark.id = car.mark_id AND car_model.id = car.model_id");
    load_view("catalog", "Каталог", ["CARS" => $cars]);
}

function probeg_page(){
    load_view("probeg", "Авто с пробегом");
}

function reviews_page(){
    load_view("reviews", "Отзывы");
}

function contacts_page(){
    load_view("contacts", "Конакты");
}