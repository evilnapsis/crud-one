<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from person where id = ".$_GET["id"];
$query = $con->query($sql1);
$person = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $person=$r;
  break;
}

  }
?>

<?php if($person!=null):?>

<form role="form" method="post" action="php/actualizar.php">
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $person->name; ?>" name="name" required>
  </div>
  <div class="form-group">
    <label for="lastname">Apellido</label>
    <input type="text" class="form-control" value="<?php echo $person->lastname; ?>" name="lastname" required>
  </div>
  <div class="form-group">
    <label for="address">Domicilio</label>
    <input type="text" class="form-control" value="<?php echo $person->address; ?>" name="address" required>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" value="<?php echo $person->email; ?>" name="email" >
  </div>
  <div class="form-group">
    <label for="phone">Telefono</label>
    <input type="text" class="form-control" value="<?php echo $person->phone; ?>" name="phone" >
  </div>
<input type="hidden" name="id" value="<?php echo $person->id; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>