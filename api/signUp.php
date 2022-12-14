<?php
    header("Access-Control-Allow-Origin: *");
    include("connection.php");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = hash('sha256',$_POST['password']);
    $phone = $_POST['phone'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $year = $_POST['year'];


    $dob = $year . "-" . $month . "-" . $day;
    $dobToDate = strtotime($dob);
    $dob_sql = date("Y-m-d",$dobToDate);
    $joining_date = date('Y-m-d');

    $query = $mysqli->prepare("INSERT INTO users(name, username, email, phone, password, dob, joining_date ) VALUE (?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param("sssisss", $name, $username, $email, $phone, $password, $dob_sql, $joining_date);
    $query->execute();
    $response = [];
    $response["success"] = true;

    echo json_encode($response);
?>