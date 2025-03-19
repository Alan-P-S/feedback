<?php

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
}

?>