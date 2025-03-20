<?php

$conn = mysqli_connect("localhost","root","root");

if($conn){
    echo "connection ok";
}
else{
    echo "connection error";
}

$dbname = "feedbacksystem";
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
mysqli_query($conn,$sql);
mysqli_select_db($conn,$dbname);


$sql = "CREATE table IF NOT EXISTS feedbacks(id int primary key  auto_increment,name varchar(100),branch varchar(50),semester varchar(10),subject varchar(50),q1 int,q2 int,q3 int,q4 int,q5 int,q6 int,q7 int,q8 int,q9 int,q10 int,q11 int,q12 int,q13 int)";
mysqli_query($conn,$sql);
if(isset($_POST['submit'])){
    $rating1 = $_POST['rating_q1'];
    $rating2 = $_POST['rating_q2'];
    $rating3 = $_POST['rating_q3'];
    $rating4 = $_POST['rating_q4'];
    $rating5 = $_POST['rating_q5'];
    $rating6 = $_POST['rating_q6'];
    $rating7 = $_POST['rating_q7'];
    $rating8 = $_POST['rating_q8'];
    $rating9 = $_POST['rating_q9'];
    $rating10 = $_POST['rating_q10'];
    $rating11 = $_POST['rating_q11'];
    $rating12 = $_POST['rating_q12'];
    $rating13 = $_POST['rating_q13'];
    $branch = $_POST['branch'];
    $subject = $_POST['subjects'];
    $semester = $_POST['semester'];
    $name = $_POST["name"];

    echo $rating1;
    echo $rating2;
    echo $rating3;
    echo $rating4;
    echo $rating5;
    echo $rating6;
    echo $rating7;
    echo $rating8;
    echo $rating9;
    echo $rating10;
    echo $rating11;
    echo $rating12;
    echo $rating13;

    echo $name;
    echo $semester;
    echo $branch;
    echo $subject;
    
    $sql="INSERT INTO feedbacks(name,branch,semester,subject,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13) values('$name','$branch','$semester','$subject',$rating1,$rating2,$rating3,$rating4,$rating5,$rating6,$rating7,$rating8,$rating9,$rating10,$rating11,$rating12,$rating13)";
    mysqli_query($conn,$sql);
}

?>