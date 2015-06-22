<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from person";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Email</th>
	<th>Direccion</th>
	<th>Telefono</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["name"]; ?></td>
	<td><?php echo $r["lastname"]; ?></td>
	<td><?php echo $r["email"]; ?></td>
	<td><?php echo $r["address"]; ?></td>
	<td><?php echo $r["phone"]; ?></td>
	<td style="width:150px;">
		<a href="./editar.php?id=<?php echo $r["id"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["id"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["id"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/eliminar.php?id="+<?php echo $r["id"];?>;

			}

		});
		</script>
	</td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
