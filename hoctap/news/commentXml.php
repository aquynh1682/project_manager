<?php 
    $conn = mysqli_connect('localhost', 'olirenwm_news', '123456a@', 'olirenwm_news');
    mysqli_set_charset($conn, 'utf8');
    $fire = mysqli_query($conn, "select * from user a join comment b on a.id = b.user_id join posts c on c.post_id = b.post_id ORDER BY comment_id DESC");
    $xml = new XMLWriter();
    $xml -> openURI("php://output");
    $xml -> startDocument();
    $xml -> setIndent(true);
    $xml -> startElement('commentss');
        while($row = mysqli_fetch_assoc($fire)){
            $xml -> startElement('comments');
                $xml -> startElement('fullName');
                $xml -> writeRaw($row['fullName']);
                $xml -> endElement();
                $xml -> startElement('access');
                $xml -> writeRaw($row['access']);
                $xml -> endElement();
                $xml -> startElement('comment');
                $xml -> writeRaw($row['comment']);
                $xml -> endElement();
                $xml -> startElement('like');
                $xml -> writeRaw($row['like']);
                $xml -> endElement();
                $xml -> startElement('date');
                $xml -> writeRaw($row['date']);
                $xml -> endElement();
                $xml -> startElement('comment_id');
                $xml -> writeRaw($row['comment_id']);
                $xml -> endElement();
                $xml -> startElement('post_id');
                $xml -> writeRaw($row['post_id']);
                $xml -> endElement();
                $xml -> startElement('id');
                $xml -> writeRaw($row['id']);
                $xml -> endElement();
                $xml -> startElement('images');
                $xml -> writeRaw($row['images']);
                $xml -> endElement();
            $xml -> endElement();
        }
    $xml -> endElement();
    header("Content-Type: application/xml; charset=utf-8");
    $xml->flush();
?>