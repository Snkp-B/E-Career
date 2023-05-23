<?php
    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $domain = $_POST['domain'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'major_project');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into registration(fullName, phoneNumber, email, domain, password, confirmPassword) values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sissss",$fullName, $phoneNumber, $email, $domain, $password, $confirmPassword);
        $stmt->execute();
        echo "Registration Successfull...";
        $stmt->close();
        $conn->close();
    }
?>