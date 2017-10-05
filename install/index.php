<?php
	/** Easy VLE is an open source software platform developed
      * by Bespoke Computer Software, and comes with no warranty,
      * unless hosted by us.
    */
    
    require_once "../lib/autoload.php";
    
    $_htaccess_created = false;
    
    /* Check if the installation has already been run */
    if(file_Exists('../config.php')){
  		require_once('../config.php');
    	header($config->master_url);
    }
    
    
    /* Check if the .htaccess file exists. */
    if(!file_exists('../.htaccess')){
        file_put_contents('../.htaccess', file_get_contents('../resources/install/htaccess.default'));
        $_htaccess_created = true;
    }
    
    $template = new Template();
    $template->set_layout('install', 'install-center');
    
    /* Check if we the user is on the inital section of the unstaller. */
    if(isset($_POST['section'])){
        $section = $_POST['section'];
    }
    else{
        $section = 'inital';
    }
    
    /* Create the correct section of the installer. */
    
    $template->render();
    