<?php

function carsRequest ($currentRouteName, $match)
{

    $params = []; //это мне для усложнения кода)))

    switch ($currentRouteName) {
        case 'carClass':
            $request = "SELECT name, id FROM class";
            break;
        case 'carMaker':
            $request = "SELECT m.name make_name, m.id make_id, c.id class_id FROM manufacturer m
                             JOIN model md ON m.id=md.brand_id
                             JOIN class c ON md.class_id=c.id
                             WHERE c.id='{$match[1]}' GROUP BY m.name";
            break;
        case 'carModel':
            $request = "SELECT md.*, c.name class_name FROM model md
                            JOIN manufacturer m ON m.id=md.brand_id
                            JOIN class c ON md.class_id=c.id
                            WHERE m.id='{$match[2]}' AND c.id='{$match[1]}'";
            break;
        case 'carModelOnStock':
            $request = "SELECT s.color, s.cost, s.id stock_id, s.count, m.id model_id, mn.name maker_name, m.modification FROM model m
                            JOIN stock s ON m.id=model_id
                            JOIN manufacturer mn ON mn.id=m.brand_id
                            WHERE m.id={$match[3]}";
            break;
        case 'carModelDetail':
            $request = "SELECT * FROM model m
                            JOIN stock s ON m.id=model_id
                            WHERE m.id={$match[1]}";
            break;
    }

    $result = select($request);

    if (empty($result)) {
        echo'no results';
    }
    return $result;
}
