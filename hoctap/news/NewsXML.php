<?php 
    $conn = mysqli_connect('localhost', 'olirenwm_news', '123456a@', 'olirenwm_news');
    mysqli_set_charset($conn, 'utf8');
    $fire = mysqli_query($conn, "select * from posts");
    $xml = new XMLWriter();
    $xml -> openURI("php://output");
    $xml -> startDocument('1.0', 'UTF-8');
    $xml -> endDocument();
    $xml -> setIndent(1);
    $xml ->startElement('rss');
    $xml ->writeAttribute('version', '2.0');
    $xml ->writeAttribute('xmlns:atom', 'http://www.w3.org/2005/Atom');
    $xml -> startElement('news');
        while($row = mysqli_fetch_assoc($fire)){
            $xml -> startElement('new');
                $xml -> startElement('post_id');
                $xml -> writeRaw($row['post_id']);
                $xml -> endElement();
                $xml -> startElement('category_id');
                $xml -> writeRaw($row['category_id']);
                $xml -> endElement();
                $xml -> startElement('title');
                $xml -> writeRaw($row['title']);
                $xml -> endElement();
                $xml -> startElement('content');
                $xml -> writeCdata($row['content']);
                $xml -> endElement();
                $xml -> startElement('image');
                $xml -> writeRaw($row['image']);
                $xml -> endElement();
                $xml -> startElement('createdate');
                $xml -> writeRaw($row['createdate']);
                $xml -> endElement();
            $xml -> endElement();
        }
    $xml -> endElement();
    $xml -> endElement();
    header("Content-Type: application/xml; charset=utf-8");
    $xml->flush();
?>