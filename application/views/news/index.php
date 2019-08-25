
<div class="container mt-3">

<?php if(!empty($this->session->userdata('msg'))){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> '. $this->session->userdata('msg') .'</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }  
?>




    <h2><?php echo $title; ?></h2>

    <div>
        <a class="btn btn-sm btn-success" href="<?php echo site_url('news/create'); ?>">Nueva Noticia</a>
    </div>

    <?php foreach ($news as $news_item) : ?>


        <div class="card mt-2">
            <div class="card-header bg-dark text-white">
                <a class="btn btn-sm btn-warning" href="<?php echo site_url('news/update/'.$news_item['id']);?>">Actializar</a>
                <?php echo $news_item['title']; ?> 
                <a title="Borrar Noticia" href="<?php echo site_url('news/delete/'.$news_item['id']);?>" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                    <img src="<?php echo base_url('./imgNoticias/'.$news_item['img']) ?>" alt="Noticia.png" class="img-thumbnail" style="width: 100px;height:100px;">
                    </div>
                    <div class="col">
                        <p class="card-text"><?php echo $news_item['text']; ?></p>
                        <a href="<?php echo site_url('news/' . $news_item['id']); ?>">Ver noticia..</a>
                    </div>
                </div>
                
            </div>
        </div>


    <?php endforeach; ?>
</div>