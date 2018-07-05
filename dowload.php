<?php
/*
Template Name: Скачать
Template Post Type: post, page
*/
?>
<?php
get_header();

?>
    <!--<span class="contentsp title"> </span>
    <ul class="products-menu products-menu-download">
        <li><a>Фото</a></li>
        <li><a>Аудио</a></li>
        <li><a>Скачать книгу</a></li>
        <li><a>Видео</a></li>
    </ul>-->
    <div class="container-download">
        <div class="row row-photo">
            <h2 class="dwn-title">Фото</h2>
            <?php
            if (get_field('photo_download', 277)) {
                foreach (get_field('photo_download', 277) as $item) { ?>
                    <a target="_blank"
                       href="<?= $item['link']; ?>" style="z-index: 1;">
                        <div class="product-box">
                            <img src="<?= $item['img']; ?>">
                            <span><?= $item['text']; ?></span>
                        </div>
                    </a>
                <?php }
            } ?>
        </div>
        <div class="row row-audio">
            <h2 class="dwn-title">Аудио</h2>
            <script>
                var a = audiojs;
                a.events.ready(function () {
                    var a1 = a.createAll();
                });
            </script>
            <?php
            if (get_field('audio_download', 277)) {
                foreach (get_field('audio_download', 277) as $item) { ?>
                    <audio src="<?= $item['link']; ?>"
                           preload="auto"></audio>
                    <div class="audio-download-desc">
                        <span class="audio-download-desc-name"><?= $item['text']; ?></span>
                        <a class="audio-download-desc-link" href="<?= $item['link']; ?>">Скачать</a>
                    </div>
                <?php }
            } ?>
        </div>
        <div class="row row-winrar row-winrar-1">
            <h2 class="dwn-title">Скачать книгу</h2>
            <?php
            if (get_field('book_download', 277)) {
                foreach (get_field('book_download', 277) as $item) { ?>
                    <a target="_blank"
                       href="<?= $item['link']; ?>"
                       class="winrar-dwn-link" style="z-index: 1;">
                        <img src="<?= $item['img']; ?>">
                        <span><?= $item['text']; ?></span>
                    </a>
                <?php }
            } ?>
        </div>
        <div class="row row-winrar">
            <h2 class="dwn-title">Видео</h2>
            <?php
            if (get_field('video_download', 277)) {
                foreach (get_field('video_download', 277) as $item) { ?>
                    <a target="_blank"
                       href="<?= $item['link']; ?>"
                       class="winrar-dwn-link" style="z-index: 1;">
                        <img src="<?= $item['img']; ?>">
                        <span><?= $item['text']; ?></span>
                    </a>
                <?php }
            } ?>
        </div>
    </div>


<?php

get_footer();