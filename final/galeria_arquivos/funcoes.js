$(document).ready(function (e) {

    carrega_imagens();

    $("#envio_fotos_galeria").click(function (event) {
        event.preventDefault();
        var formulario_fotos = $("#formulario_fotos_galeria")[0];
        var acao = "inserir_imagens";
        //console.log(formulario_fotos); 

        var dados_formulario_fotos = new FormData(formulario_fotos);
        // dados_formulario_fotos.append("acao_inserir_imagens_galeria",acao);

        $.ajax({
            type: "POST",
            enctype: "multipart/form-data",
            dataType: "json",
            url: "http://localhost/engenharia/controladora/ImagemControladora.php",
            cache: false,
            processData: false,
            contentType: false,
            data: dados_formulario_fotos,
            success: function (retorno) {
                debugger;
                if (retorno > 0) {
                    if (retorno != null) {
                        $("#mensagem-imagem-inserida").html("Imagens salvas com sucesso");
                        $("#mensagem-imagem-inserida").show();
                        $("#mensagem-imagem-inserida").fadeOut(2000);

                        limpa_carousel();
                        carrega_imagens();
                    }
                }
            },
            error: function (xhr, status, error) {
                console.log(status, error);
            }
        });
    });

    // var map = new google.maps.Map(document.getElementById("mapa"), {
    //     center: new google.maps.LatLng(-20.471233343961543, -54.60916738531714),
    //     zoom: 13,
    //     mapTypeId: google.maps.MapTypeId.TERRAIN,
    //     scrollwheel: '1'
    // });

    // To view directions form and data
    //=========Direction view end

    // var conteudo = "Marco Volpini Empresa"

    // var marker = new google.maps.Marker({
    //     position: new google.maps.LatLng(-20.471233343961543, -54.60916738531714),
    //     map: map,
    //     animation: google.maps.Animation.DROP,
    //     icon: ''
    // });
    // marker.setMap(map);
    // var infowindow = new google.maps.InfoWindow({
    //     content: conteudo
    // });
    // infowindow.open(map, marker);
    // google.maps.event.addListener(marker, 'click', function () {
    //     infowindow.open(map, marker);
    // });


    // map = new google.maps.Map(document.getElementById("mapa"), {
    //     center: {
    //         lat: -20.471233343961543,
    //         lng: -54.60916738531714
    //     },
    //     zoom: 14,
    //     mapTypeId: google.maps.MapTypeId.ROADMAP,
    // });
    // console.log(map);



    // var contentString = "Marco Volpini";

    // var infowindow = new google.maps.InfoWindow({
    //     content: contentString
    // });

    // const localizacao = {
    //     lat: -20.471233343961543,
    //     long: -54.60916738531714
    // };

    // console.log(localizacao);

    // var marker = new google.maps.Marker({
    //     position: new google.maps.LatLng(-20.471233343961543, -54.60916738531714),
    //     map,
    //     title: "Hello World!",
    // });
    // $("#mapa").show();
    // marker.addListener('click', function () {
    //     infowindow.open(map, marker);
    // });


    setInterval(function () {
//        console.log("Idail Neto");
        limpa_carousel();
        carrega_imagens();
      }, 180000);

});


function limpa_carousel() {
    // for(i = 0;i < 25;i++)
    // {
    //     var corusel = $("#carouselExampleIndicators");
    //     indiceatual = $("div.active").index();
    //     var elementoativo = corusel.find(".item.active");
    //     elementoativo.remove();
    //     var proximoelemento = corusel.find(".item").first();
    //     proximoelemento.addClass("active");
    // }

    $.ajax({
        url: "http://localhost/engenharia_testando/final/controladora/ImagemControladora.php",
        type: "post",
        dataType: "json",
        data: { processo: "busca_imagens_galeria" },
        success: function (retorno) {
            debugger;
            if (retorno != null) {
                for (var i = 0; i < retorno.length; i++) {
                    $("#li" + i).remove();
                    $("#div" + i).remove();
                }
            }
        },
        error: function (xhr, status, error) {
            console.log(status, error);
        }
    });
}

function carrega_imagens() {
    $.ajax({
        url: "http://localhost/engenharia_testando/final/controladora/ImagemControladora.php",
        type: "post",
        dataType: "json",
        data: { processo: "busca_imagens_galeria" },
        success: function (retorno) {
            //debugger;
            if (retorno != null) {

                //$("#carouselExampleIndicators").empty();
                $("#carouselExampleIndicators ol li").empty();
                //$("#galeria_imagens div").empty();

                var recebe_indicadores = document.querySelector("#indicadores");
                var recebe_imagens = document.querySelector("#galeria_imagens");


                var recebe_controlador_ativo;
                var contador_controlador = 0;

                while (contador_controlador < retorno.length) {
                    if (contador_controlador == 0) {
                        recebe_controlador_ativo = "active";
                    } else {
                        recebe_controlador_ativo = "";
                    }
                    recebe_indicadores.innerHTML +=
                        "<li data-target='#carouselExampleIndicators' data-slide-to=" + contador_controlador + " class='" + recebe_controlador_ativo + "' id='li" + contador_controlador + "'></li>";
                    contador_controlador++;

                    console.log("Controladores:" + recebe_indicadores);
                }

                var contador_imagens = 0;
                var recebe_imagem_ativo = "";

                //debugger;
                while (contador_imagens < retorno.length) {
                    if (retorno[contador_imagens].codigo_imagem == 1) {
                        recebe_imagem_ativo = "active";
                    } else {
                        recebe_imagem_ativo = "";
                    }

                    recebe_imagens.innerHTML +=
                        "<div class='carousel-item " + recebe_imagem_ativo + "' id='div" + contador_imagens + "'>" +
                        "<img class='d-block w-100' id='imagem_galeria' src='../final/ORIGINAL/" + retorno[contador_imagens].imagem + "' alt='Second slide' style='background-size: cover;'>" +
                        "<div class='overlay'></div>" +
                        "</div>";

                    contador_imagens++;

                    console.log("Resultado imagens:" + recebe_imagens);
                }

                $("#indicadores").append(recebe_indicadores);
                $("#galeria_imagens").append(recebe_imagens);
            }
        },
        error: function (xhr, status, error) {
            console.log(status, error);
        }
    });
}