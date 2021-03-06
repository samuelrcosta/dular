window.onload = function () {
    if(getUrlVars().hasOwnProperty("find")){
        var find = getUrlVars()['find'];
        $("#find").val(find);
    }
    if(getUrlVars().hasOwnProperty("filtro")){
        $("#"+getUrlVars()['filtro']).addClass('dis_filtro_ativo');
    }else{
        $("#0").addClass('dis_filtro_ativo');
    }

    addFixedBottomContactBar();

    setTimeout(function(){
        showDealerHighlight();
    }, 1500);
}


function pesquisar(){
    /*
    var str = window.location.href;
    if(str.indexOf("find") != -1){
        var res = str.replace('?find=', "EXX");
        var pos = res.indexOf("EXX");
        var final = res.substring(0, pos);
    }else{
        var final = window.location.href;
    }
    if(final.indexOf('filtro') != -1){
        window.location.href = final+"&find="+$("#find").val();
    }else{
        window.location.href = final+"?find="+$("#find").val();
    }
    */
    var url = getUrlVars();
    var filtro = 0;
    var p = 0;
    var control = 0;
    var find = 0;
    if(url.hasOwnProperty("filtro")){
        filtro = url['filtro'];
        control = 1;
    }
    if(url.hasOwnProperty("p")){
        p = url['p'];
        control = 1;
    }
    if(url.hasOwnProperty("find")){
        find = url['find'];
        control = 1;
    }
    if(control == 0){
        window.location.href = window.location.href + "?find=" + $("#find").val();;
    }else{
        var url_vazia = window.location.href.substring(0, window.location.href.indexOf('?'));
        if(find != 0)
            url_vazia = url_vazia + "?find=" + $("#find").val();
        if(filtro != 0)
            url_vazia = url_vazia + "&p=" + p;
        if(filtro != 0)
            url_vazia = url_vazia + "&filtro=" + filtro;
        window.location.href = url_vazia;
    }
}

function pesquisarTeclado() {
    if(event.keyCode == "13"){
        pesquisar();
    }
}
function somenteNumeros(num) {
    var er = /[^0-9]/;
    er.lastIndex = 0;
    var campo = num;
    if (er.test(campo.value)) {
        campo.value = "";
    }
}

function proximaPagina() {
    var pgatual = $("#pagina").val();
    var proxpg = parseInt(pgatual) + 1;
    if(proxpg <= parseInt($("#total-paginas").html())){
        var url = getUrlVars();
        var filtro = 0;
        var find = 0;
        var p = 0;
        var control = 0;
        if(url.hasOwnProperty("filtro")){
            filtro = url['filtro'];
            control = 1;
        }
        if(url.hasOwnProperty("find")){
            find = url['find'];
            control = 1;
        }
        if(url.hasOwnProperty("p")){
            p = url['p'];
            control = 1;
        }
        if(control == 0){
            window.location.href = window.location.href + "?p=" + proxpg;
        }else{
            var url_vazia = window.location.href.substring(0, window.location.href.indexOf('?'));
            url_vazia = url_vazia + "?p=" + proxpg;
            if(filtro != 0)
                url_vazia = url_vazia + "&filtro=" + filtro;
            if(find != 0)
                url_vazia = url_vazia + "&find=" + find;
            window.location.href = url_vazia;
        }
    }
}

function anteriorPagina(){
    var pgatual = $("#pagina").val();
    var proxpg = parseInt(pgatual) - 1;
    if(proxpg > 0){
        var url = getUrlVars();
        var filtro = 0;
        var find = 0;
        var p = 0;
        var control = 0;
        if(url.hasOwnProperty("filtro")){
            filtro = url['filtro'];
            control = 1;
        }
        if(url.hasOwnProperty("find")){
            find = url['find'];
            control = 1;
        }
        if(url.hasOwnProperty("p")){
            p = url['p'];
            control = 1;
        }
        if(control == 0){
            window.location.href = window.location.href + "?p=" + proxpg;
        }else{
            var url_vazia = window.location.href.substring(0, window.location.href.indexOf('?'));
            url_vazia = url_vazia + "?p=" + proxpg;
            if(filtro != 0)
                url_vazia = url_vazia + "&filtro=" + filtro;
            if(find != 0)
                url_vazia = url_vazia + "&find=" + find;
            window.location.href = url_vazia;
        }
    }
}

