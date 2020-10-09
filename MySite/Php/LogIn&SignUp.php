<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Message = $_POST['Message'];

    if(!( isset($Name))){
        print("Please, you must determine your Name.");
    
    }elseif(!(isset($Message))){
        print("Please, specify what you want to send to me to be happy with.");

    }else{
        $conn = new mysqli("localhost","root","","my_site_db") or die('Unable to connect..!');

        $sql = "INSERT INTO mybook ( Name, Email, Message ) VALUES ('$Name', '$Email', '$Message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}

print ("Thank $Name. Your message has been sent successfully.");}

$conn->close();


}else{

    echo 'Error: You Can\'t Brwose This Page Directly. ';

}



?>