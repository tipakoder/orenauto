<?php

// Auth functions 

function auth_page(){
    load_view("admin/login", "Авторизация");
}

function auth_process(){
    $login = verify_field("login", $_POST['login'], 4, 40);
    $password = verify_field("password", $_POST['password'], 0, 0);

    if( ($query = dbQueryOne("SELECT * FROM account WHERE login = '{$login}'")) !== false){
        if(!password_verify($password, $query["password"])){
            send_answer(["Password is incorrect!"]);
        }

        $session_key = hash("sha256", $query["id"].time());
        $ip = $_SERVER["REMOTE_ADDR"];

        if(dbExecute("INSERT INTO account_session (account_id, session_key, ip) VALUES ('{$query['id']}', '{$session_key}', '{$ip}')")){
            setcookie("authsession", $session_key, time() + 3600*24*7*4*24, "/");
            send_answer([], true);
        } else {
            send_answer(["Unknown error on create session"]);
        }
    }

    send_answer(["Account with this login is not found"]);
}

// Dashboard page

function dashboard_page(){
    load_view("admin/dashboard", "Панель администратора");
}

// Add marks

function mark_add(){
    $name = verify_field("name", $_POST['name'], 2, 40);
    $icon = $_FILES['icon'];
    $path = "/content/mark/".basename($icon['name']);
    if (move_uploaded_file($icon['tmp_name'], ROOTDIR.$path)) {
        if(dbExecute("INSERT INTO car_mark (name, icon) VALUES ('{$name}', '{$path}')")){
            send_answer([], true);
        }
        send_answer(["Unknown error with write to db"]);
    }
    send_answer(["Unknown error upload"]);
}

// Add model

function model_add(){
    $mark_id = $_POST['mark_id'];
    $name = verify_field("name", $_POST['name'], 2, 50);
    $image = $_FILES['image'];
    $path = "/content/model/".basename($image['name']);
    if (move_uploaded_file($image['tmp_name'], ROOTDIR.$path)) {
        if(dbExecute("INSERT INTO car_model (mark_id, name, image) VALUES ('{$mark_id}', '{$name}', '{$path}')")){
            send_answer([], true);
        }
        send_answer(["Unknown error with write to db"]);
    }
    send_answer(["Unknown error upload"]);
}

// Country add

function country_add(){
    $name = verify_field("name", $_POST['name'], 2, 40);
    if(dbExecute("INSERT INTO country_origin (name) VALUES ('{$name}')")){
        send_answer(["id" => dbLastId()], true);
    }
    send_answer([]);
}

// Catalog functions

function catalog_page(){
    $marks = dbQuery("SELECT * FROM car_mark");
    $models = dbQuery("SELECT * FROM car_model");
    $cars = dbQuery("SELECT car.year as year, car_equipment.*, car_mark.name as mark, car_mark.id as mark_id, car_model.id as model_id, car_model.name as name, car_model.image as image FROM car, car_equipment, car_mark, car_model WHERE car_equipment.id = car.equipment_id AND car_mark.id = car.mark_id AND car_model.id = car.model_id");
    load_view("admin/catalog", "Панель администратора - Каталог", ["MARKS" => $marks, "MODELS" => $models, "CARS" => $cars]);
}

