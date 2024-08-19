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
        url: "http://localhost/final/engenharia/controladora/ImagemControladora.php",
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
        url: "http://localhost/engenharia/final/controladora/ImagemControladora.php",
        type: "post",
        dataType: "json",
        data: { processo: "busca_imagens_galeria" },
        success: function (retorno) {
            // debugger;
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

                debugger;
                while (contador_imagens < retorno.length) {
                    if (retorno[contador_imagens].codigo_imagem == 1) {
                        recebe_imagem_ativo = "active";
                    } else {
                        recebe_imagem_ativo = "";
                    }

                    recebe_imagens.innerHTML +=
                        "<div class='carousel-item " + recebe_imagem_ativo + "' id='div" + contador_imagens + "'>" +
                        "<img class='d-block w-100' src='../final/ORIGINAL/" + retorno[contador_imagens].imagem + "' alt='Second slide' style='background-size: cover;'>" +
                        "<div class='overlay'></div>" +
                        "</div>";

                    contador_imagens++;

                    console.log("Resultado imagens:" + recebe_imagens);
                }


                // $("#li0").remove();
                // $("#li1").remove();
                // $("#li2").remove();
                // $("#li3").remove();
                // $("#li4").remove();
                // $("#li5").remove();
                // $("#li6").remove();
                // $("#li7").remove();
                // $("#li8").remove();
                // $("#li9").remove();
                // $("#li10").remove();
                // $("#div0").remove();
                // $("#div1").remove();
                // $("#div2").remove();
                // $("#div3").remove();
                // $("#div4").remove();
                // $("#div5").remove();
                // $("#div6").remove();
                // $("#div7").remove();
                // $("#div8").remove();
                // $("#div9").remove();
                // $("#div10").remove();
                // $("#div11").addClass("active");
                // $("#li11").addClass("active");

                $("#indicadores").append(recebe_indicadores);
                $("#galeria_imagens").append(recebe_imagens);
            }
        },
        error: function (xhr, status, error) {
            console.log(status, error);
        }
    });
}