<?php 
include 'vendor/autoload.php';

function resumeLoad_update($sid, $sresumeaddr) {
    // Parse pdf file and build necessary objects.
    $parser = new Smalot\PdfParser\Parser();
    $pdf    = $parser->parseFile($sresumeaddr);

    $text = $pdf->getText();
    $text = str_replace("'", "", $text);

    $sql = "update ResumeInfo
            set resumecontent='$text'
            where sid='$sid' and sresumeaddr='$sresumeaddr'";
    // $sql = "INSERT INTO ResumeInfo (sid, sresumeaddr, resumecontent)
    // VALUES ('$sid', '$sresumeaddr', '$text')";
    return $sql;
}

function resumeLoad_insert($sid, $sresumeaddr) {
    // Parse pdf file and build necessary objects.
    $parser = new Smalot\PdfParser\Parser();
    $pdf    = $parser->parseFile($sresumeaddr);

    $text = $pdf->getText();
    $text = str_replace("'", "", $text);

    $sql = "INSERT INTO ResumeInfo (sid, sresumeaddr, resumecontent) VALUES ('$sid', '$sresumeaddr', '$text')";
    return $sql;
}

?>

