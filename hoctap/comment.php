<?php
    $xmlDoc=new DOMDocument();
    $xmlDoc->load("http://k12htht.xyz/loadCmt.php");
    $x=$xmlDoc->getElementsByTagName('comment');
    $data = '<div id="remove">';
    $data.= '<h1 class="comments-title">Comments('.($x->length).') </h1>';
    for($i=0; $i<($x->length); $i++) {
        $y=$x->item($i)->getElementsByTagName('userName');
        $z=$x->item($i)->getElementsByTagName('noiDung');
        $e=$x->item($i)->getElementsByTagName('dateTime');
            //find a link matching the search text
                $data.= '<div class="be-comment">';
                $data.=        '<div class="be-img-comment">';
                $data.=        '<a href="blog-detail-2.html">';
                $data.=            '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">';
                $data.=        '</a>';
                $data.=    '</div>';
                $data.= '<div class="be-comment-content">';
                $data.=        '<span class="be-comment-name" id="name">'. $y->item(0)->childNodes->item(0)->nodeValue. '</span>';
                $data.=        '<span class="be-comment-time">';
                $data.=            '<i class="fa fa-clock-o" id="time">' . $e->item(0)->childNodes->item(0)->nodeValue.'</i>';
                $data.=        '</span>';
                $data.=    '<p class="be-comment-text " id="noiDung">' .$z->item(0)->childNodes->item(0)->nodeValue. '</p>';
                $data.='</div>';
    }
    $data .= '</div>';
    echo $data;
?>