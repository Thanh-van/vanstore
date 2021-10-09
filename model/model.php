<?php 

/**
 * 
 */
class Basemodel
{
	private $str_connect;
	function __construct()
	{
		$this->connect();
	}
	public function connect()
	{
		$this->str_connect=new mysqli('localhost','root','','vstore');
		mysqli_set_charset($this->str_connect,'utf8');
	}
	public function Select($table,$array, $k = null,$sql = null)
	{
		($k === null )? $k = '=' : $k;
		$sql = "SELECT * from " . $table . $this->query_select($array , $k) . $sql;
		// echo $sql;
		$result=$this->str_connect->query($sql);
		if ($result->num_rows==0) {
			$data=0;
		}else{
			while ($row=$result->fetch_assoc()) {
				$data[]=$row;
			}
		}
		return $data;
	}
	public function Select_like($table,$sql)
	{
		$sql = "SELECT * from " . $table . $sql;
		// echo $sql;
		$result=$this->str_connect->query($sql);
		if ($result->num_rows==0) {
			$data=0;
		}else{
			while ($row=$result->fetch_assoc()) {
				$data[]=$row;
			}
		}
		return $data;

	}
	
	public function INSERT($table,$data)
	{
		$str="INSERT INTO " .$table . " " . $this->query_insert($data);
		$data = $this->str_connect->query($str);
		return $data;
	}
	public function Delete($sql)
	{
		$data = $this->str_connect->query($sql);
		return $data;
	}
	public function Update($table,$data,$id)
	{
		$str="UPDATE ". $table . " " . $this->query_update($data,$id);
		// echo $str;
		var_dump($this->str_connect->query($str)); 
		return $data;
	}
	private function query_select($a,$k)
	{
		if(is_array($a)){
			$sql = " where ";
			$dem = 0;
			if($k == "=")
				foreach ($a as $item => $key)
				{
					if( $dem === (count($a)-1) )
						$sql .= $item . " " . $k . " '" . $key . "' ";
					else
						$sql .= $item . "  " . $k . " '" . $key . "' and ";
					$dem ++;
				}
			else{
				foreach ($a as $item => $key)
				{
					if( $dem === (count($a)-1) )
						$sql .= $item . " " . $k . " '%" . $key . "%' ";
					else
						$sql .= $item . "  " . $k . " '%" . $key . "%' and ";
					$dem ++;
				}
			}
			return $sql;
		}else return '';
		
	}
	private function query_insert($data)
	{
		$sql = '( ';
		$dem = 0;
		$value = " VALUES (";
		foreach ($data as $item => $key)
		{
			if( $dem === (count($data)-1) )
					$sql .= $item ;
				else
					$sql .= $item . ' , ';
			
			if( $dem === (count($data)-1) )
				$value .="'" . $key . "'"; 
			else
				$value .= "'".$key . "'" . ' , ';
			$dem ++;
		}
		$sql .= ' ) ' . $value . ' ) ' ;
		return $sql; 
	}
	private function query_update($data,$id)
	{
		$sql = '';
		$dem = 0;
		$value = " SET ";
		foreach ($data as $item => $key)
		{
			if( $dem === (count($data)-1) )
				$value .=$item . ' = ' ." '" . $key . "'"; 
			else
				$value .=$item . ' = ' ." '".$key . "'" . ' , ';
			$dem ++;
		}
		$sql .= ' ' . $value . ' WHERE id = '.$id;
		return $sql; 
	}
	
}


 ?>