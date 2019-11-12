<?php
    include_once("../conecta.php");
	include_once("../m_funcoes/funcoes.php"); 
	$sql = " SELECT ceme_mes, SUM(ceme_faturamento) as total 
			FROM centrocusto_metas
			WHERE ceme_idcentrocusto = {$_POST['idcentrocusto']}
				AND ceme_ano = " . date("Y") .
				" GROUP BY ceme_mes
				 ORDER BY ceme_mes";
	// echo $sql;
	$res = MS::query($sql);
	while ($reg = $res->fetch()) {
		$metas[$reg['ceme_mes']] = $reg['total']; 
	}
	//
	$sql = "SELECT MONTH(ped_data_fecha) AS mes, SUM(ped_total_pedido) AS total
			FROM pedidos
			WHERE ped_situacao = 'Fechado'
				AND ped_idcentrocusto = {$_POST['idcentrocusto']}
				AND YEAR(ped_data_fecha) = " . date("Y") .
			" GROUP BY MONTH(ped_data_fecha)
				 ORDER BY MONTH(ped_data_fecha)";
	$res = MS::query($sql);
	while ($reg = $res->fetch()) {
		$faturamento[$reg['mes']] = $reg['total']; 
	}
?>
<script src="../jquery/1.8.17/js/jquery-ui-1.8.17.custom.min.js" type="text/javascript"></script>
<script type="text/javascript">
	Highcharts.chart('container', {
		chart: {
	        type: 'spline'
	    },
	    title: {
	        text: 'Metas X Realizados'
	    },
		xAxis: {
	        type: 'datetime',
	        dateTimeLabelFormats: {
	            month: '%b/%Y'
	        },
	        title: {
	            text: 'Data'
	        }
	    },
	    
      tooltip: {
		        headerFormat: '<b>{series.name}</b><br>',
		        pointFormat: '{point.x:%e. %b}: R$ {point.y:.2f}'
		    },
		    plotOptions: {
		        spline: {
		            marker: {
		                enabled: true
		            }
		        }
		    },
		    colors: ['#6CF', '#39F', '#06C', '#036', '#000'],

    series: [
    {
        name: 'Metas',
        data: [
        <? 	$primeiro = true;
        	foreach ($metas as $mes => $valor){ 
        		if(!$primeiro) echo ", "; ?>
        		[Date.UTC(<?= date("Y") ?>,<?= $mes - 1; ?>),<?= $valor ?>]
        <? 		$primeiro = false;
    		} ?>
        ]
    },
    {
        name: 'Realizado',
        data: [
        <? 	$primeiro = true;
        	$mesLoop = 1;
        	while($mesLoop <= 12){ 
        		//
        		if(empty($faturamento[$mesLoop])){
        			$faturamento[$mesLoop] = 0;
        		}
        		//
        		if(!$primeiro) echo ", "; ?>
        		[Date.UTC(<?= date("Y") ?>,<?= $mesLoop - 1 ?>),<?= $faturamento[$mesLoop] ?>]
        <? 		$primeiro = false;
        		$mesLoop ++;
    		} ?>
        ]
    }
    ]
});
</script>
<div id="container"></div>