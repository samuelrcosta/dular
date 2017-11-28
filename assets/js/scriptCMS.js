setTimeout(function(){
    $(".alerta").slideUp();
}, 6000);

window.onload = function () {
    var altura = $(document).height();
    $(".sidebar").css("height", altura);
}