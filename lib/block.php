<?php
	/** Easy VLE is an open source software platform developed
      * by Bespoke Computer Software, and comes with no warranty,
      * unless hosted by us.
    

      * This class is used to handle the blocks (small template partials)
      * and provided a unified way to display them in the correct places.

        The way the blocks are renderd is important.

        1) The template is loaded.
        2) The template loads the block (Through the constructor)
        3) The template then calls the inherit args.
        4) The template then calls the render function to finally render the block.

    */

   class Block {
	   	/** 
	   	  * Function used to render a simple block
	   	  * @return null
	   	  * @param $block_name The block name
	   	  * @param $block_category The Block Category.
	   	  * @author James Gibbons
	   	*/
	   	public function __construct($block_cataory, $block_name){
	   		/* Set the block name */
	   		$this->block_name = $block_name;

	   		/* Generate the block template uri */
	   		$this->block_uri = $_SERVER['DOCUMENT_ROOT'] . '/blocks/' . $block_category . '/' . $block_name . '.block.php';

	   		/* Check that the block template exists */
	   		if(file_exists($this->block_uri)){
	   			$this->block_template_exists = true;
	   		}
	   		else{
	   			$this->block_template_exists = false;
	   		}

	   		/* Display the error message if the block template does not exist. */
	   		if(!$this->block_template_exists){
	   			die('Block Template ' . $block_name . ' Does not exist.');
	   		}

	   	}

	   	/**
	   	  * Function used to inherit the variables added
	   	  * to the output class.
	   	  * @param $args The arguments from the template.
	   	*/
	   	public function inherit_output_args($args){
	   		$this->args = $args;
	   	}

	   	/**
	   	  * Function used to final render the block
	   	*/
	   	public function render(){
	   		/* Check that the block template does not exist */
	   		if($this->block_template_exists){
	   			include($this->block_uri);
	   		}
	   	}
   }