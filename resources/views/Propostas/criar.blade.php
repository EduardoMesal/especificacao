@extends('layouts.admin')
@section('title', 'Criar proposta')

@section('css')
@endsection

@section('content')
<div class="post d-flex flex-column-fluid flex-lg-grow-1" id="kt_post">
    <div id="kt_content_container" class="container-xxl card-space">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                    <div class="flex-grow-1">
                        <div class="justify-content-between align-items-start flex-wrap mb-2">
                            <div class="flex-column">
                                <form class="form responseAjax" method="POST" action="{{route('Propostas.criar_action')}}" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-5 text-center">
                                        <h1 class="">Criar proposta</h1>
                                    </div>
                                    <div class="row g-9 mb-8">
                                        <div class="col-md-12 mb-8 fv-row ckEditorView">
                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                <span class="notRequired">Conteúdo</span>
                                            </label>
                                            <input type="hidden" name="especificacao_id" value="{{$especificacao->id}}">
                                            <textarea name="conteudo_proposta" id="texto-2" class="form-control ckText">
                                            
                                            <p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prezados senhores,</span></p>
<p class="MsoNormal" style="line-height: 107%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Temos a satisfa&ccedil;&atilde;o de submeter &agrave; sua aprecia&ccedil;&atilde;o a presente proposta de m&aacute;quinas e equipamentos.<br></span><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US; mso-bidi-font-weight: bold;">Colocamo-nos ao seu inteiro dispor para quaisquer informa&ccedil;&otilde;es adicionais.&nbsp;</span></span></p>
<p class="MsoListParagraph" style="mso-add-space: auto; text-indent: -18.0pt; line-height: 107%; mso-list: l0 level1 lfo1; margin: 0cm 0cm 8.0pt 18.0pt;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="font-size: 12pt;"><strong><span style="line-height: 107%;"><span style="mso-list: Ignore;">1.<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></strong><!--[endif]--><strong><span style="line-height: 107%;">DADOS DO CLIENTE</span></strong></span></span></p>
<p class="MsoNormal" style="margin-bottom: 8.0pt; line-height: 107%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US; mso-bidi-font-style: italic;">NOME FANTASIA:</span></strong></span></p>
<p class="MsoNormal" style="margin-bottom: 8.0pt; line-height: 107%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US; mso-bidi-font-style: italic;">RAZ&Atilde;O SOCIAL:</span></strong></span></p>
<p class="MsoNormal" style="line-height: 150%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">CNPJ</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US; mso-bidi-font-weight: bold;">: </span><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US; mso-bidi-font-weight: bold;">/ <strong>IE</strong>:</span></span></p>
<p class="MsoNormal" style="text-align: justify; line-height: 150%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Endere&ccedil;o Faturamento</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">:<br></span><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Endere&ccedil;o Entrega</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US; mso-bidi-font-weight: bold;">:</span><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;"> o mesmo<br></span><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Endere&ccedil;o Cobran&ccedil;a</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US; mso-bidi-font-weight: bold;">:</span><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;"> o mesmo</span></span></p>
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Contato Comercial</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US; mso-bidi-font-weight: bold;">:<br></span><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Telefone</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US; mso-bidi-font-weight: bold;">:</span><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;"><br></span><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">E-mail</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US; mso-bidi-font-weight: bold;">:</span></span></p>
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Contato T&eacute;cnico</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US; mso-bidi-font-weight: bold;">:&nbsp;<br></span><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Telefone</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US; mso-bidi-font-weight: bold;">:<br></span><strong>E-mail</strong>:</span></p>
<p class="MsoListParagraph" style="mso-add-space: auto; text-indent: -18.0pt; line-height: 107%; mso-list: l0 level1 lfo1; margin: 0cm 0cm 8.0pt 18.0pt;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="font-size: 12pt;"><strong><span style="line-height: 107%;"><span style="mso-list: Ignore;">2.<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></strong><!--[endif]--><strong><span style="line-height: 107%;">DADOS DO FORNECEDOR</span></strong></span></span></p>
<p class="MsoNormal" style="margin-bottom: 8.0pt; line-height: 107%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">MESAL M&Aacute;QUINAS E TECNOLOGIAS LTDA</span></strong></span></p>
<p class="MsoNormal" style="line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Endere&ccedil;o:</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;"> Giovani Grando Filho 80, Bento Gon&ccedil;alves &ndash; RS, Brasil, 95705-882<br></span><strong style="mso-bidi-font-weight: normal;"><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Contato:</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;"> </span><span style="mso-bidi-font-family: Arial; color: black;">(54) 2102-6400<br></span><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-family: Arial; color: black;">E-mail:</span></strong><span style="mso-bidi-font-family: Arial; color: black;"> </span><a href="mailto:mesal@mesal.com.br"><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">mesal@mesal.com.br</span></a></span><br><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-family: Arial; color: black;">CNPJ:</span></strong><span style="mso-bidi-font-family: Arial; color: black;"> 87.071.536/0001-86</span></span></p>
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Contato Comercial:</span></strong> <span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Evandro Luchese<br></span><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Telefone:</span></strong> <span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">(054) 9 9709-6079<br></span><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">E-mail: </span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">evandro.luchese@mesal.com.br</span></span></p>
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Contato Venda de Pe&ccedil;as: </span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US; mso-bidi-font-weight: bold;">Maur&iacute;cio Araldi / Suzane Machado<strong><br>Telefone: </strong>(54) 2102-6436<br></span><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">E-mail: </span></strong><a href="mailto:pecas@mesal.com.br"><span style="mso-fareast-font-family: Calibri; color: windowtext; mso-bidi-font-weight: bold; text-decoration: none; text-underline: none;">pecas@mesal.com.br</span></a><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">&nbsp;</span></span></p>
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Contato Assist&ecirc;ncia T&eacute;cnica, Instala&ccedil;&atilde;o e Garantia:</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;"> Fabiano Auri Schwendler<br></span><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Telefone:</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;"> (54) 2102-6400<br></span><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">E-mail:</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial;"> </span><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">fabiano.auri@mesal.com.br</span><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial;"> / </span><a href="mailto:assistencia@mesal.com.br"><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">assistencia@mesal.com.br</span></a><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">&nbsp;</span></span></p>
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Contato Financeiro:</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;"> Viviane Bussolotto<br></span><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">Telefone:</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;"> (54) 2102-6418<br></span><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">E-mail:</span></strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;"> </span><a href="mailto:viviane.bussolotto@mesal.com.br"><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">viviane.bussolotto@mesal.com.br</span></a></span><br><br></p>
<p style="text-align: left;"><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>1&nbsp; </strong>&nbsp; <strong>OBJETIVO</strong></span></p>
<p class="MsoNormal" style="text-indent: 21.6pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">A Mesal apresenta, por meio deste documento, o detalhamento t&eacute;cnico e comercial de sua proposta para que o referido cliente possa avaliar a viabilidade de aquisi&ccedil;&atilde;o dos mesmos.</span></p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>2&nbsp; &nbsp; PAR&Acirc;METROS DE FUNCIONAMENTO DE EQUIPAMENTOS</strong></span></p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="font-size: 12pt;">2.1 Dimensionamento de linhas</span><br></strong></span></p>
<table style="border-collapse: collapse; width: 100%; border-spacing: 0px; margin-left: 0px; height: 413.6px; border-style: outset; margin-right: auto;" border="0" width="640" cellspacing="0" cellpadding="0"><colgroup><col style="width: 247px;" width="179"><col style="width: 281px;" width="213"><col style="width: 316px;" width="248"></colgroup>
<tbody>
<tr style="height: 37.6px; background-color: #e03e2d; border-style: solid; border-color: #000000;">
<td style="width: 134pt; background-color: #e03e2d; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="179" height="20"><span style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong>Envase</strong></span></td>
<td class="xl68" style="width: 160pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="213"><span style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong>Produto</strong></span></td>
<td class="xl68" style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="248"><span style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong>Velocidade Nominal da Linha (F/h)</strong></span></td>
</tr>
<tr style="height: 37.6px; border-style: solid; border-color: #000000;">
<td class="xl70" style="width: 134pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="179" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Formato 1</span></td>
<td class="xl70" style="width: 160pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="213"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">[Volume] - [Produto]</span></td>
<td class="xl76" style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="248">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-style: solid; border-color: #000000;">
<td class="xl70" style="width: 134pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="179" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Formato 2</span></td>
<td class="xl70" style="width: 160pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="213"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">[Volume] - [Produto]</span></td>
<td class="xl76" style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="248">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-style: solid; border-color: #000000;">
<td class="xl70" style="width: 134pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="179" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Formato 3</span></td>
<td class="xl75" style="width: 160pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="213"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">[Volume] - [Produto]</span></td>
<td class="xl70" style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="248">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-style: solid; border-color: #000000;">
<td class="xl72" style="width: 134pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="179" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Formato 4</span></td>
<td class="xl73" style="width: 160pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="213"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">[Volume] - [Produto]</span></td>
<td class="xl73" style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="248">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td style="width: 134pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Formato 5</span></td>
<td style="width: 160pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">[Volume] - [Produto]</span></td>
<td style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td style="width: 134pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Formato 6</span></td>
<td style="width: 160pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">[Volume] - [Produto]</span></td>
<td style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);">&nbsp;</td>
</tr>
<tr style="height: 37.6px; background-color: #e03e2d; border-style: solid; border-color: #000000;">
<td class="xl68" style="width: 134pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="179" height="19"><span style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong>Final de linha</strong></span></td>
<td class="xl74" style="width: 160pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="213"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Produto</span></strong></span></td>
<td class="xl74" style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="248"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Velocidade Nominal da Linha (ppm)</span></strong></span></td>
</tr>
<tr style="height: 37.6px; border-style: solid; border-color: #000000;">
<td class="xl70" style="width: 134pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="179" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Formato 1</span></td>
<td class="xl70" style="width: 160pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="213"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">[C x L x A] - [Produto]</span></td>
<td class="xl70" style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="248">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-style: solid; border-color: #000000;">
<td class="xl70" style="width: 134pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="179" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Formato 2</span></td>
<td class="xl70" style="width: 160pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="213"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">[C x L x A] - [Produto]</span></td>
<td class="xl70" style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="248">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-style: solid; border-color: #000000;">
<td class="xl70" style="width: 134pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="179" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Formato 3</span></td>
<td class="xl70" style="width: 160pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="213"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">[C x L x A] - [Produto]</span></td>
<td class="xl70" style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="248">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-style: solid; border-color: #000000;">
<td class="xl70" style="width: 134pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="179" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Formato 4</span></td>
<td class="xl70" style="width: 160pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="213"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">[C x L x A] - [Produto]</span></td>
<td class="xl70" style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="248">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-style: solid; border-color: #000000;">
<td class="xl70" style="width: 134pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="179" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Formato 5</span></td>
<td class="xl70" style="width: 160pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="213"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">[C x L x A] - [Produto]</span></td>
<td class="xl70" style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="248">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-style: solid; border-color: #000000;">
<td class="xl69" style="width: 134pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="179" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Formato 6</span></td>
<td class="xl69" style="width: 160pt; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="213"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">[C x L x A] - [Produto]</span></td>
<td class="xl69" style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="248">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-style: solid; border-color: #000000;">
<td style="text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ppm = pacotes por minuto</span></td>
<td style="text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);">&nbsp;</td>
<td class="xl72" style="width: 186pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="248">&nbsp;</td>
</tr>
</tbody>
</table>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong>&nbsp;</strong></span></p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>3&nbsp; &nbsp;Layout</strong></span></p>
<p class="MsoNormal" style="line-height: 107%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-family: Arial; mso-no-proof: yes;">C&oacute;digo</span></strong><span style="mso-bidi-font-family: Arial; mso-no-proof: yes;"> 0000-0000 <strong style="mso-bidi-font-weight: normal;">Revis&atilde;o</strong> 0</span></span></p>
<p class="MsoNormal" style="line-height: 107%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">IMAGEM</span></p>
<p class="MsoNormal" style="line-height: 107%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><span style="font-size: 12pt;"><strong>3.1 Defini&ccedil;&otilde;es de layout</strong></span><br></span></p>
<p class="MsoNormal" style="margin-bottom: 8.0pt; text-align: justify; text-indent: 21.6pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">O layout e o projeto dos equipamentos concebidos pela Mesal s&atilde;o feitos com base no desenho em extens&atilde;o DWG fornecido pelo cliente.</span></p>
<p class="MsoNormal" style="margin-bottom: 8.0pt; text-align: justify; text-indent: 21.6pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Considera-se, para todos os efeitos, que est&atilde;o corretas as dimens&otilde;es da &aacute;rea civil, dos equipamentos e o posicionamento dos mesmos na planta. Do contr&aacute;rio, qualquer altera&ccedil;&atilde;o que se fizer necess&aacute;ria ao longo do projeto como um todo, que incorra em custos n&atilde;o previstos e que originada por diverg&ecirc;ncias entre o desenho DWG enviado pelo cliente e a situa&ccedil;&atilde;o real da planta e equipamentos, ser&aacute; de responsabilidade do contratante.</span></p>
<p class="MsoNormal" style="margin-bottom: 8.0pt; text-align: justify; text-indent: 21.6pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Est&aacute; prevista uma visita t&eacute;cnica de engenheiro/t&eacute;cnico respons&aacute;vel pela elabora&ccedil;&atilde;o e valida&ccedil;&atilde;o do layout de venda ap&oacute;s fechamento do projeto. Caso haja a necessidade desta visita ser realizada previamente &agrave; oficializa&ccedil;&atilde;o da proposta, cabe ao contratante que solicite junto ao departamento de vendas Mesal.</span></p>
<p class="MsoNormal" style="margin-bottom: 8.0pt; text-align: justify; text-indent: 21.6pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Qualquer altera&ccedil;&atilde;o no layout solicitada posteriormente &agrave; aprova&ccedil;&atilde;o do mesmo e &agrave; oficializa&ccedil;&atilde;o desta proposta, seja retirando, acrescentando ou reposicionando equipamentos, incorrer&aacute; em custos extras referentes ao retrabalho despendido em projeto e fabrica&ccedil;&atilde;o, al&eacute;m de poss&iacute;vel atraso na entrega.</span></p>
<h1 style="mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong><span style="line-height: 107%;"><span style="mso-list: Ignore;">4&nbsp; &nbsp; </span></span></strong><strong><span style="line-height: 107%;">CONDI&Ccedil;&Otilde;ES DE PROJETO<br></span></strong><strong><span style="line-height: 107%;"><span style="mso-list: Ignore;">4.1&nbsp; DADOS T&Eacute;CNICOS DE FORNECIMENTO</span></span></strong></span></h1>
<table style="border-collapse: collapse; width: 100%; height: 716.4px; border-spacing: 0px;" border="0" width="694" cellspacing="0" cellpadding="0"><colgroup><col style="width: 45.3999%;" width="205"><col style="width: 29.7655%;" width="293"><col style="width: 12.3781%;" span="2" width="98"></colgroup>
<tbody>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl68" style="width: 522pt; background-color: #e03e2d; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" colspan="4" width="694" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">DADOS T&Eacute;CNICOS ENVASE</span></strong></span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl68" style="width: 374pt; background-color: #e03e2d; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" colspan="2" width="498" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Par&acirc;metro</span></strong></span></td>
<td class="xl68" style="width: 74pt; background-color: #e03e2d; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Padr&atilde;o Mesal</span></strong></span></td>
<td class="xl68" style="width: 74pt; background-color: #e03e2d; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Espec&iacute;fico</span></strong></span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 374pt; border: 3px solid rgb(0, 0, 0);" colspan="2" width="498" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Altitude da planta do cliente em rela&ccedil;&atilde;o ao n&iacute;vel do mar (m)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">700</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 154pt; border: 3px solid rgb(0, 0, 0);" rowspan="2" width="205" height="52"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Temperatura externa a planta do cliente</span></td>
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">M&iacute;nimo (&ordm;C)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">M&aacute;ximo (&ordm;C)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">35</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 154pt; border: 3px solid rgb(0, 0, 0);" rowspan="2" width="205" height="52"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Umidade externa a planta do cliente</span></td>
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">M&iacute;nimo (%)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">40</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">M&aacute;ximo (%)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">95</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 154pt; border: 3px solid rgb(0, 0, 0);" rowspan="2" width="205" height="52"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Temperatura da sala de envase</span></td>
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">M&iacute;nimo (&ordm;C)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">10</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">M&aacute;ximo (&ordm;C)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">40</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 154pt; border: 3px solid rgb(0, 0, 0);" rowspan="2" width="205" height="52"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Umidade na sala de envase</span></td>
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">M&iacute;nimo (%)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">70</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">M&aacute;ximo (%)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">80</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="border: 3px solid rgb(0, 0, 0);" width="498" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Temperatura m&aacute;xima na sala de pain&eacute;is</span></td>
<td style="border: 3px solid rgb(0, 0, 0);"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">M&aacute;xima (%)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">35</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 154pt; border: 3px solid rgb(0, 0, 0);" rowspan="2" width="205" height="52"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Idioma</span></td>
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Documenta&ccedil;&atilde;o T&eacute;cnica</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Portugu&ecirc;s</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">IHM</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Portugu&ecirc;s</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 154pt; border: 3px solid rgb(0, 0, 0);" width="205" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Inclina&ccedil;&atilde;o do Piso</span></td>
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">(%)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">&lt; 1%</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 154pt; border: 3px solid rgb(0, 0, 0);" rowspan="3" width="205" height="78"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Energia El&eacute;trica</span></td>
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Tens&atilde;o (V)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">380</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Varia&ccedil;&atilde;o M&aacute;xima (%)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">5</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Frequ&ecirc;ncia (Hz)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">60</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 154pt; border: 3px solid rgb(0, 0, 0);" rowspan="3" width="205" height="78"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Ar Comprimido</span></td>
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Press&atilde;o na entrada do equipamento (Bar)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">6 a 8</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Grau de filtra&ccedil;&atilde;o (&micro;m)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Cfe. ISO 8573</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Grau de pureza</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Cfe. ISO 8573</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 154pt; border: 3px solid rgb(0, 0, 0);" width="205" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">CO2</span></td>
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Press&atilde;o na entrada do equipamento (Bar)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">8 a 10</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 154pt; border: 3px solid rgb(0, 0, 0);" width="205" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">CO2</span></td>
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Carbonata&ccedil;&atilde;o do Produto (g/L)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">4,2</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl69" style="width: 154pt; border: 3px solid rgb(0, 0, 0);" width="205" height="26"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">N2</span></td>
<td class="xl69" style="width: 220pt; border: 3px solid rgb(0, 0, 0);" width="293"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Press&atilde;o na entrada do equipamento (Bar)</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">8 a 10</span></td>
<td class="xl69" style="width: 74pt; border: 3px solid rgb(0, 0, 0);" width="98">&nbsp;</td>
</tr>
</tbody>
</table>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-list: Ignore;">&sect;<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp; </span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Caso algum dado difira do padr&atilde;o informado, &eacute; necess&aacute;rio que o cliente o especifique para que seja inserido na tabela e considerado em projeto;</span></span></p>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-list: Ignore;">&sect;<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp; </span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Para os par&acirc;metros n&atilde;o preenchidos na &uacute;ltima coluna, ser&aacute; considerado o padr&atilde;o Mesal; </span></span></p>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-list: Ignore;">&sect;<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp; </span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Afim de assegurar o bom funcionamento e a durabilidade dos equipamentos Mesal, os par&acirc;metros de ar comprimido, CO</span>₂<span style="mso-bidi-font-family: Arial;"> e N</span>₂<span style="mso-bidi-font-family: Arial;"> n&atilde;o podem variar al&eacute;m do descrito.</span></span></p>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-list: Ignore;">&sect;<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp; </span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Todos os equipamentos descritos em propostas est&atilde;o de acordo com as normas regulamentadoras vigentes e aplic&aacute;veis, NR 10 e NR 12.<br><br></span></span></p>
<p class="MsoNormal" style="line-height: 107%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>4.2&nbsp; CRONOGRAMA PREVISTO DE FORNECIMENTO</strong></span></p>
<table style="border-collapse: collapse; width: 100%; height: 356.8px; border-spacing: 0px;" border="0" width="758" cellspacing="0" cellpadding="0"><colgroup><col style="width: 421px;" span="2" width="379"></colgroup>
<tbody>
<tr style="height: 37.6px; background-color: #e03e2d; border-color: #000000; border-style: solid;">
<td class="xl66" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">ETAPA</span></strong></span></td>
<td class="xl66" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">LEAD TIME PREVISTO</span></strong></span></td>
</tr>
<tr style="height: 37.6px;">
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Reuni&atilde;o de kick-off com a compradora.</span></td>
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">M&aacute;ximo de 01 semana ap&oacute;s a oficializa&ccedil;&atilde;o.</span></td>
</tr>
<tr style="height: 37.6px;">
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Equipamento dispon&iacute;vel para embarque na planta da Mesal.</span></td>
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Aproximadamente (&agrave; combinar) dias ap&oacute;s a oficializa&ccedil;&atilde;o.</span></td>
</tr>
<tr style="height: 37.6px;">
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Chegada dos equipamentos na planta da compradora.</span></td>
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">(&agrave; combinar) dias ap&oacute;s o embarque dos equipamentos</span></td>
</tr>
<tr style="height: 37.6px;">
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379" height="70"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">In&iacute;cio das Instala&ccedil;&otilde;es.</span></td>
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">O in&iacute;cio das instala&ccedil;&otilde;es se d&aacute; mediante alinhamento entre a Mesal e a Compradora, atrav&eacute;s do preenchimento dos documentos relacionados no item 6.1 e cumprimento dos requisitos do item 4.3 desta proposta.</span></td>
</tr>
<tr style="height: 37.6px;">
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Montagem e Instala&ccedil;&atilde;o.</span></td>
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">(&agrave; combinar) dias ap&oacute;s o in&iacute;cio.</span></td>
</tr>
<tr style="height: 37.6px;">
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Valida&ccedil;&atilde;o e Aceite T&eacute;cnico.</span></td>
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">(&agrave; combinar) dias ap&oacute;s a conclus&atilde;o da montagem e instala&ccedil;&atilde;o.</span></td>
</tr>
</tbody>
</table>
<p class="MsoNormal" style="line-height: 107%;">&nbsp;</p>
<p class="MsoNormal" style="line-height: 107%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>4.3&nbsp; CRONOGRAMA DE FORNECIMENTO DE DADOS T&Eacute;CNICOS</strong></span></p>
<table style="border-collapse: collapse; width: 100.015%; height: 330.4px; border-spacing: 0px;" border="0" width="758" cellspacing="0" cellpadding="0"><colgroup><col style="width: 49.8875%;" span="2" width="379"> </colgroup>
<tbody>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; background-color: #e03e2d;">
<td class="xl66" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">ETAPA</span></strong></span></td>
<td class="xl66" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">LEAD TIME PREVISTO</span></strong></span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Aprova&ccedil;&atilde;o e assinatura de layout homologado entre as partes.</span></td>
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">No ato da oficializa&ccedil;&atilde;o do pedido ou ap&oacute;s visita t&eacute;cnica na planta do cliente.</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Aprova&ccedil;&atilde;o e assinatura de desenhos t&eacute;cnicos de todas as amostras que far&atilde;o parte do escopo do projeto.</span></td>
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">No ato da oficializa&ccedil;&atilde;o do pedido.</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Confirma&ccedil;&atilde;o de dados t&eacute;cnicos solicitados no item 4.1 desta proposta comercial.</span></td>
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Uma semana ap&oacute;s oficializa&ccedil;&atilde;o mediante reuni&atilde;o de kick-off.</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Finaliza&ccedil;&atilde;o da estrutura&ccedil;&atilde;o civil para entrega e instala&ccedil;&atilde;o dos equipamentos.</span></td>
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">15 dias antes da data de montagem e instala&ccedil;&atilde;o.</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Finaliza&ccedil;&atilde;o da estrutura&ccedil;&atilde;o da rede de fluidos para entrega e instala&ccedil;&atilde;o dos equipamentos.</span></td>
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">15 dias antes da data de montagem e instala&ccedil;&atilde;o.</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Finaliza&ccedil;&atilde;o da estrutura&ccedil;&atilde;o da rede el&eacute;trica para entrega e instala&ccedil;&atilde;o dos equipamentos.</span></td>
<td class="xl67" style="width: 284pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="379"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">15 dias antes da data de montagem e instala&ccedil;&atilde;o.</span></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>5&nbsp; &nbsp; AMOSTRAS</strong></span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">O projeto ao qual esta proposta comercial faz refer&ecirc;ncia, ser&aacute; desenvolvido de acordo com as amostras abaixo relacionadas e suas respectivas rela&ccedil;&otilde;es de aplica&ccedil;&atilde;o em cada equipamento sugerido. O fornecimento de dados t&eacute;cnicos e dimens&otilde;es das amostras consideradas para o projeto s&atilde;o de inteira responsabilidade do contratante, sendo que, qualquer diverg&ecirc;ncia ou mudan&ccedil;a de escopo nesse aspecto ap&oacute;s a assinatura deste documento, implicar&aacute; em uma nova revis&atilde;o t&eacute;cnica, podendo haver uma renegocia&ccedil;&atilde;o de valores e prazos. Os custos de envio, devolu&ccedil;&atilde;o ou descarte de amostras de projeto ou de testes s&atilde;o tamb&eacute;m de responsabilidade do contratante.</span></p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>5.1&nbsp; RELA&Ccedil;&Atilde;O DE PRODUTOS</strong></span></p>
<table style="border-collapse: collapse; width: 100%; height: 536.8px; border-spacing: 0px;" border="0" width="934" cellspacing="0" cellpadding="0"><colgroup><col style="width: 256px;" width="256"><col style="width: 113px;" span="6" width="113"></colgroup>
<tbody>
<tr style="height: 37.6px; background-color: #e03e2d; border-color: #000000; border-style: solid;">
<td class="xl68" style="width: 192pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="256" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Frasco</span></strong></span></td>
<td class="xl68" style="width: 85pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="113"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Formato 1</span></strong></span></td>
<td class="xl68" style="width: 85pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="113"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Formato 2</span></strong></span></td>
<td class="xl68" style="width: 85pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="113"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Formato 3</span></strong></span></td>
<td class="xl68" style="width: 85pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="113"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Formato 4</span></strong></span></td>
<td class="xl68" style="width: 85pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="113"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Formato 5</span></strong></span></td>
<td class="xl68" style="width: 85pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="113"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Formato 6</span></strong></span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; text-align: center;">
<td class="xl68" style="background-color: #e03e2d; text-align: center; vertical-align: middle; border: 3px solid rgb(0, 0, 0);" colspan="7" width="694" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">FRASCO</span></strong></span></td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Volume do frasco envasado (ml)</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl70" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Produ&ccedil;&atilde;o (f/h)</span></td>
<td class="xl70" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl70" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl70" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl70" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl70" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl70" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Produto a ser envasado</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Temperatura de enchimento (&deg;C)</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Carbonata&ccedil;&atilde;o do produto (g/L)</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Rela&ccedil;&atilde;o entre xarope e &aacute;gua</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Formato da amostra</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Di&acirc;metro externo do frasco (mm)</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Di&acirc;metro interno do gargalo (mm)</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Di&acirc;metro externo do gargalo (mm)</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Altura total sem tampa (mm)</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Altura abaixo do gargalo (mm)</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Altura total abaixo do gargalo (mm)</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Tipo de fundo</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Material do frasco</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Transpar&ecirc;ncia do frasco</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
<tr style="height: 37.6px;">
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Peso do frasco (g)</span></td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
<td class="xl69" style="text-align: center; vertical-align: middle; border: 3px solid #000000;">&nbsp;</td>
</tr>
</tbody>
</table>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">&Eacute; necess&aacute;rio que seja informado o valor dos dados em branco. As informa&ccedil;&otilde;es na tabela acima s&atilde;o necess&aacute;rias para realiza&ccedil;&atilde;o do projeto e a falta delas pode acarretar em atraso na entrega dos equipamentos, inclusive incorrer em custos extras.</span></p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>5.2 &nbsp;CRONOGRAMA DE ENVIO DE AMOSTRAS PARA DESENVOLVIMENTO DO PROJETO</strong></span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">As quantidades de amostras para desenvolvimento do projeto devem ser disponibilizadas pelo cliente &agrave; Mesal de acordo com a Tabela de Fornecimento de Amostras (IT.ENG.012), em um prazo m&aacute;ximo de 5 dias &uacute;teis a partir da assinatura do contrato, sob pena de posterga&ccedil;&atilde;o do prazo de entrega do projeto, na propor&ccedil;&atilde;o m&iacute;nima &agrave; quantidade de dias de atraso do fornecimento das mesmas.</span></p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>5.3 &nbsp;CRONOGRAMA DE ENVIO DE AMOSTRAS PARA TESTE FINAL DOS EQUIPAMENTOS</strong></span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><span style="mso-bidi-font-family: Arial;">A Mesal assume os custos de instala&ccedil;&atilde;o, montagem e startup <span style="mso-bidi-font-style: italic;">in loco</span>, e garante a funcionalidade do equipamento adquirido somente se as amostras, que devem ser enviadas pelo cliente para os testes finais do equipamento, cumprirem com as seguintes condi&ccedil;&otilde;es:</span><span style="mso-bidi-font-family: Arial;">&nbsp;</span></span></p>
<p class="MsoListParagraphCxSpFirst" style="margin-left: 0cm; mso-add-space: auto; text-align: justify; text-indent: 21.3pt; line-height: 115%; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-fareast-font-family: Arial; mso-bidi-font-family: Arial;"><span style="mso-list: Ignore;">a)<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp;&nbsp; </span></span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Chegarem na Mesal com 45 dias de anteced&ecirc;ncia da data de entrega prometida do equipamento ao cliente; </span></span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0cm; mso-add-space: auto; text-align: justify; text-indent: 21.3pt; line-height: 115%; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-fareast-font-family: Arial; mso-bidi-font-family: Arial;"><span style="mso-list: Ignore;">b)<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp;&nbsp; </span></span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Suas quantidades estiverem em conformidade com a Tabela de Fornecimento de Amostras, retirada da IT.ENG.012;</span></span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0cm; mso-add-space: auto; text-align: justify; text-indent: 21.3pt; line-height: 115%; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-fareast-font-family: Arial; mso-bidi-font-family: Arial;"><span style="mso-list: Ignore;">c)<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp;&nbsp; </span></span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Serem rigorosamente iguais &agrave;s amostras que foram disponibilizadas pelo cliente para realiza&ccedil;&atilde;o do projeto original (f&iacute;sicas e virtuais).</span><span style="mso-bidi-font-family: Arial;">&nbsp;</span></span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Caso alguma dessas condi&ccedil;&otilde;es acima n&atilde;o sejam satisfeitas, o cliente se compromete em assumir eventuais custos de instala&ccedil;&atilde;o extras &agrave;s or&ccedil;adas pela Mesal, que se fizerem necess&aacute;rias para ajustes e adapta&ccedil;&atilde;o dos equipamentos &agrave;s condi&ccedil;&otilde;es reais do local de instala&ccedil;&atilde;o do cliente. Essas despesas ser&atilde;o informadas e discriminadas ao cliente para sua ci&ecirc;ncia, conforme relat&oacute;rio de instala&ccedil;&atilde;o da Mesal e no final da instala&ccedil;&atilde;o ser&aacute; emitida a fatura de cobran&ccedil;a de servi&ccedil;os extras de instala&ccedil;&atilde;o e de pe&ccedil;as sobressalentes. Al&eacute;m disso, nesse caso, a Mesal n&atilde;o garante mais a entrega do equipamento no prazo previamente acordado, devendo o mesmo ser renegociado. Essas eventuais despesas adicionais correspondem aos gastos com passagens a&eacute;reas, hospedagem, transporte, alimenta&ccedil;&atilde;o dos t&eacute;cnicos, m&atilde;o de obra de instala&ccedil;&atilde;o e de engenharia, poss&iacute;veis altera&ccedil;&otilde;es de projetos e necessidade de pe&ccedil;as sobressalentes. Endere&ccedil;o para envio de amostras vide dados do fornecedor.</span></p>
<p class="MsoNormal" style="text-indent: 21.3pt; line-height: 115%; text-align: center;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><span style="mso-bidi-font-family: Arial;"><br></span><span style="font-size: 12pt;"><strong>Tabela de Fornecimento de amostras IT.ENG.012</strong></span></span></p>
<table style="border-collapse: collapse; width: 100.015%; border-spacing: 0px; height: 1267.2px;" border="0" width="591" cellspacing="0" cellpadding="0"><colgroup><col style="width: 29.1642%;" width="175"> <col style="width: 9.1626%;" span="3" width="53"> <col style="width: 6.31389%;" width="36"> <col style="width: 36.9814%;" width="221"> </colgroup>
<tbody>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 131pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Amostra de frascos</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">F&iacute;sica</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">-</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Virtual</span></td>
<td class="xl69" style="width: 27pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Eng.</span></td>
<td class="xl69" style="width: 166pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Quantidade para teste</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Combinador</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">NA</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Divisor de linha</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">NA</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Despaletizador Vidro</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2 paletes completos por formato</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Despaletizador Lata</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2 paletes completos por formato</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Despaletizador Pet</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1 palete completo por formato</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Esterilizador</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">NA</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="35"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Elevador</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2% da produ&ccedil;&atilde;o nominal do equipamento por hora</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="35"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Empacotadora</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1% da produ&ccedil;&atilde;o nominal do equipamento por hora</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="35"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Encaixotadora</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1% da produ&ccedil;&atilde;o nominal do equipamento por hora</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="35"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Enchedora Pet</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">e</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2% da produ&ccedil;&atilde;o nominal do equipamento por hora</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="35"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Enchedora Vidro</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">e</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1% da produ&ccedil;&atilde;o nominal do equipamento por hora</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="35"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Enchedora Lata</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">e</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1% da produ&ccedil;&atilde;o nominal do equipamento por hora</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="35"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Enxaguador</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1% da produ&ccedil;&atilde;o nominal do equipamento por hora</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Lavadora</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">15</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="35"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Posicionador</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">10% da produ&ccedil;&atilde;o nominal do equipamento por hora</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Rotuladora</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">30 por formato</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="35"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Tapador</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">e</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2% da produ&ccedil;&atilde;o nominal do equipamento por hora</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Transporte Esteira</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">NA</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Transporte A&eacute;reo</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">NA</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Virador</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">30 por formato</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 131pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Amostra de tampas</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">F&iacute;sica</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">-</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Virtual</span></td>
<td class="xl69" style="width: 27pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Eng.</span></td>
<td class="xl69" style="width: 166pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Quantidade para teste</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="35"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Transporte de tampa</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">e</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">15</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">10% da produ&ccedil;&atilde;o nominal do equipamento por hora</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="35"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Enchedora</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">e</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">15</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">10% da produ&ccedil;&atilde;o nominal do equipamento por hora</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="35"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Elevador de Tampa</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">e</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">15</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">50% da produ&ccedil;&atilde;o nominal do equipamento por hora</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="35"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Tapador</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">e</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">15</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">10% da produ&ccedil;&atilde;o nominal do equipamento por hora</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 131pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Amostra de r&oacute;tulo</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">F&iacute;sica</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">-</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Virtual</span></td>
<td class="xl69" style="width: 27pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Eng.</span></td>
<td class="xl69" style="width: 166pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Quantidade para teste</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Rotuladora</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1 bobina por formato</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="175" height="19">&nbsp;</td>
<td class="xl70" style="width: 40pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="53">&nbsp;</td>
<td class="xl70" style="width: 40pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="53">&nbsp;</td>
<td class="xl70" style="width: 40pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="53">&nbsp;</td>
<td class="xl70" style="width: 27pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="36">&nbsp;</td>
<td class="xl70" style="width: 166pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="221">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 131pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Amostra de caixa/pacote</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">F&iacute;sica</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">-</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Virtual</span></td>
<td class="xl69" style="width: 27pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Eng.</span></td>
<td class="xl69" style="width: 166pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Quantidade para teste</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Encaixotadora</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">e</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">100 caixas de produto por formato</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fechadora</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">e</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">20 caixas de produto por formato</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Armadora</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">e</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">350 caixas por formato</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">C&eacute;lula rob&oacute;tica</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">3 paletes completos por formato</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Despaletizador</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">4 paletes completos por formato</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Paletizador</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">3 paletes completos por formato</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Transportador Esteira</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">NA</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Elevador</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1 paletes completos por formato</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 131pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Amostra de palete cheio</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">F&iacute;sica</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">-</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Virtual</span></td>
<td class="xl69" style="width: 27pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Eng.</span></td>
<td class="xl69" style="width: 166pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Quantidade para teste</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">C&eacute;lula rob&oacute;tica</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2 paletes completos</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Despaletizador</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2 paletes completos</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Envolvedora</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1 paletes completos</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Magazine</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">NA</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Paletizador</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2 paletes completos</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Transportador de Palete</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ou</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">NA</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="175" height="19">&nbsp;</td>
<td class="xl70" style="width: 40pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="53">&nbsp;</td>
<td class="xl70" style="width: 40pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="53">&nbsp;</td>
<td class="xl70" style="width: 40pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="53">&nbsp;</td>
<td class="xl70" style="width: 27pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="36">&nbsp;</td>
<td class="xl70" style="width: 166pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="221">&nbsp;</td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 131pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="175" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Amostra de al&ccedil;a</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">F&iacute;sica</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">-</span></td>
<td class="xl69" style="width: 40pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Virtual</span></td>
<td class="xl69" style="width: 27pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Eng.</span></td>
<td class="xl69" style="width: 166pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Quantidade para teste</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl70" style="width: 131pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="175" height="35"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Aplicador de al&ccedil;a</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">e</span></td>
<td class="xl70" style="width: 40pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="53"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">X</span></td>
<td class="xl70" style="width: 27pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="36"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">15</span></td>
<td class="xl70" style="width: 166pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="221"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Produ&ccedil;&atilde;o nominal do equipamento por uma hora</span></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>6&nbsp; &nbsp;CONDI&Ccedil;&Otilde;ES T&Eacute;CNICAS</strong></span></p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>6.1 RESPONSABILIDADES DE FORNECIMENTO</strong></span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">As tabelas a seguir especificam de forma consensual quais s&atilde;o as responsabilidades do cliente e quais s&atilde;o as da Mesal no que diz respeito &agrave; todas as condi&ccedil;&otilde;es necess&aacute;rias para o pleno funcionamento das solu&ccedil;&otilde;es ofertadas. Itens n&atilde;o especificados a seguir e que por ventura surjam no decorrer da execu&ccedil;&atilde;o do projeto, eximem a Mesal do fornecimento.</span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">No caso em que a Mesal tiver que fazer a administra&ccedil;&atilde;o ou gest&atilde;o de algumas das despesas que s&atilde;o de responsabilidade do cliente, ser&atilde;o incididos custos adicionais que podem chegar a 30% do valor correspondente, cobrados via nota fiscal em 28 dias ap&oacute;s a execu&ccedil;&atilde;o do servi&ccedil;o, independentemente da conclus&atilde;o final da instala&ccedil;&atilde;o total dos equipamentos.</span></p>
<table class="MsoNormalTable" style="margin-left: 3.5pt; border-collapse: collapse; width: 100%; border-spacing: 0px; height: 8184.8px;" border="0" width="605" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 13cm; border: 3px solid rgb(0, 0, 0); background: #e23214; padding: 0cm 3.5pt;" colspan="2" width="491">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Administra&ccedil;&atilde;o de Projeto</span></strong></span></p>
</td>
<td style="width: 42.5pt; border: 3px solid rgb(0, 0, 0); background: #e23214; padding: 0cm 3.5pt;" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Mesal</span></strong></span></p>
</td>
<td style="width: 42.55pt; border: 3px solid rgb(0, 0, 0); background: #e23214; padding: 0cm 3.5pt;" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Cliente</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">1</span></strong></span></p>
</td>
<td style="width: 333.1pt; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Designar um contato principal que represente a parte, que tenha autoridade para tomada de decis&otilde;es, que gerencie, acompanhe e/ou conduza a concep&ccedil;&atilde;o do projeto desde o ato da venda at&eacute; a entrega t&eacute;cnica.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="margin-left: -3.5pt; text-align: center; tab-stops: 3.55pt;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">2</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fornecer documentos espec&iacute;ficos como vistos, cartas, convites, entre outros documentos, para eventuais localidades que os requeiram, bem como arcar com os custos associados.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">3</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fornecer dados t&eacute;cnicos conforme solicitado antes da oficializa&ccedil;&atilde;o da proposta.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">4</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Enviar amostras conforme cronograma de envio, vide item 5.3 desta proposta, e nas quantidades especificadas na tabela IT.ENG.012</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">5</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Validar e aprovar layouts, desenhos e outros documentos preparados pela Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">6</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fornecer desenho em DWG da planta existente onde ser&atilde;o instalados os equipamentos Mesal, e garantir que o mesmo esteja atualizado e correto.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">7</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Executar testes e inspe&ccedil;&otilde;es solicitados nos equipamentos, ainda na Mesal e com par&acirc;metros Mesal, relatando os resultados.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">8</span></strong></span></p>
</td>
<td style="width: 333.1pt; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Executar teste FAT nos equipamentos ainda na Mesal, em pr&eacute;-acordo com a compradora e seus par&acirc;metros, relatando os resultados.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">9</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Agendar e comparecer em reuni&otilde;es para discuss&atilde;o e homologa&ccedil;&atilde;o das etapas principais do projeto (valida&ccedil;&atilde;o na f&aacute;brica da Mesal e aceite t&eacute;cnico, caso necess&aacute;rio).</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">10</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Elaborar e gerenciar o cronograma de execu&ccedil;&atilde;o e acompanhamento do projeto.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">11</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Receber e inspecionar os equipamentos Mesal no momento da chegada dos mesmos na f&aacute;brica da Compradora.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 13cm; border: 3px solid rgb(0, 0, 0); background: #e23214; padding: 0cm 3.5pt;" colspan="2" width="491">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Estrutura Civil</span></strong></span></p>
</td>
<td style="width: 42.5pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Mesal</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Cliente</span></strong></span></p>
</td>
</tr>
<tr style="height: 101.6px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">12</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Garantir que a obra civil para adequa&ccedil;&atilde;o do local (funda&ccedil;&atilde;o, paredes, teto, revestimento de piso, etc.) que acomodar&aacute; os equipamentos Mesal esteja completamente finalizada no momento da instala&ccedil;&atilde;o, e que os meios de entrada e passagem estejam desobstru&iacute;dos.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">13</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Especificar equipamentos com os dados que se fazem necess&aacute;rios para a execu&ccedil;&atilde;o de eventual obra civil na planta do cliente, caso solicitado.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">14</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Delimitar, marcar e isolar ambiente de trabalho.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">15</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover a estrutura necess&aacute;ria para operacionaliza&ccedil;&atilde;o na planta da compradora. Exemplo: rede de combate a inc&ecirc;ndio, ilumina&ccedil;&atilde;o, sistema de aquecimento e resfriamento, etc.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">16</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover a instala&ccedil;&atilde;o de tubula&ccedil;&otilde;es entre as diversas redes da f&aacute;brica da compradora e todos os pontos de liga&ccedil;&atilde;o com os equipamentos fornecidos pela Mesal, para transporte de fluidos e subst&acirc;ncias essenciais para o processo.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">17</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e instalar tubula&ccedil;&otilde;es entre os pontos de liga&ccedil;&atilde;o dos equipamentos Mesal e seus equipamentos auxiliares para transporte de flu&iacute;dos e subst&acirc;ncias essenciais para o processo.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">18</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Estruturar o processo de escoamento, separa&ccedil;&atilde;o e descarte de todos os res&iacute;duos presentes na forma l&iacute;quida, gasosa ou em part&iacute;culas, incluindo os res&iacute;duos de lubrificantes de transportadores, CIP, emiss&otilde;es de ar quente, ventila&ccedil;&atilde;o, entre outros.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">19</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fornecer qualquer sistema necess&aacute;rio para equipamentos ou ambientes que necessitem de exaust&atilde;o e/ou ventila&ccedil;&atilde;o de ar, extra&ccedil;&atilde;o de ar quente, CO&sup2;, etc.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 13cm; border: 3px solid rgb(0, 0, 0); background: #e23214; padding: 0cm 3.5pt;" colspan="2" width="491">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Gera&ccedil;&atilde;o e Fornecimento de Fluidos</span></strong></span></p>
</td>
<td style="width: 42.5pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Mesal</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Cliente</span></strong></span></p>
</td>
</tr>
<tr style="height: 101.6px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">20</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e instalar sistema de tubula&ccedil;&atilde;o destinado a assegurar o transporte adequado de fluidos e recursos essenciais. Esse sistema dever&aacute; interligar as diversas redes presentes na f&aacute;brica com os pontos de conex&atilde;o dos equipamentos Mesal, seguindo rigorosamente as especifica&ccedil;&otilde;es fornecidas pela Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 101.6px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">21</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e instalar sistema de tubula&ccedil;&atilde;o destinado a assegurar o transporte adequado de fluidos e recursos essenciais. Esse sistema dever&aacute; interligar os pontos de entrada e sa&iacute;da dos equipamentos Mesal que se complementam (esta&ccedil;&atilde;o CIP e enchedora, por exemplo), seguindo rigorosamente as especifica&ccedil;&otilde;es fornecidas pela Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">22</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e instalar suportes e estruturas para a tubula&ccedil;&atilde;o destinada ao transporte dos fluidos e recursos essenciais, estabelecendo conex&otilde;es entre a rede existente (ponto de deriva&ccedil;&atilde;o) e os pontos de liga&ccedil;&atilde;o dos equipamentos Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">23</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover equipamentos para fluidos e utilidades com o intuito de atender as especifica&ccedil;&otilde;es de press&atilde;o, vaz&atilde;o, etc., exigidas pela Mesal conforme item 4.1 (quando aplic&aacute;vel), bem como a instala&ccedil;&atilde;o dos mesmos.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">24</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Realizar e garantir o processo de passiva&ccedil;&atilde;o da tubula&ccedil;&atilde;o, bem como isolar as tubula&ccedil;&otilde;es de fluidos e utilidades.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">25</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Isolar equipamentos Mesal e rede do cliente atrav&eacute;s de v&aacute;lvula de bloqueio manual em cada conex&atilde;o.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">26</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover medidores para controle do consumo global das utilidades da linha.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">27</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e garantir o funcionamento de equipamentos para gera&ccedil;&atilde;o de ar comprimido de baixa press&atilde;o na quantidade e qualidade especificada pela Mesal para os casos aplic&aacute;veis.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">28</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e garantir o funcionamento de equipamentos para gera&ccedil;&atilde;o de ar est&eacute;ril de baixa press&atilde;o na quantidade e qualidade especificada pela Mesal para os casos aplic&aacute;veis.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">29</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e garantir o funcionamento de equipamentos para gera&ccedil;&atilde;o de &aacute;gua de rede na quantidade e qualidade especificada pela Mesal para os casos aplic&aacute;veis.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">30</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e garantir o funcionamento de equipamentos para gera&ccedil;&atilde;o de &aacute;gua pot&aacute;vel na quantidade e qualidade especificada pela Mesal para os casos aplic&aacute;veis.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">31</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e garantir o funcionamento de equipamentos para gera&ccedil;&atilde;o de &aacute;gua de enx&aacute;gue na quantidade e qualidade especificada pela Mesal para os casos aplic&aacute;veis.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">32</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e garantir o funcionamento de equipamentos para gera&ccedil;&atilde;o de &aacute;gua glicolada na quantidade e qualidade especificada pela Mesal para os casos aplic&aacute;veis.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 80.4px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">33</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">Prover e garantir o funcionamento de equipamentos para gera&ccedil;&atilde;o de CO</span><span style="color: #202124; background: white;">₂</span><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;"> na quantidade e qualidade especificada pela Mesal para os casos aplic&aacute;veis.</span></span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 80.4px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">34</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">Prover e garantir o funcionamento de equipamentos para gera&ccedil;&atilde;o de N</span><span style="color: #202124; background: white;">₂</span><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;"> na quantidade e qualidade especificada pela Mesal para os casos aplic&aacute;veis.</span></span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">&nbsp;</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">35</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e garantir o funcionamento de equipamentos para gera&ccedil;&atilde;o de soda c&aacute;ustica na quantidade e qualidade especificada pela Mesal para os casos aplic&aacute;veis.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">36</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e garantir o funcionamento de equipamentos para gera&ccedil;&atilde;o de vapor industrial na quantidade e qualidade especificada pela Mesal para os casos aplic&aacute;veis.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 13cm; border: 3px solid rgb(0, 0, 0); background: #e23214; padding: 0cm 3.5pt;" colspan="2" width="491">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Gera&ccedil;&atilde;o e Fornecimento de Energia</span></strong></span></p>
</td>
<td style="width: 42.5pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Mesal</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Cliente</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">37</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover, abastecer e instalar a energia el&eacute;trica para os pain&eacute;is Mesal de acordo com a tens&atilde;o, frequ&ecirc;ncia e estabilidade especificados no item 4.1</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">38</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover, abastecer e instalar energia para os equipamentos auxiliares Mesal, mesmo que n&atilde;o estejam diretamente integrados &agrave; linha.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">39</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Realizar certifica&ccedil;&atilde;o e valida&ccedil;&atilde;o da rede.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">40</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Em situa&ccedil;&atilde;o onde os pain&eacute;is dos equipamentos Mesal sejam alocados em uma sala de pain&eacute;is distante da linha, prover e instalar cabos e leitos de cabos entre os pain&eacute;is el&eacute;tricos e os equipamentos Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">41</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover cabeamentos internos, cabos de controle e pain&eacute;is el&eacute;tricos para equipamentos Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">42</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e instalar calhas el&eacute;tricas para cabeamento entre equipamentos Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">43</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e instalar cabos e calhas el&eacute;tricas para cabeamento de transportadores, se fornecidos pela Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">44</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Certificar instala&ccedil;&otilde;es de acordo com NR-10 vigente.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 13cm; border: 3px solid rgb(0, 0, 0); background: #e23214; padding: 0cm 3.5pt;" colspan="2" width="491">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Fornecimento de Insumos e Produtos </span></strong></span></p>
</td>
<td style="width: 42.5pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Mesal</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Cliente</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">45</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover os insumos necess&aacute;rios de acordo com quantidade e especifica&ccedil;&otilde;es solicitadas pela Mesal, incluindo frasco, tampa, bobina de r&oacute;tulo, caixa, engradado, palete, entre outros.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">46</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover o produto final na press&atilde;o, vaz&atilde;o, temperatura e demais vari&aacute;veis conforme as exig&ecirc;ncias acordadas entre Mesal e cliente.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">47</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover as tubula&ccedil;&otilde;es, em conformidade com as regulamenta&ccedil;&otilde;es para tal pr&aacute;tica estabelecidas em cada localidade, para fornecimento de produto at&eacute; o ponto de conex&atilde;o dos equipamentos Mesal, bem como a sua recircula&ccedil;&atilde;o, caso necess&aacute;rio.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">48</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover os produtos e tubula&ccedil;&otilde;es at&eacute; o ponto de conex&atilde;o dos equipamentos Mesal, para realiza&ccedil;&atilde;o de processo CIP, caso seja aplic&aacute;vel.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 13cm; border: 3px solid rgb(0, 0, 0); background: #e23214; padding: 0cm 3.5pt;" colspan="2" width="491">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Provid&ecirc;ncias de Instala&ccedil;&atilde;o</span></strong></span></p>
</td>
<td style="width: 42.5pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Mesal</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Cliente</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">49</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Agendar e comparecer em reuni&atilde;o para planejamento de instala&ccedil;&atilde;o e produ&ccedil;&atilde;o.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">50</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Discutir e homologar o programa de sa&uacute;de, seguran&ccedil;a e meio ambiente.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">51</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Treinar a equipe conforme o programa homologado de sa&uacute;de, seguran&ccedil;a e meio ambiente.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">52</span></strong></span></p>
</td>
<td style="width: 333.1pt; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Durante a execu&ccedil;&atilde;o dos trabalhos em campo, eleger um representante de instala&ccedil;&atilde;o que servir&aacute; como ponto central entre equipe Mesal e equipe da Compradora.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">53</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Arcar com as despesas associadas &agrave; viagem da equipe Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">54</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Arcar com as despesas associadas &agrave; acomoda&ccedil;&atilde;o da equipe Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">55</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Arcar com as despesas associadas &agrave; alimenta&ccedil;&atilde;o da equipe Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">56</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Arcar com as despesas associadas ao transporte da equipe Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">57</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Disponibilizar vesti&aacute;rio para a equipe Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">58</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Disponibilizar sala para armazenamento de materiais e ferramentas com acesso limitado &agrave; equipe Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">59</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Disponibilizar banheiro limpo com trava para a equipe Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">60</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Disponibilizar &aacute;gua pot&aacute;vel para a equipe Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">61</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Em casos de temperatura altas ou baixas, disponibilizar sistemas de aquecimento ou resfriamento.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">62</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover e estruturar rede de fornecimento de eletricidade para realizar a instala&ccedil;&atilde;o dos equipamentos.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 101.6px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">63</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Garantir que o ambiente externo por onde os equipamentos ir&atilde;o trafegar at&eacute; chegar ao ponto de descarregamento interno estejam desobstru&iacute;dos e pavimentados, afim de comportar as dimens&otilde;es dos equipamentos e garantir seguran&ccedil;a durante o transporte.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">64</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Garantir que o ambiente interno por onde os equipamentos ir&atilde;o transitar e/ou ser&atilde;o instalados possuam livre acesso.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">65</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Enviar evid&ecirc;ncias do ambiente externo e interno para in&iacute;cio das instala&ccedil;&otilde;es.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 13cm; border: 3px solid rgb(0, 0, 0); background: #e23214; padding: 0cm 3.5pt;" colspan="2" width="491">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Integra&ccedil;&atilde;o e automa&ccedil;&atilde;o</span></strong></span></p>
</td>
<td style="width: 42.5pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Mesal</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Cliente</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">66</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Realizar a integra&ccedil;&atilde;o entre equipamentos de terceiros presentes na linha e equipamentos Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">67</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Disponibilizar os sinais solicitados por fornecedores terceiros presentes na linha.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">68</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Disponibilizar os sinais, solicitados pela Mesal, de fornecedores terceiros presentes na linha.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">69</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Agendar e comparecer em reuni&atilde;o pr&eacute;via para defini&ccedil;&atilde;o de troca de sinais entre equipamentos.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 101.6px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">70</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Realizar a automa&ccedil;&atilde;o da linha entre equipamentos Mesal, sendo considerado por automa&ccedil;&atilde;o, nesse contexto, a instala&ccedil;&atilde;o de sensores de ac&uacute;mulo m&aacute;ximo e m&iacute;nimo e a modula&ccedil;&atilde;o da velocidade dos equipamentos de acordo com a produ&ccedil;&atilde;o no momento.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">71</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Realizar a automa&ccedil;&atilde;o da linha entre equipamentos Mesal e equipamentos de terceiros. Obs.: opcionalmente, esse servi&ccedil;o pode ser solicitado junto ao setor comercial Mesal antes do fechamento do projeto.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">72</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Adequar a modula&ccedil;&atilde;o de velocidade e sensoriamento de equipamentos de terceiros conforme especificado pela Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 13cm; border: 3px solid rgb(0, 0, 0); background: #e23214; padding: 0cm 3.5pt;" colspan="2" width="491">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Transporte e Abertura dos Equipamentos</span></strong></span></p>
</td>
<td style="width: 42.5pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Mesal</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Cliente</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">73</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Arcar com os custos de transporte e seguro de todos os itens citados na proposta t&eacute;cnica <strong>(FOB).</strong></span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">74</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Arcar com os custos de transporte caso a compradora realizar a aquisi&ccedil;&atilde;o de algum equipamento/componente de fornecedor terceiro e o mesmo tenha de ser enviado &agrave; Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">75</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fornecer equipamentos, m&atilde;o de obra, ferramentas, utens&iacute;lios, entre outras necessidades para descarregamento.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">76</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fornecer equipamento de eleva&ccedil;&atilde;o bem como a m&atilde;o de obra para seu manuseio.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">77</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fornecer todos os equipamentos necess&aacute;rios para a movimenta&ccedil;&atilde;o dos equipamentos at&eacute; a posi&ccedil;&atilde;o final ou provis&oacute;ria, sendo respons&aacute;vel pelo seu manuseio.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">78</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Supervisionar a movimenta&ccedil;&atilde;o e o manuseio dos equipamentos at&eacute; posi&ccedil;&atilde;o final.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">79</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Desembalar os equipamentos, caixas ou qualquer volume fornecido pela Mesal, sob supervis&atilde;o de um respons&aacute;vel da Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">80</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Destinar para descarte, em conformidade com as exig&ecirc;ncias locais, todos os materiais residuais oriundos das embalagens.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 13cm; border: 3px solid rgb(0, 0, 0); background: #e23214; padding: 0cm 3.5pt;" colspan="2" width="491">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Processo de Instala&ccedil;&atilde;o at&eacute; o Aceite T&eacute;cnico</span></strong></span></p>
</td>
<td style="width: 42.5pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Mesal</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Cliente</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">81</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Inspecionar a planta do cliente antes do in&iacute;cio das instala&ccedil;&otilde;es.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">82</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fornecer toda e qualquer conex&atilde;o que se fa&ccedil;a necess&aacute;ria para interliga&ccedil;&atilde;o de equipamentos da compradora nos equipamentos Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">83</span></strong></span></p>
</td>
<td style="width: 333.1pt; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover prote&ccedil;&atilde;o aos equipamentos Mesal em caso de obras civis nas proximidades.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">84</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Realizar a desmontagem e as modifica&ccedil;&otilde;es nos equipamentos j&aacute; presentes na linha da compradora.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">85</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fornecer todo o material necess&aacute;rio para instala&ccedil;&atilde;o at&eacute; o aceite t&eacute;cnico dos equipamentos Mesal, como consum&iacute;veis, produto final, mat&eacute;ria prima, entre outros.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">86</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Verificar a qualidade dos consum&iacute;veis e mat&eacute;rias-primas fornecidos em compara&ccedil;&atilde;o aos enviados para o desenvolvimento do projeto.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">87</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover as pe&ccedil;as de reposi&ccedil;&atilde;o em caso de desgaste, antes da produ&ccedil;&atilde;o do primeiro produto comercializ&aacute;vel.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">88</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Contar com equipamentos e equipes para an&aacute;lise e valida&ccedil;&atilde;o de amostras conforme as especifica&ccedil;&otilde;es acordadas, tais como dimens&otilde;es, volume, torque e outros.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">89</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Realizar a limpeza geral do equipamento, ambiente de trabalho e descarte de consum&iacute;veis e mat&eacute;rias primas utilizadas.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">90</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Assegurar a presen&ccedil;a de profissionais capacitados para realizar as etapas de montagem e instala&ccedil;&atilde;o dos equipamentos Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">91</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Assegurar a presen&ccedil;a de t&eacute;cnicos qualificados para execu&ccedil;&atilde;o das etapas de teste e comissionamento dos equipamentos Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">92</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Assegurar a presen&ccedil;a de representante t&eacute;cnico que acompanhe desde o in&iacute;cio da montagem at&eacute; a entrega t&eacute;cnica.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">93</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Assegurar a presen&ccedil;a de operadores de m&aacute;quinas qualificados para acompanhar e operar as etapas de comissionamento at&eacute; a aprova&ccedil;&atilde;o t&eacute;cnica, sendo validados e supervisionados por equipe t&eacute;cnica Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
</tr>
<tr style="height: 101.6px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">94</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Assegurar que os operadores das m&aacute;quinas Mesal durante o processo de valida&ccedil;&atilde;o do aceite t&eacute;cnico sejam devidamente qualificados e treinados, comprovando forma&ccedil;&atilde;o na &aacute;rea por meio de certificado. Obs.: a Mesal n&atilde;o ser&aacute; respons&aacute;vel por qualquer perda, dano ou preju&iacute;zo n&atilde;o ocasionado pela Mesal que tenha ocorrido durante o per&iacute;odo de aceite t&eacute;cnico </span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">95</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">No caso de equipamentos e ferramentas fornecidas pela compradora, garantir que estejam prontos para a instala&ccedil;&atilde;o da Mesal dentro do prazo estipulado, evitando qualquer interfer&ecirc;ncia no cronograma definido pela Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 101.6px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">96</span></strong></span></p>
</td>
<td style="width: 333.1pt; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Garantir que os equipamentos fornecidos pela Compradora, localizados antes e depois dos equipamentos Mesal (caso existam), estejam adequados para um fluxo de opera&ccedil;&atilde;o cont&iacute;nuo e possuam um sistema de seguran&ccedil;a para a retirada de produtos, insumos ou consum&iacute;veis.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">97</span></strong></span></p>
</td>
<td style="width: 333.1pt; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Garantir que os equipamentos fornecidos pela compradora estejam dispon&iacute;veis, atingindo a produ&ccedil;&atilde;o nominal pela qual foram contratados, permitindo um fluxo continuo para aceita&ccedil;&atilde;o dos equipamentos Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">98</span></strong></span></p>
</td>
<td style="width: 333.1pt; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Prover suprimento cont&iacute;nuo de produtos, insumos, consum&iacute;veis, mat&eacute;rias-primas e outros elementos necess&aacute;rios, na quantidade e qualidade necess&aacute;rias para a realiza&ccedil;&atilde;o de testes pr&eacute;vios e teste de aceita&ccedil;&atilde;o t&eacute;cnica.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">99</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Arcar com eventuais custos extras por conta de quebras de cronograma por problema n&atilde;o ocasionados pela Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">100</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Arcar com o custo do dia de trabalho padr&atilde;o dos t&eacute;cnicos Mesal, especificado no item 6.2.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">&nbsp;</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">101</span></strong></span></p>
</td>
<td style="width: 333.1pt; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Arcar com custos de trabalhos executados em per&iacute;odo noturno ou que necessitem de acompanhamento 24/7, conforme tabela de custos homem/hora no item 6.2.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">102</span></strong></span></p>
</td>
<td style="width: 333.1pt; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Em casos onde o per&iacute;odo de instala&ccedil;&atilde;o superar 30 dias, arcar com os custos do retorno dos t&eacute;cnicos &agrave; Mesal para folga de 2 dias.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">103</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Nomear indiv&iacute;duos-chave com autoridade para tomada de decis&atilde;o ao realizar o teste de aceita&ccedil;&atilde;o t&eacute;cnica.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext;">104</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Assinar documento de aceite t&eacute;cnico, bem como o relat&oacute;rio de aceite de cada teste realizado.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 13cm; border: 3px solid rgb(0, 0, 0); background: #e23214; padding: 0cm 3.5pt;" colspan="2" width="491">
<p class="MsoNormal" style="text-align: justify;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Treinamentos</span></strong></span></p>
</td>
<td style="width: 42.5pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Mesal</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: #e23214; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-bidi-font-family: Arial; color: white;">Cliente</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">105</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Arcar com as despesas de viagem, estadia e alimenta&ccedil;&atilde;o das pessoas a serem treinadas no caso de os treinamentos ocorrerem nas depend&ecirc;ncias da Mesal.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">106</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Solicitar treinamento em sala de aula com material redigido para operadores e respons&aacute;veis selecionados.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 56.8px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">107</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Arcar com os custos de materiais para treinamento em sala de aula para operadores e respons&aacute;veis selecionados.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">108</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Oferecer sala de treinamento equipada com projetor ou tela de apresenta&ccedil;&atilde;o no caso de os treinamentos ocorrerem nas depend&ecirc;ncias da compradora.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">109</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Arcar com todas as despesas associadas &agrave; viagem, estadia e alimenta&ccedil;&atilde;o dos instrutores no caso de os treinamentos ocorrerem nas depend&ecirc;ncias da Compradora.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X</span></strong></span></p>
</td>
</tr>
<tr style="height: 79.2px; border-color: #000000; border-style: solid;">
<td style="width: 35.45pt; border: 3px solid rgb(0, 0, 0); background: white; padding: 0cm 3.5pt;" width="47">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">110</span></strong></span></p>
</td>
<td style="width: 333.1pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="444">
<p class="MsoNormal" style="text-align: justify;"><span style="color: black; font-family: arial, helvetica, sans-serif; font-size: 10pt;">Disponibilizar manuais de opera&ccedil;&atilde;o de todos os equipamentos descritos em proposta bem como cat&aacute;logo de pe&ccedil;as de reposi&ccedil;&atilde;o, de forma virtual atrav&eacute;s da entrega de pen-drive com os arquivos.</span></p>
</td>
<td style="width: 42.5pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="mso-fareast-font-family: Calibri; mso-bidi-font-family: Arial; color: black; mso-color-alt: windowtext; mso-fareast-language: EN-US;">X&nbsp;</span></strong></span></p>
</td>
<td style="width: 42.55pt; background: white; padding: 0cm 3.5pt; border: 3px solid rgb(0, 0, 0);" width="57">&nbsp;</td>
</tr>
</tbody>
</table>
<p class="MsoNormal" style="text-align: justify; text-indent: 35.45pt;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">A Compradora dever&aacute; solicitar os servi&ccedil;os de instala&ccedil;&atilde;o em no m&iacute;nimo 45 (quarenta e cinco) dias de anteced&ecirc;ncia, enviando preenchido e assinado o RG.AST.011 - Registro de Solicita&ccedil;&atilde;o de Instala&ccedil;&atilde;o, de acordo com o equipamento adquirido, para o departamento de Assist&ecirc;ncia T&eacute;cnica atrav&eacute;s do e-mail&nbsp;<strong>assistencia@mesal.com.br</strong>.<strong>&nbsp;</strong></span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 35.45pt;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">A Compradora dever&aacute; solicitar os servi&ccedil;os de treinamento em no m&iacute;nimo de 45 (quarenta e cinco) dias de anteced&ecirc;ncia. A modalidade de treinamento praticada pela Mesal &eacute; <em>&ldquo;On-The-Job&rdquo;, </em>realizado durante o turno comercial entre 7h e 17h. A solicita&ccedil;&atilde;o deve ser feita enviando o documento RG.AST.017 - Registro de Treinamento para Clientes, anexado no fim desta proposta, preenchido e assinado, para o departamento de Assist&ecirc;ncia T&eacute;cnica no e-mail <strong style="mso-bidi-font-weight: normal;"><a href="mailto:assistencia@mesal.com.br">a<span style="mso-bidi-font-weight: bold;">ssistencia@mesal.com.br</span></a></strong><span style="mso-bidi-font-weight: bold;">.</span></span></p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>6.2 TABELA CUSTOS HOMEM/HORA</strong></span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Os t&eacute;cnicos da Mesal seguem jornada padr&atilde;o de segunda &agrave; sexta (salvo feriados), durante 8h48min por dia, com intervalo para almo&ccedil;o de uma hora. Para jornadas espec&iacute;ficas e demais hor&aacute;rios:</span></p>
<table style="border-collapse: collapse; width: 100%; height: 288px; border-spacing: 0px;" border="0" width="716" cellspacing="0" cellpadding="0"><colgroup><col style="mso-width-source: userset; mso-width-alt: 10097; width: 213pt;" width="284"> <col style="mso-width-source: userset; mso-width-alt: 15360; width: 324pt;" width="432"> </colgroup>
<tbody>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; background-color: #e03e2d;">
<td class="xl68" style="width: 213pt; border-color: #000000; border-style: solid; text-align: center; vertical-align: middle;" width="284" height="20"><span style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong>Hor&aacute;rios</strong></span></td>
<td class="xl68" style="border-style: solid; border-color: #000000; width: 324pt; text-align: center; vertical-align: middle;" width="432"><span style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong>Valores</strong></span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 213pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="284" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Segunda &agrave; sexta no per&iacute;odo entre 5h e 19h</span></td>
<td class="xl69" style="width: 324pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="432"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Hora extra 50%</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 213pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="284" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Segunda &agrave; sexta Entre 19h e 5h</span></td>
<td class="xl69" style="width: 324pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="432"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Hora extra 100%</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 213pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="284" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Segunda &agrave; sexta entre 22h e 5h</span></td>
<td class="xl69" style="width: 324pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="432"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Hora extra 100% + adicional noturno (20%)</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 213pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="284" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">S&aacute;bados, domingos e feriados entre 7h e 17h</span></td>
<td class="xl69" style="width: 324pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="432"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Hora extra 100%</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 213pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="284" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">S&aacute;bados, domingos e feriados entre 17h e 7h</span></td>
<td class="xl69" style="width: 324pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="432"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Hora extra 150%</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 213pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="284" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Horas de espera e/ou integra&ccedil;&atilde;o</span></td>
<td class="xl69" style="width: 324pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="432"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Ser&atilde;o consideradas como horas normais de trabalho conforme tabela</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 213pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="284" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Horas de deslocamento/viagem</span></td>
<td class="xl69" style="width: 324pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="432"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">50% do valor da hora normal conforme tabela</span></td>
</tr>
</tbody>
</table>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>6.3 GARANTIA</strong></span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">O per&iacute;odo de garantia &eacute; de 12 meses a partir da data de emiss&atilde;o da nota fiscal de venda. </span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Havendo v&iacute;cios ou defeitos de quaisquer pe&ccedil;as, a MESAL compromete-se a reparar ou substituir as mesmas, custeando as despesas com m&atilde;o de obra. &Eacute; da responsabilidade do comprador os custos de viagem, hospedagem e alimenta&ccedil;&atilde;o dos t&eacute;cnicos, juntamente com os custos de transporte e armazenamento das mercadorias ou partes defeituosas, arcando tamb&eacute;m com encargos aduaneiros quando aplicados. </span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">O comprador dever&aacute; notificar a MESAL, por escrito, detalhando o v&iacute;cio ou defeito t&atilde;o logo seja identificado, assim como disponibilizar o equipamento e informa&ccedil;&otilde;es para an&aacute;lise quando solicitado. As pe&ccedil;as que necessitem an&aacute;lise posterior na MESAL, dever&atilde;o ser enviadas com frete a cobrar, devidamente identificadas e embaladas a fim de evitar perdas e danos durante o transporte. </span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Ap&oacute;s a an&aacute;lise de garantia, se comprovada a improced&ecirc;ncia da reclama&ccedil;&atilde;o, a MESAL dever&aacute; ser reembolsada pelos gastos incorridos em virtude da notifica&ccedil;&atilde;o, cujo pagamento dever&aacute; ser realizado na data de apresenta&ccedil;&atilde;o da fatura correspondente. </span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Equipamentos de terceiros como componentes el&eacute;tricos e pneum&aacute;ticos, motores, entre outros, possuem garantia dos pr&oacute;prios fabricantes, n&atilde;o tendo a MESAL responsabilidade sobre os mesmos.</span></p>
<p class="MsoNormal" style="text-align: justify; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><span style="mso-bidi-font-family: Arial;">&nbsp;</span><strong style="mso-bidi-font-weight: normal;"><span style="mso-bidi-font-family: Arial;">Ficam invalidadas as garantias legais e/ou contratuais para/se:</span></strong><span style="mso-bidi-font-family: Arial;">&nbsp;</span></span></p>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-list: Ignore;">&sect;<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp; </span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">As opera&ccedil;&otilde;es de montagem, comissionamento e testes forem realizadas por pessoal t&eacute;cnico n&atilde;o indicado ou autorizado pela MESAL;</span></span></p>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-list: Ignore;">&sect;<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp; </span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Utiliza&ccedil;&atilde;o inadequada do equipamento, diversa do orientado no manual da m&aacute;quina;</span></span></p>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-list: Ignore;">&sect;<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp; </span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Quedas, batidas, exposi&ccedil;&otilde;es &agrave; ambientes hostis ou qualquer dano causado por for&ccedil;a maior;</span></span></p>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-list: Ignore;">&sect;<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp; </span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Prolongada falta de utiliza&ccedil;&atilde;o do equipamento;</span></span></p>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-list: Ignore;">&sect;<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp; </span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Altera&ccedil;&otilde;es no equipamento sem aprova&ccedil;&atilde;o da MESAL;</span></span></p>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-list: Ignore;">&sect;<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp; </span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Armazenagem inadequada;</span></span></p>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-list: Ignore;">&sect;<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp; </span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Utiliza&ccedil;&atilde;o de pe&ccedil;as ou componentes n&atilde;o originais da MESAL;</span></span></p>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-list: Ignore;">&sect;<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp; </span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Inobserv&acirc;ncia dos procedimentos de manuten&ccedil;&atilde;o preventiva e limpeza dos equipamentos conforme manual de opera&ccedil;&otilde;es;</span></span></p>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-list: Ignore;">&sect;<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp; </span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Negligenciada a substitui&ccedil;&atilde;o regular das pe&ccedil;as de desgaste natural que apresentam vida &uacute;til limitada, conforme manual de opera&ccedil;&otilde;es;</span></span></p>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><!-- [if !supportLists]--><span style="mso-list: Ignore;">&sect;<span style="font-style: normal; font-variant: normal; font-size-adjust: none; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; line-height: normal;">&nbsp; </span></span><!--[endif]--><span style="mso-bidi-font-family: Arial;">Falta de pagamento, total ou parcial, devido pela aquisi&ccedil;&atilde;o do equipamento.</span></span></p>
<p class="MsoNormal" style="margin-left: 0cm; text-align: justify; text-indent: 21.3pt; mso-list: l0 level1 lfo1;">&nbsp;</p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>7&nbsp; &nbsp; PROPOSTA T&Eacute;CNICA</strong></span></p>
<p>&nbsp;</p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>8 &nbsp; &nbsp;PROPOSTA COMERCIAL</strong></span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.6pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Esta proposta comercial &eacute; v&aacute;lida dentro do prazo de 20 dias a contar da data de emiss&atilde;o do mesmo. Decorrido este prazo, a Mesal se reserva o direito de readequar as condi&ccedil;&otilde;es definidas caso julgue necess&aacute;rio. No caso de desist&ecirc;ncia ou cancelamento, ser&atilde;o acrescidos multas e juros banc&aacute;rios conforme modelo de contrato Mesal.</span></p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>8.1&nbsp; VALOR DE FORNECIMENTO</strong></span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.6pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Esta proposta comercial &eacute; v&aacute;lida dentro do prazo de 20 dias a contar da data de emiss&atilde;o do mesmo. Decorrido este prazo, a Mesal se reserva o direito de readequar as condi&ccedil;&otilde;es definidas caso julgue necess&aacute;rio. No caso de desist&ecirc;ncia ou cancelamento, ser&atilde;o acrescidos multas e juros banc&aacute;rios conforme modelo de contrato Mesal.</span></p>
<table style="border-collapse: collapse; width: 100%; border-spacing: 0px; height: 235.4px;" border="0" width="751" cellspacing="0" cellpadding="0"><colgroup><col style="mso-width-source: userset; mso-width-alt: 1649; width: 35pt;" span="2" width="46"> <col style="mso-width-source: userset; mso-width-alt: 10979; width: 232pt;" width="309"> <col style="mso-width-source: userset; mso-width-alt: 3185; width: 67pt;" width="90"> <col style="mso-width-source: userset; mso-width-alt: 4636; width: 98pt;" span="2" width="130"> </colgroup>
<tbody>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl68" style="width: 35pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="46" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Item</span></td>
<td class="xl68" style="width: 35pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="46"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Qtde</span></td>
<td class="xl68" style="width: 232pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="309"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Descri&ccedil;&atilde;o Equipamento</span></td>
<td class="xl68" style="width: 67pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="90"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">NCM</span></td>
<td class="xl68" style="width: 98pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="130"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Valor Unit&aacute;rio</span></td>
<td class="xl68" style="width: 98pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="130"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Valor Total</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">7.1</span></td>
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl69" style="width: 232pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="309">&nbsp;</td>
<td class="xl69" style="width: 67pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="90">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">7.2</span></td>
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl69" style="width: 232pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="309">&nbsp;</td>
<td class="xl69" style="width: 67pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="90">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">7.3</span></td>
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl69" style="width: 232pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="309">&nbsp;</td>
<td class="xl69" style="width: 67pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="90">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">7.4</span></td>
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl69" style="width: 232pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="309">&nbsp;</td>
<td class="xl69" style="width: 67pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="90">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">7.5</span></td>
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl69" style="width: 232pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="309">&nbsp;</td>
<td class="xl69" style="width: 67pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="90">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">7.6</span></td>
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl69" style="width: 232pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="309">&nbsp;</td>
<td class="xl69" style="width: 67pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="90">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">7.7</span></td>
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl69" style="width: 232pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="309">&nbsp;</td>
<td class="xl69" style="width: 67pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="90">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">7.8</span></td>
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl69" style="width: 232pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="309">&nbsp;</td>
<td class="xl69" style="width: 67pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="90">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">7.9</span></td>
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl69" style="width: 232pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="309">&nbsp;</td>
<td class="xl69" style="width: 67pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="90">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Total</span></td>
<td class="xl69" style="width: 35pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="46">&nbsp;</td>
<td class="xl69" style="width: 232pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="309">&nbsp;</td>
<td class="xl69" style="width: 67pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="90">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130">&nbsp;</td>
<td class="xl69" style="width: 98pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="130"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
</tr>
</tbody>
</table>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>8.2&nbsp; IMPOSTOS</strong></span></p>
<table style="border-collapse: collapse; width: 100%; border-spacing: 0px; height: 124px;" border="0" width="666" cellspacing="0" cellpadding="0"><colgroup><col style="mso-width-source: userset; mso-width-alt: 7907; width: 167pt;" span="3" width="222"> </colgroup>
<tbody>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; background-color: #e03e2d;">
<td class="xl68" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Imposto</span></strong></span></td>
<td class="xl68" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Al&iacute;quota</span></strong></span></td>
<td class="xl68" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222"><span style="color: #ffffff; font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong>Status</strong></span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">PIS</span></td>
<td class="xl70" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1,65%</span></td>
<td class="xl69" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Incluso</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">COFINS</span></td>
<td class="xl70" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">7,60%</span></td>
<td class="xl69" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Incluso</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">ICMS</span></td>
<td class="xl70" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">5,14%</span></td>
<td class="xl69" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Incluso</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">IPI</span></td>
<td class="xl70" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0,00%</span></td>
<td class="xl69" style="width: 167pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="222"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Isento</span></td>
</tr>
</tbody>
</table>
<p class="MsoNormal" style="margin-bottom: 12.0pt;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"> </span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><em style="mso-bidi-font-style: normal;">Obs.: caso haja altera&ccedil;&atilde;o na legisla&ccedil;&atilde;o vigente que reflita nas al&iacute;quotas dos impostos at&eacute; a data do faturamento, majorando, minorando ou havendo incid&ecirc;ncia de novos impostos, os valores correspondentes ser&atilde;o cobrados na ocasi&atilde;o do faturamento dos equipamentos.</em></span></p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>8.3 &nbsp;CONDI&Ccedil;&Otilde;ES DE PAGAMENTO</strong></span></p>
<table style="border-collapse: collapse; width: 100%; border-spacing: 0px; height: 183.2px;" border="0" width="763" cellspacing="0" cellpadding="0"><colgroup><col style="mso-width-source: userset; mso-width-alt: 9472; width: 200pt;" width="266"> <col style="mso-width-source: userset; mso-width-alt: 5290; width: 112pt;" width="149"> <col style="mso-width-source: userset; mso-width-alt: 7082; width: 149pt;" width="199"> <col style="mso-width-source: userset; mso-width-alt: 5290; width: 112pt;" width="149"> </colgroup>
<tbody>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl68" style="width: 200pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="266" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Eventos Mesal</span></td>
<td class="xl68" style="width: 112pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Valor</span></td>
<td class="xl68" style="width: 149pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="199"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Descri&ccedil;&atilde;o</span></td>
<td class="xl68" style="width: 112pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Data</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 200pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="266" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fechamento do pedido<span style="mso-spacerun: yes;">&nbsp;</span></span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
<td class="xl69" style="width: 149pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="199"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">30% do valor total do pedido</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">-</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 200pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="266" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Ap&oacute;s 60 dias do fechamento do pedido</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
<td class="xl69" style="width: 149pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="199"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">20% do valor total do pedido</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">-</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 200pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="266" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">No embarque dos equipamentos</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
<td class="xl69" style="width: 149pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="199"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">20% do valor total do pedido</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">-</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 200pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="266" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Saldo faturado em 28/56 dias (somente mediante an&aacute;lise de cr&eacute;dito)</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
<td class="xl69" style="width: 149pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="199"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">30% do valor total do pedido</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">-</span></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<table style="width: 100%; border-spacing: 0px; height: 207.2px;" border="0" width="763" cellspacing="0" cellpadding="0"><colgroup><col style="mso-width-source: userset; mso-width-alt: 9472; width: 200pt;" width="266"><col style="mso-width-source: userset; mso-width-alt: 5290; width: 112pt;" width="149"><col style="mso-width-source: userset; mso-width-alt: 7082; width: 149pt;" width="199"><col style="mso-width-source: userset; mso-width-alt: 5290; width: 112pt;" width="149"></colgroup>
<tbody>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl68" style="width: 200pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="266" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Eventos Finame</span></td>
<td class="xl68" style="width: 112pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Valor</span></td>
<td class="xl68" style="width: 149pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="199"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Descri&ccedil;&atilde;o</span></td>
<td class="xl68" style="width: 112pt; font-size: 10pt; color: white; font-weight: bold; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: #e23214; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Data</span></td>
</tr>
<tr style="height: 42.4px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 200pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="266" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fechamento do pedido&nbsp;</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
<td class="xl69" style="width: 149pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="199"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">20% do valor total do pedido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Compradora)</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">-</span></td>
</tr>
<tr style="height: 42.4px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 200pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="266" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Na compra da mat&eacute;ria prima</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
<td class="xl69" style="width: 149pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="199"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">40% do valor total do pedido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Finame)</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">-</span></td>
</tr>
<tr style="height: 42.4px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 200pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="266" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Na montagem dos equipamentos</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
<td class="xl69" style="width: 149pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="199"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">25% do valor total do pedido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Finame)</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">-</span></td>
</tr>
<tr style="height: 42.4px; border-color: #000000; border-style: solid;">
<td class="xl69" style="width: 200pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="266" height="40"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Na entrega dos equipamentos (mediante entrega de nota fiscal ao banco)</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0</span></td>
<td class="xl69" style="width: 149pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="199"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">15% do valor total do pedido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Finame)</span></td>
<td class="xl69" style="width: 112pt; font-size: 10pt; color: windowtext; font-weight: 400; text-decoration: none; font-family: Arial, sans-serif; border: 3px solid rgb(0, 0, 0); background: white; text-align: center; vertical-align: middle;" width="149"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">-</span></td>
</tr>
</tbody>
</table>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><em style="mso-bidi-font-style: normal;">Obs.: para parcelamento acima de 56 dias haver&aacute; uma corre&ccedil;&atilde;o de 1,7% ao m&ecirc;s para at&eacute; 4 parcelas (somente mediante an&aacute;lise de cr&eacute;dito).</em></span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.3pt; line-height: 115%;">&nbsp;</p>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>8.4 &nbsp;DADOS BANC&Aacute;RIOS</strong></span></p>
<table style="border-collapse: collapse; width: 100%; height: 225.6px; border-spacing: 0px;" border="0" width="416" cellspacing="0" cellpadding="0"><colgroup><col style="mso-width-source: userset; mso-width-alt: 4949; width: 104pt;" width="139"> <col style="mso-width-source: userset; mso-width-alt: 9841; width: 208pt;" width="277"> </colgroup>
<tbody>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; background-color: #e03e2d;">
<td class="xl69" style="width: 312pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" colspan="2" width="416" height="20"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Dados banc&aacute;rios</span></strong></span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl68" style="width: 104pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="139" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Institui&ccedil;&atilde;o</span></td>
<td class="xl68" style="width: 208pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="277"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Banco Do Brasil S/A</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl68" style="width: 104pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="139" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Ag&ecirc;ncia</span></td>
<td class="xl68" style="width: 208pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="277"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">0181-3</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl68" style="width: 104pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="139" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Conta Corrente</span></td>
<td class="xl68" style="width: 208pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="277"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">5792-4</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl68" style="width: 104pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="139" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">CNPJ</span></td>
<td class="xl68" style="width: 208pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="277"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">87.071.536/0001-86</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl68" style="width: 104pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="139" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Destinat&aacute;rio</span></td>
<td class="xl68" style="width: 208pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="277"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">MESAL M&Aacute;QUINAS E TECNOLOGIA LTDA</span></td>
</tr>
</tbody>
</table>
<p><span style="font-family: arial, helvetica, sans-serif; font-size: 12pt;"><strong>8.5&nbsp; DADOS BANC&Aacute;RIOS</strong></span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.6pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fica acordado a previs&atilde;o de expedi&ccedil;&atilde;o estabelecida nesta proposta, que iniciar&aacute; a partir da oficializa&ccedil;&atilde;o da mesma e o cumprimento integral dos seguintes itens:</span></p>
<table style="border-collapse: collapse; width: 100%; border-spacing: 0px; height: 193.4px;" border="0" width="500" cellspacing="0" cellpadding="0"><colgroup><col style="mso-width-source: userset; mso-width-alt: 1621; width: 34pt;" width="46"> <col style="mso-width-source: userset; mso-width-alt: 16156; width: 341pt;" width="454"> </colgroup>
<tbody>
<tr style="height: 37.6px; border-color: #000000; border-style: solid; background-color: #e03e2d;">
<td class="xl69" style="width: 375pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" colspan="2" width="500" height="19"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;"><strong><span style="color: #ffffff;">Item</span></strong></span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl68" style="width: 34pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="46" height="33"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">1</span></td>
<td class="xl68" style="width: 341pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="454"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Entrega de amostras f&iacute;sicas e desenhos conforme solicita&ccedil;&atilde;o e prazo informados no item 5.2</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl68" style="width: 34pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="46" height="33"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">2</span></td>
<td class="xl68" style="width: 341pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="454"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Entrega de amostras f&iacute;sicas e desenhos conforme solicita&ccedil;&atilde;o e prazo informados no item 5.3</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl68" style="width: 34pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="46" height="33"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">3</span></td>
<td class="xl68" style="width: 341pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="454"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Aprova&ccedil;&atilde;o do layout e informa&ccedil;&otilde;es t&eacute;cnicas necess&aacute;rias conforme item 4.3</span></td>
</tr>
<tr style="height: 37.6px; border-color: #000000; border-style: solid;">
<td class="xl68" style="width: 34pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="46" height="70"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">4</span></td>
<td class="xl68" style="width: 341pt; text-align: center; vertical-align: middle; border: 3px solid #000000;" width="454"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Assinar e reconhecer firma das assinaturas dos seus representantes legais, realizando a devida devolu&ccedil;&atilde;o da via original da proposta comercial e do contrato de compra e venda dos equipamentos, objetos desta proposta, com prazo de 30 dias da assinatura deste documento.</span></td>
</tr>
</tbody>
</table>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.6pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Para o aceite desta proposta &eacute; obrigat&oacute;rio rubrica em todas as vias, preenchimento da data na &uacute;ltima folha, assinatura de respons&aacute;vel da Compradora, nome completo, CPF, fun&ccedil;&atilde;o e carimbo da mesma e envio eletr&ocirc;nico desta proposta para: comercial01@mesal.com.br.</span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.6pt; line-height: 115%;"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Cumprindo este par&aacute;grafo e os requisitos do item 4.4 na integralidade, se dar&aacute; a libera&ccedil;&atilde;o do pedido para projeto/fabrica&ccedil;&atilde;o conforme especifica&ccedil;&otilde;es deste documento. O contrato ser&aacute; elaborado ap&oacute;s o recebimento da proposta conforme citado no par&aacute;grafo anterior. &Eacute; imprescind&iacute;vel o envio de duas vias originais f&iacute;sicas do contrato e da proposta aos cuidados do Departamento Financeiro.</span></p>
<p class="MsoNormal" style="text-align: justify; text-indent: 21.6pt; line-height: 115%;">&nbsp;</p>
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Data da assinatura: ____/____/____</span></p>
<table class="MsoNormalTable" style="border-collapse: collapse; width: 100%; border-spacing: 0px;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 17pt; border-style: hidden;">
<td style="width: 226.5pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" colspan="2" valign="top" width="302">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Mesal M&aacute;quinas e Tecnologias Ltda</span></p>
</td>
<td style="width: 226.6pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" colspan="2" valign="top" width="302">
<p class="MsoNormal" style="text-align: center;" align="center"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Compradora</span></p>
</td>
</tr>
<tr style="height: 17pt; border-style: hidden;">
<td style="width: 91.9pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="123">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Nome Completo:</span></p>
</td>
<td style="width: 134.6pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="179">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">&nbsp;</span></p>
</td>
<td style="width: 92.2pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="123">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Nome Completo:</span></p>
</td>
<td style="width: 134.4pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="179">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">&nbsp;</span></p>
</td>
</tr>
<tr style="height: 17pt; border-style: hidden;">
<td style="width: 91.9pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="123">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">CPF:</span></p>
</td>
<td style="width: 134.6pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="179">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">&nbsp;</span></p>
</td>
<td style="width: 92.2pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="123">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">CPF:</span></p>
</td>
<td style="width: 134.4pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="179">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">&nbsp;</span></p>
</td>
</tr>
<tr style="height: 17pt; border-style: hidden;">
<td style="width: 91.9pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="123">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fun&ccedil;&atilde;o:</span></p>
</td>
<td style="width: 134.6pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="179">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">&nbsp;</span></p>
</td>
<td style="width: 92.2pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="123">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Fun&ccedil;&atilde;o:</span></p>
</td>
<td style="width: 134.4pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="179">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">&nbsp;</span></p>
</td>
</tr>
<tr style="height: 17pt; border-style: hidden;">
<td style="width: 91.9pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="123">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Carimbo:</span></p>
</td>
<td style="width: 134.6pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="179">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">&nbsp;</span></p>
</td>
<td style="width: 92.2pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="123">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">Carimbo:</span></p>
</td>
<td style="width: 134.4pt; padding: 0cm 5.4pt; height: 17pt; border-width: 0px;" valign="bottom" width="179">
<p class="MsoNormal"><span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">&nbsp;</span></p>
</td>
</tr>
</tbody>
</table>
<p class="MsoNormal">&nbsp;</p>
                                            
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                            <span class="indicator-label">Enviar</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('plugins')
<script src="{{ mixAssets('/assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ mixAssets('/assets/js/mask.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#select2Multiple').select2({
            minimumResultsForSearch: Infinity,
            language: 'pt-BR'
        });
    });
</script>
@endsection