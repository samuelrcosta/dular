<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Contatos extends model{
    public function cadastrarNovoContato($nome, $celular, $telefone, $email, $assunto, $mensagem)
    {
        $sql = $this->db->prepare("INSERT INTO contatos SET nome = ?, celular = ?, telefone = ?, email = ?, assunto = ?, mensagem = ?, dt_criacao = now(), status = ?");
        $sql->execute(array($nome, $celular, $telefone, $email, $assunto, $mensagem, '1'));
    }

    public function getTotalContatos(){
        $sql = $this->db->prepare("SELECT id FROM contatos");
        $sql->execute();
        $sql = $sql->rowCount();
        return $sql;
    }


    public function getContatos($pagina, $limite){
        $p = ($pagina - 1) * $limite;
        $sql = $this->db->prepare("SELECT * FROM contatos ORDER BY id DESC LIMIT ".$p.",  ".$limite." ");
        $sql->execute();
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getContato($id){
        $sql = $this->db->prepare("SELECT * FROM contatos WHERE id = ?");
        $sql->execute(array($id));
        $sql = $sql->fetch();
        return $sql;
    }

    public function pesquisarContatos($termo, $pagina, $limite){
        $p = ($pagina - 1) * $limite;
        $sql = $this->db->prepare("SELECT * FROM contatos WHERE nome LIKE ? OR email LIKE ? ORDER BY id DESC LIMIT ".$p.",  ".$limite." ");
        $sql->execute(array("%".strtolower($termo)."%", "%".strtolower($termo)."%"));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function pesquisaContatos($termo){
        $sql = $this->db->prepare("SELECT * FROM contatos WHERE nome LIKE ? OR email LIKE ? ORDER BY id DESC");
        $sql->execute(array("%".strtolower($termo)."%", "%".strtolower($termo)."%"));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getContatosStatus($status){
        $sql = $this->db->prepare("SELECT * FROM contatos WHERE status = ?");
        $sql->execute(array($status));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getContatoComStatus($status, $pagina, $limite){
        $p = ($pagina - 1) * $limite;
        $sql = $this->db->prepare("SELECT * FROM contatos WHERE status = ? ORDER BY id DESC LIMIT ".$p.",  ".$limite." ");
        $sql->execute(array($status));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function editarContato($id, $nome, $celular, $telefone, $email, $assunto, $mensagem, $status){
        $sql = $this->db->prepare("UPDATE contatos SET nome = ?, celular = ?, telefone = ?, email = ?, assunto = ?, mensagem = ?, status = ? WHERE id = ?");
        $sql->execute(array($nome, $celular, $telefone, $email, $assunto, $mensagem, $status, $id));
    }

    public function setStatus($id, $status){
        $sql = $this->db->prepare("UPDATE contatos SET status = ? WHERE id = ?");
        $sql->execute(array($status, $id));
    }

    public function excluirContato($id){
        $sql = $this->db->prepare("DELETE FROM contatos WHERE id = ?");
        $sql->execute(array($id));
    }

    public function enviarEmailComTemplate($destnome, $destemail, $assunto, $mensagem){
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            $mail->IsSMTP();
            $mail->Host = $this->MailHost;
            // Enable this option to see deep debug info
            // $mail->SMTPDebug = 4;
            $mail->SMTPSecure = 'tls';
            $mail->Port = $this->MailPort;
            $mail->SMTPAuth = true;
            $mail->CharSet = "UTF-8";
            $mail->Username = $this->MailUsername;
            $mail->Password = $this->MailPassword;

            $mail->isHTML(true);

            $mail->SetFrom($this->MailUsername, $this->MailName);

            $mail->Subject = $assunto;
            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

            $msg = "
            <html xmlns=\"http://www.w3.org/1999/xhtml\">
                <head>
                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
                <title>" . $assunto . "</title>
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
            
                    img {
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
                                                                                                <td valign=\"top\" width=\"150\"><img src='" . BASE_URL . "/assets/imgs/logo.png' alt=\"Logo\" title=\"Logo\" width='150' height='60' data-max-width=\"100\"></td>
                                                                                                <td width=\"10\" valign=\"top\">&nbsp;</td>
                                                                                                <td valign=\"middle\" style=\"vertical-align: middle;\">
                                                                                                    <div class=\"contentEditableContainer contentTextEditable\">
                                                                                                        <div class=\"contentEditable\" style=\"text-align: left;font-weight: light; color:#555555;font-size:26;line-height: 39px;font-family: Helvetica Neue;\">
                                                                                                            <h1 class=\"big\"><a target='_blank' href='" . BASE_URL . "/assets/imgs/logo.png' style='color:#444444'>Enxovais DuLar</a></h1>
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
                                                                                                            <h2 style=\"font-size: 20px;\">" . $assunto . "</h2>
                                                                                                            <br>
                                                                                                            <p>" . $mensagem . "</p>
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
                                                                                                                <a target='_blank' href='" . BASE_URL . "/contato' style='color:#AAAAAA;'>Entre em contato</a> <br/>
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

            $mail->AddAddress($destemail, $destnome);

            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
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
}