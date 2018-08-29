<?php
//Retorna o nome da imagem a ser inserida no banco de dados
 function helper_image_upload($_width, $_height, $_size, $_photo) {
     // Largura máxima em pixels
     $width = $_width;
     // Altura máxima em pixels
     $height = $_height;
     // Tamanho máximo do arquivo em bytes
     $size = $_size;        
     $error = array();        
     // Verifica se o arquivo é uma imagem
     if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $_photo["type"])){
     $error[1] = "O arquivo não é uma imagem!";
     $img_valid = false;
     }             
     // Pega as dimensões da imagem
     $dimensoes = getimagesize($_photo["tmp_name"]);            
     // Verifica se a largura da imagem é maior que a largura permitida
     if($dimensoes[0] > $width) {
         $error[2] = "A largura da imagem não deve ultrapassar ".$width." pixels";
         $img_valid = false;
     }        
     // Verifica se a altura da imagem é maior que a altura permitida
     if($dimensoes[1] > $height) {
         $error[3] = "Altura da imagem não deve ultrapassar ".$height." pixels";
         $img_valid = false;
     }
     
     // Verifica se o tamanho da imagem é maior que o tamanho permitido
     if($_photo["size"] > $size) {
         $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
         $img_valid = false;
     }

     // Se não houver nenhum erro
     if (count($error) == 0) {
     
         // Pega extensão da imagem
         preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $_photo["name"], $ext);
        
         // Gera um nome único para a imagem
         $name_img = md5(uniqid(time())) . "." . $ext[1];
        
         // Caminho de onde ficará a imagem
         $location_img = "img/classes/" . $name_img;

         // Faz o upload da imagem para seu respectivo caminho
         move_uploaded_file($_photo["tmp_name"], $location_img);  
         
         return  $name_img;                    
     }
}