<?php 
if(isset($_GET['cid'])){
    $category_qry = $conn->query("SELECT * FROM `category_list` where `id` = '{$_GET['cid']}'");
    if($category_qry->num_rows > 0){
        foreach($category_qry->fetch_assoc() as $k => $v){
            $cat[$k] = $v; 
        }
    }
}
?>

<div class="background-image parallax items-banner">
</div>
<div class="col-12 content-overlap">
    <div class="card">
        <div class="card-body pt-4">
            <div class="container-fluid page-content">
                <h1 class="pageTitle text-left">Lost and Found Items</h1>
                <p class="about-mission text-left">Discover and recover lost items with ease. Browse through our categories to find your lost belongings.</p>
                <hr class="my-4">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                        <div class="list-group">
                            <?php if($_GET['page'] == 'items'): ?>
                                <a href="<?= base_url.'?page=items'?>" class="list-group-item <?= !(isset($_GET['cid'])) ? 'active': '' ?>">All</a>
                            <?php endif; ?>
                            <?php 
                            $qry = $conn->query("SELECT * FROM `category_list` where `status` = 1 ");
                            while($row = $qry->fetch_assoc()):
                            ?>
                                <a href="<?= base_url.'?page=items&cid='.$row['id'] ?>" class="list-group-item list-group-item-action<?= (isset($_GET['cid']) && $_GET['cid'] == $row['id']) ? ' active': '' ?>"><?= $row['name'] ?></a>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-12">
                        <?php if(isset($cat['name'])): ?>
                            <h3 class="titleTxt"><?= $cat['name'] ?></h3>
                        <?php endif; ?>
                        <?php if(isset($cat['description'])): ?>
                            <div><?= str_replace("\n", "<br>", htmlspecialchars_decode($cat['description'])) ?></div>
                        <?php endif; ?>
                        <?php 
                        $where = "";
                        if(isset($cat['id'])){
                            $where = " and `category_id` = '{$cat['id']}'";
                        }
                        $items = $conn->query("SELECT * FROM `item_list` where `status` = 1 {$where} order by `title` asc")->fetch_all(MYSQLI_ASSOC);
                        ?>
                        <div id="item-list">
                            <?php if(count($items) > 0): ?>
                            <?php foreach($items as $row): ?>
                                <a href="<?= base_url.'?page=items/view&id='.$row['id'] ?>" class="item-item text-decoration-none text-reset">
                                    <div class="card mb-3 item-card">
                                        <div class="row no-gutters">
                                            <div class="col-md-4 item-card-img">
                                                <img src="<?= validate_image($row['image_path']) ?>" class="card-img" alt="<?= $row['title'] ?>">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $row['title'] ?></h5>
                                                    <p class="card-text truncate-3"><?= strip_tags(htmlspecialchars_decode($row['description'])) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <?php if(count($items) <= 0): ?>
                            <div class="text-muted text-center">No item Listed Yet</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
