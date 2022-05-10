<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <!-- LIGTHBOX PARA IMAGENES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" sizes="32x32" href="css/images/favicon.ico">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="html5gallery/html5gallery.js"></script>




    <title>MatCar - SISTEMA DE GESTION DE TRABAJOS</title>
    
  </head>
  <body >

    <div class="fondo">

       
        <div style="width:100%;">
        
            <div style="width:10%; float:right; margin-right:15px;margin-top:0.5%; position:relative; z-index:2;">
            <a href="../index.php"><button style="font-weight:bold; background-color:#e00000" type="button" class="btn btn-danger w-100">
        SALIR</button></a>
                
             </div>

            <img style="padding-left:5px; padding-right:5px; width:100%; margin-top:-4%;" src="css/images/header.jpg" >

            
        </div>

       <div style="width:18%; margin-left:10px; margin-top:3%; margin-bottom:-35px; position:relative; z-index:2;"><button style="font-weight:bold; background-color:#e00000" type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#modalUsuario" id="botonCrear">
        <i class="bi bi-truck" style="margin-right:15px;"></i> INGRESAR NUEVA ORDEN</button></div>

        <div style="width:99%; margin: auto;" class="table-responsive">
                 
            <table style="text-align:center; width:100%;" id="datos_usuario" class="table table-striped">
                <thead>
                <tr style="background-color:#FFF; color:#FFF; ">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr style="color:#FFF; ">
                        <th style="background-color:#222; border-top: 5px #e00000 solid">Datos Cliente</th>
                        <th style="background-color:#222; border-top: 5px #e00000 solid"></th>
                        <th style="background-color:#222; border-top: 5px #e00000 solid"></th>
                        <th style="background-color:#222; border-top: 5px #e00000 solid"></th>
                        <th style="background-color:#222; border-top: 5px #e00000 solid">Datos Vehiculo</th>
                        <th style="background-color:#222; border-top: 5px #e00000 solid"></th>
                        <th style="background-color:#222; border-top: 5px #e00000 solid"></th>
                        <th style="background-color:#222; border-top: 5px #e00000 solid"></th>
                        <th style="background-color:#222; border-top: 5px #e00000 solid"></th>
                        <th style="background-color:#222; border-top: 5px #e00000 solid"></th>
                        <th style="background-color:#222; border-top: 5px #e00000 solid"></th>
                        
                    </tr>
                    <tr>
                        <th>N° Orden</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Matricula</th>
                        <th>Marca</th>
                        <th>Modelo</th>                       
                        <th>Fecha Entrega</th>
                        <th>Fecha Ingreso</th>
                        <th>Ver</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
            </table>
        </div>
   </div>




