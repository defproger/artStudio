<?php
function db_getConnection()
{
    $user = 'user';
    $password = 'pass';
    $db = 'base';
    $host = 'db';
    $port = '3306';

    static $dbh = null;
    if ($dbh != null) return $dbh;
    $dbh = new PDO("mysql:dbname=$db;host=$host;charset=utf8;port=$port", $user, $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    return $dbh;
}

function query($sql, $params = [])
{
    $normalizedParams = [];
    foreach ($params as $key => $value) {
        $normalizedParams[":" . $key] = $value;
    }

    $stmt = db_getConnection()->prepare($sql);
    $stmt->execute($normalizedParams);
    return $stmt->fetch();
}

function queryAll($query, $params = [])
{
    $normalizedParams = [];
    foreach ($params as $key => $value) {
        $normalizedParams[":" . $key] = $value;
    }

    $stmt = db_getConnection()->prepare($query);
    $stmt->execute($normalizedParams);
    return $stmt->fetchAll();
}

function db_getAll($table)
{
    return db_getConnection()->query("SELECT * FROM `{$table}`")->fetchAll();
}


function db_getById($table, $id, $column = 'id')
{
    return db_getConnection()->query("SELECT * FROM `{$table}` WHERE `{$column}`='{$id}'")->fetch();
}


function db_insert($table, $arr)
{
    $q = "INSERT INTO `{$table}`";
    $fields = array_keys($arr);
    $q .= "(`" . implode("`,`", $fields) . "`) VALUES (:" . implode(",:", $fields) . ")";
    $stmt = db_getConnection()->prepare($q);
    $stmt->execute($arr);
}


function db_update($table, $id, $arr)
{
    $id = (int)$id;
    $q = "UPDATE `{$table}` SET ";
    $fields = array_keys($arr);
    $q .= implode("=?, ", $fields) . "=? WHERE id={$id}";
    $stmt = db_getConnection()->prepare($q);
    $stmt->execute(array_values($arr));
}

function cryptpass($pass)
{
    return hash('sha256', $pass . 'crypto');
}