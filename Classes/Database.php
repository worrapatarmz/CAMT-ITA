<?php

/**
 * Description of Database
 * Class design for connect to the database.
 * Created Date : 27-08-2012
 * Updated Date : 27-08-2012
 *
 * @author ArMz
 */

require_once 'AppConfig.php';
require_once 'AppExceptions.php';

class Database extends AppConfig {
    
    private $class_Exception = NULL;
    
    private $bool_IsConnected = TRUE;
    private $mixed_DbResource = NULL; 
    private $mixed_DbConnection = NULL;
    
    public function __construct() {
        parent::__construct();
        
        // initialize another class for using in.
        $this->class_Exception = new AppExceptions($_SERVER['SCRIPT_NAME']);
    }
    
    public function openConnection(){
        try{
            if(!$this->bool_IsConnected){
                $this->mixed_DbConnection = mysql_connect($this->str_DbHostName, $this->str_DbUsername, $this->str_DbPassword);
                if($this->mixed_DbConnection){
                    mysql_select_db($this->str_DbName);
                    mysql_query("SET NAMES $this->str_DbEncoding");
                    $this->bool_IsConnected = TRUE;
                }else{
                    // throw exception
                    $this->class_Exception->userException("การเชื่อมต่อฐานข้อมูลล้มเหลว", "การเชื่อมต่อฐานข้อมูลล้มเหลว กรุณาติดต่อ ผู้ดูแลระบบ", "");
                }
            }else{
                $this->class_Exception->userException("การเชื่อมต่อฐานข้อมูลล้มเหลว", "การเชื่อมต่อฐานข้อมูลล้มเหลว กรุณาติดต่อ ผู้ดูแลระบบ", "");
            }
        }  catch (Exception $exception){
                $this->class_Exception->customException($exception);
            
        }
    }
    
    public function getResource(){
        if($this->mixed_DbResource != NULL){
            return $this->mixed_DbResource;
        }else{
            // throw exception
            
        }
    }
    
    public function getConnection(){
        if($this->bool_IsConnected){
            return $this->mixed_DbConnection;
        }else{
            // throw exception
        }
    }
    
    public function execQuery($sqlStatement){
        $this->mixed_DbResource = mysql_query($sqlStatement);
    }
    
    public function execNonQuery($sqlStatement){
        $this->mixed_DbResource = mysql_query($sqlStatement);
    }
    
    public function getRowArray(){
        return mysql_fetch_assoc($this->mixed_DbResource);
    }
    
    public function getRowObject(){
        return mysql_fetch_object($this->mixed_DbResource);
    }
    
    public function getResultArray(){
        $arr_ResultData = array();
        while($row = mysql_fetch_array($this->mixed_DbResource)){
            $arr_ResultData[] = $row;
        }
        return $row;
    }
    
    public function getInsertID(){
        return mysql_insert_id($this->mixed_DbConnection);
    }
    
    public function getRowAffected(){
        return mysql_affected_rows($this->mixed_DbConnection);
    }
    
    public function setFreeResource(){
        if($this->mixed_DbConnection != NULL){
            mysql_free_result($this->mixed_DbConnection);
            $this->mixed_DbResource = NULL;
            
        }
    }
    
    public function closeConnection(){
        if($this->bool_IsConnected){
            mysql_close($this->mixed_DbConnection);
            $this->mixed_DbConnection = NULL;
            $this->mixed_DbResource = NULL;
            $this->bool_IsConnected = FALSE;
        }
    }
}

?>
