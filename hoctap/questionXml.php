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
                $xml -> startElement('id');
                $xml -> writeRaw($row['id']);
                $xml -> endElement();
                $xml -> startElement('id_mon');
                $xml -> writeRaw($row['id_mon']);
                $xml -> endElement();
                $xml -> startElement('question');
                $xml -> writeRaw($row['question']);
                $xml -> endElement();
                $xml -> startElement('question_a');
                $xml -> writeRaw($row['question_a']);
                $xml -> endElement();
                $xml -> startElement('question_b');
                $xml -> writeRaw($row['question_b']); 
                $xml -> endElement();
                $xml -> startElement('question_c');
                $xml -> writeRaw($row['question_c']);
                $xml -> endElement();
                $xml -> startElement('question_d');
                $xml -> writeRaw($row['question_d']);
                $xml -> endElement();
                $xml -> startElement('answer');
                $xml -> writeRaw($row['answer']);
                $xml -> endElement();
            $xml -> endElement();
        }
    $xml -> endElement();
    header('Content-type: text/xml');
    $xml->flush();
?>