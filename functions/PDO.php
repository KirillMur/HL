<?php
include_once ('config.php');

function select($sql, $params = [])
{
    try {
        $conn = new PDO(DSN, USERNAME, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();

//        $status = "Connected successfully";
    } catch (PDOException $e) {
        return "Connection failed: " . $e->getMessage();
    }
}