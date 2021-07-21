<?php
    $conn = mysqli_connect('localhost', 'olirenwm_htht', '123456a@', 'olirenwm_htht');
    $fire = mysqli_query($conn, "select * from news");
    $xml = new XMLWriter();
    $xml -> openURI("php://output");
    $xml -> startDocument();
    $xml -> setIndent(true);
    $xml -> startElement('news');
        while($row = mysqli_fetch_assoc($fire)){
            $xml -> startElement('news');
                $xml -> startElement('id');
                $xml -> writeRaw($row['id']);
                $xml -> endElement();
                $xml -> startElement('title');
                $xml -> writeRaw($row['title']);
                $xml -> endElement();
                $xml -> startElement('content');
                $xml -> writeRaw($row['content']);
                $xml -> endElement();
                $xml -> startElement('author');
                $xml -> writeRaw($row['author']);
                $xml -> endElement();
                $xml -> startElement('status');
                $xml -> writeRaw($row['status']);
                $xml -> endElement();
            $xml -> endElement();
        }
    $xml -> endElement();
    header('Content-type: text/xml');
    $xml->flush();
?>