function mudarPagina(){
    var pagina = $("#pagina").val();
    var url = getUrlVars();
    var filtro = 0;
    var find = 0;
    var p = 0;
    var control = 0;
    if(url.hasOwnProperty("filtro")){
        filtro = url['filtro'];
        control = 1;
    }
    if(url.hasOwnProperty("find")){
        find = url['find'];
        control = 1;
    }
    if(url.hasOwnProperty("p")){
        p = url['p'];
        control = 1;
    }
    if(control == 0){
        window.location.href = window.location.href + "?p=" + pagina;
    }else{
        var url_vazia = window.location.href.substring(0, window.location.href.indexOf('?'));
        url_vazia = url_vazia + "?p=" + pagina;
        if(filtro != 0)
            url_vazia = url_vazia + "&filtro=" + filtro;
        if(find != 0)
            url_vazia = url_vazia + "&find=" + find;
        window.location.href = url_vazia;
    }
}

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

// Iniciando biblioteca
var resize = new window.resize();
resize.init();

// Declarando variáveis
var imagens;
var imagem_atual;

// Quando carregado a página
$(function ($) {

    // Quando selecionado as imagens
    $('#imagem').on('change', function () {
        enviar();
    });

});

/*
 Envia os arquivos selecionados
 */
function enviar()
{
    // Verificando se o navegador tem suporte aos recursos para redimensionamento
    if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
        alert('O navegador não suporta os recursos utilizados pelo aplicativo');
        return;
    }

    // Alocando imagens selecionadas
    imagens = $('#imagem')[0].files;

    // Se selecionado pelo menos uma imagem
    if (imagens.length > 0)
    {
        // Definindo progresso de carregamento
        $('#progresso').attr('aria-valuenow', 0).css('width', '0%');

        // Escondendo campo de imagem
        $('#imagem').hide();

        // Iniciando redimensionamento
        imagem_atual = 0;
        redimensionar();
    }
}
/*
 Redimensiona uma imagem e passa para a próxima recursivamente
*/
function redimensionar()
{
    // Se redimensionado todas as imagens
    if (imagem_atual > imagens.length)
    {
        // Definindo progresso de finalizado
        $('#progresso').html('Imagen(s) enviada(s) com sucesso');

        // Limpando imagens
        limpar();

        // Exibindo campo de imagem
        $('#imagem').show();

        // Finalizando
        return;
    }

    // Se não for um arquivo válido
    if ((typeof imagens[imagem_atual] !== 'object') || (imagens[imagem_atual] == null))
    {
        // Passa para a próxima imagem
        imagem_atual++;
        redimensionar();
        return;
    }

    // Redimensionando
    resize.photo(imagens[imagem_atual], 800, 'dataURL', function (imagem) {

        // Salvando imagem no servidor
        var id = atob(atob($("#progresso").attr("data-id")));
        $.post(BASE_URL+'/produtosCMS/salvarFoto', {id:id, imagem: imagem}, function(get_retorno) {

            // Definindo porcentagem
            var porcentagem = (imagem_atual + 1) / imagens.length * 100;

            // Atualizando barra de progresso
            $('#progresso').text(Math.round(porcentagem) + '%').attr('aria-valuenow', porcentagem).css('width', porcentagem + '%');

            // Aplica delay de 1 segundo
            // Apenas para evitar sobrecarga de requisições
            // e ficar visualmente melhor o progresso
            complete:
              if(get_retorno == "1") {
                  setTimeout(function () {
                      // Passa para a próxima imagem
                      imagem_atual++;
                      redimensionar();
                  }, 1000);
              }
        });

    });
}

function limpar()
{
    var input = $("#imagem");
    input.replaceWith(input.val('').clone(true));
    location.reload();
}

