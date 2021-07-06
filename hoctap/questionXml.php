<?php 
    $conn = mysqli_connect('localhost', 'olirenwm_htht', '123456a@', 'olirenwm_htht');
    mysqli_set_charset($conn, 'utf8');
    $fire = mysqli_query($conn, "select * from question");
    $xml = new XMLWriter();
    $xml -> openURI("php://output");
    $xml -> startDocument();
    $xml -> setIndent(true);
    $xml -> startElement('Question');
        while($row = mysqli_fetch_assoc($fire)){
            $xml -> startElement('questions');
                $xml -> startElement('question');
                $xml -> writeRaw($row['question']);
                $xml -> endElement();
            $xml -> endElement();
        }
    $xml -> endElement();
    // header('Content-type: text/xml');
    header("Content-Type: application/xml; charset=utf-8");
    $xml->flush();
?>