<?php
require 'PHPMailer-master/PHPMailerAutoload.php';

class Orcamentos extends model{
    public function getOrcamentos($pagina, $limite){
        $p = ($pagina - 1) * $limite;
        $sql = $this->db->prepare("SELECT * FROM orcamentos ORDER BY id DESC LIMIT ".$p.",  ".$limite." ");
        $sql->execute();
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getTotalOrcamentos(){
        $sql = $this->db->prepare("SELECT id FROM orcamentos");
        $sql->execute();
        $sql = $sql->rowCount();
        return $sql;
    }

    public function getOrcamento($id){
        $sql = $this->db->prepare("SELECT * FROM orcamentos WHERE id = ? ORDER BY id DESC");
        $sql->execute(array($id));
        $sql = $sql->fetch();
        return $sql;
    }

    public function getOrcamentoProdutos($id){
        $sql = $this->db->prepare("
        SELECT *,
        (SELECT categorias.nome FROM categorias WHERE categorias.id = produtos.categoria limit 1) as NomeCategoria
        FROM orcamentos_prod
        LEFT JOIN produtos 
        ON produtos.id = orcamentos_prod.produto_id
        WHERE orcamento_id = ?
        ");
        $sql->execute(array($id));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function pesquisarOrcamentos($termo, $pagina, $limite){
        $p = ($pagina - 1) * $limite;
        $sql = $this->db->prepare("SELECT * FROM orcamentos WHERE nome LIKE ? OR email LIKE ? ORDER BY id DESC LIMIT ".$p.",  ".$limite." ");
        $sql->execute(array("%".strtolower($termo)."%", "%".strtolower($termo)."%"));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function pesquisaOrcamentos($termo){
        $sql = $this->db->prepare("SELECT * FROM orcamentos WHERE nome LIKE ? OR email LIKE ? ORDER BY id DESC");
        $sql->execute(array("%".strtolower($termo)."%", "%".strtolower($termo)."%"));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getOrcamentosStatus($status){
        $sql = $this->db->prepare("SELECT * FROM orcamentos WHERE status = ?");
        $sql->execute(array($status));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getOrcamentosComStatus($status, $pagina, $limite){
        $p = ($pagina - 1) * $limite;
        $sql = $this->db->prepare("SELECT * FROM orcamentos WHERE status = ? ORDER BY id DESC LIMIT ".$p.",  ".$limite." ");
        $sql->execute(array($status));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getOrcamentosStatusPag($status){
        $sql = $this->db->prepare("SELECT * FROM orcamentos WHERE status_pag = ?");
        $sql->execute(array($status));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getOrcamentosComStatusPag($status, $pagina, $limite){
        $p = ($pagina - 1) * $limite;
        $sql = $this->db->prepare("SELECT * FROM orcamentos WHERE status_pag = ? ORDER BY id DESC LIMIT ".$p.",  ".$limite." ");
        $sql->execute(array($status));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function definirPrecos($id_orcamento, $produtos, $observacao, $tipo_frete, $preco_frete, $prazo_frete, $codigo_frete, $desconto, $dt_vencimento){
        $soma = 0;
        foreach ($produtos as $produto){
            if(empty($produto['qt'])){
                $qt = null;
            }else{
                $qt = $produto['qt'];
            }
            if(empty($produto['obs'])){
                $obs = null;
            }else{
                $obs = $produto['obs'];
            }
            if(empty($produto['pr'])  || $produto['pr'] == '0.00'){
                $pr = null;
            }else{
                $pr = $produto['pr'];
            }
            $soma = ($pr * $qt) + $soma;
            $sql = $this->db->prepare("UPDATE orcamentos_prod SET quantidade = ?, obs_adm = ?, preco = ? WHERE produto_id = ? AND orcamento_id = ?");
            $sql->execute(array($qt, $obs, $pr, $produto['id'], $id_orcamento));
        }
        if(empty($tipo_frete)){
            $tp_frete = null;
        }else{
            $tp_frete = $tipo_frete;
        }
        if(empty($preco_frete) || $preco_frete == '0.00'){
            $pr_frete = null;
        }else{
            $pr_frete = $preco_frete;
        }
        if(empty($prazo_frete)){
            $praz_frete = null;
        }else{
            $praz_frete = $prazo_frete;
        }
        if(empty($codigo_frete)){
            $cod_frete = null;
        }else{
            $cod_frete = $codigo_frete;
        }
        if(empty($desconto) || $desconto == '0.00'){
            $desc = null;
        }else{
            $desc = $desconto;
        }
        $soma = $soma + $pr_frete;
        $preco_final = $soma - $desconto;
        if($soma == 0){
            $soma = null;
        }
        $sql = $this->db->prepare("UPDATE orcamentos SET preco_total = ?, observacao = ?, tipo_frete = ?, preco_frete = ?, prazo_frete = ?, codigo_frete = ?, desconto = ?, preco_final = ?, dt_vencimento = ? WHERE id = ?");
        $sql->execute(array($soma, $observacao, $tp_frete, $pr_frete, $praz_frete, $cod_frete, $desc, $preco_final, $dt_vencimento, $id_orcamento));
    }

    public function cadastrarOrcamento($nome, $tipopessoa, $cnpj_cpf, $rg_ie, $celular, $telefone, $email, $endereco, $bairro, $cidade, $cep, $estado, $produtos){
        $sql = $this->db->prepare("INSERT INTO orcamentos SET nome = ?, email = ?, tipo_pessoa = ?, cpf_cnpj = ?, rg_ie = ?, celular = ?, telefone = ?, endereco = ?, bairro = ?, cidade = ?, cep = ?, estado = ?, status = 1, dt_criacao = NOW(), tipo_pagamento = 1");
        $sql->execute(array($nome, $email, $tipopessoa, $cnpj_cpf, $rg_ie, $celular, $telefone, $endereco, $bairro, $cidade, $cep, $estado));
        $sql = $this->db->query("SELECT id FROM orcamentos ORDER BY id DESC LIMIT 1");
        $id_orcamento =  $sql->fetch()['id'];
        foreach ($produtos as $produto){
            $sql = $this->db->prepare("INSERT INTO orcamentos_prod SET produto_id = ?, orcamento_id = ?, quantidade = ?, obs = ?");
            $sql->execute(array($produto['id'], $id_orcamento, $produto['qt'], $produto['obs']));
        }
    }

    public function editarOrcamento($id, $nome, $cnpj_cpf, $rg_ie, $celular, $telefone, $email, $endereco, $bairro, $cidade, $cep, $estado, $status){
        $sql = $this->db->prepare("UPDATE orcamentos SET nome = ?, email = ?, cpf_cnpj = ?, rg_ie = ?, celular = ?, telefone = ?, endereco = ?, bairro = ?, cidade = ?, cep = ?, estado = ?, status = ? WHERE id = ?");
        $sql->execute(array($nome, $email, $cnpj_cpf, $rg_ie, $celular, $telefone, $endereco, $bairro, $cidade, $cep, $estado, $status, $id));
    }

    public function excluir($id){
        $sql = $this->db->prepare("DELETE FROM orcamentos WHERE id = ?");
        $sql->execute(array($id));
        $sql = $this->db->prepare("DELETE FROM orcamentos_prod WHERE orcamento_id = ?");
        $sql->execute(array($id));

    }

    public function setStatus($id, $status){
        $sql = $this->db->prepare("UPDATE orcamentos SET status = ? WHERE id = ?");
        $sql->execute(array($status, $id));
    }

    public function setStatusPag($id, $status){
        $sql = $this->db->prepare("UPDATE orcamentos SET status_pag = ? WHERE id = ?");
        $sql->execute(array($status, $id));
    }

    public function setTipoPag($id, $tipo){
        $sql = $this->db->prepare("UPDATE orcamentos SET tipo_pagamento = ? WHERE id = ?");
        $sql->execute(array($tipo, $id));
    }

    public function setDataProcessamento($id){
        $sql = $this->db->prepare("UPDATE orcamentos SET dt_processamento = NOW() WHERE id = ?");
        $sql->execute(array($id));
    }

    public function setDataConfirmacao($id){
        $sql = $this->db->prepare("UPDATE orcamentos SET dt_confirmacao = NOW() WHERE id = ?");
        $sql->execute(array($id));
    }

    public function setDTenvioPreco($id){
        $sql = $this->db->prepare("UPDATE orcamentos SET dt_envioPrecos = NOW() WHERE id = ?");
        $sql->execute(array($id));
    }

    public function salvarUrlComprovante($id, $url){
        $sql = $this->db->prepare("SELECT tipo_pagamento, url_comprovante FROM orcamentos WHERE id = ?");
        $sql->execute(array($id));
        $tipoPag = $sql->fetch()['tipo_pagamento'];
        $Oldurl = $sql->fetch()['url_comprovante'];
        if($tipoPag == 2){
            unlink($_SERVER['DOCUMENT_ROOT'] . SERVER_URL . "assets/media/boletos/".$Oldurl);
        }
        $sql = $this->db->prepare("UPDATE orcamentos SET url_comprovante = ? WHERE id = ?");
        $sql->execute(array($url, $id));
    }

    public function salvarComprovante($id){
        date_default_timezone_set("Brazil/East");
        $tamanho_max = (1024 * 1024 * 2) * 2; // 4Mb
        $extensoes_permitidas = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx');
        $ext = strtolower(end(explode(".", $_FILES['arquivo']['name'])));
        // Faz a verificação do tamanho do arquivo
        if($tamanho_max < $_FILES['arquivo']['size']) {
            return false;
        }elseif(array_search($ext, $extensoes_permitidas) === false) {
            return false;
        }else{
            $new_name = md5(time()).".".$ext;
            $this->salvarUrlComprovante($id, $new_name);
            $this->setStatusPag($id, 2);
            $this->setTipoPag($id, 3);
            $this->setDataProcessamento($id);
            $dir = $_SERVER['DOCUMENT_ROOT'] . SERVER_URL . "assets/media/comprovantes/";
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$new_name);
            return true;
        }
    }

    public function salvarBoleto($id){
        date_default_timezone_set("Brazil/East");
        $tamanho_max = (1024 * 1024 * 2) * 10; // 20Mb
        $extensoes_permitidas = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx');
        $ext = strtolower(end(explode(".", $_FILES['arquivo']['name'])));
        // Faz a verificação do tamanho do arquivo
        if($tamanho_max < $_FILES['arquivo']['size']) {
            return false;
        }elseif(array_search($ext, $extensoes_permitidas) === false) {
            return false;
        }else{
            $new_name = md5(time()).".".$ext;
            $this->salvarUrlComprovante($id, $new_name);
            $dir = $_SERVER['DOCUMENT_ROOT'] . SERVER_URL . "assets/media/boletos/";
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$new_name);
            return true;
        }
    }

    public function enviarEmailComTemplate($destnome, $destemail, $assunto, $mensagem){
        $mail= new PhpMailer;
        $mail->IsSMTP();
        $mail->Host = $this->MailHost;
        // Enable this option to see deep debug info
        // $mail->SMTPDebug = 4;
        $mail->SMTPSecure = 'tls';
        $mail->Port = $this->MailPort;
        $mail->SMTPAuth=true;
        $mail->CharSet = "UTF-8";
        $mail->Username = $this->MailUsername;
        $mail->Password = $this->MailPassword;

        $mail->isHTML(true);

        $mail->SetFrom($this->MailUsername,$this->MailName);

        $mail->Subject=$assunto;
        $mail->AltBody='To view the message, please use an HTML compatible email viewer!';

        $msg = "
        <html xmlns=\"http://www.w3.org/1999/xhtml\">
            <head>
            <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
            <title>".$assunto."</title>
            <style type=\"text/css\">
                body {
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
                    margin:0 !important;
                    width: 100% !important;
                    -webkit-text-size-adjust: 100% !important;
                    -ms-text-size-adjust: 100% !important;
                    -webkit-font-smoothing: antialiased !important;
                }
                .tableContent img {
                    border: 0 !important;
                    display: block !important;
                    outline: none !important;
                }
                a{
                    color:#382F2E;
                }
        
                p, h1,h2,ul,ol,li,div{
                    margin:0;
                    padding:0;
                }
        
                h1,h2{
                    font-weight: normal;
                    background:transparent !important;
                    border:none !important;
                }
        
                @media only screen and (max-width:480px)
        
                {
        
                    table[class=\"MainContainer\"], td[class=\"cell\"]
                    {
                        width: 100% !important;
                        height:auto !important;
                    }
                    td[class=\"specbundle\"]
                    {
                        width: 100% !important;
                        float:left !important;
                        font-size:13px !important;
                        line-height:17px !important;
                        display:block !important;
                        padding-bottom:15px !important;
                    }
                    td[class=\"specbundle2\"]
                    {
                        width:80% !important;
                        float:left !important;
                        font-size:13px !important;
                        line-height:17px !important;
                        display:block !important;
                        padding-bottom:10px !important;
                        padding-left:10% !important;
                        padding-right:10% !important;
                    }
        
                    td[class=\"spechide\"]
                    {
                        display:none !important;
                    }
                    img[class=\"banner\"]
                    {
                        width: 100% !important;
                        height: auto !important;
                    }
                    td[class=\"left_pad\"]
                    {
                        padding-left:15px !important;
                        padding-right:15px !important;
                    }
        
                }
        
                @media only screen and (max-width:540px)
        
                {
        
                    table[class=\"MainContainer\"], td[class=\"cell\"]
                    {
                        width: 100% !important;
                        height:auto !important;
                    }
                    td[class=\"specbundle\"]
                    {
                        width: 100% !important;
                        float:left !important;
                        font-size:13px !important;
                        line-height:17px !important;
                        display:block !important;
                        padding-bottom:15px !important;
                    }
                    td[class=\"specbundle2\"]
                    {
                        width:80% !important;
                        float:left !important;
                        font-size:13px !important;
                        line-height:17px !important;
                        display:block !important;
                        padding-bottom:10px !important;
                        padding-left:10% !important;
                        padding-right:10% !important;
                    }
        
                    td[class=\"spechide\"]
                    {
                        display:none !important;
                    }
                    img[class=\"banner\"]
                    {
                        width: 100% !important;
                        height: auto !important;
                    }
                    td[class=\"left_pad\"]
                    {
                        padding-left:15px !important;
                        padding-right:15px !important;
                    }
        
                }
        
                .contentEditable h2.big,.contentEditable h1.big{
                    font-size: 26px !important;
                }
        
                .contentEditable h2.bigger,.contentEditable h1.bigger{
                    font-size: 37px !important;
                }
        
                td,table{
                    vertical-align: top;
                }
                td.middle{
                    vertical-align: middle;
                }
        
                a.link1{
                    font-size:13px;
                    color:#27A1E5;
                    line-height: 24px;
                    text-decoration:none;
                }
                a{
                    text-decoration: none;
                }
        
                .link2{
                    color:#ffffff;
                    border-top:10px solid #27A1E5;
                    border-bottom:10px solid #27A1E5;
                    border-left:18px solid #27A1E5;
                    border-right:18px solid #27A1E5;
                    border-radius:3px;
                    -moz-border-radius:3px;
                    -webkit-border-radius:3px;
                    background:#27A1E5;
                }
        
                .link3{
                    color:#555555;
                    border:1px solid #cccccc;
                    padding:10px 18px;
                    border-radius:3px;
                    -moz-border-radius:3px;
                    -webkit-border-radius:3px;
                    background:#ffffff;
                }
        
                .link4{
                    color:#27A1E5;
                    line-height: 24px;
                }
        
                h2,h1{
                    line-height: 20px;
                }
                p{
                    font-size: 14px;
                    line-height: 21px;
                    color:#AAAAAA;
                }
        
                .contentEditable li{
        
                }
        
                .appart p{
        
                }
                .bgItem{
                    background: #ffffff;
                }
                .bgBody{
                    background: #ffffff;
                }
        
                img[class='responsive]{
                    outline:none;
                    text-decoration:none;
                    -ms-interpolation-mode: bicubic;
                    width: auto;
                    max-width: 100%;
                    clear: both;
                    display: block;
                    float: none;
                }
        
            </style>
            <script type=\"colorScheme\" class=\"swatch active\">
        {
            \"name\":\"Default\",
            \"bgBody\":\"ffffff\",
            \"link\":\"27A1E5\",
            \"color\":\"AAAAAA\",
            \"bgItem\":\"ffffff\",
            \"title\":\"444444\"
        }
        </script>
        </head>
        <body paddingwidth=\"0\" paddingheight=\"0\" bgcolor=\"#d1d3d4\" style=\"padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;\" offset=\"0\" toppadding=\"0\" leftpadding=\"0\">
        <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
            <tbody>
            <tr>
                <td><table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#ffffff\" style=\"font-family:helvetica, sans-serif;\" class=\"MainContainer\">
                        <!-- =============== START HEADER =============== -->
                        <tbody>
                        <tr>
                            <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                    <tbody>
                                    <tr>
                                        <td valign=\"top\" width=\"20\">&nbsp;</td>
                                        <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                <tbody>
                                                <tr>
                                                    <td class=\"movableContentContainer\">
                                                        <div class=\"movableContent\" style=\"border: 0px; padding-top: 0px; position: relative;\">
                                                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                <tbody>
                                                                <tr>
                                                                    <td height=\"15\"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td valign=\"top\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td valign=\"top\" width=\"150\"><img class='responsive' src='".BASE_URL."/assets/imgs/logo.png' alt=\"Logo\" title=\"Logo\" width='150' height='60' data-max-width=\"100\"></td>
                                                                                            <td width=\"10\" valign=\"top\">&nbsp;</td>
                                                                                            <td valign=\"middle\" style=\"vertical-align: middle;\">
                                                                                                <div class=\"contentEditableContainer contentTextEditable\">
                                                                                                    <div class=\"contentEditable\" style=\"text-align: left;font-weight: light; color:#555555;font-size:26;line-height: 39px;font-family: Helvetica Neue;\">
                                                                                                        <h1 class=\"big\"><a target='_blank' href='".BASE_URL."/assets/imgs/logo.png' style='color:#444444'>Enxovais DuLar</a></h1>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height=\"15\"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><hr style=\"height:1px;background: #FDF21C;border:none;\"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- =============== END HEADER =============== -->
                                                        <!-- =============== START BODY =============== -->
                                                        <div class=\"movableContent\" style=\"border: 0px; padding-top: 0px; position: relative;\">
                                                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                <tbody>
                                                                <tr>
                                                                    <td height=\"40\"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style=\"border: 1px solid #FDF21C;border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px;\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td valign=\"top\" width=\"40\">&nbsp;</td>
                                                                                <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
                                                                                        <tbody><tr><td height=\"25\"></td></tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class=\"contentEditableContainer contentTextEditable\">
                                                                                                    <div class=\"contentEditable\" style=\"text-align: center;\">
                                                                                                        <h2 style=\"font-size: 20px;\">".$assunto."</h2>
                                                                                                        <br>
                                                                                                        <p>".$mensagem."</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr><td height=\"24\"></td></tr>
                                                                                        </tbody></table></td>
                                                                                <td valign=\"top\" width=\"40\">&nbsp;</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- =============== END BODY =============== -->
                                                        <!-- =============== START FOOTER =============== -->
                                                        <div class=\"movableContent\" style=\"border: 0px; padding-top: 0px; position: relative;\">
                                                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                <tbody>
                                                                <tr>
                                                                    <td height=\"48\"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td valign=\"top\" width=\"90\" class=\"spechide\">&nbsp;</td>
                                                                                <td><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">
                                                                                        <tbody><tr>
                                                                                            <td>
                                                                                                <div class=\"contentEditableContainer contentTextEditable\">
                                                                                                    <div class=\"contentEditable\" style=\"text-align: center;color:#AAAAAA;\">
                                                                                                        <p>
                                                                                                            Enviado por Enxovais DuLar <br/>
                                                                                                            Av. Bernardo Sayão Qd 01 Lt. 19<br/>
                                                                                                            Residencial Tereza Lima<br/>
                                                                                                            Inhumas - GO<br/>
                                                                                                            (62) 3514-5771 <br/>
                                                                                                            <a target='_blank' href='".BASE_URL."/contato' style='color:#AAAAAA;'>Entre em contato</a> <br/>
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody></table></td>
                                                                                <td valign=\"top\" width=\"90\" class=\"spechide\">&nbsp;</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class=\"movableContent\" style=\"border: 0px; padding-top: 0px; position: relative;\">
                                                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                <tbody>
                                                                <tr>
                                                                    <td height=\"40\"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td valign=\"top\" width=\"185\" class=\"spechide\">&nbsp;</td>
                                                                                <td class=\"specbundle2\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">
                                                                                        <tbody><tr>
                                                                                            <td width=\"40\">
                                                                                                <div class=\"contentEditableContainer contentFacebookEditable\">
                                                                                                    <div class=\"contentEditable\" style=\"text-align: center;color:#AAAAAA;\">
                                                                                                        <img src='https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-400x400.png' alt=\"facebook\" width=\"40\" height=\"40\" data-max-width=\"40\" data-customicon=\"true\" border=\"0\">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody></table></td>
                                                                                <td valign=\"top\" width=\"185\" class=\"spechide\">&nbsp;</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height=\"40\"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            <!-- =============== END FOOTER =============== -->
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td valign=\"top\" width=\"20\">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        </body>
    </html>
        ";

        $mail->MsgHTML($msg);
        $mail->Body = $msg;

        $mail->AddAddress($destemail,$destnome);

        if(!$mail->send()) {
            return 'Message could not be sent - '. $mail->ErrorInfo;
        } else {
            return True;
        }
    }

    public function enviarEmailComTemplate2($destnome, $destemail, $assunto, $mensagem){
        $mail= new PhpMailer;
        $mail->IsSMTP();
        $mail->Host = $this->MailHost;
        // Enable this option to see deep debug info
        // $mail->SMTPDebug = 4;
        $mail->SMTPSecure = 'tls';
        $mail->Port = $this->MailPort;
        $mail->SMTPAuth=true;
        $mail->CharSet = "UTF-8";
        $mail->Username = $this->MailUsername;
        $mail->Password = $this->MailPassword;

        $mail->isHTML(true);

        $mail->SetFrom($this->MailUsername,$this->MailName);

        $mail->Subject=$assunto;
        $mail->AltBody='To view the message, please use an HTML compatible email viewer!';

        $msg = "
        <html xmlns=\"http://www.w3.org/1999/xhtml\">
            <head>
            <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
            <title>".$assunto."</title>
            <style type=\"text/css\">
                body {
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
                    margin:0 !important;
                    width: 100% !important;
                    -webkit-text-size-adjust: 100% !important;
                    -ms-text-size-adjust: 100% !important;
                    -webkit-font-smoothing: antialiased !important;
                }
                .tableContent img {
                    border: 0 !important;
                    display: block !important;
                    outline: none !important;
                }
                a{
                    color:#382F2E;
                }
        
                p, h1,h2,ul,ol,li,div{
                    margin:0;
                    padding:0;
                }
        
                h1,h2{
                    font-weight: normal;
                    background:transparent !important;
                    border:none !important;
                }
        
                @media only screen and (max-width:480px)
        
                {
        
                    table[class=\"MainContainer\"], td[class=\"cell\"]
                    {
                        width: 100% !important;
                        height:auto !important;
                    }
                    td[class=\"specbundle\"]
                    {
                        width: 100% !important;
                        float:left !important;
                        font-size:13px !important;
                        line-height:17px !important;
                        display:block !important;
                        padding-bottom:15px !important;
                    }
                    td[class=\"specbundle2\"]
                    {
                        width:80% !important;
                        float:left !important;
                        font-size:13px !important;
                        line-height:17px !important;
                        display:block !important;
                        padding-bottom:10px !important;
                        padding-left:10% !important;
                        padding-right:10% !important;
                    }
        
                    td[class=\"spechide\"]
                    {
                        display:none !important;
                    }
                    ''
                    {
                        width: 100% !important;
                        height: auto !important;
                    }
                    td[class=\"left_pad\"]
                    {
                        padding-left:15px !important;
                        padding-right:15px !important;
                    }
        
                }
        
                @media only screen and (max-width:540px)
        
                {
        
                    table[class=\"MainContainer\"], td[class=\"cell\"]
                    {
                        width: 100% !important;
                        height:auto !important;
                    }
                    td[class=\"specbundle\"]
                    {
                        width: 100% !important;
                        float:left !important;
                        font-size:13px !important;
                        line-height:17px !important;
                        display:block !important;
                        padding-bottom:15px !important;
                    }
                    td[class=\"specbundle2\"]
                    {
                        width:80% !important;
                        float:left !important;
                        font-size:13px !important;
                        line-height:17px !important;
                        display:block !important;
                        padding-bottom:10px !important;
                        padding-left:10% !important;
                        padding-right:10% !important;
                    }
        
                    td[class=\"spechide\"]
                    {
                        display:none !important;
                    }
                    img[class=\"banner\"]
                    {
                        width: 100% !important;
                        height: auto !important;
                    }
                    td[class=\"left_pad\"]
                    {
                        padding-left:15px !important;
                        padding-right:15px !important;
                    }
        
                }
        
                .contentEditable h2.big,.contentEditable h1.big{
                    font-size: 26px !important;
                }
        
                .contentEditable h2.bigger,.contentEditable h1.bigger{
                    font-size: 37px !important;
                }
        
                td,table{
                    vertical-align: top;
                }
                td.middle{
                    vertical-align: middle;
                }
        
                a.link1{
                    font-size:13px;
                    color:#27A1E5;
                    line-height: 24px;
                    text-decoration:none;
                }
                a{
                    text-decoration: none;
                }
        
                .link2{
                    color:#ffffff;
                    border-top:10px solid #27A1E5;
                    border-bottom:10px solid #27A1E5;
                    border-left:18px solid #27A1E5;
                    border-right:18px solid #27A1E5;
                    border-radius:3px;
                    -moz-border-radius:3px;
                    -webkit-border-radius:3px;
                    background:#27A1E5;
                }
        
                .link3{
                    color:#555555;
                    border:1px solid #cccccc;
                    padding:10px 18px;
                    border-radius:3px;
                    -moz-border-radius:3px;
                    -webkit-border-radius:3px;
                    background:#ffffff;
                }
        
                .link4{
                    color:#27A1E5;
                    line-height: 24px;
                }
        
                h2,h1{
                    line-height: 20px;
                }
                p{
                    font-size: 14px;
                    line-height: 21px;
                    color:#AAAAAA;
                }
        
                .contentEditable li{
        
                }
        
                .appart p{
        
                }
                .bgItem{
                    background: #ffffff;
                }
                .bgBody{
                    background: #ffffff;
                }
        
                img[class='responsive'] {
                    outline:none;
                    text-decoration:none;
                    -ms-interpolation-mode: bicubic;
                    width: auto;
                    max-width: 100%;
                    clear: both;
                    display: block;
                    float: none;
                }
        
            </style>
            <script type=\"colorScheme\" class=\"swatch active\">
        {
            \"name\":\"Default\",
            \"bgBody\":\"ffffff\",
            \"link\":\"27A1E5\",
            \"color\":\"AAAAAA\",
            \"bgItem\":\"ffffff\",
            \"title\":\"444444\"
        }
        </script>
        </head>
        <body paddingwidth=\"0\" paddingheight=\"0\" bgcolor=\"#d1d3d4\" style=\"padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;\" offset=\"0\" toppadding=\"0\" leftpadding=\"0\">
        <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
            <tbody>
            <tr>
                <td><table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#ffffff\" style=\"font-family:helvetica, sans-serif;\" class=\"MainContainer\">
                        <!-- =============== START HEADER =============== -->
                        <tbody>
                        <tr>
                            <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                    <tbody>
                                    <tr>
                                        <td valign=\"top\" width=\"20\">&nbsp;</td>
                                        <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                <tbody>
                                                <tr>
                                                    <td class=\"movableContentContainer\">
                                                        <div class=\"movableContent\" style=\"border: 0px; padding-top: 0px; position: relative;\">
                                                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                <tbody>
                                                                <tr>
                                                                    <td height=\"15\"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td valign=\"top\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td valign=\"top\" width=\"150\"><img src='".BASE_URL."/assets/imgs/logo.png' class='responsive' alt=\"Logo\" title=\"Logo\" width='150' height='60' data-max-width=\"100\"></td>
                                                                                            <td width=\"10\" valign=\"top\">&nbsp;</td>
                                                                                            <td valign=\"middle\" style=\"vertical-align: middle;\">
                                                                                                <div class=\"contentEditableContainer contentTextEditable\">
                                                                                                    <div class=\"contentEditable\" style=\"text-align: left;font-weight: light; color:#555555;font-size:26;line-height: 39px;font-family: Helvetica Neue;\">
                                                                                                        <h1 class=\"big\"><a target='_blank' href='".BASE_URL."/assets/imgs/logo.png' style='color:#444444'>Enxovais DuLar</a></h1>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height=\"15\"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><hr style=\"height:1px;background: #FDF21C;border:none;\"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- =============== END HEADER =============== -->
                                                        <!-- =============== START BODY =============== -->
                                                        <div class=\"movableContent\" style=\"border: 0px; padding-top: 0px; position: relative;\">
                                                          <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                              <tbody>
                                                                <tr>
                                                                    <td>
                                                                ".$mensagem."
                                                                    </td>
                                                                </tr>
                                                              </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- =============== END BODY =============== -->
                                                        <!-- =============== START FOOTER =============== -->
                                                        <div class=\"movableContent\" style=\"border: 0px; padding-top: 0px; position: relative;\">
                                                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                <tbody>
                                                                <tr>
                                                                    <td height=\"48\"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td valign=\"top\" width=\"90\" class=\"spechide\">&nbsp;</td>
                                                                                <td><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">
                                                                                        <tbody><tr>
                                                                                            <td>
                                                                                                <div class=\"contentEditableContainer contentTextEditable\">
                                                                                                    <div class=\"contentEditable\" style=\"text-align: center;color:#AAAAAA;\">
                                                                                                        <p>
                                                                                                            Enviado por Enxovais DuLar <br/>
                                                                                                            Av. Bernardo Sayão Qd 01 Lt. 19<br/>
                                                                                                            Residencial Tereza Lima<br/>
                                                                                                            Inhumas - GO<br/>
                                                                                                            (62) 3514-5771 <br/>
                                                                                                            <a target='_blank' href='".BASE_URL."/contato' style='color:#AAAAAA;'>Entre em contato</a> <br/>
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody></table></td>
                                                                                <td valign=\"top\" width=\"90\" class=\"spechide\">&nbsp;</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class=\"movableContent\" style=\"border: 0px; padding-top: 0px; position: relative;\">
                                                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                <tbody>
                                                                <tr>
                                                                    <td height=\"40\"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td valign=\"top\" width=\"185\" class=\"spechide\">&nbsp;</td>
                                                                                <td class=\"specbundle2\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">
                                                                                        <tbody><tr>
                                                                                            <td width=\"40\">
                                                                                                <div class=\"contentEditableContainer contentFacebookEditable\">
                                                                                                    <div class=\"contentEditable\" style=\"text-align: center;color:#AAAAAA;\">
                                                                                                        <img src='https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-400x400.png' alt=\"facebook\" width=\"40\" height=\"40\" data-max-width=\"40\" data-customicon=\"true\" border=\"0\">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody></table></td>
                                                                                <td valign=\"top\" width=\"185\" class=\"spechide\">&nbsp;</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height=\"40\"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            <!-- =============== END FOOTER =============== -->
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td valign=\"top\" width=\"20\">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        </body>
    </html>
        ";

        $mail->MsgHTML($msg);
        $mail->Body = $msg;

        $mail->AddAddress($destemail,$destnome);

        if(!$mail->send()) {
            return 'Message could not be sent - '. $mail->ErrorInfo;
        } else {
            return True;
        }
    }

    public function enviarEmailComTemplate2Anexo($id, $destnome, $destemail, $assunto, $mensagem){
        $dados = $this->getOrcamento($id);
        $mail= new PhpMailer;
        $mail->IsSMTP();
        $mail->Host = $this->MailHost;
        // Enable this option to see deep debug info
        // $mail->SMTPDebug = 4;
        $mail->SMTPSecure = 'tls';
        $mail->Port = $this->MailPort;
        $mail->SMTPAuth=true;
        $mail->CharSet = "UTF-8";
        $mail->Username = $this->MailUsername;
        $mail->Password = $this->MailPassword;
        $mail->AddAttachment($_SERVER['DOCUMENT_ROOT'] . SERVER_URL .'assets/media/boletos/'.$dados['url_comprovante'], 'Boleto Enxovais DuLar');
        $mail->isHTML(true);

        $mail->SetFrom($this->MailUsername,$this->MailName);

        $mail->Subject=$assunto;
        $mail->AltBody='To view the message, please use an HTML compatible email viewer!';

        $msg = "
        <html xmlns=\"http://www.w3.org/1999/xhtml\">
            <head>
            <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
            <title>".$assunto."</title>
            <style type=\"text/css\">
                body {
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
                    padding-top: 0 !important;
                    padding-bottom: 0 !important;
                    margin:0 !important;
                    width: 100% !important;
                    -webkit-text-size-adjust: 100% !important;
                    -ms-text-size-adjust: 100% !important;
                    -webkit-font-smoothing: antialiased !important;
                }
                .tableContent img {
                    border: 0 !important;
                    display: block !important;
                    outline: none !important;
                }
                a{
                    color:#382F2E;
                }
        
                p, h1,h2,ul,ol,li,div{
                    margin:0;
                    padding:0;
                }
        
                h1,h2{
                    font-weight: normal;
                    background:transparent !important;
                    border:none !important;
                }
        
                @media only screen and (max-width:480px)
        
                {
        
                    table[class=\"MainContainer\"], td[class=\"cell\"]
                    {
                        width: 100% !important;
                        height:auto !important;
                    }
                    td[class=\"specbundle\"]
                    {
                        width: 100% !important;
                        float:left !important;
                        font-size:13px !important;
                        line-height:17px !important;
                        display:block !important;
                        padding-bottom:15px !important;
                    }
                    td[class=\"specbundle2\"]
                    {
                        width:80% !important;
                        float:left !important;
                        font-size:13px !important;
                        line-height:17px !important;
                        display:block !important;
                        padding-bottom:10px !important;
                        padding-left:10% !important;
                        padding-right:10% !important;
                    }
        
                    td[class=\"spechide\"]
                    {
                        display:none !important;
                    }
                    ''
                    {
                        width: 100% !important;
                        height: auto !important;
                    }
                    td[class=\"left_pad\"]
                    {
                        padding-left:15px !important;
                        padding-right:15px !important;
                    }
        
                }
        
                @media only screen and (max-width:540px)
        
                {
        
                    table[class=\"MainContainer\"], td[class=\"cell\"]
                    {
                        width: 100% !important;
                        height:auto !important;
                    }
                    td[class=\"specbundle\"]
                    {
                        width: 100% !important;
                        float:left !important;
                        font-size:13px !important;
                        line-height:17px !important;
                        display:block !important;
                        padding-bottom:15px !important;
                    }
                    td[class=\"specbundle2\"]
                    {
                        width:80% !important;
                        float:left !important;
                        font-size:13px !important;
                        line-height:17px !important;
                        display:block !important;
                        padding-bottom:10px !important;
                        padding-left:10% !important;
                        padding-right:10% !important;
                    }
        
                    td[class=\"spechide\"]
                    {
                        display:none !important;
                    }
                    img[class=\"banner\"]
                    {
                        width: 100% !important;
                        height: auto !important;
                    }
                    td[class=\"left_pad\"]
                    {
                        padding-left:15px !important;
                        padding-right:15px !important;
                    }
        
                }
        
                .contentEditable h2.big,.contentEditable h1.big{
                    font-size: 26px !important;
                }
        
                .contentEditable h2.bigger,.contentEditable h1.bigger{
                    font-size: 37px !important;
                }
        
                td,table{
                    vertical-align: top;
                }
                td.middle{
                    vertical-align: middle;
                }
        
                a.link1{
                    font-size:13px;
                    color:#27A1E5;
                    line-height: 24px;
                    text-decoration:none;
                }
                a{
                    text-decoration: none;
                }
        
                .link2{
                    color:#ffffff;
                    border-top:10px solid #27A1E5;
                    border-bottom:10px solid #27A1E5;
                    border-left:18px solid #27A1E5;
                    border-right:18px solid #27A1E5;
                    border-radius:3px;
                    -moz-border-radius:3px;
                    -webkit-border-radius:3px;
                    background:#27A1E5;
                }
        
                .link3{
                    color:#555555;
                    border:1px solid #cccccc;
                    padding:10px 18px;
                    border-radius:3px;
                    -moz-border-radius:3px;
                    -webkit-border-radius:3px;
                    background:#ffffff;
                }
        
                .link4{
                    color:#27A1E5;
                    line-height: 24px;
                }
        
                h2,h1{
                    line-height: 20px;
                }
                p{
                    font-size: 14px;
                    line-height: 21px;
                    color:#AAAAAA;
                }
        
                .contentEditable li{
        
                }
        
                .appart p{
        
                }
                .bgItem{
                    background: #ffffff;
                }
                .bgBody{
                    background: #ffffff;
                }
        
                img[class='responsive'] {
                    outline:none;
                    text-decoration:none;
                    -ms-interpolation-mode: bicubic;
                    width: auto;
                    max-width: 100%;
                    clear: both;
                    display: block;
                    float: none;
                }
        
            </style>
            <script type=\"colorScheme\" class=\"swatch active\">
        {
            \"name\":\"Default\",
            \"bgBody\":\"ffffff\",
            \"link\":\"27A1E5\",
            \"color\":\"AAAAAA\",
            \"bgItem\":\"ffffff\",
            \"title\":\"444444\"
        }
        </script>
        </head>
        <body paddingwidth=\"0\" paddingheight=\"0\" bgcolor=\"#d1d3d4\" style=\"padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;\" offset=\"0\" toppadding=\"0\" leftpadding=\"0\">
        <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
            <tbody>
            <tr>
                <td><table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#ffffff\" style=\"font-family:helvetica, sans-serif;\" class=\"MainContainer\">
                        <!-- =============== START HEADER =============== -->
                        <tbody>
                        <tr>
                            <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                    <tbody>
                                    <tr>
                                        <td valign=\"top\" width=\"20\">&nbsp;</td>
                                        <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                <tbody>
                                                <tr>
                                                    <td class=\"movableContentContainer\">
                                                        <div class=\"movableContent\" style=\"border: 0px; padding-top: 0px; position: relative;\">
                                                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                <tbody>
                                                                <tr>
                                                                    <td height=\"15\"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td valign=\"top\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td valign=\"top\" width=\"150\"><img src='".BASE_URL."/assets/imgs/logo.png' class='responsive' alt=\"Logo\" title=\"Logo\" width='150' height='60' data-max-width=\"100\"></td>
                                                                                            <td width=\"10\" valign=\"top\">&nbsp;</td>
                                                                                            <td valign=\"middle\" style=\"vertical-align: middle;\">
                                                                                                <div class=\"contentEditableContainer contentTextEditable\">
                                                                                                    <div class=\"contentEditable\" style=\"text-align: left;font-weight: light; color:#555555;font-size:26;line-height: 39px;font-family: Helvetica Neue;\">
                                                                                                        <h1 class=\"big\"><a target='_blank' href='".BASE_URL."/assets/imgs/logo.png' style='color:#444444'>Enxovais DuLar</a></h1>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height=\"15\"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><hr style=\"height:1px;background: #FDF21C;border:none;\"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- =============== END HEADER =============== -->
                                                        <!-- =============== START BODY =============== -->
                                                        <div class=\"movableContent\" style=\"border: 0px; padding-top: 0px; position: relative;\">
                                                          <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                              <tbody>
                                                                <tr>
                                                                    <td>
                                                                ".$mensagem."
                                                                    </td>
                                                                </tr>
                                                              </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- =============== END BODY =============== -->
                                                        <!-- =============== START FOOTER =============== -->
                                                        <div class=\"movableContent\" style=\"border: 0px; padding-top: 0px; position: relative;\">
                                                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                <tbody>
                                                                <tr>
                                                                    <td height=\"48\"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td valign=\"top\" width=\"90\" class=\"spechide\">&nbsp;</td>
                                                                                <td><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">
                                                                                        <tbody><tr>
                                                                                            <td>
                                                                                                <div class=\"contentEditableContainer contentTextEditable\">
                                                                                                    <div class=\"contentEditable\" style=\"text-align: center;color:#AAAAAA;\">
                                                                                                        <p>
                                                                                                            Enviado por Enxovais DuLar <br/>
                                                                                                            Av. Bernardo Sayão Qd 01 Lt. 19<br/>
                                                                                                            Residencial Tereza Lima<br/>
                                                                                                            Inhumas - GO<br/>
                                                                                                            (62) 3514-5771 <br/>
                                                                                                            <a target='_blank' href='".BASE_URL."/contato' style='color:#AAAAAA;'>Entre em contato</a> <br/>
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody></table></td>
                                                                                <td valign=\"top\" width=\"90\" class=\"spechide\">&nbsp;</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class=\"movableContent\" style=\"border: 0px; padding-top: 0px; position: relative;\">
                                                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                <tbody>
                                                                <tr>
                                                                    <td height=\"40\"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td valign=\"top\" width=\"185\" class=\"spechide\">&nbsp;</td>
                                                                                <td class=\"specbundle2\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">
                                                                                        <tbody><tr>
                                                                                            <td width=\"40\">
                                                                                                <div class=\"contentEditableContainer contentFacebookEditable\">
                                                                                                    <div class=\"contentEditable\" style=\"text-align: center;color:#AAAAAA;\">
                                                                                                        <img src='https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-400x400.png' alt=\"facebook\" width=\"40\" height=\"40\" data-max-width=\"40\" data-customicon=\"true\" border=\"0\">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody></table></td>
                                                                                <td valign=\"top\" width=\"185\" class=\"spechide\">&nbsp;</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height=\"40\"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            <!-- =============== END FOOTER =============== -->
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td valign=\"top\" width=\"20\">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        </body>
    </html>
        ";

        $mail->MsgHTML($msg);
        $mail->Body = $msg;

        $mail->AddAddress($destemail,$destnome);

        if(!$mail->send()) {
            return 'Message could not be sent - '. $mail->ErrorInfo;
        } else {
            return True;
        }
    }

    public function inscreverMailChimp($email, $nome){
        $memberID = md5(strtolower($email));
        $dataCenter = substr($this->MAILCHIMP_API_KEY,strpos($this->MAILCHIMP_API_KEY,'-')+1);
        $url = 'https://'.$dataCenter.'.api.mailchimp.com/3.0/lists/'.$this->MAILCHIMP_LIST_ID.'/members/'.$memberID;

        //Member Info
        $json = json_encode([
            'email_address' => $email,
            'status'        => 'subscribed',
            'merge_fields' => [
                'NOME' => $nome,
            ]
        ]);

        // send a HTTP POST request with curl
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $this->MAILCHIMP_API_KEY);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    }

    public function gerarBoleto($id){
        $dadosOrcamento = $this->getOrcamento($id);
        $this->setTipoPag($id, 2);
        $dt_vencimento = date("d/m/Y", strtotime($dadosOrcamento["dt_vencimento"]));
        $today = date("Y-m-d");
        $dias = $dt_vencimento - $today;
        // ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
        // Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//

        // DADOS DO BOLETO PARA O SEU CLIENTE
        $dias_de_prazo_para_pagamento = $dias;
        $taxa_boleto = 0;
        $data_venc = date("d/m/Y", strtotime($dadosOrcamento["dt_vencimento"]));
        $valor_cobrado = $dadosOrcamento['preco_final']; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
        $valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

        $dadosboleto["nosso_numero"] = $dadosOrcamento['id'];  // Nosso numero - REGRA: Máximo de 8 caracteres!
        $dadosboleto["numero_documento"] = $dadosOrcamento['id'];	// Num do pedido ou nosso numero
        $dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
        $dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
        $dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
        $dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
        $dadosboleto["sacado"] = $dadosOrcamento['nome'];
        $dadosboleto["endereco1"] = $dadosOrcamento['endereco'].", ".$dadosOrcamento['bairro'];
        $dadosboleto["endereco2"] = $dadosOrcamento['cidade']." - ".$dadosOrcamento['estado']." - ".$dadosOrcamento['cep'];

// INFORMACOES PARA O CLIENTE
        $dadosboleto["demonstrativo1"] = "Pagamento de Compra em Enxovais DuLar";
        $dadosboleto["instrucoes1"] = "Não receber após o vencimento.";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
        $dadosboleto["quantidade"] = "";
        $dadosboleto["valor_unitario"] = "";
        $dadosboleto["aceite"] = "N";
        $dadosboleto["especie"] = "R$";
        $dadosboleto["especie_doc"] = "";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - ITAÚ
        $dadosboleto["agencia"] = "4286"; // Num da agencia, sem digito
        $dadosboleto["conta"] = "36313";	// Num da conta, sem digito
        $dadosboleto["conta_dv"] = "2"; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - ITAÚ
        $dadosboleto["carteira"] = "109";  // Código da Carteira: pode ser 175, 174, 104, 109, 178, ou 157

// SEUS DADOS
        $dadosboleto["identificacao"] = "Enxovais Dular Eireli-ME";
        $dadosboleto["cpf_cnpj"] = "28.144.993/0001-94";
        $dadosboleto["endereco"] = "CAv. Bernardo Sayão Qd 01 Lt. 19, Residencial Tereza Lima";
        $dadosboleto["cidade_uf"] = "Inhumas - GO";
        $dadosboleto["cedente"] = "Enxovais Dular";
        include("include/funcoes_itau.php");
        include("include/layout_itau.php");
    }
}