
<?php
error_reporting(E_ALL ^ E_NOTICE);
try{
    // include Database connection file 
    include("../../../dist/db/functions.php");

	// Design initial table header 
    $data = '<table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Unidad</th>
                <th>Proveedor</th>
                <th>Acciones</th>
            </tr>
        </thead> 
        <tbody>';

    $query = "SELECT * FROM productos INNER JOIN unidades ON productos.id_unidad = unidades.unidad_id INNER JOIN proveedores ON productos.id_proveedor = proveedores.proveedor_id";

	if (!$result = mysqli_query($connect, $query)) {
        exit(mysqli_error($connect));
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$number.'</td>
                <td>'.$row['nombre_producto'].'</td>
                <td>$ '.$row['precio_producto'].'</td>
                <td>'.$row['descripcion_producto'].'</td>
                <td>'.$row['nombre_unidad'].'</td>
				        <td>'.$row['nombre_proveedor'].'</td>
                <td>
                <div class=row>
                    <!-- EDIT BUTTON-->
                    <div class="col-md-6">
                        <button onclick="GetItemDetails('.$row['producto_id'].')" class="btn btn-outline-info btn-block"><i class="fas fa-edit"></i></button>
                    </div>
                                    
                    <!-- DELETE BUTTON -->
                    <div class="col-md-6">
                        <button onclick="DeleteItem('.$row['producto_id'].')" class="btn btn-outline-danger btn-block"><i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
				</td>
    		</tr>';
    		$number++;
      }
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">No hay registros!</td></tr>';
    }

    $data .= '
            </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Unidad</th>
                    <th>Proveedor</th>
                    <th>Acciones</th>
                  </tr>
                </tfoot>
        </table>';

    echo $data;
}catch(Exception $e){
    echo "Error: " . $e->getMessage();
}


?>

<script>
  $(function () {
  
    $("#example1").DataTable({
      
      //dom: '<"row" <"col-sm-6"B> <"col-sm-6"<"selectTable"f>>> rtip',
        buttons: [
            'copy',
            'print',
            'excel',
            'pdf',
            'colvis'
            
        ],

      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,

      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "l_MENU_l",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "<i class='fa fa-search'></i>",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        buttons: {
          copy: "<abbr title='Copiar'><i class='fa fa-copy'></i></abbr>",
          copyTitle: 'Copiado',
          copySuccess: {
            _: '%d Usuarios copiados a portapapeles',
            1: '1 Usuario copiado'
          },
          print: "<abbr title='Imprimir'><i class='fa fa-print'></i></abbr>",
          excel: "<i class='fa fa-file-excel'></i>",
          pdf: "<i class='fa fa-file-pdf'></i>",
          colvis: "<i class='fa fa-columns'></i>"
          
    },
        
  }
  ,

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });


</script>

