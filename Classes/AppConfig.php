<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppConfig
 * Class design for define application config such as database , base url
 * Created Date : 27-08-2012
 * Updated Date : 27-08-2012
 *
 * @author ArMz
 */
class AppConfig {
    
    protected $str_DbHostName = "";
    protected $str_DbUsername = "";
    protected $str_DbPassword = "";
    protected $str_DbName = "";
    protected $str_DbEncoding = "";
    
    protected function __construct() {
        // initialize variables here
        
        // begin define database variables.
        $this->str_DbHostName = "localhost";
        $this->str_DbUsername = "root";
        $this->str_DbPassword = "1234";
        $this->str_DbName = "";
        $this->str_DbEncoding = "utf8";
        // end of define database variable.
    }
}

?>
