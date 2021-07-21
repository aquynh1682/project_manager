<?php 
    $conn = mysqli_connect('localhost', 'olirenwm_news', '123456a@', 'olirenwm_news');
    mysqli_set_charset($conn, 'utf8');
    $fire = mysqli_query($conn, "Select * from posts");
    $xml = new XMLWriter();
    $xml -> openURI("php://output");
    $xml -> startDocument();
    $xml -> setIndent(true);
    $xml -> startElement('news');
        while($row = mysqli_fetch_assoc($fire)){
            $xml -> startElement('new');
                $xml -> startElement('title');
                $xml -> writeRaw($row['title']);
                $xml -> endElement();
            $xml -> endElement();
        }
    $xml -> endElement();
    header("Content-Type: application/xml; charset=utf-8");
    $xml->flush();
?>