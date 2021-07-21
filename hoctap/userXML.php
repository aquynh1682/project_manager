<?php
    $conn = mysqli_connect('localhost', 'olirenwm_htht', '123456a@', 'olirenwm_htht');
    $fire = mysqli_query($conn, "select * from user");
    $xml = new XMLWriter();
    $xml -> openURI("php://output");
    $xml -> startDocument();
    $xml -> setIndent(true);
    $xml -> startElement('users');
        while($row = mysqli_fetch_assoc($fire)){
            $xml -> startElement('user');
                $xml -> startElement('id');
                $xml -> writeRaw($row['id']);
                $xml -> endElement();
                $xml -> startElement('name');
                $xml -> writeRaw($row['name']);
                $xml -> endElement();
                $xml -> startElement('email');
                $xml -> writeRaw($row['email']);
                $xml -> endElement();
                $xml -> startElement('phone');
                $xml -> writeRaw($row['phone']);
                $xml -> endElement();
                $xml -> startElement('userName');
                $xml -> writeRaw($row['userName']);
                $xml -> endElement();
            $xml -> endElement();
        }
    $xml -> endElement();
    header('Content-type: text/xml');
    $xml->flush();
?>