<?php
	/** Easy VLE is an open source software platform developed
      * by Bespoke Computer Software, and comes with no warranty,
      * unless hosted by us.
	
	  * This class is used to create the templates, (a collectio of blocks.)

    */

    class Template {
        
        private $title;
        
        public function __construct(){
    		/* Renders the header */
    		include_once('../blocks/includes/header.block.php');

    		/* Defines the blocks array */
    		$this->blocks = array();

    		/* Defines the template args */
    		$this->args = array();
    	}
        
        /**
         * Function used to set the template title.
         * @param $title the Layout title.
        */
        public function set_title($title){
            $this->title = $title;
        }
        
        /**
         * Function used to get the title of the template.
         * @return The title of the template
        */
        public function get_template_title(){
            if(isset($this->title)){
                return $this->title;
            }
            else{
                return '';
            }
        }
        
        /**
         * Function used to set the base layout of the template.
         * The base layout is the surroundings of the blocks;
        */
        public function set_layout($category, $layout){
            $this->layout = $layout;
            $this->layout_category = $category;
        }
    
    	/**
    	  * Function used to set a template variable.
    	  * @param $arg The veriable name.
    	  * @param $value The new variable value.
    	  * @author James Gibbons
    	*/
    	public function set($arg, $value){
    		if(isset($arg) && isset($value)){
    			/* Check that if the arg is in the args array */
    			if(empty($this->args[$arg])){
    				$this->args[$arg] = $value;
    			}
    			else{
    				/* Update the existing value. */
    				$this->args[$arg] = $value;
    			}
    		}
    	}

    	/**
    	  * Function used to add a block to the template.
    	  * @param The block class 
    	  * @author James Gibbons
    	*/
    	public function add_block($block){
    		/* Push the new block into the blocks array. */
    		array_push($block, $this->blocks);

    		/* Gives the block the template variables. */
    		$block->inherit_output_args($this->args);
    	}

    
        /**
         * Function used to render the blocks within the layout.
         * This function should be called from within the layout file,
         * in the correct place.
        */
        public function render_body(){
            /* Loop through the blocks and render them one by one. */
    		foreach($this->blocks as $block){
    			/* Check that the block exists, and render it. */
    			if($block->block_template_exists){
    				$block->render();
    			}
    		}
        }

    	/**
    	  * Function used to render the blocks in the template.
    	  * @param The block class 
    	  * @author James Gibbons
    	*/
    	public function render(){
    	    /* Render the layout, which should call the render_body() function */
    	    require_once('../layouts/' . $this->layout_category . '/' . $this->layout . '.layout.php');
    		/* Now render the footer of the page. */
    		include_once('../blocks/includes/footer.block.php');
    	}
    }