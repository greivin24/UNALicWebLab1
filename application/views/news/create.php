

<div class="container">

<div class="card mt-2">
    <div class="card-header bg-dark text-white">
        <?php echo $title; ?>   
    </div>
    <div class="card-body">
        <?php echo validation_errors(); ?>
        <?php echo form_open('news/create'); ?>
            <div class="form-group">
                <label for="exampleFormControlInput1">Titulo Noticia</label>
                <input type="input" name="title" class="form-control" id="title" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Text</label>
                <textarea name="text" class="form-control" id="text" rows="3"></textarea>
            </div>
            <hr>
            <button type="submit" name="submit" class="btn btn-primary btn-block" value="Create news item">Crear</button>
        </form> 
        <a href="<?php echo site_url('news'); ?>">Regresar</a>
    </div>
    </div>

</div>




