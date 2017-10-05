<?php
    
    /* This class is used to automatically load the contents of the
     * lib directory into the project as and when the classes are 
     * needed.
    */
    
    /**
     * This function is called when a class is loaded, 
     * but not resolved in the local file.
     * @param $classname The name of the class.
    */
    function __autoload($className){
        $className = strtolower($className);
        $class_file = $className . '.php';
        
        /* Include the file to resolve the dependant. */
        require_once($class_file);
    }