function validar(){
    $("#submit").hide();
    msg = '<ul class="list-group">';
    if(validaForm() == -1){
        $("#retorno").slideDown().html(msg);
        $("#submit").show();
        return false;
    }else{
        return true;
    }
}

function validaForm(){
    var input = $('input');
    var textarea = $('textarea');
    var primeiro = 0;
    for(i = 0; i < input.length; i++){
        var text = input[i];
        if(text.getAttribute('data-ob') == "1" && text.value == ''){
            msg = msg+'<li class="list-group-item list-group-item-danger">O campo ' + text.getAttribute('data-alt') + ' é obrigatório</li>';
            primeiro = 1;
        }
    }
    for(i = 0; i < textarea.length; i++){
        var text = textarea[i];
        if(text.getAttribute('data-ob') == "1" && text.value == ''){
            msg = msg+'<li class="list-group-item list-group-item-danger">O campo ' + text.getAttribute('data-alt') + ' é obrigatório</li>';
            primeiro = 1;
        }
    }
    if($("#email").val() != null && $("#email").val() != ''){
        if(validaEmail($("#email").val())){
            msg = msg+'<li class="list-group-item list-group-item-danger">E-mail inválido</li>';
            primeiro = 1;
        }
    }
    if($("#cpf").val() != null && $("#cpf").val() != ''){
        var cpf = $("#cpf").val().replace(/\D+/g, '');
        if(!validaCPF(cpf)){
            msg = msg+'<li class="list-group-item list-group-item-danger">CPF inválido</li>';
            primeiro = 1;
        }
    }

    msg = msg+'</ul>';
    if (primeiro == 1){
        return -1;
    } else{
        return 0;
    }
}

function validaEmail(text) {
    usuario = text.substring(0, text.indexOf("@"));
    dominio = text.substring(text.indexOf("@")+ 1, text.length);

    if ((usuario.length >=1) &&
      (dominio.length >=3) &&
      (usuario.search("@")==-1) &&
      (dominio.search("@")==-1) &&
      (usuario.search(" ")==-1) &&
      (dominio.search(" ")==-1) &&
      (dominio.search(".")!=-1) &&
      (dominio.indexOf(".") >=1)&&
      (dominio.lastIndexOf(".") < dominio.length - 1)) {
        return 0;
    }
    else{
        return -1;
    }
}

function validaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
    if (strCPF == "00000000000") return false;

    for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    return true;
}

function addFixedBottomContactBar(){
    let desktop = `
        <div class="directWppBlock">
              <div class="container">
                    <div class="row">
                          <div class="col-md-6"> 
                              <div class="directWppBlock__contacts">
                                    <div class="item item--phone">
                                        <a href="tel:+55623514-5771">
                                            <div class="img"></div>
                                            <div class="titulo">Atendimento<br>
                                                <div class="numero">(62) 3514-5771</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="item item--whatsapp">
                                        <a href="https://api.whatsapp.com/send?1=pt_BR&phone=5562984845771" target="_blank">
                                            <div class="img"></div>
                                            <div class="titulo">Whatsapp<br>
                                                <div class="numero">(62) 98484-5771</div>
                                            </div>
                                        </a>
                                    </div>
                              </div>
                        </div>
                        <div class="col-md-6">
                              <div class="directWppBlock__buttons">
                                <a class="dtc-button" href="https://api.whatsapp.com/send?1=pt_BR&phone=5562984845771" target="_blank">Fale Agora</a>
                                <a class="dtc-button" href="${BASE_URL}/revendedor">Seja um Revendedor</a>
                              </div>
                        </div>
                    </div>
              </div>
        </div>
    `;
    let mobile = `
        <div class="wppMobileBlock"><a href="https://api.whatsapp.com/send?1=pt_BR&phone=5562984845771" target="_blank"></a></div>
    `;
    if(window.innerWidth >= 992){
        $('body').append(desktop);
        $('.footer').css('padding-bottom', `${$('.directWppBlock').innerHeight()}px`);
    }else{
        $('body').append(mobile);
    }
}

