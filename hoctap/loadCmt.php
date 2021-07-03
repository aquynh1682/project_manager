<?php
    $conn = mysqli_connect('localhost', 'olirenwm_htht', '123456a@', 'olirenwm_htht');
    // default_charset = "utf-8";
    mysqli_set_charset($conn, 'utf8');
    // mysqli_set_charset($conn,"utf8");
    // include('connect.php');
    $fire = mysqli_query($conn, "select * from comment");
    $xml = new XMLWriter();
    $xml -> openURI("php://output");
    $xml -> startDocument();
    $xml -> setIndent(true);
    $xml -> startElement('comments');
        while($row = mysqli_fetch_assoc($fire)){
            $xml -> startElement('comment');
                $xml -> startElement('id');
                $xml -> writeRaw($row['id']);
                $xml -> endElement();
                $xml -> startElement('userName');
                $xml -> writeRaw($row['userName']);
                $xml -> endElement();
                $xml -> startElement('email');
                $xml -> writeRaw($row['email']);
                $xml -> endElement();
                $xml -> startElement('noiDung');
                $xml -> writeRaw($row['noiDung']);
                $xml -> endElement();
                $xml -> startElement('dateTime');
                $xml -> writeRaw($row['dateTime']);
                $xml -> endElement();

            $xml -> endElement();
        }
    $xml -> endElement();

    // header('Content-type: text/xml;');
    // header('Content-Type: text/html; charset=iso-8859-1');
    // header('Content-Type: text/xml; charset=utf-8');

    header("Content-Type: application/xml; charset=utf-8");
    
    $xml->flush();
?>