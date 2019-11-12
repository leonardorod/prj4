<?php
  include_once("../conecta.php");
	include_once("../m_funcoes/funcoes.php"); 
	require_once("../m_classes/m_tela.php");
	require_once("../m_classes/m_campos.php");
	  
 
 	m_tela::pagina_header("Gráfico de Receitas", "100%", "graf_receitas_periodo");
	m_tela::form_sem_consulta();
	
?>

<link href="../padrao.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<script type="text/javascript" src="../dhtmlgoodies_calendar.js?random=20060118"></script>
<script type="text/javascript" src="../diversas-funcoes.js?random=223322"></script>
<script type="text/javascript" src="../m_funcoes/mascara_geral.js"></script>
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript">
  function chama_listar(operacaox){
    //
    var idcentrocusto = $("#idcentrocusto option:selected").val();
    if(idcentrocusto <= 0){
      alert("Selecione um <?= NOME_PARA_CENTROCUSTO ?>!");
      return;
    }
    //
    $.post("../_Faturamento/graf_metas_centrocusto.php",
      {idcentrocusto: idcentrocusto},
      function(data){
        $("#divGrafico").html(data);
      }, "html");
  }
</script>

<form name="form_edita" action="graf_metas_centrocusto.php" method="post" target="_self">
<input type="hidden" id="operacao" name="operacao" value="nulo" />
  <div class="body" style="padding-left: 5px;" align="center">

    <?
      echo NOME_PARA_CENTROCUSTO . ": ";
      //
      $sql_cecu = "select * from centrocusto";
      //
      m_campos::criaSelectSql("idcentrocusto","cecu_descricao","idcentrocusto", 0, $sql_cecu);
    ?>
  </div>
  <div style="margin-top: 5px;" align="center">
    <input name="enviar_consulta" tabindex="21" type="button" style="cursor: pointer;" onclick="chama_listar('listar')" class="yellowbutton" value="Listar" />
  </div>
</form>	

<div id="divGrafico"></div>

<? m_tela::pagina_footer(); ?>