function getTimestamp(){
    return Math.floor(Date.now() / 1000);
}

function showDealerHighlight(){
    let history = localStorage.getItem('popIat');
    if((history && getTimestamp() >= history) || history == null){
        let desktop = `
    <div class="dealerPopContainer">
      <div class="modal fade dealerPopContainer" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="dealerPopContainer__diagonalStyle"></div>
            <div class="right-content">
              <h2>Seja um Revendedor DuLar</h2>
              <div class="dealer_adv">
                <ul>
                  <li>Lucros de até 100%</li>
                  <li>Baixo investimento inicial</li>
                </ul>
              </div>
              <a href="${BASE_URL}/revendedor" class="dealer_contact">Ver todas as vantangens</a>
              <div class="dealer_contacts">
                <ul>
                  <li><a href="https://www.facebook.com/jorliane/" target="_blank"></a></li>
                  <li><a href="https://www.instagram.com/Enxovais_Dular/" target="_blank"></a></li>
                  <li><a href="https://api.whatsapp.com/send?1=pt_BR&phone=5562984845771" target="_blank"></a></li>
                </ul>
              </div>
            </div>
            <div class="left-content">
              <img class="dealer_logomarca" src="${BASE_URL}/assets/imgs/logo-white.png" />
              <div class="dealer_addr">
                Av. Bernardo Sayão Qd 01 Lt. 19<br/>
                Residencial Tereza Lima<br/>
                Inhumas - GO<br/>
              </div>
              <div class="dealer_contacts">
                <a href="https://api.whatsapp.com/send?1=pt_BR&phone=5562984845771" target="_blank">Falar Agora</a>
                <a href="https://www.google.com/maps/place/Av.+Bernardo+Say%C3%A3o,+604,+Inhumas+-+GO,+75400-000/@-16.349532,-49.51099,16z/data=!4m5!3m4!1s0x935dd7e1d7521103:0x1644e2e377076424!8m2!3d-16.3495321!4d-49.5109904?hl=pt-BR" target="_blank">Localização da Fábrica</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  `;

        let mobile = `
        <div class="modal fade dealerPopContainerMobile" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="inner-content">
              <h2>Seja um Revendedor DuLar</h2>
              <div class="dealer_adv">
                <ul>
                  <li>Lucros de até 100%</li>
                  <li>Baixo investimento inicial</li>
                </ul>
              </div>
              <a href="${BASE_URL}/revendedor" class="dealer_contact">Ver todas as vantangens</a>
              <div class="dealer_contacts">
                <ul>
                  <li><a href="https://www.facebook.com/jorliane/" target="_blank"></a></li>
                  <li><a href="https://www.instagram.com/Enxovais_Dular/" target="_blank"></a></li>
                  <li><a href="https://api.whatsapp.com/send?1=pt_BR&phone=5562984845771" target="_blank"></a></li>
                  <li><a href="https://www.google.com/maps/place/Av.+Bernardo+Say%C3%A3o,+604,+Inhumas+-+GO,+75400-000/@-16.349532,-49.51099,16z/data=!4m5!3m4!1s0x935dd7e1d7521103:0x1644e2e377076424!8m2!3d-16.3495321!4d-49.5109904?hl=pt-BR" target="_blank"></a></li>
                </ul>
                <div>
                  <img class="dealer_logomarca" src="${BASE_URL}/assets/imgs/logo-white.png" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    `;

        if(window.innerWidth >= 992){
            $('body').append(desktop);
            $('.dealerPopContainer').modal();
            $('.dealerPopContainer').on('hide.bs.modal', function(){
                $('.modal-backdrop').remove();
            });
            localStorage.setItem('popIat', getTimestamp() + (5 * 60));
        }else{
            $('body').append(mobile);
            $('.dealerPopContainerMobile').modal();
            $('.dealerPopContainerMobile').on('hide.bs.modal', function(){
                $('.modal-backdrop').remove();
            });
        }
    }
}