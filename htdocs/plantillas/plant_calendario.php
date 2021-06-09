
<?php

require_once '../funciones/listadoCitas.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IES La Vereda</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        
    }
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>



</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">IES La Vereda</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="citas">Listado Citas</a>
                    </li>
                    <li>
                        <a href="calendario">Calendario</a>
                    </li>
                    <li>
                        <a href="horario">Horario</a>
                    </li>
                </ul>
                <span class="navbar-text">
     <?php
     echo $_SESSION['usuario'];
     ?>
    </span>
    <ul class="nav navbar-nav">
                    <li>
                        <a href="../funciones/cerrarSesion.php">Cerrar Sesion</a>
                    </li>
            </div>
          
            <!-- /.navbar-collapse -->
        </div>

        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
	
        <div class="row">
            <div class="col-lg-12 text-center">
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="eliminarCitaCalendario.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Detalles Cita</h4>
			  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Correo</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" disabled placeholder="Correo">
					</div>
				
					

					<label for="title" class="col-sm-2 control-label">Hora</label>
					<div class="col-sm-10">
					
					  <input type="time" name="hora" class="form-control" id="hora" disabled placeholder="Hora">
					</div>

				

				  </div>
				  <!--
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Eliminar Cita</label>
						  </div>
						</div>
					</div>
-->
					
				  
				  <input type="hidden" name="id" class="form-control" id="id">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				<!--<button type="submit" class="btn btn-primary">Aceptar</button>-->
			  </div>
			  <input type="hidden" name="id" class="form-control" id="id">
			</form>
			</div>
		  </div>
		</div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar/fullcalendar.min.js'></script>
	<script src='js/fullcalendar/fullcalendar.js'></script>
	<script src='js/fullcalendar/locale/es.js'></script>
	
	
	<script>

	$(document).ready(function() {

		var date = new Date();
       var yyyy = date.getFullYear().toString();
       var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
       var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
		
		$('#calendar').fullCalendar({
			header: {
				 language: 'es',
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay',

			},
			defaultDate: yyyy+"-"+mm+"-"+dd,
			editable: true,
			eventLimit: true,
			eventLimitText: "Más", // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #hora').val(event.hora);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},

			
			events: [
			<?php for ($i=0; $i <sizeof($citas); $i++) { 

			?>
				{
					id: '<?php echo $citas[$i]->getId(); ?>',
					title: '<?php echo $citas[$i]->getCorreo(); ?>',
					hora: '<?php echo $citas[$i]->getFecha()->format('H:i') ?>',
					start: '<?php echo $citas[$i]->getFecha()->format('Y-m-d') ?>',
					end: '<?php echo $citas[$i]->getFecha()->format('Y-m-d'); ?>',
					color: '#0071c5',
				},
			<?php } ?>
			]
		});
	/*
		function edit(event){

			id =  event.id;
			
			Event = [];
			Event[0] = id;

			$.ajax({
			 url: 'eliminarCitaCalendario.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Cita se ha eliminada correctamente');
					}else{
						alert('No se pudo eliminar. Inténtalo de nuevo.'); 
					}
				}
			});
		}
		*/
		
		
	});

</script>

</body>

</html>
