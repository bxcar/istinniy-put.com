<?php
/*
Template Name: Скачать
Template Post Type: post, page
*/
?>
<?php
get_header();

?>
    <span class="contentsp title"> </span>
    <ul class="products-menu products-menu-download">
        <li><a>Фото</a></li>
        <li><a>Аудио</a></li>
        <li><a>Скачать книгу</a></li>
        <li><a>Видео</a></li>
    </ul>
    <div class="container-download">
        <div class="row" style="width: 33%;">
            <?php
            if (get_field('photo_download', 277)) {
                foreach (get_field('photo_download', 277) as $item) { ?>
                    <a target="_blank"
                       href="<?= $item['link']; ?>"
                       class="col-md-3 col-sm-6 centered" style="z-index: 1;">
                        <div class="product-box">
                            <img src="<?= $item['img']; ?>">
                            <span class="name"><?= $item['text']; ?></span>
                        </div>
                    </a>
                <?php }
            } ?>
        </div>
        <!--<div class="row">
            <?php
/*            if (get_field('photo_download', 277)) {
                foreach (get_field('photo_download', 277) as $item) { */?>
                    <div class="col-md-3 col-sm-6 centered" style="z-index: 1;">
                        <div class="product-box">
                            <img src="<?/*= $item['img']; */?>">
                            <span class="name"><?/*= $item['text']; */?></span>
                        </div>
                    </div>
                <?php /*}
            } */?>
        </div>-->
        <!--<div class="row">
            <?php
        /*            if(get_field('photo_download', 277)) {
                        foreach(get_field('photo_download', 277) as $item) { */ ?>
                    <div class="col-md-3 col-sm-6 centered" style="z-index: 1;">
                        <div class="product-box">
                            <img src="<? /*= $item['img']; */ ?>">
                            <span class="name"><? /*= $item['text']; */ ?></span>
                        </div>
                    </div>
                <?php /*}
            } */ ?>
        </div>-->
        <!--<div class="row">
            <?php
        /*            if(get_field('photo_download', 277)) {
                        foreach(get_field('photo_download', 277) as $item) { */ ?>
                    <div class="col-md-3 col-sm-6 centered" style="z-index: 1;">
                        <div class="product-box">
                            <img src="<? /*= $item['img']; */ ?>">
                            <span class="name"><? /*= $item['text']; */ ?></span>
                        </div>
                    </div>
                <?php /*}
            } */ ?>
        </div>-->
    </div>


<?php

get_footer();