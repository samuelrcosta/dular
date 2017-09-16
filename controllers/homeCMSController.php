<?php
class homeCMSController extends controller{
    public function index(){
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $dados = array(
            'titulo' => 'Administrador',
            'usuario' => $u,
            'tipo' => 1,
        );
        $this->loadTemplateCMS('homeCMS', $dados);
    }


}

function inserirMenu($usuario, $tipo){
    if($usuario->getFoto() == ""){
        $foto = "default.jpg";
    }else{
        $foto = "logo".$usuario->getFoto();
    }
    if($tipo == 0){
        echo "<sidebar class=\"sidebar\">
            <div class=\"logo\">
                <a href=\"\"><img src=\"assets/imgs/logo.png\" border=\"0\" width=\"35\" /></a>
            </div>
            <div class=\"userinfo\">
                <div class=\"userinfo_photo\">
                    <img class='img-responsive img-circle' src='assets/media/avatar/".$foto."'/>
                </div>
                <div class=\"userinfo_info\">
                    <p>".$usuario->getNome()."</p>
                    <small>".$usuario->getFuncao()."</small>
                </div>
                <div style=\"clear:both\"></div>
            </div>
            <menu>
                <ul>
                    <li class=\"active\"><a href=\"home\">Dashboard</a></li>
                    <li ><a href='orcamentosCMS'>Orçamentos</a></li>
                    <li ><a href='contatos'>Contatos</a></li>
                    <li ><a href='perfil'>Meu Perfil</a></li>
                    <li ><a href='configuracoes'>Configurações</a></li>
                    <li ><a href='login/logout'>Sair</a></li>
                </ul>
            </menu>
        </sidebar>";
    } else if ($tipo == 1){
        echo "<sidebar class=\"sidebar\">
            <div class=\"logo\">
                <a href=\"\"><img src=\"assets/imgs/logo.png\" border=\"0\" width=\"35\" /></a>
            </div>
            <div class=\"userinfo\">
                <div class=\"userinfo_photo\">
                    <img class='img-responsive img-circle' src='assets/media/avatar/".$foto."'/>
                </div>
                <div class=\"userinfo_info\">
                    <p>".$usuario->getNome()."</p>
                    <small>".$usuario->getFuncao()."</small>
                </div>
                <div style=\"clear:both\"></div>
            </div>
            <menu>
                <ul>
                    <li ><a href=\"home\">Dashboard</a></li>
                    <li class='active' ><a href='orcamentosCMS'>Orçamentos</a></li>
                    <li ><a href='contatos'>Contatos</a></li>
                    <li ><a href='perfil'>Meu Perfil</a></li>
                    <li ><a href='configuracoes'>Configurações</a></li>
                    <li ><a href='login/logout'>Sair</a></li>
                </ul>
            </menu>
        </sidebar>";
    } else if($tipo == 2){
        echo "<sidebar class=\"sidebar\">
            <div class=\"logo\">
                <a href=\"\"><img src=\"assets/imgs/logo.png\" border=\"0\" width=\"35\" /></a>
            </div>
            <div class=\"userinfo\">
                <div class=\"userinfo_photo\">
                    <img class='img-responsive img-circle' src='assets/media/avatar/".$foto."'/>
                </div>
                <div class=\"userinfo_info\">
                    <p>".$usuario->getNome()."</p>
                    <small>".$usuario->getFuncao()."</small>
                </div>
                <div style=\"clear:both\"></div>
            </div>
            <menu>
                <ul>
                    <li ><a href=\"home\">Dashboard</a></li>
                    <li ><a href=\"pedidos\">Pedidos</a></li>
                    <li class='active' ><a href='contatos'>Contatos</a></li>
                    <li ><a href='perfil'>Meu Perfil</a></li>
                    <li ><a href='configuracoes'>Configurações</a></li>
                    <li ><a href='login/logout'>Sair</a></li>
                </ul>
            </menu>
        </sidebar>";
    } else if($tipo == 3){
        echo "<sidebar class=\"sidebar\">
            <div class=\"logo\">
                <a href=\"\"><img src=\"assets/imgs/logo.png\" border=\"0\" width=\"35\" /></a>
            </div>
            <div class=\"userinfo\">
                <div class=\"userinfo_photo\">
                    <img class='img-responsive img-circle' src='assets/media/avatar/".$foto."'/>
                </div>
                <div class=\"userinfo_info\">
                    <p>".$usuario->getNome()."</p>
                    <small>".$usuario->getFuncao()."</small>
                </div>
                <div style=\"clear:both\"></div>
            </div>
            <menu>
                <ul>
                    <li ><a href=\"home\">Dashboard</a></li>
                    <li ><a href=\"pedidos\">Pedidos</a></li>
                    <li ><a href='contatos'>Contatos</a></li>
                    <li class='active' ><a href='perfil'>Meu Perfil</a></li>
                    <li ><a href='configuracoes'>Configurações</a></li>
                    <li ><a href='login/logout'>Sair</a></li>
                </ul>
            </menu>
        </sidebar>";
    } else if($tipo == 4){
        echo "<sidebar class=\"sidebar\">
            <div class=\"logo\">
                <a href=\"\"><img src=\"assets/imgs/logo.png\" border=\"0\" width=\"35\" /></a>
            </div>
            <div class=\"userinfo\">
                <div class=\"userinfo_photo\">
                    <img class='img-responsive img-circle' src='assets/media/avatar/".$foto."'/>
                </div>
                <div class=\"userinfo_info\">
                    <p>".$usuario->getNome()."</p>
                    <small>".$usuario->getFuncao()."</small>
                </div>
                <div style=\"clear:both\"></div>
            </div>
            <menu>
                <ul>
                    <li ><a href=\"home\">Dashboard</a></li>
                    <li ><a href=\"pedidos\">Pedidos</a></li>
                    <li ><a href='contatos'>Contatos</a></li>
                    <li ><a href='perfil'>Meu Perfil</a></li>
                    <li class='active' ><a href='configuracoes'>Configurações</a></li>
                    <li ><a href='login/logout'>Sair</a></li>
                </ul>
            </menu>
        </sidebar>";
    }else{
        echo "<sidebar class=\"sidebar\">
    <div class=\"logo\">
        <a href=\"\"><img src=\"assets/imgs/logo.png\" border=\"0\" width=\"35\" /></a>
    </div>
    <div class=\"userinfo\">
        <div class=\"userinfo_photo\">
            <img class='img-responsive img-circle' src='assets/media/avatar/".$foto."'/>
        </div>
        <div class=\"userinfo_info\">
            <p>".$usuario->getNome()."</p>
            <small>".$usuario->getFuncao()."</small>
        </div>
        <div style=\"clear:both\"></div>
    </div>
    <menu>
        <ul>
            <li class=\"active\"><a href=\"home\">Dashboard</a></li>
            <li ><a href='pedidos'>Pedidos</a></li>
            <li ><a href='contatos'>Contatos</a></li>
            <li ><a href='perfil'>Meu Perfil</a></li>
            <li ><a href='configuracoes'>Configurações</a></li>
            <li ><a href='login/logout'>Sair</a></li>
        </ul>
    </menu>
</sidebar>";
    }
}