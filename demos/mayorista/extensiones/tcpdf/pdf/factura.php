<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = "codigo";
$valorVenta = $this->codigo;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

$fecha = date('d-m-Y');
$productos = json_decode($respuestaVenta["productos"], true);
$neto = number_format($respuestaVenta["neto"],2);
$impuesto = number_format($respuestaVenta["impuesto"],2);
$total = number_format($respuestaVenta["total"],2);


//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemCliente = "id";
$valorCliente = $respuestaVenta["id_cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

$itemVendedor = "id";
$valorVendedor = $respuestaVenta["id_vendedor"];

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:200px"><img src="images/logo_distribuidora.png"></td>

			<td style="background-color:white; width:185px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
				
				</div>

			</td>

			<td style="background-color:white; width:50px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					
				</div>
				
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>FACTURA N.<br>$valorVenta</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				Cliente: $respuestaCliente[nombre]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
			
				Fecha: $fecha

			</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">Direccion: $respuestaCliente[direccion]</td>

		</tr>
		
		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:540px">Telefono: $respuestaCliente[telefono]</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px; font-size:13px">Comentario: <strong>$respuestaVenta[metodo_pago]</strong></td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:390px; text-align:center">Producto</td>
		<td style="border: 1px solid #666; background-color:white; width:150px; text-align:center">Cantidad</td>
	

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------

foreach ($productos as $key => $item) {

$itemProducto = "descripcion";
$valorProducto = $item["descripcion"];
$orden = null;

$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

$valorUnitario = number_format($respuestaProducto["precio_venta"], 2);

$precioTotal = number_format($item["total"], 2);

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:390px;text-align:left">
			$item[id] - $item[descripcion]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:150px; text-align:center">
				$item[cantidad]
			</td>

			
			

		</tr>

	</table>



EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque5 = <<<EOF

<table>

	<tr>
		<td style="height:30px;"></td>
	</tr>

	<tr>
		<td style="width:50%; text-align:left; color:#000;font-size:10px; padding:5px 12px;"><span style="background-color:#abffaf;">ORIGINAL PROVEEDOR</span></td>
		<td style="width:50%; text-align:right;color:#000;font-size:10px; padding:5px 12px;">$fecha</td>
	</tr>

</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');


$pdf->AddPage();

// ---------------------------------------------------------

$bloque1 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:200px"><img src="images/logo_distribuidora.png"></td>

			<td style="background-color:white; width:185px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					

				</div>

			</td>

			<td style="background-color:white; width:50px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					
				</div>
				
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>FACTURA N.<br>$valorVenta</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				Cliente: $respuestaCliente[nombre]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
			
				Fecha: $fecha

			</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">Direccion: $respuestaCliente[direccion]</td>

		</tr>

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:540px">Telefono: $respuestaCliente[telefono]</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px; font-size:13px">Comentario: <strong>$respuestaVenta[metodo_pago]</strong></td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:390px; text-align:center">Producto</td>
		<td style="border: 1px solid #666; background-color:white; width:150px; text-align:center">Cantidad</td>
	

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------

foreach ($productos as $key => $item) {

$itemProducto = "descripcion";
$valorProducto = $item["descripcion"];
$orden = null;

$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

$valorUnitario = number_format($respuestaProducto["precio_venta"], 2);

$precioTotal = number_format($item["total"], 2);

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:390px; text-align:left">
			$item[id] - $item[descripcion]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:150px; text-align:center">
				$item[cantidad]
			</td>

			
			

		</tr>

	</table>



EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque5 = <<<EOF

<table>

	<tr>
		<td style="height:30px;"></td>
	</tr>

	<tr>
		<td style="width:50%; text-align:left; color:#000;font-size:10px; padding:5px 12px;"><span style="background-color:#fae1a7">COPIA CLIENTE</span></td>
		<td style="width:50%; text-align:right;color:#000;font-size:10px; padding:5px 12px;">$fecha</td>
	</tr>

</table>


EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');







// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 
ob_end_clean();
$pdf->Output("$respuestaCliente[nombre].pdf", 'D');

}

}

$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();

?>