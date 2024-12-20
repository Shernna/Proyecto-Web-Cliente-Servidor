<?php 

echo "<h1> Proyecto </h1>";


$servename = "localhost";
$username = "root";
$password = "";
$dbname = "citas_medicas";
$port = 3307;

$conn = new mysqli($servename, $username, $password, $dbname, $port);

if($conn->connect_error){
    die("Conexion fallida.");
}

echo "conexion exitosa.<br>";


// Insert 
/*
$query = "INSERT INTO `users`( `username`, `password`, `rol`) VALUES ('arojas','mpassword123','medico')";

if($conn->query($query) ==  TRUE){
    echo "Registro guardado exitosamente <br>";
} else {
    echo "Error al agregar registro <br>";   
}
*/

$sql = "SELECT * FROM `users`";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "ID: ".$row["id"].  " usuario: ".$row["username"]. " rol: ".$row["rol"]."<br>";
    }
}

$query = "UPDATE `users` SET `username`='arojas' WHERE id = 1";

if($conn->query($query) ==  TRUE){
    echo "Registro se actualizo exitosamente <br>";
} else {
    echo "Error al actualizar el registro <br>";   
}



$query = "DELETE FROM `users` WHERE id = 2";

if($conn->query($query) ==  TRUE){
    echo "Se elimino exitosamente <br>";
} else {
    echo "Error al borrar el registro <br>";   
}

// HASH 

$<?php


$clave = "mpassword123";

//$hash_password = password_hash($clave,PASSWORD_BCRYPT);

$hash_password = '$2y$10$5KnMSkiMeYV6XwiTiHVYLO6iFABIQFgHbR5y94jASB9DjZ5Unzgwa'
echo $clave."<bc>";
echo $hash_password;



if(password_verify($clave,$hash_password)){
    echo "El hash es igual al password";
} else {
    echo "El password no corresponde al hash";
}