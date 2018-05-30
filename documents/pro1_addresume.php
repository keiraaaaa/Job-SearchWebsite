<?php 
include 'vendor/autoload.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobhunter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Parse pdf file and build necessary objects.
$parser = new \Smalot\PdfParser\Parser();
$pdf    = $parser->parseFile('C:/Users/Yutong Liu/OneDrive/nyu/database/Project/cv_sally.pdf');
$pdf2    = $parser->parseFile('C:/Users/Yutong Liu/OneDrive/nyu/database/Project/cv_john.pdf');
$pdf3   = $parser->parseFile('C:/Users/Yutong Liu/OneDrive/nyu/database/Project/cv_elise.pdf');
$pdf4    = $parser->parseFile('C:/Users/Yutong Liu/OneDrive/nyu/database/Project/cv_mary.pdf');
$pdf5    = $parser->parseFile('C:/Users/Yutong Liu/OneDrive/nyu/database/Project/cv_jake.pdf');
$pdf6    = $parser->parseFile('C:/Users/Yutong Liu/OneDrive/nyu/database/Project/cv_carly.pdf');
$text = $pdf->getText();
$text2 = $pdf2->getText();
$text2 = str_replace("'", "", $text2);
$text3 = $pdf3->getText();
$text3 = str_replace("'", "", $text4);
$text4 = $pdf4->getText();
$text5 = str_replace("'", "", $text5);
$text5 = $pdf5->getText(); 
$text5 = str_replace("'", "", $text5);
$text6 = $pdf6->getText();
$text6 = str_replace("'", "", $text6);


$sql = "INSERT INTO ResumeInfo (sid, sresumeaddr, resumecontent)
VALUES ('S001', 'C:/Users/Yutong Liu/OneDrive/nyu/database/Project/cv_sally.pdf', '$text')";
$sql2 = "INSERT INTO ResumeInfo (sid, sresumeaddr, resumecontent)
VALUES ('S002', 'C:/Users/Yutong Liu/OneDrive/nyu/database/Project/cv_john.pdf', '$text2')";
$sql3 = "INSERT INTO ResumeInfo (sid, sresumeaddr, resumecontent)
VALUES ('S003', 'C:/Users/Yutong Liu/OneDrive/nyu/database/Project/cv_elise.pdf', '$text3')";
$sql4 = "INSERT INTO ResumeInfo (sid, sresumeaddr, resumecontent)
VALUES ('S004', 'C:/Users/Yutong Liu/OneDrive/nyu/database/Project/cv_mary.pdf', '$text4')";
$sql5 = "INSERT INTO ResumeInfo (sid, sresumeaddr, resumecontent)
VALUES ('S005', 'C:/Users/Yutong Liu/OneDrive/nyu/database/Project/cv_jake.pdf', '$text5')";
$sql6 = "INSERT INTO ResumeInfo (sid, sresumeaddr, resumecontent)
VALUES ('S006', 'C:/Users/Yutong Liu/OneDrive/nyu/database/Project/cv_carly.pdf', '$text6')";

echo "<br>"."<br>";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: ". $sql . "<br>" . $conn->error;
}
if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: ". $sql2 . "<br>" . $conn->error;
}
if ($conn->query($sql3) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: ". $sql3 . "<br>" . $conn->error;
}
if ($conn->query($sql4) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: ". $sql4 . "<br>" . $conn->error;
}
if ($conn->query($sql5) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: ". $sql5 . "<br>" . $conn->error;
}
if ($conn->query($sql6) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: ". $sql6 . "<br>" . $conn->error;
}

$conn->close();

?>

