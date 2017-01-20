<h2><?=$title?></h2>
<?php if($error): ?>
         <?=$error;?>
<?php endif; ?>
<div id="form_login" class="users">
<?=form_open_multipart('upload/do_upload');?>
<input type="file" name="userfile" size="20" /><br>
<input type="submit" value="Subir Imagen" />
</form>
</div>