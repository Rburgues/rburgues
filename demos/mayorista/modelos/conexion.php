
<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=127.0.0.1:3306;dbname=u657661285_pos",  //host + base
			            "u657661285_mayorista_demo",						//usuario
			            "Rburgues28-03");									//password

		$link->exec("set names utf8");

		return $link;

	}

}



