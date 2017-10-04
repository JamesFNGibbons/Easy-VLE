<?php
	/** Easy VLE is an open source software platform developed
      * by Bespoke Computer Software, and comes with no warranty,
      * unless hosted by us.
    */

    /* Check if the installation has already been run */
    if(file_Exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')){
  		require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
    	header($config->master_url);
    }
