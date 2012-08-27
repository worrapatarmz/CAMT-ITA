<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ThrowExceptions
 *
 * @author ArMz
 */
class AppExceptions {
    
    private $str_ScriptName = "";
   
    public function __construct($strScriptName = "") {
        $this->str_ScriptName = "";
    }
    
    public function customException($objException){
        $str_TitlePage = $objException->getMessage();
        $str_FileName = $objException->getFile();
        $str_Heading = $this->str_ScriptName;
        $str_SubHeading = $exception->getMessage();
        
        exit();
    }
    
    public function userException($strSubHeading,$strMessage,$strDescription){
        $str_Heading = $this->str_ScriptName;
        $str_SubHeading = $strSubHeading;
        $str_FileName = $this->str_ScriptName;
        $str_TitlePage = $strMessage;
        
        require_once 'Exceptions/exception_error.php';
        exit();
    }
}

?>
