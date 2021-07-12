<?php 
    $conn = mysqli_connect('localhost', 'olirenwm_htht', '123456a@', 'olirenwm_htht');
    mysqli_set_charset($conn, 'utf8');
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
                $xml -> startElement('password');
                $xml -> writeRaw($row['password']);
                $xml -> endElement();
                $xml -> startElement('gioiTinh');
                $xml -> writeRaw($row['gioiTinh']);
                $xml -> endElement();
                $xml -> startElement('access');
                $xml -> writeRaw($row['access']);
                $xml -> endElement();
            $xml -> endElement();
        }
    $xml -> endElement();
    header('Content-type: text/xml');
    $xml->flush();
?>