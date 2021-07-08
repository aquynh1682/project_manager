<?php
class dblib{
    private $__conn;

    function connect(){
        $servername = "localhost";
        $username = "olirenwm_news";
        $password = "123456a@";
        $dbname = "olirenwm_news";
        if(!$this->__conn){
            try {
                $this->__conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                $this->__conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                die();
            }
        }
    }
    function dis_connect(){
        if($this->__conn){
            $this->__conn = null;
        }
    }
    function insert($table, $data)
	{
		// Káº¿t ná»‘i
		$this->connect();
		
		// LÆ°u trá»¯ danh sÃ¡ch field
		$field_list = '';
		// LÆ°u trá»¯ danh sÃ¡ch giÃ¡ trá»‹ tÆ°Æ¡ng á»©ng vá»›i field
		$value_list = '';
		
		// Láº·p qua data
		foreach ($data as $key => $value){
			$field_list .= ",$key";
			$value_list .= ",'".$value."'";
		}
		
		// VÃ¬ sau vÃ²ng láº·p cÃ¡c biáº¿n $field_list vÃ  $value_list sáº½ thá»«a má»™t dáº¥u , nÃªn ta sáº½ dÃ¹ng hÃ m trim Ä‘á»ƒ xÃ³a Ä‘i
		$sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
		$stmt = $this->__conn->prepare($sql);
		
		return $stmt->execute();
	}
	
	// HÃ m Update
	function update($table, $data, $where)
	{
		// Káº¿t ná»‘i
		$this->connect();
		$sql = '';
		// Láº·p qua data
		foreach ($data as $key => $value){
			$sql .= "$key = '".$value."',";
		}
		
		// VÃ¬ sau vÃ²ng láº·p biáº¿n $sql sáº½ thá»«a má»™t dáº¥u , nÃªn ta sáº½ dÃ¹ng hÃ m trim Ä‘á»ƒ xÃ³a Ä‘i
		$sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
		$stmt = $this->__conn->prepare($sql);
		
		return $stmt->execute();
	}
	
	// HÃ m delete
	function remove($table, $where){
		// Káº¿t ná»‘i
		$this->connect();
		
		// Delete
		$sql = "DELETE FROM $table WHERE $where";
		$stmt = $this->__conn->prepare($sql);
		
		return $stmt->execute();
	}
	
	// HÃ m láº¥y danh sÃ¡ch
	function get_list($sql)
	{
		// Káº¿t ná»‘i
		$this->connect();
		
		// Thá»±c hiá»‡n láº¥y dá»¯ liá»‡u
		$stmt = $this->__conn->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
		return $stmt->fetchALL();	
	}
	
	// HÃ m láº¥y 1 record duy nháº¥t
	function get_row($sql)
	{
		// Káº¿t ná»‘i
		$this->connect();
		
		// Thá»±c hiá»‡n láº¥y dá»¯ liá»‡u
		$stmt = $this->__conn->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		return $stmt->fetch();	
	}
	
	function get_row_number($sql)
	{
		// Kết nối
		$this->connect();
		
		// Thực hiện lấy dữ liệu
		$stmt = $this->__conn->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetchColumn();
	}
}
?>