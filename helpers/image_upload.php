<?php
   
   /*
    *Faz upload e redimensionamento da imagem 
    *@Params:
    * 1- Largura maxima da imagem
    * 2- Altura maxima da imagem
    * 3- A imagem enviada
    * 4- Nome unico gerado para a imagem
    * 5- O direitório onde será salvo a imagem    
    */
   function helper_image_upload($width_, $height_, $photo_, $name_img_, $dir_) {       
        // O arquivo. Dependendo da configuração do PHP pode ser uma URL.  
        $photo = $photo_;
        $filename = $photo['tmp_name'];   
        $width = $width_;
        $height = $height_;
        $name_img = $name_img_;
        $dir = $dir_;   
        // Obtendo o tamanho original
        list($width_orig, $height_orig) = getimagesize($filename);

        // Calculando a proporção
        $ratio_orig = $width_orig/$height_orig;

        if ($width/$height > $ratio_orig) {
            $width = $height*$ratio_orig;
        } else {
            $height = $width/$ratio_orig;
        }
        // Fazendo o resize e gerando uma nova imagem
        $image_p = imagecreatetruecolor($width, $height);
        $image = @imagecreatefromjpeg($filename);
        @imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);   
                
        // Caminho de onde ficará a imagem
        $location_img = $dir . $name_img;
        
        // Salvando a imagem em arquivo:  
        imagejpeg($image_p, $location_img, 100);   
}