<!-- Modal -->
<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div style="border-radius:25px; padding:8px;" class="modal-content">
      <div class="modal-header">
        <h3 style="font-weight:bold;" class="modal-title" id="exampleModalLabel">CREAR NUEVA ORDEN DE TRABAJO</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
        <form method="POST" id="formulario" enctype="multipart/form-data">
            <div style="width:100%; margin:0 auto; ">
                <div style="width:70%; float:right" class="modal-body">
                    

                    <label style="font-weight:bold; margin-bottom:15px;">DATOS DEL VEHICULO</label><br/>

                    <div style="width:100%; margin-top:10px;">
                    <label for="matricula">N° de Matricula</label>
                    <label style="margin-left:78px;" for="marca">Ingrese la Marca</label>
                    <label style="margin-left:185px;" for="modelo">Ingrese el Modelo</label>  
                    </div>

                    <div style="width:100%;">
                    <input style="width:20%;float:left;" type="text" name="matricula" id="matricula" class="form-control">
                    <input style="width:35%; float:left; margin-left:37px" type="text" name="marca" id="marca" class="form-control">   
                    <input style="width:35%; float:left; margin-left:37px" type="text" name="modelo" id="modelo" class="form-control">
                    </div>
                    <div style="width:100%; margin-top:60px;">
                    <label for="diagnostico">Diagnostico Inicial</label>
                    <label style="margin-left:260px" for="trabajorealizado">Trabajo Realizado</label>
                    </div>

                    <div style="width:100%;">
                    <textarea style="width:48%; height:100px; float:left;resize: none;"  type="text" name="diagnostico" id="diagnostico" class="form-control"></textarea>
                    <textarea style="width:48%; height:100px; float:left; margin-left:30px; resize: none;" type="text" name="trabajorealizado" id="trabajorealizado" class="form-control"></textarea>
                    </div>
                    
                   
                    
                    <div style="width:100%; margin-top:120px;">
                    <label style="margin-left:20px;" for="imagen">Seleccione imagen</label>
                    <label  style="margin-left:25px;"for="imagen2">Seleccione imagen</label>
                    <label  style="margin-left:35px;"for="imagen3">Seleccione imagen</label>
                    <label  style="margin-left:35px;"for="imagen4">Seleccione imagen</label>
                    </div>

                    <div style="width:100%;">
                    <input style="width:21%; float:left;" type="file" name="imagen_usuario" id="imagen_usuario" class="form-control">
                   
                    </div>

                    <div style="width:100%;">
                    <input style="width:21%; float:left; margin-left:10px;" type="file" name="imagen_usuario2" id="imagen_usuario2" class="form-control">
                   
                    </div>
                    
                    <div style="width:100%;">
                    <input style="width:21%; float:left; margin-left:10px;" type="file" name="imagen_usuario3" id="imagen_usuario3" class="form-control">
                   
                    </div>
                    
                    <div style="width:100%;">
                    <input style="width:21%; float:left; margin-left:10px;" type="file" name="imagen_usuario4" id="imagen_usuario4" class="form-control">
                   
                    </div>

                    <div style="width:100%; margin-top:60px;">
                    <div style="max-width=150px; max-height:150px; float:left; margin-left:5px;" id="imagen_subida"></div>
                    <div style="max-width=150px; max-height:150px; float:left; margin-left:20px;" id="imagen_subida2"></div>
                    <div style="max-width=150px; max-height:150px; float:left; margin-left:15px;" id="imagen_subida3"></div>
                    <div style="max-width=150px; max-height:150px; float:left; margin-left:20px;" id="imagen_subida4"></div>
                    </div>

                    <div style="margin-top:50px; border-color:#FFF; float:right;" class="modal-footer">
                    <input type="hidden" name="id_usuario" id="id_usuario">
                    <input type="hidden" name="operacion" id="operacion"> 
                    <input type="button" data-bs-dismiss="modal" class="btn btn-dark" aria-label="Close" value="Cerrar">            
                    <input type="submit" name="action" id="action" class="btn btn-danger" value="Crear">
                     </div> 

                    

                </div>

                <div class="w-100"></div>

                <div style="width:30%; float:left" class="modal-body">
                    <label style="font-weight:bold; margin-bottom:15px;">DATOS DEL CLIENTE</label><br/>

                    <!-- MODAL EMPIEZA ACA Y CONTINUA EN LA SECCION DE ARRIBA-->

                    <label  for="nombre">Ingrese nombre:</label>
                    <input 0 type="text" name="nombre" id="nombre" class="form-control">
                    
                    <label for="apellidos">Ingrese apellido:</label>
                    <input 0 type="text" name="apellidos" id="apellidos" class="form-control">
                    
                   
                    <label for="telefono">Ingrese un teléfono</label>
                    <input 0 type="text" name="telefono" id="telefono" class="form-control">
                    <br />


                    <label style="font-weight:bold; margin-bottom:15px;">CONTROL DE FECHAS</label><br/>
                    <div style="width:100%; margin-top:10px;">
                            <label for="fecha_creacion">Fecha de Ingreso</label>
                            <label style="float:right; margin-right:20px;" for="fecha_entrega">Fecha de Entrega</label>
                    </div>    
                    
                    <div style="width:100%">
                        <input style="width:47%; float:right" type="text" name="fecha_creacion" id="fecha_creacion"  class="form-control">  
                        <input style="width:47%; " type="text" name="fecha_entrega" id="fecha_entrega" class="form-control">
                        
                    </div>                      

                   
                </div>
               
            </div>

        </form>
        
      </div>     
  </div>
