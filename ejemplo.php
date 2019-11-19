<?php
class servidor{
	  private $dbhost;
	  private $dbusuario;
	  private $dbpassword;
	  private $base;
	  private $conexion;
	  
	  function __construct ()
	  {
	   		   
			   $this->dbhost="localhost";
	   		   $this->dbusuario="id6594726_userdb";
	  		   $this->dbpassword="12345";
	  		   $this->base="id6594726_db";
			   
			   //-$this->dbhost="mysql.hostinger.mx";
	   		   //-$this->dbusuario="u681478209_us";test
	  		   //-$this->dbpassword="Cris2013";test01			   
			   //-$this->base='u681478209_bd';
			   
			   $this->hay_reg=0;
			   $this->conectado_svr=0;
		   	   $this->conectar();
			   
	  }
	  
	  function conectar()
	  { $cad=0;
	   		  
	   		   $this->conexion= new mysqli($this->dbhost,$this->dbusuario,$this->dbpassword,$this->base);
			   if ($this->conexion->connect_errno)
			   { 
				$cad=$cad."fallo la conexion".$this->conexion->connect_errno;	
				$this->conectado_svr=0;
			   }
			   else	{   	   
				   $cad=$this->conexion->host_info;
				   $this->conectado_svr=1;
				}
			return $cad;
	  }
	  function getConexion()
	  {return $this->conexion;}
}


	$srv = new servidor();

	$result=$srv->getConexion()->query("select * from accesos");

	while($row=$result->fetch_array(MYSQLI_NUM)) {

		foreach($row as $value)
		{
			echo $value;
		}

	}



?>