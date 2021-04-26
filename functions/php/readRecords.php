<?php
error_reporting(E_ALL ^ E_NOTICE);
try{
    // include Database connection file 
    include("../../dist/db/functions.php");

	// Design initial table header 
    $data = '<table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Sucursal</th>
                <th>Permisos</th>
                <th>Acciones</th>
            </tr>
        </thead> 
        <tbody>';

    $query = "SELECT * FROM usuarios";

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
                <td>'.$row['username'].'</td>
                <td>'.$row['nombre_usuario'].'</td>
                <td>'.$row['apellido_usuario'].'</td>
                <td>'.$row['telefono'].'</td>
				<td>'.$row['direccion'].'</td>
                <td>'.$row['id_sucursal'].'</td>
                <td>'.$row['id_permiso'].'</td>
                <td>
                <div class=row>
                    <!-- EDIT BUTTON-->
                    <div class="col-md-6">
                        <button onclick="GetUserDetails('.$row['usuario_id'].')" class="btn btn-outline-info btn-block"><i class="fas fa-edit"></i></button>
                    </div>
                                    
                    <!-- DELETE BUTTON -->
                    <div class="col-md-6">
                        <button onclick="DeleteUser('.$row['usuario_id'].')" class="btn btn-outline-danger btn-block"><i class="fas fa-trash-alt"></i>
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
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Sucursal</th>
                    <th>Permisos</th>
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
      "responsive": true, "lengthChange": false, "autoWidth": false,
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