</div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#botonCrear").click(function(){
                $("#formulario")[0].reset();
                $("#action").val("Crear");
                $("#operacion").val("Crear");
                $("#imagen_subida").html("");
                $("#imagen_subida2").html("");
                $("#imagen_subida3").html("");
                $("#imagen_subida4").html("");
            });
            
            var dataTable = $('#datos_usuario').DataTable({
                "processing":true,
                "serverSide":true,
                "searching": true,
                "ordering": false,
                "sScrollX": false,
                "lengthMenu": false,
                "order":[],
                "ajax":{
                    url: "obtener_registros.php",
                    type: "POST"
                },

                "columnsDefs":[
                    {
                    "targets":[0, 3, 4],
                    "orderable":false,
                    },
                ],
                "language": {
                "decimal": "",
                "emptyTable": "No hay registros",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Ingresos",
                "infoEmpty": "Total: 0 Ingresos",
                "infoFiltered": "(Filtrado de _MAX_ total Ingresos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "<div style='visibility:hidden'>_MENU_</div>",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "<span style='font-weight:bold'>BUSCAR POR MATRICULA </span>",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
            });
            
            //Aquí código inserción
            $(document).on('submit', '#formulario', function(event){
            event.preventDefault();
            var nombres = $('#nombre').val();
            var apellidos = $('#apellidos').val();
            var telefono = $('#telefono').val();
            var marca = $('#matricula').val();
            var marca = $('#marca').val();
            var marca = $('#modelo').val();
            var marca = $('#diagnostico').val();
            var marca = $('#trabajorealizado').val();
            var marca = $('#fecha_creacion').val();
            var marca = $('#fecha_entrega').val();
            var extension = $('#imagen_usuario').val().split('.').pop().toLowerCase();
            if(extension != '')
            {
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Fomato de imagen inválido");
                    $('#imagen_usuario').val('');
                    return false;
                }
            }	
            if(extension != '')
            {
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Fomato de imagen inválido");
                    $('#imagen_usuario2').val('');
                    return false;
                }
            }	
            if(extension != '')
            {
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Fomato de imagen inválido");
                    $('#imagen_usuario3').val('');
                    return false;
                }
            }	
            if(extension != '')
            {
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Fomato de imagen inválido");
                    $('#imagen_usuario4').val('');
                    return false;
                }
            }	
		    if(nombres != '' && apellidos != '' && marca != '')
                {
                    $.ajax({
                        url:"crear.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            $('#formulario')[0].reset();
                            $('#modalUsuario').modal('hide');
                            dataTable.ajax.reload();
                        }
                    });
                }
                else
                {
                    alert("Algunos campos son obligatorios");
                }
	        });

            //Funcionalida de editar
            $(document).on('click', '.editar', function(){		
            var id_usuario = $(this).attr("id");		
            $.ajax({
                url:"obtener_registro.php",
                method:"POST",
                data:{id_usuario:id_usuario},
                dataType:"json",
                success:function(data)
                    {
                        //console.log(data);				
                        $('#modalUsuario').modal('show');
                        $('#nombre').val(data.nombre);
                        $('#apellidos').val(data.apellidos);
                        $('#telefono').val(data.telefono);
                        $('#matricula').val(data.matricula);
                        $('#marca').val(data.marca);
                        $('#modelo').val(data.modelo);
                        $('#diagnostico').val(data.diagnostico);
                        $('#trabajorealizado').val(data.trabajorealizado);
                        $('#fecha_creacion').val(data.fecha_creacion);
                        $('#fecha_entrega').val(data.fecha_entrega);
                        $('.modal-title').text("TRABAJO EN EL HISTORIAL");
                        $('#id_usuario').val(id_usuario);
                        $('#imagen_subida').html(data.imagen_usuario);
                        $('#imagen_subida2').html(data.imagen_usuario2);
                        $('#imagen_subida3').html(data.imagen_usuario3);
                        $('#imagen_subida4').html(data.imagen_usuario4);
                        $('#action').val("Actualizar");
                        $('#operacion').val("Editar");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    }
                })
	        });


            //Funcionalida de borrar
            $(document).on('click', '.borrar', function(){
                var id_usuario = $(this).attr("id");
                if(confirm("Esta seguro de borrar este registro:" + id_usuario))
                {
                    $.ajax({
                        url:"borrar.php",
                        method:"POST",
                        data:{id_usuario:id_usuario},
                        success:function(data)
                        {
                            alert(data);
                            dataTable.ajax.reload();
                        }
                    });
                }
                else
                {
                    return false;	
                }
            });

        });      
        
        
    </script>

<script>
        // Funcion para limitar el numero de caracteres de un textarea o input
        // Tiene que recibir el evento, valor y número máximo de caracteres
        function limitar(e, contenido, caracteres)
        {
            // obtenemos la tecla pulsada
            var unicode=e.keyCode? e.keyCode : e.charCode;
 
            // Permitimos las siguientes teclas:
            // 8 backspace
            // 46 suprimir
            // 13 enter
            // 9 tabulador
            // 37 izquierda
            // 39 derecha
            // 38 subir
            // 40 bajar
            if(unicode==8 || unicode==46 || unicode==13 || unicode==9 || unicode==37 || unicode==39 || unicode==38 || unicode==40)
                return true;
 
            // Si ha superado el limite de caracteres devolvemos false
            if(contenido.length>=caracteres)
                return false;
 
            return true;
        }
    </script>
    
       
            
  </body>
</html>