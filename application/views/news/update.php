

<div class="container">

<div class="card mt-2">
    <div class="card-header bg-dark text-white">
        <?php echo $title; ?>   
    </div>
    <div class="card-body">
        <?php echo form_open_multipart('news/update/'.$news_item['id']); ?>
            <div class="form-group">
                <label for="exampleFormControlInput1">Titulo Noticia</label>
                <input type="input" name="title" class="form-control" id="title" placeholder="Nombre" value="<?php echo $news_item['title']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Text</label>
                <textarea name="text" class="form-control" id="text" rows="3"><?php echo $news_item['text']; ?></textarea>
            </div>

            <div class="row">
                <div class="col-6"> 
                    <input type="file" name="upload" id="upload">    
                </div>
                <div class="col-6">
                    <h4>Imagen Actual</h4>
                    <img class="media-object dp img-circle" src="<?php echo base_url('./imgNoticias/'.$news_item['img']) ?>" alt="ImagenNoticia" style="width: 100px;height:100px;">   
                </div>
                
            </div>

            <hr>
            <button type="submit" name="submit" class="btn btn-warning btn-block" value="Create news item">Actualizar</button>
        </form> 
        <a href="<?php echo site_url('news'); ?>">Regresar</a>
    </div>
    </div>
</div>




