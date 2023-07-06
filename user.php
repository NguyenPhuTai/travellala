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
function infoschedule($id_schedule)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM schedule WHERE id =$id_schedule");
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}
function infoid($id)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM customer WHERE id_customer=$id");
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}
function infoclass($class)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM class WHERE id_class=$class");
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

function edit23($id)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM admin WHERE id_admin='" . $id . "'" );
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}
function edit24($id)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM booking_ticket WHERE pnr_number='" . $id . "'" );
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}


function edit11($id)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM airline WHERE id_airline='" . $id . "'" );
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}
function edi($id)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM transaction WHERE id_transaction='" . $id . "'" );
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}
function ed()
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT booking_ticket.pnr_number,booking_ticket.phone FROM booking_ticket, 
    transaction WHERE booking_ticket.pnr_number=transaction.pnr_number" );
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}

function e()
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT admin.id_admin,admin.name_admin FROM admin,transaction WHERE admin.id_admin=transaction.id_admin" );
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



function id_airport($add)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM airport a  WHERE a.name_airport='" . $add . "'");
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}
function id_airport_1($id)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM airport a  WHERE a.id_airport='" . $id . "'");
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}
function id_admin_1($id)
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM admin a  WHERE a.id_admin='" . $id . "'");
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}
function airport()
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM airport ");
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}

function route()
{
    $conn = connectdb();
    $abc = $conn->prepare("SELECT * FROM route Where id_route=(SELECT (MAX)id_route as LastID FROM route ) ");
    $abc->execute();
    $result = $abc->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $abc->fetchAll();
    return $kq;
}