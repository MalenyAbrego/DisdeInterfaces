<?php
	
	require_once("conexion.php");


	function agregarCliente($nombre,$correo,$telefono,$contra,$contra2,$usuario){
		global $pdo;
		$stmt = $pdo->prepare("INSERT INTO clientes(nombre,correo,telefono,contra,contra2,tipoUsuario)
					VALUES('$nombre', '$correo', '$telefono','$contra', '$contra2','$usuario')");
		return $stmt->execute();

		/*if($stmt->execute()){
			echo "<script>alert('Te has registrado con éxito')</script>";
		}*/
	}

	function agregarReserva($cliente,$fecha,$hora,$servicio){
		global $pdo;
		$stmt = $pdo->prepare("INSERT INTO reservas(servicio,cliente,fechaReserva,horaReserva)
					VALUES('$servicio', '$cliente', '$fecha','$hora')");
		return $stmt->execute();

		if($stmt->execute()){
			echo "<script>alert('Nueva reserva agregada');</script>";
		}
	}

	function agregarServicio($nombre,$descripcion,$precio){
		global $pdo;
		$stmt = $pdo->prepare("INSERT INTO servicios(nombre,descripcion,precio)
					VALUES('$nombre', '$descripcion', '$precio')");
		return $stmt->execute();

		if($stmt->execute()){
			echo "<script>alert('Nuevo servicio agregado');</script>";
		}
	}

	function login($correo,$contra){
		global $pdo;

		$sql = $pdo->prepare("SELECT * FROM clientes WHERE correo=:correo AND contra=:contra");
		$sql->bindParam(':correo',$correo);
		$sql->bindParam(':contra',$contra);
		$sql->execute();
		$info=$sql->fetch(PDO::FETCH_ASSOC);

		if($info){
			$_SESSION["usuario"]=$info["correo"];
			$_SESSION["contra"]=$info["contra"];
			return header("location: Inicio");
		}
		

	}

	function borrarServicio($id){
		global $pdo;
		$stmt = $pdo->prepare("DELETE FROM servicios WHERE id = '$id'");
		return $stmt->execute();
	}

	function borrarReserva($id){
		global $pdo;
		$stmt = $pdo->prepare("DELETE FROM reservas WHERE id = '$id'");
		return $stmt->execute();
	}

	function borrarCliente($id){
		global $pdo;
		$stmt = $pdo->prepare("DELETE FROM clientes WHERE id = '$id'");
		return $stmt->execute();
	}

	function borrarAdmin($id){
		global $pdo;
		$stmt = $pdo->prepare("DELETE FROM clientes WHERE id = '$id'");
		return $stmt->execute();
	}

	function get_all(){ //servicios
		global $pdo;
		$sentencia = $pdo->prepare('SELECT * FROM servicios');
		$sentencia->execute();
		return $sentencia->fetchAll();
	}

	function get_all_usuarios(){ //Contar servicios
		global $pdo;
		$sentencia = $pdo->prepare('SELECT * FROM clientes WHERE tipoUsuario=2');
		$sentencia->execute();
		return $sentencia->fetchAll();
	}

	function get_all_admin(){ //Contar servicios
		global $pdo;
		$sentencia = $pdo->prepare('SELECT * FROM clientes WHERE tipoUsuario=1');
		$sentencia->execute();
		return $sentencia->fetchAll();
	}

	function get_all_reservas(){ //Contar usuarios
		global $pdo;
		$sentencia = $pdo->prepare('SELECT r.id, s.nombre as service, c.nombre, r.fechaReserva, r.horaReserva, r.estado, e.estado as estado FROM reservas as r INNER JOIN clientes as c ON r.cliente = c.id
				INNER JOIN servicios as s ON r.servicio=s.id 
				INNER JOIN estado as e ON r.estado=e.id' );
		$sentencia->execute();
		return $sentencia->fetchAll();
	}


	//Funcion que permite realizar una busqueda de un usuario para obtener todos sus atributos mediante su id.
	function search($id){
		global $pdo;
		$sql = $pdo->prepare("SELECT * FROM servicios where id=:id");
		$sql->bindParam(':id',$id);
		$sql->execute();
		return $sql->fetch(PDO::FETCH_ASSOC);
	}

	function searchReserva($id){
		global $pdo;
		$sql = $pdo->prepare("SELECT * FROM reservas where id=:id");
		$sql->bindParam(':id',$id);
		$sql->execute();
		return $sql->fetch(PDO::FETCH_ASSOC);
	}

	function searchUsuario($id){
		global $pdo;
		$sql = $pdo->prepare("SELECT * FROM clientes where id=:id");
		$sql->bindParam(':id',$id);
		$sql->execute();
		return $sql->fetch(PDO::FETCH_ASSOC);
	}

	function count_users(){
		global $pdo;
		$sql="SELECT COUNT(*) AS clientes FROM clientes WHERE tipoUsuario=2";
		$stmt=$pdo->prepare($sql);
		$stmt->execute();
		$res=$stmt->fetchAll();
		$clientes=$res[0]['clientes'];
		return $clientes;
	}

	function count_admin(){
		global $pdo;
		$sql="SELECT COUNT(*) AS admin FROM clientes WHERE tipoUsuario=1";
		$stmt=$pdo->prepare($sql);
		$stmt->execute();
		$res=$stmt->fetchAll();
		$clientes=$res[0]['admin'];
		return $clientes;
	}

	function count_reservas(){
		global $pdo;
		$sql="SELECT COUNT(*) AS reservas FROM reservas";
		$stmt=$pdo->prepare($sql);
		$stmt->execute();
		$res=$stmt->fetchAll();
		$reservas=$res[0]['reservas'];
		return $reservas;
	}

	function selectServicios(){
		global $pdo;
		$stmt=$pdo->prepare("SELECT * FROM servicios");
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function selectEstado(){
		global $pdo;
		$stmt=$pdo->prepare("SELECT * FROM estado");
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function selectCliente(){
		global $pdo;
		$stmt=$pdo->prepare("SELECT * FROM clientes WHERE tipoUsuario=2");
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function updateServicios($id,$nombre,$descripcion,$precio){
		global $pdo;
		
		$stmt=$pdo->prepare("UPDATE servicios SET nombre=:nombre, descripcion=:descripcion, precio=:precio WHERE id=:id");
		$stmt->bindParam(':nombre',$nombre);
		$stmt->bindParam(':descripcion',$descripcion);
		$stmt->bindParam(':precio',$precio);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
	}

	function updateReserva($id,$servicio,$cliente,$fechaReserva,$horaReserva, $estado){
		global $pdo;
		
		$stmt=$pdo->prepare("UPDATE reserva SET servicio=:servicio, cliente=:cliente, fechaReserva=:fechaReserva, horaReserva=:horaReserva, estado=:estado WHERE id=:id");
		$stmt->bindParam(':servicio',$servicio);
		$stmt->bindParam(':cliente',$cliente);
		$stmt->bindParam(':fechaReserva',$fechaReserva);
		$stmt->bindParam(':horaReserva',$horaReserva);
		$stmt->bindParam(':estado',$estado);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
	}

	function updateUsuario($id,$nombre,$correo,$telefono,$contra,$contra2){
		global $pdo;
		
		$stmt=$pdo->prepare("UPDATE clientes SET nombre=:nombre, correo=:correo, telefono=:telefono, contra=:contra, contra2=:contra2 WHERE id=:id");
		$stmt->bindParam(':nombre',$nombre);
		$stmt->bindParam(':correo',$correo);
		$stmt->bindParam(':telefono',$telefono);
		$stmt->bindParam(':contra',$contra);
		$stmt->bindParam(':contra2',$contra2);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
	}



?>