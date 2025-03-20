<?php
require 'vendor/autoload.php'; // Include PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Database connection
$mysqli = new mysqli("localhost", "root", "root", "feedbacksystem");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if(isset($_POST['get'])){
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $subject = $_POST['subjects'];

// Query data
$query = "SELECT * FROM feedbacks where branch='$branch' AND semester = '$semester' AND subject='$subject'";
$result = $mysqli->query($query);

// Create new spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Add headers to the Excel sheet
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Name');
$sheet->setCellValue('C1', 'branch');
$sheet->setCellValue('D1', 'semester');
$sheet->setCellValue('E1', 'subject');
$sheet->setCellValue('F1', 'q1');
$sheet->setCellValue('G1', 'q2');
$sheet->setCellValue('H1', 'q3');
$sheet->setCellValue('I1', 'q4');
$sheet->setCellValue('J1', 'q5');
$sheet->setCellValue('K1', 'q6');
$sheet->setCellValue('L1', 'q7');
$sheet->setCellValue('M1', 'q8');
$sheet->setCellValue('N1', 'q9');
$sheet->setCellValue('O1', 'q10');
$sheet->setCellValue('P1', 'q11');
$sheet->setCellValue('Q1', 'q12');
$sheet->setCellValue('R1', 'q13');


// Add data rows
$rowNumber = 2; // Start adding data from the second row
while ($row = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $rowNumber, $row['id']);
    $sheet->setCellValue('B' . $rowNumber, $row['name']);
    $sheet->setCellValue('C' . $rowNumber, $row['branch']);
    $sheet->setCellValue('D' . $rowNumber, $row['semester']);
    $sheet->setCellValue('E' . $rowNumber, $row['subject']);
    $sheet->setCellValue('F' . $rowNumber, $row['q1']);
    $sheet->setCellValue('G' . $rowNumber, $row['q2']);
    $sheet->setCellValue('H' . $rowNumber, $row['q3']);
    $sheet->setCellValue('I' . $rowNumber, $row['q4']);
    $sheet->setCellValue('J' . $rowNumber, $row['q5']);
    $sheet->setCellValue('K' . $rowNumber, $row['q6']);
    $sheet->setCellValue('L' . $rowNumber, $row['q7']);
    $sheet->setCellValue('M' . $rowNumber, $row['q8']);
    $sheet->setCellValue('N' . $rowNumber, $row['q9']);
    $sheet->setCellValue('O' . $rowNumber, $row['q10']);
    $sheet->setCellValue('P' . $rowNumber, $row['q11']);
    $sheet->setCellValue('Q' . $rowNumber, $row['q2']);
    $sheet->setCellValue('R' . $rowNumber, $row['q13']);
    $rowNumber++;
}

// Export to Excel file
$writer = new Xlsx($spreadsheet);
$filename = 'users_data.xlsx';

// Send file as a download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Save the file to output
$writer->save('php://output');



// Close database connection
$mysqli->close();

}

else if(isset($_POST['delete'])){
        $branch = $_POST['branch'];
        $semester = $_POST['semester'];
        $subject = $_POST['subjects'];
    
    // Query data
    $query = "DELETE FROM feedbacks where branch='$branch' AND semester = '$semester' AND subject='$subject'";
    $result = $mysqli->query($query);
}
