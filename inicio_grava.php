<?
	include_once("conecta_login.php");
	include_once("./Class/Util.class.php");

	if ($_POST['op'] == 'geraGrafico') {

		$data_inicial = $util->sgr($_POST['data_inicial']);
		$data_final = $util->sgr($_POST['data_final']);

		$sql = "SELECT SUM(lct_valor) as valor, idclasse, cls_descricao FROM lanctos 
						LEFT JOIN tipo ON (idtipo = lct_idtipo)
						LEFT JOIN classe ON (idclasse = lct_idclasse)
					WHERE lct_data >= " . $data_inicial . "
						AND lct_data <= " . $data_final . "
						AND idtipo = " . $_POST['idtipo'] . "
					GROUP BY idclasse, cls_descricao";
		// echo $sql;exit;
		$res = $db->consultar($sql);
	}
	?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="js/funcoes.js"></script>
	<link rel="stylesheet" href="css/padrao.css">
	<script type="text/javascript">
		// Build the chart
		Highcharts.chart('container', {
		    chart: {
		        plotBackgroundColor: null,
		        plotBorderWidth: null,
		        plotShadow: false,
		        type: 'pie'
		    },
		    title: {
		        text: 'Lançamentos'
		    },
		    tooltip: {
		        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		    },
		    plotOptions: {
		        pie: {
		            allowPointSelect: true,
		            cursor: 'pointer',
		            dataLabels: {
		                enabled: false
		            },
		            showInLegend: true
		        }
		    },
		    series: [{
		        name: 'Brands',
		        colorByPoint: true,
		        data: [{
		        	<?
		        	$primeiro = true;
		        	foreach ($res as $reg){
		        		if ($primeiro) {
		        			$primeiro = false;

		        			echo "name: '" . $reg['cls_descricao'] . "',";
		        			echo "y: " . $reg['valor'] . ",";
		        			echo "sliced: true,
		            selected: true";
		        		}else{
		        			echo "},{";
		        			echo "name: '" . $reg['cls_descricao'] . "',";
		        			echo "y: " . $reg['valor'];
		        		}
		        	}
		        	?>
		        }]
		    }]
		});
	</script>
	<div id="container"></div>