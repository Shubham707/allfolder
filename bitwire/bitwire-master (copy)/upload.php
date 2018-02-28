<?php 
echo $_FILES["uploadbox"]["tmp_name"];
echo $_FILES["uploadbox"]["name"]);
?>
<input type="file" name="arquivo" id="simpleUpload" multiple >
<button type="button" id="enviar">Enviar</button>
<script>
    $(document).ready(function(){
        $('#simpleUpload').simpleUpload({
            url: 'upload.php',
            trigger: '#enviar',
            success: function(data){
                alert('Envio com sucesso');
            }
        });
    });
</script>