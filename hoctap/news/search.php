<?php
    $xmlDoc=new DOMDocument();
    $xmlDoc->load("http://k12htht.xyz/news/searchXml.php");

    $x=$xmlDoc->getElementsByTagName('new');
    $q = $_GET['search'];
    $id = 1;
    //lookup all links from the xml file if length of q>0
    if (strlen($q)>0) {
        $hint="";
        for($i=0; $i<($x->length); $i++) {
            $y=$x->item($i)->getElementsByTagName('title');
            if ($y->item(0)->nodeType==1) {
            //find a link matching the search text
                if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
                    if ($hint=="") {
                        $hint='<a target="_blank" id="search'.($id++).'"  style="margin-left:5px; color:black" >' .$y->item(0)->childNodes->item(0)->nodeValue.'</a>';
                    } else {
                        $hint=$hint.'<br/><a target="_blank" id="search'.($id++).'" style="margin-left:5px; color:black" >' .$y->item(0)->childNodes->item(0)->nodeValue.'</a>';
                    }
                }
            }
        }
    }
    if ($hint=="") {
        $response="Không tìm thấy trong Cơ Sở Dữ Liệu";
    } else {
        $response=$hint;
    }

    //output the response
    echo $response;
?>