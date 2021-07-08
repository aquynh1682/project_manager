<?php
    $link = '';
    $where = '';
    if(isset($_GET['cat'])){
        $cat = intval($_GET['cat']);
        if($cat != 0)
            $where = "WHERE category_id = $cat";
    }
    
    $sql = "SELECT count(*) FROM posts $where";
    $total_records = $homelib->get_row_number($sql);

    $limit = 5;

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    $total_page = ceil($total_records / $limit);
    $total_limit = $limit + 6;
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1) {
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;

    $sql = "SELECT * FROM posts $where ORDER BY createdate DESC LIMIT $start, $limit";
    $data = $homelib->get_list($sql);
    $sql1 = "SELECT * FROM posts $where ORDER BY createdate DESC LIMIT 6, 12";
    $data1 = $homelib->get_list($sql1);
?>

<div class="container">
        <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <img class="card-img-top" src="images/<?php echo $data[0]['image'];?>" height="450px" width="800px" alt="Card image cap">
                <div class="card-body">
                    <div class="small text-muted"><?php echo$data[0]['createdate']; ?></div>
                    <h2 class="card-title"><?php echo $data[0]['title'];?></h2>
                    <p class="card-text"><?php echo substr($data[0]['content'], 0, 200).'...';?></p>
                    <a href="hotNews.php?id=<?php echo $data[0]['post_id']; ?>" class="btn btn-primary">Xem tin &rarr;</a>
                </div>
            </div>
                    
            
            <div class="row">
                <div class="col-lg-6">
                    <?php for ($i = 1; $i < count($data); $i+=2){ ?>
                                <div class="card mb-4">
                                    <img class="card-img-top" src="images/<?php echo $data[$i]['image'];?>" height="220px" width="120px" alt="Card image cap">
                                    <div class="card-body">
                                        <div class="small text-muted"><?php echo$data[$i]['createdate']; ?></div>
                                        <h2 class="card-title"><?php echo $data[$i]['title'];?></h2>
                                        <p class="card-text"><?php echo substr($data[$i]['content'], 0, 100).'...';?></p>
                                        <a href="hotNews.php?id=<?php echo $data[$i]['post_id']; ?>" class="btn btn-primary">Xem tin &rarr;</a>
                                    </div>
                                </div>
                    <?php } ?>
                </div>
                    <div class="col-lg-6">
                        <?php for ($i = 2; $i < count($data); $i+=2){ ?>
                            <div class="card mb-4">
                                <img class="card-img-top" src="images/<?php echo $data[$i]['image'];?>" height="220px" width="120px" alt="Card image cap">
                                <div class="card-body">
                                    <div class="small text-muted"><?php echo$data[$i]['createdate']; ?></div>
                                    <h2 class="card-title"><?php echo $data[$i]['title'];?></h2>
                                    <p class="card-text"><?php echo substr($data[$i]['content'], 0, 100).'...';?></p>
                                    <a href="hotNews.php?id=<?php echo $data[$i]['post_id']; ?>" class="btn btn-primary">Xem tin &rarr;</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
            </div>
        <ul class="pagination">
                    <?php 
                    if ($current_page > 1 && $total_page > 1){
                        echo '<li class="page-item"><a class="page-link" href="news.php?'.$link.'page='.($current_page-1).'">Prev</a></li>';
                    }
                    
                    for ($i = 1; $i <= $total_page; $i++) {
                        
                        if ($current_page == $i)
                            echo '<li class="page-item disabled"><a class="page-link" href="#">'.$i.'</a></li>';
                        else
                            echo '<li class="page-item"><a class="page-link" href="news.php?'.$link.'page='.$i.'">'.$i.'</a></li>';
                    }
                    
                    if ($current_page < $total_page && $total_page > 1){
                        echo '<li class="page-item"><a class="page-link" href="news.php?'.$link.'page='.($current_page+1).'">Next</a></li>';
                    }
                    
                    ?>
                </ul>
            <!-- Pagination-->
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4" id="slidebar">
            <!-- Search widget-->
            <div class="card mb-4" >
                <div class="card-header">Tìm Kiếm</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4" >
                <div class="card-header">Tin cũ hơn</div>
                <div class="card-body">
                    <div class="list-group">
                        <?php for($i = 6; $i < 12; $i++) {?>
                            <a href="hotNews.php?id=<?php echo $data1[$i]['post_id']; ?>" class="list-group-item list-group-item-action"><?php echo $data1[$i]['title'];?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
        </div>
    </div>
</div>