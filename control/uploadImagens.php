<?php
    require_once('../util/m2brimagem.class.php');
    require_once('../util/removeAcentos.php');
 
    $pasta = "../img/livros/";
    
    /* formatos de imagem permitidos */
    $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
    
    if(isset($_POST)){
        //Removo os acentos do nome para evitar problemas
        $nome_imagem    = remove_acentos($_FILES['imgLivro']['name']); 
        $tamanho_imagem = $_FILES['imgLivro']['size'];
        
        /* pega a extensão do arquivo */
        $ext = strtolower(strrchr($nome_imagem,"."));
        
        /*  verifica se a extensão está entre as extensões permitidas */
        if(in_array($ext,$permitidos)){
            
            /* converte o tamanho para KB */
            $tamanho = round($tamanho_imagem / 1024);
            
            if($tamanho < 1024){ //se imagem for até 1MB envia
                //$nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem
                $nome_atual = $nome_imagem;
                $tmp = $_FILES['imgLivro']['tmp_name']; //caminho temporário da imagem
                
                //echo $pasta.$nome_atual;
                /* se enviar a foto, insere o nome da foto no banco de dados */
                if(move_uploaded_file($tmp,$pasta.$nome_atual)){
                    $filename = $pasta.$nome_atual;
                    $oImagem = new m2brimagem($filename);   //obj que irá manipular o redimensionamento
                    $valida = $oImagem->valida();              
                    //verifica se a imagem é valida
                    if($valida =='OK'){
                        $oImagem->redimensiona(200,250);
                        $oImagem->grava($filename);
                        echo "<img  class='img-responsive'  id='foto' src = ".$filename.">";
                    }else{
                        echo "Imagem inválida";
                        }
                }else{
                    echo "Falha ao enviar";
                }
            }else{
                echo "A imagem deve ser de no máximo 1MB";
            }
        }else{
            echo "Somente são aceitos arquivos do tipo Imagem";
        }
    }else{
        echo "Selecione uma imagem";
        exit;
    }
   
?>