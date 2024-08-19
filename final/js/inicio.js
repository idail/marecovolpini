$(document).ready(function () {
    carrega_informacoes_pagina_inicial();
    setInterval(function () {
        //debugger;
        limpa_informacoes_pagina_inicial();
        carrega_informacoes_pagina_inicial();
    }, 180000);

    function limpa_informacoes_pagina_inicial()
    {
        $("#exibi_informacoes_pagina_inicial").empty();
    }

    function carrega_informacoes_pagina_inicial() {
        $.ajax({
            type: "POST",
            dataType: "json",
            //http://localhost/engenharia_testando/final/controladora/ImagemControladora.php
            url: "../controladora/ImagemControladora.php",
            data: { processo_busca_imagens_pagina_inicial: "buscar_informacoes_pagina_inicial" },
            success: function (retorno) {
                //debugger;
                //console.log(retorno);

                var elemento_informacoes_pagina_inicial = document.querySelector("#exibi_informacoes_pagina_inicial");
                for (let index = 0; index < retorno.length; index++) {
                    elemento_informacoes_pagina_inicial.innerHTML +=
                        "<div class='col-sm-6 col-md-4'>" +
                        "<div class='project'>" +
                        "<figure class='project-thumbnail'>" +
                        "<a href='Imagens/Inicial/" + retorno[index].imagem_inicial + "' class='gallery' data-lightbox='mygallery'><img src='Imagens/Inicial/" + retorno[index].imagem_inicial + "' alt='Project 1' /></a>" +
                        "</figure>" +
                        "<h3 class='project-title'><a href='#''>" + retorno[index].descricao_imagem_inicial + "</a></h3>" +
                        // "<small class='project-subtitle'>"+retorno[index].descricao_imagem_inicial+"</small>"+
                        // "<p>"+retorno[index].descricao_imagem_inicial+"</p>"+
                        // "<a href='#'' class='more-link'><img src='arrow.png' alt=''></a>"+
                        "</div>" +
                        "</div>"
                }

                $("#exibi_informacoes_pagina_inicial").append(elemento_informacoes_pagina_inicial);
                // if (retorno != null) {
                //     $("#mensagem_fotos_excluidas").html("Fotos excluida(s) com sucesso");
                //     $("#mensagem_fotos_excluidas").show();
                //     $("#mensagem_fotos_excluidas").fadeOut(3000);
                //     carrega_imagens_painel();
                // }
            },
            error: function (xhr, status, error) {
                console.log(status, error);
            }
        });
    }

});