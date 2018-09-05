<?php

/*
*Faz upload da imaem e retorna o nome para ser inserida no banco de dados
*@Params:
* 1- Largura maxima da imagem
* 2- Altura maxima da imagem
* 3- Tamanho maximo da imagem em bytes
* 4- A imagem enviada 
* 5- O caminho aonde será salvo a imagem
*/
 function helper_image_upload($width_, $height_, $size_, $photo_, $dir_) {
     // Largura máxima em pixels
     $width = $width_;
     // Altura máxima em pixels
     $height_ = $height_;
     // Tamanho máximo do arquivo em bytes
     $size = $size_;    
     $dir = $dir_;    
     $error = array();        
     // Verifica se o arquivo é uma imagem
     if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $photo_["type"])){
     $error[1] = "O arquivo não é uma imagem!";
     $img_valid = false;
     }             
     // Pega as dimensões da imagem
     $dimensoes = getimagesize($photo_["tmp_name"]);            
     // Verifica se a largura da imagem é maior que a largura permitida
     if($dimensoes[0] > $width) {
         $error[2] = "A largura da imagem não deve ultrapassar ".$width." pixels";
         $img_valid = false;
     }        
     // Verifica se a altura da imagem é maior que a altura permitida
     if($dimensoes[1] > $height_) {
         $error[3] = "Altura da imagem não deve ultrapassar ".$height_." pixels";
         $img_valid = false;
     }
     
     // Verifica se o tamanho da imagem é maior que o tamanho permitido
     if($photo_["size"] > $size) {
         $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
         $img_valid = false;
     }

     // Se não houver nenhum erro
     if (count($error) == 0) {
     
         // Pega extensão da imagem
         preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $photo_["name"], $ext);
        
         // Gera um nome único para a imagem
         $name_img = md5(uniqid(time())) . "." . $ext[1];
        
         // Caminho de onde ficará a imagem
         $location_img = $dir . $name_img;

         // Faz o upload da imagem para seu respectivo caminho
         move_uploaded_file($photo_["tmp_name"], $location_img);  
         
         return  $name_img;                    
     }
}