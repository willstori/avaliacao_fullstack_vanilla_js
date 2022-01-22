/* 

Informe o caminho onde foram descompactados os arquivos da pasta /api

Ex.: http://localhost/api

*/
const API = "http://localhost/api";

$(document).ready(function(){

    /* Swiper para o carrosel Desktop */
    var swiperDesktop = new Swiper('#carrosel-desktop', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },
        // Navigation arrows
        navigation: {
            nextEl: '.proximo',
            prevEl: '.anterior',
        },
        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });

    /* Swiper para o carrosel Celular */
    var swiperCelular = new Swiper('#carrosel-celular', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },
        // Navigation arrows
        navigation: {
            nextEl: '.proximo',
            prevEl: '.anterior',
        },
        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });

    carregarCarrosel(swiperDesktop, "id", "ASC");
    carregarCarrosel(swiperCelular, "id", "ASC");
    carregarArtigos("id", "ASC");

});

/* Evento de Cadastro de Contato */
$(document).on('submit', '#contato', function () {    
    enviarContato($(this));    
});

/* Evento para abrir Modal */
$(document).on('click', '#abrir-modal', function(){
    $('.modal').fadeIn('fast');
});

/* Evento para fechar Modal */
$(document).on('click', '.fechar', function(){
    $('.modal').fadeOut('fast');            
});

/* Função para Inicialização do carrosel */
function carregarCarrosel(swiper, sort, order){
    $.ajax({
        type: "get",
        url: API + "/hero",
        data: {_sort: sort, _order: order},
        dataType: "json",
        success: function (response) {
            for(var i = 0; i < response.length; i++){
                swiper.appendSlide(`
                <div class="swiper-slide">
                    <div class="item-carrosel">
                        <h2>${response[i]['id']}</h2>
                        <p>${response[i]['content']}</p>
                    </div>
                </div>
                `);
            }          
            swiper.slideNext(0);
            swiper.update();
        }
    });
}

/* Função para Inicialização dos Artigos */
function carregarArtigos(sort, order){
    $.ajax({
        type: "get",
        url: API + "/articles",
        data: {_sort: sort, _order: order},
        dataType: "json",
        success: function (response) {
            for(var i = 0; i < response.length; i++){
                $('.artigos').append(`
                <article class="${response[i]['big'] == 1 ? "artigo-grande" : "artigo-pequeno"}">
                    <img src="${API + "/uploads/" + response[i]['url']}" alt="">
                    <div class="texto ${response[i]['hot'] == 1 ? "rodape" : "topo"}">
                        <h3>${response[i]['title']}</h3>
                        <p>${response[i]['content']}</p>
                    </div>
                </article>
                `);
            }
        }
    });
}

/* Função para envio do Contato */
function enviarContato(form){
    $.ajax({
        type: "post",
        url: API + "/contacts",
        data: form.serialize(),
        dataType: "json",
        success: function (response) {
            if(response.type == "success"){
                form.trigger('reset')
            }
            setTimeout(function(){
                $('#mensagem').text("Entraremos em contato o mais rápido possível");    
            }, 3500); 
            $('#mensagem').text(response.message);                   
        }
    });
}