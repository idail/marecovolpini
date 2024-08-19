$(document).ready(function (event) {

    $("img.checkable").imgCheckbox();
    $("#mensagem-imagem-inserida-galeria").hide();
    $("#mensagem_fotos_excluidas").hide();
    $("#mensagem-nenhuma-imagem-selecionada-exclusao-galeria").hide();
    $("#mensagem-nenhuma-imagem-selecionada-insercao-galeria").hide();
    $("#mensagem_nenhum_registro_galeria").hide();
    $("#mensagem_fotos_excluidas_pagina_inicial").hide();
    $("#mensagem_imagem_inserida_pagina_inicial").hide();
    $("#mensagem_imagem_alterada_pagina_inicial").hide();
    $("#mensagem_maximo_imagem_seis").hide();
    $("#mensagem_nenhuma_imagem_selecionada_exclusao").hide();
    $("#mensagem_nenhuma_imagem_selecionada_inserir_informacoes_inicial").hide();
    $("#mensagem_nenhuma_imagem_localizada_pagina_inicial").hide();
    $("#mensagem_item_para_alterar_descricao").hide();
    // var imagens_selecionadas;
    // recebe_ids = Array();
    // $("img").imgCheckbox({
    //     onload: function () {

    //     },
    //     onclick: function (el) {
    //         imagens_selecionadas = el.hasClass("imgChked"),
    //             ids = el.children()[0];
    //         recebe_ids.push(ids.id);


    //         console.log(ids.id + " is now " + (imagens_selecionadas ? "checked" : "not-checked") + "!");
    //     }
    // });


    //Ao realizar alterações no selecionador do formulario de edição para nova observação em hortifruti e sair ele percorre os arquivos selecionados e cria uma tag img e atribui imagem por imagem e adiciona via append ao elemento images-to-upload
    var fileCollection = new Array();
    var recebe_quantidade_imagens_galeria = 0;
    $('#imagens_galeria').on('change', function (e) {

        //debugger;
        var files = e.target.files;
        recebe_quantidade_imagens_galeria = files.length;
        $.each(files, function (i, file) {

            fileCollection.push(file);

            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function (e) {

                var template = /*'<form action="/upload">'+*/
                    '<img src="' + e.target.result + '" style="height:80px;"> ' +
                    /*'<label>Image Title</label> <input type="text" name="title">'+
                    ' <button class="btn btn-sm btn-info upload">Upload</button>'+
                    ' <a href="#" class="btn btn-sm btn-danger remove">Remove</a>'+*/
                    '</form>';

                $('#exibi_imagens_selecionadas_galeria').append(template);
            };

        });
    });
    //Fim ao realizar alterações no selecionador do formulario de edição para nova observação em hortifruti e sair ele percorre os arquivos selecionados e cria uma tag img e atribui imagem por imagem e adiciona via append ao elemento images-to-upload

    //Ao realizar alterações no selecionador do formulario de edição para nova observação em hortifruti e sair ele percorre os arquivos selecionados e cria uma tag img e atribui imagem por imagem e adiciona via append ao elemento images-to-upload
    var fileCollection = new Array();
    var imagens = [];
    $('#imagens_pagina_inicial').on('change', function (e) {

        //debugger;
        var files = e.target.files;
        var numeros = Array();

        if (files.length > 6) {
            $("input[type=file]").val(null);
            $("#exibi_campos_insercao_pagina_inicial").html("");
            $("#mensagem_maximo_imagem_seis").html("Favor selecionar até seis imagens");
            $("#mensagem_maximo_imagem_seis").show();
            $("#mensagem_maximo_imagem_seis").fadeOut(4000);
        } else {
            if ((this).files && (this).files[0]) {
                for (let i = 0; i < (this).files.length; i++) {
                    // debugger;
                    // console.log((this).files[i]);
                    imagens.push((this).files[i].name);
                }
            }


            $.each(files, function (i, file) {
                numeros.push(i);
                fileCollection.push(file);

                var reader = new FileReader();
                reader.readAsDataURL(file);

                //console.log("Registro:" + reader);

                reader.onload = function (e) {
                    // debugger;

                    // for (i = 0; i < numeros.length; i++) {
                    //     console.log(numeros[i]);
                    // }
                    // console.log("Numeros:" + i);
                    // console.log(e);
                    var template =

                        '<div class="form-group">' +
                        '<img src="' + e.target.result + '" style="height:80px;" id="imagem' + i + '"></img><br>' +
                        '<label for="exampleFormControlTextarea1">Insira a descrição desejada:</label>' +
                        '<textarea class="form-control" id="valor' + i + '" rows="3" name="texto_descricao' + i + '"></textarea>' +
                        '<input type="hidden" name="quantidade_itens_selecionados" value="' + numeros.length + '" id="quantidade_itens_selecionados"/>'
                    '</div>'

                    // '<form action="/upload">'+
                    // '<img src="' + e.target.result + '" style="height:80px;"> ' +
                    // +'<textarea rows="3"></textarea>';
                    //     '<div class="form-group">'+
                    //         +'<label for="exampleFormControlTextarea1">Insira a descrição desejada:</label>'+

                    //     +'</div>'
                    // '<label>Image Title</label> <input type="text" name="title">'+
                    // ' <button class="btn btn-sm btn-info upload">Upload</button>'+
                    // ' <a href="#" class="btn btn-sm btn-danger remove">Remove</a>'+
                    // '</form>';

                    $('#exibi_campos_insercao_pagina_inicial').append(template);
                };

            });
        }


    });
    //Fim ao realizar alterações no selecionador do formulario de edição para nova observação em hortifruti e sair ele percorre os arquivos selecionados e cria uma tag img e atribui imagem por imagem e adiciona via append ao elemento images-to-upload

    $("#salvar_imagens_galeria").click(function (event) {
        event.preventDefault();
        //debugger;
        var formulario_fotos = $("#formulario_fotos_galeria")[0];
        var acao = "inserir_imagens";



        var dados_formulario_fotos = new FormData(formulario_fotos);
        dados_formulario_fotos.append("acao_inserir_imagens_galeria", acao);

        console.log(recebe_quantidade_imagens_galeria);

        if (recebe_quantidade_imagens_galeria > 0) {
            $.ajax({
                type: "POST",
                enctype: "multipart/form-data",
                dataType: "json",
                //http://localhost/engenharia_testando/final/controladora/ImagemControladora.php
                url: "../controladora/ImagemControladora.php",
                cache: false,
                processData: false,
                contentType: false,
                data: dados_formulario_fotos,
                success: function (retorno) {
                    console.log(retorno);
                    if (retorno > 0) {
                        if (retorno != null) {
                            $("#mensagem-imagem-inserida").html("Imagens salvas com sucesso");
                            $("#mensagem-imagem-inserida").show();
                            $("#mensagem-imagem-inserida").fadeOut(4000);
                            $("#exibi_imagens_selecionadas_galeria").empty();
                            $('input[type=file]').val(null);
                            carrega_imagens_painel();
                        }
                    }
                },
                error: function (xhr, status, error) {
                    console.log(status, error);
                }
            });
        } else {
            $("#mensagem-nenhuma-imagem-selecionada-insercao-galeria").html("Por favor, selecione as imagens que deseja salvar para a galeria");
            $("#mensagem-nenhuma-imagem-selecionada-insercao-galeria").show();
            $("#mensagem-nenhuma-imagem-selecionada-insercao-galeria").fadeOut(4000);
        }



    });


    $("#salvar_informacoes_pagina_inicial").click(function (e) {
        e.preventDefault();
        //debugger;
        var dados_formulario_pagina_inicial = $("#formulario_informacoes_pagina_inicial")[0];


        var dados_pagina_inicial = new FormData(dados_formulario_pagina_inicial);
        var recebe_quantidade_itens_selecionados = $("#quantidade_itens_selecionados").val();
        var salvar_dados_pagina_inicial = "informacoes_pagina_inicial";

        dados_pagina_inicial.append("salvar_dados_pagina_inicial", salvar_dados_pagina_inicial);
        dados_pagina_inicial.append("quantidade_itens", recebe_quantidade_itens_selecionados);



        var quantidade = imagens.length;


        console.log(dados_formulario_pagina_inicial);
        var informacoes = new Array();

        var dados = Array();

        var dados_verificando = Array();

        var textos = Array();

        for (itens = 0; itens < quantidade; itens++) {
            var recebe_textos = $("#valor" + itens).val();
            var imagen_selecionada = imagens[itens];
            var texto_inserido = recebe_textos;
            var v = imagens[itens] + "," + recebe_textos;


            var valores = { "imagem": imagens[itens], "texto": recebe_textos }
            dados.push(valores);
            dados_verificando.push(v);

            var textos_inseridos = { "textos_descricao": recebe_textos }
            textos.push(textos_inseridos);
            //var valores = {"valor":v}
            // dados.push(imagens[itens]);
            // dados.push(recebe_textos);
            //dados.push(recebe_textos);
            // var dados = [
            //     {
            //     "imagem_selecionada":imagens[itens],
            //     "texto_inserido":recebe_textos
            //     }
            // ]
            // dados["imagem_selecionada"+itens] = imagens[itens];
            // dados["texto_inserido"+itens] = recebe_textos;

            // informacoes.push("imagem_selecionada"=>imagens[itens]);



            //     imagens_selecionadas.push(imagen_selecionada);
            //     texto_preenchidos.push(recebe_textos);
            // }


            informacoes.push(dados);

        }
        var lista_final = JSON.stringify(dados);


        var lista_verificando = JSON.stringify(dados_verificando);

        var lista_textos = JSON.stringify(textos);


        dados_pagina_inicial.append("lista_dados_associativo", lista_final);

        dados_pagina_inicial.append("lista_dados_associativo_verificando", lista_verificando);

        dados_pagina_inicial.append("lista_textos_descricoes", lista_textos);

        if (dados.length > 0) {
            $.ajax({
                type: "post",
                enctype: "multipart/form-data",
                dataType: "json",
                //http://localhost/engenharia_testando/final/controladora/ImagemControladora.php
                url: "../controladora/ImagemControladora.php",
                cache: false,
                processData: false,
                contentType: false,
                data: dados_pagina_inicial,

                success: function (resultado) {
                    //debugger;
                    //console.log(resultado);
                    if (resultado > 0) {
                        $("#mensagem_imagem_inserida_pagina_inicial").html("Imagens salvas com sucesso");
                        $("#mensagem_imagem_inserida_pagina_inicial").show();
                        $("#mensagem_imagem_inserida_pagina_inicial").fadeOut(4000);
                        $("#exibi_campos_insercao_pagina_inicial").empty();
                        $('input[type=file]').val(null);
                        carrega_imagens_pagina_inicial();
                    }
                },
                error: function (xhr, status, error) {
                    console.log(status, error);
                }
            });
        } else {
            $("#mensagem_nenhuma_imagem_selecionada_inserir_informacoes_inicial").html("Por favor, selecione as imagens que deseja salvar e preencha suas descrições");
            $("#mensagem_nenhuma_imagem_selecionada_inserir_informacoes_inicial").show();
            $("#mensagem_nenhuma_imagem_selecionada_inserir_informacoes_inicial").fadeOut(4000);
        }



    });

    $.ajax({
        url: "../controladora/UsuarioControladora.php",
        type: "post",
        dataType: "json",
        data: { busca_ultimo_acesso: "ultimo_acesso" },
        success: function (retorno) {
            //debugger;
            //console.log(retorno);
            var recebe_div_ultimo_acesso = document.querySelector("#exibi_ultimo_login");
            recebe_div_ultimo_acesso.innerHTML = "Ultimo login:" + retorno;
        },
        error: function (xhr, status, error) {
            console.log(status, error);
        }
    });

    var carrega_imagens_alteracao_pagina_inicial = [];
    carrega_imagens_pagina_inicial();
    function carrega_imagens_pagina_inicial() {
        $.ajax({
            url: "../controladora/ImagemControladora.php",
            type: "post",
            dataType: "json",
            data: { processo_busca_imagens_pagina_inicial: "busca_imagens_pagina_inicial" },
            success: function (retorno) {

                if (retorno != null) {
                    //debugger;
                    $("#carrega_imagens_cadastradas_pagina_inicial").empty();
                    var montar_informacoes_pagina_inicial = document.querySelector("#carrega_imagens_cadastradas_pagina_inicial");
                    for (var i = 0; i < retorno.length; i++) {
                        montar_informacoes_pagina_inicial.innerHTML +=

                            // "<span class='imagem'>" +

                            // "<span id='" + retorno[i].imagem_inicial + "'>" +
                            
                            "<span id='imagem_pagina_inicial' style='margin-inline-end:10px;'>" +
                            "<img src='../Imagens/Inicial/" + retorno[i].imagem_inicial + "' name='imagem_alterada" + i + "' alt='' style='height: 200px;width: 200px;' id='" + retorno[i].codigo_imagem_inicial + "' value='../Imagens/Inicial/" + retorno[i].imagem_inicial + "'>" +

                            // "<label for='exampleFormControlTextarea1'>Example textarea</label>"+

                            // "<textarea class='' id='texto_" + retorno[i].codigo_imagem_inicial + "' rows='3' cols='75' placeholder='Digite a descrição' value='" + retorno[i].descricao_imagem_inicial + "'></textarea>" +
                            "<div class='col-lg-12 col-10'>"+
                            "<div class='row'>"+
                            "<textarea class='texto" + retorno[i].codigo_imagem_inicial + "' id='" + retorno[i].codigo_imagem_inicial + "' rows='5' cols='30' style='display:flex;margin-inline-start: -10px;' name='texto_alterado" + i + "' placeholder='Digite a descrição' value='" + retorno[i].descricao_imagem_inicial + "'></textarea>" +
                            "</div>"+
                            "</div>"+
                            "</span>"



                        // '<label for="exampleFormControlTextarea1">Insira a descrição desejada:</label>' +

                        // '<textarea class="form-control" id="texto' + i + '" rows="3" name="texto' + i + '"></textarea>' +

                        // '<input type="hidden" name="quantidade_itens_selecionados" value="' + retorno.length + '" id="quantidade_itens_selecionados"/>'

                        // "</span>" +
                        //     "</span>"


                        //$("#registro" + retorno[i].codigo_imagem).addClass("imgCheckbox1");
                        $(".texto" + retorno[i].codigo_imagem_inicial + "").html(retorno[i].descricao_imagem_inicial);
                        // $("#recebe_" + retorno[i].codigo_imagem_inicial + "").html(retorno[i].descricao_imagem_inicial);
                        carrega_imagens_alteracao_pagina_inicial.push(retorno[i].imagem_inicial);
                    }

                    $("#carrega_imagens_cadastradas_pagina_inicial").append(montar_informacoes_pagina_inicial);
                    $("img.checkable").imgCheckbox();

                    var imagens_selecionadas;
                    recebe_ids_pagina_inicial = Array();
                    $("#imagem_pagina_inicial img").imgCheckbox({
                        onload: function () {

                        },
                        onclick: function (el) {
                            //debugger;
                            imagens_selecionadas = el.hasClass("imgChked");

                            console.log(imagens_selecionadas);
                            ids = el.children()[0];

                            if (imagens_selecionadas) {
                                recebe_ids_pagina_inicial.push(ids.id);
                            } else {
                                var indice = recebe_ids_pagina_inicial.indexOf(ids.id);
                                recebe_ids_pagina_inicial.splice(indice, 1);
                                //console.log(recebe_ids_pagina_inicial);
                            }



                            //console.log(ids.id + " is now " + (imagens_selecionadas ? "checked" : "not-checked") + "!");
                        }
                    });
                } else {
                    $("#mensagem_nenhuma_imagem_localizada_pagina_inicial").html("Nenhum registro localizado");
                    $("#mensagem_nenhuma_imagem_localizada_pagina_inicial").show();
                }




            },
            error: function (xhr, status, error) {
                console.log(status, error);
            }
        });
    }

    carrega_imagens_painel();
    function carrega_imagens_painel() {
        $.ajax({
            url: "../controladora/ImagemControladora.php",
            type: "post",
            dataType: "json",
            data: { processo: "busca_imagens_galeria" },
            success: function (retorno) {
                //debugger;

                if (retorno != null) {
                    $("#carrega_imagens_cadastradas_galeria").empty();
                    var montar_imagens_cadastradas = document.querySelector("#carrega_imagens_cadastradas_galeria");
                    for (var i = 0; i < retorno.length; i++) {
                        montar_imagens_cadastradas.innerHTML +=
                            "<span class='imagem' id='imagem_galeria'>" +
                            "<span id='" + retorno[i].imagem + "'>" +
                            "<img src='../Imagens/Galeria/" + retorno[i].imagem + "' name='imagem' alt='' style='height: 200px;width: 200px;' id='" + retorno[i].codigo_imagem + "' value='../Imagens/Galeria/" + retorno[i].imagem + "'>" +
                            "</span>" +
                            "</span>"
                        // $("#registro_imagens_galeria" + retorno[i].codigo_imagem).addClass("imgCheckbox1");
                    }

                    $("#carrega_imagens_cadastradas_galeria").append(montar_imagens_cadastradas);
                    $("img.checkable").imgCheckbox();

                    var imagens_selecionadas;
                    recebe_codigos_imagens_galeria = Array();
                    $("#imagem_galeria img").imgCheckbox({
                        onload: function () {

                        },
                        onclick: function (el) {
                            imagens_selecionadas_galeria = el.hasClass("imgChked"),
                                ids = el.children()[0];
                            recebe_codigos_imagens_galeria.push(ids.id);

                            if (imagens_selecionadas_galeria) {
                                recebe_ids_pagina_inicial.push(ids.id);
                            } else {
                                var indice = recebe_codigos_imagens_galeria.indexOf(ids.id);
                                recebe_codigos_imagens_galeria.splice(indice, 1);
                                //console.log(recebe_ids_pagina_inicial);
                            }

                            console.log(ids.id + " is now " + (imagens_selecionadas_galeria ? "checked" : "not-checked") + "!");
                        }
                    });
                } else {
                    $("#mensagem_nenhum_registro_galeria").html("Nenhum registro localizado");
                    $("#mensagem_nenhum_registro_galeria").show();
                    $("#mensagem_nenhum_registro_galeria").fadeOut(4000);
                }




            },
            error: function (xhr, status, error) {
                console.log(status, error);
            }
        });
    }


    $("#excluir_informacoes_pagina_inicial").click(function (e) {
        //var informacoes_pagina_inicial = $("#formulario_informacoes_pagina_inicial")[0];
        //dedebugger;
        console.log("Informações:" + recebe_ids_pagina_inicial);

        if (recebe_ids_pagina_inicial != null) {
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                dataType: "json",
                url: "../controladora/ImagemControladora.php",
                data: { recebe_processo_excluir_informacoes_pagina_inicial: "excluir_informacoes_pagina_inicial", imagens_pagina_inicial: JSON.stringify(recebe_ids_pagina_inicial) },
                success: function (retorno) {
                    // debugger;
                    // console.log(retorno);
                    if (retorno != null) {
                        $("#mensagem_fotos_excluidas_pagina_inicial").html("Fotos excluida(s) com sucesso");
                        $("#mensagem_fotos_excluidas_pagina_inicial").show();
                        $("#mensagem_fotos_excluidas_pagina_inicial").fadeOut(3000);
                        carrega_imagens_pagina_inicial();
                    }
                },
                error: function (xhr, status, error) {
                    console.log(status, error);
                }
            });
        } else {
            $("#mensagem_nenhuma_imagem_selecionada_exclusao").html("Por favor, selecine as imagens que deseja excluir");
            $("#mensagem_nenhuma_imagem_selecionada_exclusao").show();
            $("#mensagem_nenhuma_imagem_selecionada_exclusao").fadeOut(3000);
        }

    });

    // $("input[type=textarea]").bind("change",function(){
    //     debugger;
    //     console.log("Alterado");
    // })



    $("#alterar_informacoes_pagina_inicial").click(function (e) {
        e.preventDefault();
        //debugger;
        var informacoes_pagina_inicial = $("#formulario_alteracao_pagina_inicial")[0];
        var recebe_informacoes_alterar_pagina_inicial = new FormData(informacoes_pagina_inicial);
        var alterar_dados_pagina_inicial = "alteracao_dados_pagina_inicial";



        //console.log(informacoes_pagina_inicial);

        //console.log(carrega_imagens_alteracao_pagina_inicial);



        // $('img').each(function(){
        //     console.log("VERIFICANDO:"+this.name);
        // });

        var alteracoes_pagina_inicial = Array();
        $('textarea').each(function (e) {
            var currentElement = $(this);
            var texto = currentElement.val();
            //console.log("Texto:" + texto);

            //console.log(this.id + "\n");

            var informacoes_pagina_inicial_alteracoes = { "codigo_imagem": this.id };
            alteracoes_pagina_inicial.push(informacoes_pagina_inicial_alteracoes);
        });

        recebe_informacoes_alterar_pagina_inicial.append("alterar_informacoes_pagina_inicial", alterar_dados_pagina_inicial);
        var recebe_codigos_valores_alterados_pagina_inicial = JSON.stringify(alteracoes_pagina_inicial);
        var recebe_imagens_alteracao_pagina_inicial = JSON.stringify(carrega_imagens_alteracao_pagina_inicial);
        var quantidade_itens_alteracao_pagina_inicial = alteracoes_pagina_inicial.length;
        recebe_informacoes_alterar_pagina_inicial.append("quantidade_itens_alteracao_pagina_inicial", quantidade_itens_alteracao_pagina_inicial);
        recebe_informacoes_alterar_pagina_inicial.append("codigos_valores_alterados_pagina_inicial", recebe_codigos_valores_alterados_pagina_inicial);
        recebe_informacoes_alterar_pagina_inicial.append("imagens_alteracao_pagina_inicial", recebe_imagens_alteracao_pagina_inicial);

        // console.log(recebe_codigos_valores_alterados_pagina_inicial);

        // console.log(recebe_imagens_alteracao_pagina_inicial)


        //alert("Sendo corrigido");


        if (quantidade_itens_alteracao_pagina_inicial > 0) {
            $.ajax({
                type: "POST",
                enctype: "multipart/form-data",
                dataType: "html",
                url: "../controladora/ImagemControladora.php",
                cache: false,
                processData: false,
                contentType: false,
                data: recebe_informacoes_alterar_pagina_inicial,

                success: function (resultado) {
                    //debugger;
                    //console.log(resultado);
                    if (resultado > 0) {
                        $("#mensagem_imagem_alterada_pagina_inicial").html("Descrições alteradas com sucesso");
                        $("#mensagem_imagem_alterada_pagina_inicial").show();
                        $("#mensagem_imagem_alterada_pagina_inicial").fadeOut(4000);
                        carrega_imagens_pagina_inicial();
                    }
                },
                error: function (xhr, status, error) {
                    console.log(status, error);
                }
            });
        } else {
            $("#mensagem_item_para_alterar_descricao").html("Nenhum registro para alterar descrição");
            $("#mensagem_item_para_alterar_descricao").show();
            $("#mensagem_item_para_alterar_descricao").fadeOut(4000);
        }

    });


    $("#excluir_fotos_imagems_galeria").click(function (e) {
        //debugger;
        var formdata = $("#formulario_exluir_imagens")[0];
        //var recebe_form_data = new FormData(formdata);
        //var recebe_formulario = $("form").serialize();

        var tamanho = recebe_codigos_imagens_galeria.length;
        console.log(formdata);

        for (var i = 0; i < tamanho; i++) {
            console.log(recebe_codigos_imagens_galeria);
            // recebe_form_data.append("id", recebe_ids)
        }


        if (recebe_codigos_imagens_galeria.length > 0) {
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                dataType: "html",
                url: "../controladora/ImagemControladora.php",
                data: { recebe_processo_excluir_fotos: "excluir_fotos", codigos: JSON.stringify(recebe_codigos_imagens_galeria) },
                success: function (retorno) {
                    //debugger;
                    console.log(retorno);
                    if (retorno != null) {
                        $("#mensagem_fotos_excluidas").html("Fotos excluida(s) com sucesso");
                        $("#mensagem_fotos_excluidas").show();
                        $("#mensagem_fotos_excluidas").fadeOut(3000);
                        carrega_imagens_painel();
                    }
                },
                error: function (xhr, status, error) {
                    console.log(status, error);
                }
            });
        } else {
            $("#mensagem-nenhuma-imagem-selecionada-exclusao-galeria").html("Por favor, selecione as imagens que queira excluir da galeria");
            $("#mensagem-nenhuma-imagem-selecionada-exclusao-galeria").show();
            $("#mensagem-nenhuma-imagem-selecionada-exclusao-galeria").fadeOut(4000);
        }
    });

});