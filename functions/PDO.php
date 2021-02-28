<?php
include_once ('config.php');

function select($sql, $columnMode = false)
{
    try {
        $conn = new PDO(DSN, USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if (!$columnMode) {
            return $stmt->fetchAll();
        }
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        return "Connection failed: " . $e->getMessage();
    }
}

function insertMulti($table, $arrayData)
{
    foreach ($arrayData as $value) {
        if (is_array($value)) {
            $arrayType = 'multi';
            break;
        } else {
            $arrayType = 'simple';
        }
    }

    switch($arrayType) {
        case 'simple':
            $fieldsArray = array_keys($arrayData); // выбираем только ключи (как параметры)
            $valuesArray = array_values($arrayData); // выбираем только значения
            $fields = implode(',', $fieldsArray); // подготавливаем названия полей для sql запроса
            break;
        case 'multi':
            $dataArray = array_values($arrayData); // сбрасываем значения ключей
            $fieldsArray = array_shift($arrayData); //array ( 'count' => '1', 'stock_id' => 2, )
            $fieldsArray = array_keys($fieldsArray); //array ( 0 => 'count', 1 => 'stock_id', )
            $fields = implode(',', $fieldsArray); //'count,stock_id'
    }

    foreach ($fieldsArray as $value) {
        $preparedValuesArray [] = ":" . trim($value);   // ( 0 => ':count', 1 => ':stock_id', ) добавляем двоеточие к каждому параметру array - готовим Values для prepared sql запроса
        $variablesList [trim($value)] = null; // ( 'count' => NULL, 'stock_id' => NULL, ) подготовили ключ=значение для создания переменных по ключу
    }

    $preparedValues = implode(",", $preparedValuesArray); // ':count,:stock_id' преобразовываем обратно в строку.

    extract($variablesList, EXTR_OVERWRITE); // создали переменные $count = NULL, $stock_id = NULL

    $statement = "INSERT INTO $table ($fields) VALUES ($preparedValues)"; //'INSERT INTO order_info (count,stock_id) VALUES (:count,:stock_id)'

    try {
        $conn = new PDO(DSN, USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($statement);

        switch ($arrayType) {
            case 'simple':
                for ($i = 0; $i < count($fieldsArray); $i++) {
                    $stmt->bindParam($preparedValuesArray[$i], ${$fieldsArray[$i]}); //$stmt->bindParam(:name, $name)
                    ${$fieldsArray[$i]} = $valuesArray[$i]; //$variable = "value";
                }
                $stmt->execute();
                break;
            case 'multi':
                for ($i = 0, $interationCounti = count($dataArray) - 1; $i <= $interationCounti; $i++) { //count($dataArray) = 2
                    $singleArrayData = $dataArray[$i]; // ( 'count' => '1', 'stock_id' => 2, )
                    $valuesArray = array_values($dataArray[$i]); // ( 0 => '1', 1 => 2, )
                    for ($ii = 0, $interationCountii = count($singleArrayData) - 1; $ii <= $interationCountii; $ii++) { // count($singleArrayData) = 2
                        $stmt->bindParam($preparedValuesArray[$ii], ${$fieldsArray[$ii]}); //$stmt->bindParam(:name, $name)
                        ${$fieldsArray[$ii]} = $valuesArray[$ii]; //$variable = "value";
                    }
                    $stmt->execute();
                }
                break;
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function insert($table, $fields, $values, $where = false) {

    $fields = preg_replace("/ +/", "", $fields); //избавляемся от пробелов
    $values = preg_replace("/ +/", "", $values); //избавляемся от пробелов

    $fieldsArray = explode(',', $fields); //преобразовываем строку в массив
    $valuesArray = explode(',', $values); //преобразовываем строку в массив
    //array ( 0 => 'name', 1 => ' address', 2 => ' gender', 3 => ' contact', )
    $variablesList = [];
    foreach ($fieldsArray as $value) {
        $preparedValuesArray [] = ":" . trim($value);   //добавляем двоеточие к каждому параметру array - готовим Values для sql запроса
        //array ( 0 => ':name', 1 => ':address', 2 => ':gender', 3 => ':contact', )
        $variablesList [trim($value)] = null; //подготовили ключ=значение для создания переменных по ключу
    }

    $preparedValuesString = implode(",", $preparedValuesArray); //преобразовываем обратно в строку.

    if (!$where) {
        $statement = "INSERT INTO $table ($fields) VALUES ($preparedValuesString) WHERE $where";
    }
    $statement = "INSERT INTO $table ($fields) VALUES ($preparedValuesString)";

    $conn = new PDO(DSN, USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($statement);

    extract($variablesList, EXTR_OVERWRITE); //появились переменные $name, $address, $gender, $gender

    for ($i = 0; $i < count($fieldsArray); $i++) {
        $stmt->bindParam($preparedValuesArray[$i], ${$fieldsArray[$i]}); //$stmt->bindParam(:name, $name)
        ${$fieldsArray[$i]} = $valuesArray[$i]; //$variable = "value";
    }

    $stmt->execute();

}


//function insertOrderCustomerFields($value = [])
//{
//    try {
//        $conn = new PDO(DSN, USERNAME, PASSWORD);
//        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//        $stmt = $conn->prepare("INSERT INTO customers (name, address, gender, contact)
//        VALUES (:name, :address, :gender, :contact)");
//        $stmt->bindParam(':name', $name);
//        $stmt->bindParam(':address', $address);
//        $stmt->bindParam(':gender', $gender);
//        $stmt->bindParam(':contact', $contact);
//
////        foreach ($values as $value) {
//            $name = $value['name'];
//            $address = $value['address'];
//            $gender = $value['gender'];
//            $contact = $value['contact'];
//            $stmt->execute();
////        }
//
//        return "Connected successfully";
//    } catch (PDOException $e) {
//        $conn->rollback();
//        return "Connection failed: " . $e->getMessage();
//    }
//}


//function insert($sql, $params = [])
//{
//    try {
//        $conn = new PDO(DSN, USERNAME, PASSWORD);
//        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $stmt = $conn->prepare($sql);
//        $stmt->execute($params);
//
//        $status = "Connected successfully";
//    } catch (PDOException $e) {
//        return "Connection failed: " . $e->getMessage();
//    }
//}