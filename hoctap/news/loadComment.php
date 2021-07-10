<?php
    $id = $_GET['id'];
    $xmlDoc=new DOMDocument();
    $xmlDoc->load("http://k12htht.xyz/news/commentXml.php");
    $x=$xmlDoc->getElementsByTagName('comments');
    $access;
    $color;
    $total = 0;
    for($i=0; $i<($x->length); $i++){
        $q=$x->item($i)->getElementsByTagName('post_id');
        if($id == $q->item(0)->childNodes->item(0)->nodeValue){
            $total += 1;
        }
    }

    $data = '<div class="content" id = "remove">';
    $data .= '<ul class="nav nav-tabs" id="myTab" role="tablist">';
    $data.= '    <li class="nav-item">';
    $data.= '        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Bình luận ('.$total.')</a>';
    $data.= '    </li>';
    $data.= '</ul>';
    for($i=0; $i<($x->length); $i++) {
        $y=$x->item($i)->getElementsByTagName('fullName');
        $z=$x->item($i)->getElementsByTagName('access');
        $e=$x->item($i)->getElementsByTagName('comment');
        $d=$x->item($i)->getElementsByTagName('like');
        $f=$x->item($i)->getElementsByTagName('date');
        $g=$x->item($i)->getElementsByTagName('comment_id');
        $q=$x->item($i)->getElementsByTagName('post_id');
        $r=$x->item($i)->getElementsByTagName('id');
        $n=$x->item($i)->getElementsByTagName('images');
        if($z->item(0)->childNodes->item(0)->nodeValue == "0"){ 
            $access = "admin";
            $color = "";
        }else{
            $access = "Người dùng";
            $color = "bg-primary";
        }
        if($id == $q->item(0)->childNodes->item(0)->nodeValue){
            $data .= '<div class="mt-2">';
            $data .= '    <div class="d-flex flex-row p-3">';
            if($n->item(0)->childNodes->item(0)->nodeValue != ""){
                $data.= '<img src="./uploads/'.$n->item(0)->childNodes->item(0)->nodeValue.'" width="40" height="40" class="rounded-circle mr-3">';
            }else{
                $data.= '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="40" height="40" class="rounded-circle mr-3">';
            }
            $data .= '        <div class="w-100">';
            $data .= '            <div class="d-flex justify-content-between align-items-center">';
            $data .= '                <div class="d-flex flex-row align-items-center"> <span class="mr-2">'. $y->item(0)->childNodes->item(0)->nodeValue. '</span> <small class="c-badge '.$color.'">'.$access.'</small> </div><small>'.$f->item(0)->childNodes->item(0)->nodeValue.'</small>';
            $data .= '            </div>';
            $data .= '            <p class="text-justify comment-text mb-0">' .$e->item(0)->childNodes->item(0)->nodeValue. '</p>';
            $data .= '            <div class="d-flex flex-row user-feed" id = "item"> <span name="like" class="wish"><i id="alo" class="far fa-thumbs-up mr-2" name="'. $g->item(0)->childNodes->item(0)->nodeValue. '"></i>' .$d->item(0)->childNodes->item(0)->nodeValue. '</span>  </div>';
            $data .= '        </div>';
            $data .= '    </div>';
            $data .= '</div>';
        }
    }
    $data .='</div>';
    echo $data;
?>