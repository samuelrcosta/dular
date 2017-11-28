<?php
class perfilCMSController extends controller
{
    public function index(){
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '5')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        if((isset($_POST['nome']) && !empty($_POST['nome'])) && (isset($_POST['email']) && !empty($_POST['email'])) ){
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $senha2 = addslashes($_POST['senha2']);
            $u->setNome($nome);
            $u->setEmail($email);
            if(!empty($senha)){
                if($senha == $senha2)
                    $u->setSenha($senha);
            }
            header("Location: ".BASE_URL."/perfilCMS");
        }
        $dados = array(
            'titulo' => 'DuLar - Detalhes Perfil',
            'usuario' => $u,
            'tipo' => 5,
        );
        $this->loadTemplateCMS('abrirPerfilCMS', $dados);
    }

    public function alterarFoto($id){
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '5')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $foto = $_FILES["foto"];
        $id = addslashes(base64_decode(base64_decode($id)));

        function png2jpg($originalFile, $outputFile, $quality) {
            $image = imagecreatefrompng($originalFile);
            imagejpeg($image, $outputFile, $quality);
            imagedestroy($image);
        }

        if (!empty($foto["name"])) {

            // Largura máxima em pixels
            $largura = 150;
            // Altura máxima em pixels
            $altura = 180;
            // Tamanho máximo do arquivo em bytes

            $tamanho = 1000;

            $error = array();

            // Verifica se o arquivo é uma imagem
            if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
                $error[1] = "Isso não é uma imagem.";
            }

            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

            // Gera um nome único para a imagem
            $nome_imagem = "user".$id;

            // Caminho de onde ficará a imagem
            $caminho_imagem = $_SERVER['DOCUMENT_ROOT'] . SERVER_URL . "assets/media/avatar/".$nome_imagem.".jpg";

            // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);

            if($ext[1] == "png"){
                png2jpg($caminho_imagem, $caminho_imagem, 100);
            }

            $arquivo = $caminho_imagem;
            $largura = 41;
            $altura = 41;
            list($largura_original, $altura_original) = getimagesize($arquivo);
            $ratio = $largura_original / $altura_original;
            if($largura/$altura > $ratio){
                $largura = $altura*$ratio;
            }else{
                $altura = $largura/$ratio;
            }
            $imagem_final = imagecreatetruecolor($largura, $altura);
            $imagem_original = imagecreatefromjpeg($caminho_imagem);
            imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0, $largura, $altura, $largura_original, $altura_original);
            imagejpeg($imagem_final, $_SERVER['DOCUMENT_ROOT'] . SERVER_URL . "assets/media/avatar/logouser".$id.".jpg", 100);

            // Insere os dados no banco
            $u->setFoto($id, $nome_imagem);
            echo "1";
        }else{
            echo "Sem foto!";
        }
    }
}