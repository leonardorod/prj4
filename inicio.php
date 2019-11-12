<?php
    include_once("conecta_login.php"); 
    include_once("./Class/Util.class.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8" name="viewport" content="width=device-width, initial-scale=1">
	<title>Início</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script type="text/javascript">
        function geraGrafico(){
            var data_inicial = $("#data_inicial").val();
            var data_final = $("#data_final").val();
            var idtipo = $("#lct_idtipo").val();
            $.post('inicio_grava.php', {op: 'geraGrafico', data_inicial: data_inicial, data_final: data_final, idtipo: idtipo},
                function(data){
                    $("#divGrafico").html(data);
                }, 'html');
        }
    </script>
</head>
<body>
	<?php include('menu.php'); ?>
	<div class="container-fluid">
        &nbsp;
        <div class="row form-group">
            <div class="col-3">
                <label>Dt Inicial:</label>
            </div>
            <div class="col-9">
                <input type="date" id="data_inicial" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-3">
                <label>Dt Final:</label>
            </div>
            <div class="col-9">
                <input type="date" id="data_final" class="form-control">
            </div>
        </div>
        &nbsp;
        <div class="form-group row">
            <div class="col-3">
                <label for="lct_idtipo">Tipo:</label>
            </div>
            <div class="col-9">
                <?
                    $sql = "SELECT * FROM tipo";
                    echo $util->comboBoxSql('lct_idtipo', 'tipo_descricao', 'idtipo', $sql, $db);
                ?>
            </div>
        </div>
        &nbsp;
        <div class="row">
            <div class="col-12" align="center">
                <input type="button" class="btn btn-primary" name="btnListar" value="Listar" onclick="geraGrafico()">
            </div>
        </div>
        &nbsp;
        <div id="divGrafico"></div>
    </div>
</body>
</html>