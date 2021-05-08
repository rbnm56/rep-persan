<?php
error_reporting(E_ALL ^ E_NOTICE);
try {
  // include Database connection file 
  include("../../../dist/db/functions.php");
  include("../../../functions/php/sesiones.php");

  // Design initial table header 
  
  $data = '<table id="example1" class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Correo</th>
                <th>Mayorista</th>
                <th>Preferente</th>
                <th>Acciones</th>
            </tr>
        </thead> 
        <tbody>';
  $result = buscar("cliente_id, correo_cliente, nombre_cliente, apellido_cliente, telefono, direccion_cliente, es_preferencial, es_mayorista", "cliente", "WHERE id_usuario=$se_id_usuario", false);

  // if query results contains rows then featch those rows 
  if ($result->num_rows > 0) {
    $number = 1;
    while ($row = $result->fetch_assoc()) {

      $nombre = $row['nombre_cliente'];
      $apellido = $row['apellido_cliente'];
      $telefono = $row['telefono'];
      $direccion = $row['direccion_cliente'];
      $correo = $row['correo_cliente'];
      $mayorista = $row['es_mayorista'] == 1 ? 'Si' : 'No';
      $preferente = $row['es_preferencial'] == 1 ? 'Si' : 'No';
      $data .= '<tr>
				        <td>' . $number . '</td>
                <td>' . $nombre . '</td>
                <td>' . $apellido . '</td>
                <td>' . $telefono . '</td>
				        <td>' . $direccion . '</td>
				        <td>' . $correo . '</td>
                <td>' . $mayorista . '</td>
                <td>' . $preferente . '</td>
                <td>
                <div class=row>
                    <!-- EDIT BUTTON-->
                    <div class="col-md-6">
                        <button onclick="detallesCliente(' . $row['cliente_id'] . ')" class="btn btn-outline-info "><i class="fas fa-edit"></i></button>
                    </div>
                                    
                    <!-- DELETE BUTTON -->
                    <div class="col-md-6">
                        <button onclick="eliminarCliente(' . $row['cliente_id'] . ')" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
				</td>
    		</tr>';
      $number++;
    }
  } else {
    // records now found 
    $data .= '<tr><td colspan="6">No hay registros!</td></tr>';
  }

  $data .= '
            </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                    <th>Mayorista</th>
                    <th>Preferente</th>
                    <th>Acciones</th>
                  </tr>
                </tfoot>
        </table>';

  echo $data;
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
?>


<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>