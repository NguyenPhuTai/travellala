<?php

function connectdb()
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=project1", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    } catch (PDOException $e) {
        //echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}



function checkuser($email, $password)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM customer WHERE email='" . $email . "' AND password='" . $password . "'");
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    if(count($kq)>0) return $kq[0]['role'];
    else return 0;
}

function getuserinfo($email, $password)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM customer WHERE email='" . $email . "' AND password='" . $password . "'");
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}
function check_admin($email, $password)
{   
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM admin WHERE email='" . $email . "' AND password='" . $password . "'");
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    if(count($kq)>0) return $kq[0]['role'];
    else return 0;
}
function getadmininfo($email, $password)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM admin WHERE email='" . $email . "' AND password='" . $password . "'");
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}

function edit($id)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM airport WHERE id_airport='" . $id . "'" );
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}

function edit1($id)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM flight WHERE id_flight='" . $id . "'" );
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}
function edit3($id)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM schedule WHERE id='" . $id . "'" );
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}

