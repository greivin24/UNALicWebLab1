

<div class="container">
    <div class="card mt-2">
            <div class="card-header bg-dark text-white">
                <?php echo $title; ?>
            </div>
            <div class="card-body">
            <div class="row">
                    <div class="col-2">
                    <img src="<?php echo base_url('./imgNoticias/'.$news_item['img']) ?>" alt="Noticia.png" class="img-thumbnail" style="width: 100px;height:100px;">
                    </div>
                    <div class="col">
                        <p class="card-text"><?php echo $news_item['text']; ?></p>
                    </div>
                </div>
                <a href="<?php echo site_url('news'); ?>">Regresar</a>
            </div>
        </div>
</div>

