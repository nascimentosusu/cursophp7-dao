	<?php
	//DAO data access object esse nome sql.php porque o mesmo nome da classe

	class sql extends PDO {

	private $conn;


	public function __construct(){

		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root","");


	}
	private function setParams($statment, $parameters = array()){

		foreach ($parameters as $Key => $value) {

	    $this->setParam($key, $value);

	}

	}

	private function setParam($statment, $key, $value){

		$statment->bindParam($key, $value);
	}

	public function query($rawQuery, $params = array()){ //rawquery significa uma query bruta vai tratar ela depois,

	$stmt = $this->conn->prepare($rawQuery);

	$this->setParams($stmt, $params);

	$stmt->execute();

	return $stmt;

	}

	public function select($rawQuery, $params = array()):array
	{

    $stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}

	}

	?>