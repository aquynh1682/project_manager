<?php
    $xmlDoc=new DOMDocument();
    $xmlDoc->load("http://k12htht.xyz/news/commentXml.php");
    $x=$xmlDoc->getElementsByTagName('comments');
    $access;
    $color;
    $data = '<div class="card">';
    $data = '<div class="p-3">';
    $data.= '<h6>Comments('.($x->length).') </h6>';
    $data.= '</div>';
    $data.= '<p style="color:red" id = "alert"></p>';
    $data.= '<div class="mt-3 d-flex flex-row align-items-center p-3 form-color"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="50" class="rounded-circle mr-2"> <input type="text" class="form-control" id="someTextBox" placeholder="Enter your comment..."> </div>';
    for($i=0; $i<($x->length); $i++) {
        $y=$x->item($i)->getElementsByTagName('fullName');
        $z=$x->item($i)->getElementsByTagName('access');
        $e=$x->item($i)->getElementsByTagName('comment');
        $d=$x->item($i)->getElementsByTagName('like');
        if($z->item(0)->childNodes->item(0)->nodeValue == "0"){ 
            $access = "admin";
            $color = "";
        }else{
            $access = "Người dùng";
            $color = "bg-primary";
        }
            //find a link matching the search text
                $data.= '<div class="mt-2">';
                $data.=     '<div class="d-flex flex-row p-3"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="40" height="40" class="rounded-circle mr-3">';
                $data.=         '<div class="w-100">';
                $data.=             '<div class="d-flex justify-content-between align-items-center">';
                $data.=                 '<div class="d-flex flex-row align-items-center"> <span class="mr-2">'. $y->item(0)->childNodes->item(0)->nodeValue. '</span><small class="c-badge '.$color.'">'.$access.'</div></small> </div> ';
                $data.=             '</div>';
                $data.=             '<p class="text-justify comment-text mb-0">' .$e->item(0)->childNodes->item(0)->nodeValue. '</p>';
                $data.=             '<div class="d-flex flex-row user-feed"> <span class="wish"><i class="fa fa-heartbeat mr-2"></i>' .$d->item(0)->childNodes->item(0)->nodeValue. '</span> <span class="ml-3"></div>';
                $data.=         '</div>';
                $data.=     '</div>';
                $data.= '</div>';
    }
    $data .= '</div>';
    echo $data;
?>