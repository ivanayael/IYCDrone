<?php if($message===NULL){ ?>
<h4><?=$title;?></h4>
<?php echo anchor('upload', 'Subir otra Imagen!'); ?>
<?php }else{ 
            echo '<h4>'.$title.'</h4>';
            echo $message;
            echo anchor('upload', 'Intentar con otra!'); 
      };
?>