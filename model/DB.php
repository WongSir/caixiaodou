<?php

	class DB{
		private $db_UserName;
		private $db_Password;
		private $db_Host;
		private $db_DBName;
		
		function __construct(){
			
			// $this->db_UserName='maomao';
			// $this->db_Password='maomao';
			// $this->db_Host='localhost';
			// $this->db_DBName='caixiaodou';

			$this->db_UserName='root';
			$this->db_Password='root';
			$this->db_Host='localhost';
			$this->db_DBName='caixiaodou';
		}
		
		function __destruct(){
		
		}
		
		/**
		 * 完成记录插入的操作
		 * @param string $table
		 * @param array $array
		 * @return number
		 */
		function insert($table,$array){
			@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
	
				echo "<script>alert('Can't conect to the database!');</script>";
				exit;
			
			}

			$keys=join(",",array_keys($array));
			// var_dump($array);echo "</br>";
			// echo $keys;exit;
			$vals="'".join("','",array_values($array))."'";
			$sql="insert {$table}($keys) values({$vals})";
	
			@ $db->query("SET NAMES UTF8");	
			
			@ $bool_isSuccess = $db->query($sql);

			$id = $db->insert_id;
			
			@ $db->close();

			if($bool_isSuccess){
				return $id;
			}
			else
				return false;
		}

		/**
		 *	删除记录
		 * @param string $table
		 * @param string $where
		 * @return number
		 */
		function delete($table,$where=null){
			@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
	
				echo "<script>alert('Can't conect to the database!');</script>";
				exit;
			
			}

			$where=$where==null?null:" where ".$where;
			$sql="delete from {$table} {$where}";
			
			@ $db->query("SET NAMES UTF8");	
			
			@ $bool_isSuccess = $db->query($sql);
			
			@ $db->close();
			
			if($bool_isSuccess)
				return $db->affected_rows;
			else
				return false;
		}
			

	/**
	 * 记录的更新操作
	 * @param string $table
	 * @param array $array
	 * @param string $where
	 * @return number
	 */
	function update($table,$array,$where=null){

		@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
	
				echo "<script>alert('Can't conect to the database!');</script>";
				exit;
			
			}
		$str = null;
		foreach($array as $key=>$val){
			
			if($str==null){
				$sep="";
			}else{
				$sep=",";
			}
			$str.=$sep.$key."='".$val."'";
		}
			$sql="update {$table} set {$str} " .($where==null?null:" where ".$where);
			@ $db->query("SET NAMES UTF8");	
			
			@ $bool_isSuccess = $db->query($sql);
			
			@ $db->close();
			
			if($bool_isSuccess)
				return true;
			else
				return false;
	}

	/**
	 *得到指定一条记录
	 * @param string $sql
	 * @param string $result_type
	 * @return multitype:
	 */
	function fetchOne($sql,$result_type=MYSQL_ASSOC){

		@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
	
				echo "<script>alert('Can't conect to the database!');</script>";
				exit;
			
			}

		@ $db->query("SET NAMES UTF8");

		@ $result=$db->query($sql);

		if($result){
			return $result->fetch_array(MYSQLI_ASSOC);
		}
		else{
			return false;
		}
		
		$row_num= $result->num_rows;
		if($row_num > 1){

			for($i=0;$i<$row_num;++$i){
				$row[$i] = mysql_fetch_array($result,$result_type);
			}
		}
		else
			$row = mysql_fetch_array($result,$result_type);
		return $row;
	}

	/**
	 * 得到结果集中所有记录 ...
	 * @param string $sql
	 * @param string $result_type
	 * @return multitype:
	 */
	function fetchAll($sql,$result_type=MYSQLI_ASSOC){

		@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
	
				echo "<script>alert('Can't conect to the database!');</script>";
				exit;
			
			}

		@ $db->query("SET NAMES UTF8");

		@ $result=$db->query($sql);

		if($result){
			

			while(@$row=$result->fetch_array($result_type)){
				$rows[]=$row;
			}

			if(isset($rows)){
				return $rows;
			}
			else{
				return false;
			}
			
		}

		else{
			return false;
		}
	}

		/**
	 * 得到结果集中的记录条数
	 * @param unknown_type $sql
	 * @return number
	 */
	function getResultNum($sql){
		
		@ $db=new mysqli($this->db_Host,$this->db_UserName,$this->db_Password,$this->db_DBName);
			
			if(mysqli_connect_errno()){
	
				echo "<script>alert('Can't conect to the database!');</script>";
				exit;
			
			}

		@ $db->query("SET NAMES UTF8");

		@ $result=$db->query($sql);

		if($result){
			return $result->num_rows;
		}
		else{
			return NULL;
		}
	}

	/**
	 * 得到上一步插入记录的ID号
	 * @return number
	 */
	function getInsertId(){
		return mysql_insert_id();
	}
			
	
}