function catalog_add(){
    global $link;

    $mark_id = $_POST['mark_id'];
    $model_id = $_POST['model_id'];
    $year = $_POST['year'];
    
    $engine_type = $_POST['engine_type'];
    $power = $_POST['power'];
    $transmission = $_POST['transmission'];
    $fuel_tank = $_POST['fuel_tank'];
    $gears_count = $_POST['gears_count'];
    $drive_unit = $_POST['drive_unit'];
    $volume = $_POST['volume'];
    $fuel_grade_id = $_POST['fuel_grade_id'];
    $max_speed = $_POST['max_speed'];
    $acceleration_time = $_POST['acceleration_time'];
    $fuel_consumption_city = $_POST['fuel_consumption_city'];
    $fuel_consumption_mixed = $_POST['fuel_consumption_mixed'];
    $fuel_consumption_country = $_POST['fuel_consumption_country'];
    $suspension_height = $_POST['suspension_height'];
    $suspension_front = verify_field("suspension_front", $_POST['suspension_front'], 4, 60);
    $suspension_back = verify_field("suspension_back", $_POST['suspension_back'], 4, 60);
    $wheel_size = verify_field("wheel_size", $_POST['wheel_size'], 2, 80);
    $length = $_POST['length'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $wheelbase = $_POST['wheelbase'];
    $trunk_volume = $_POST['trunk_volume'];
    $curb_weight = $_POST['curb_weight'];
    $full_mass = $_POST['full_mass'];
    $seats_count = $_POST['seats_count'];
    $doors_count = $_POST['doors_count'];
    $country_origin_id = $_POST['country_origin_id'];
    $price = $_POST['price'];
    $price_shop = $_POST['price_shop'];

    if(dbExecute("INSERT INTO car_equipment (
        engine_type, 
        power,
        transmission,
        fuel_tank, 
        gears_count, 
        drive_unit, 
        volume, 
        fuel_grade_id, 
        max_speed,
        acceleration_time,
        fuel_consumption_city,
        fuel_consumption_mixed,
        fuel_consumption_country,
        suspension_height,
        suspension_front,
        suspension_back,
        wheel_size,
        length,
        height,
        width,
        wheelbase,
        trunk_volume,
        curb_weight,
        full_mass,
        seats_count,
        doors_count,
        country_origin_id,
        price,
        price_shop
    ) VALUES (
        '{$engine_type}',
        '{$power}',
        '{$transmission}',
        '{$fuel_tank}',
        '{$gears_count}',
        '{$drive_unit}',
        '{$volume}',
        '{$fuel_grade_id}',
        '{$max_speed}',
        '{$acceleration_time}',
        '{$fuel_consumption_city}',
        '{$fuel_consumption_mixed}',
        '{$fuel_consumption_country}',
        '{$suspension_height}',
        '{$suspension_front}',
        '{$suspension_back}',
        '{$wheel_size}',
        '{$length}',
        '{$height}',
        '{$width}',
        '{$wheelbase}',
        '{$trunk_volume}',
        '{$curb_weight}',
        '{$full_mass}',
        '{$seats_count}',
        '{$doors_count}',
        '{$country_origin_id}',
        '{$price}',
        '{$price_shop}'
    )")){
        $equipment_id = dbLastId();

        if(dbExecute("INSERT INTO car (
            mark_id,
            model_id,
            equipment_id,
            year
        ) VALUES (
            '{$mark_id}',
            '{$model_id}',
            '{$equipment_id}',
            '{$year}'
        )")){
            send_answer(["id" => dbLastId()], true);
        }
        send_answer(["Error with write into db", mysqli_error($link)]);
    }
    send_answer(["Unknown error with db", mysqli_error($link)]);
}

function catalog_update(){
    global $link;

    $id = $_POST['id'];

    $mark_id = $_POST['mark_id'];
    $model_id = $_POST['model_id'];
    $year = $_POST['year'];
    
    $engine_type = $_POST['engine_type'];
    $power = $_POST['power'];
    $transmission = $_POST['transmission'];
    $fuel_tank = $_POST['fuel_tank'];
    $gears_count = $_POST['gears_count'];
    $drive_unit = $_POST['drive_unit'];
    $volume = $_POST['volume'];
    $fuel_grade_id = $_POST['fuel_grade_id'];
    $max_speed = $_POST['max_speed'];
    $acceleration_time = $_POST['acceleration_time'];
    $fuel_consumption_city = $_POST['fuel_consumption_city'];
    $fuel_consumption_mixed = $_POST['fuel_consumption_mixed'];
    $fuel_consumption_country = $_POST['fuel_consumption_country'];
    $suspension_height = $_POST['suspension_height'];
    $suspension_front = verify_field("suspension_front", $_POST['suspension_front'], 4, 60);
    $suspension_back = verify_field("suspension_back", $_POST['suspension_back'], 4, 60);
    $wheel_size = verify_field("wheel_size", $_POST['wheel_size'], 2, 80);
    $length = $_POST['length'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $wheelbase = $_POST['wheelbase'];
    $trunk_volume = $_POST['trunk_volume'];
    $curb_weight = $_POST['curb_weight'];
    $full_mass = $_POST['full_mass'];
    $seats_count = $_POST['seats_count'];
    $doors_count = $_POST['doors_count'];
    $country_origin_id = $_POST['country_origin_id'];
    $price = $_POST['price'];

    if(dbExecute("UPDATE car_equipment SET
    engine_type = '{$engine_type}', 
    power = '{$power}',
    transmission = '{$transmission}',
    fuel_tank = '{$fuel_tank}', 
    gears_count = '{$gears_count}', 
    drive_unit = '{$drive_unit}', 
    volume = '{$volume}', 
    fuel_grade_id = '{$fuel_grade_id}', 
    max_speed = '{$max_speed}',
    acceleration_time = '{$acceleration_time}',
    fuel_consumption_city = '{$fuel_consumption_city}',
    fuel_consumption_mixed = '{$fuel_consumption_mixed}',
    fuel_consumption_country = '{$fuel_consumption_country}',
    suspension_height = '{$suspension_height}',
    suspension_front = '{$suspension_front}',
    suspension_back = '{$suspension_back}',
    wheel_size = '{$wheel_size}',
    length = '{$length}',
    height = '{$height}',
    width = '{$width}',
    wheelbase = '{$wheelbase}',
    trunk_volume = '{$trunk_volume}',
    curb_weight = '{$curb_weight}',
    full_mass = '{$full_mass}',
    seats_count = '{$seats_count}',
    doors_count = '{$doors_count}',
    country_origin_id = '{$country_origin_id}',
    price = '{$price}'
    WHERE id = '{$id}' LIMIT 1")){
        if(dbExecute("UPDATE car SET
            mark_id = '{$mark_id}',
            model_id = '{$model_id}',
            year = '{$year}'
            WHERE equipment_id = '{$id}' LIMIT 1")){
            send_answer([], true);
        }
    }
    send_answer(["Unknown error with db", mysqli_error($link)]);
}