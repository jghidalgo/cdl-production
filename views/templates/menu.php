<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <?php   
            foreach ($array_module as $value) {
          $id_module1 = $value["id_module"]; 
          //$array_modules = $object->check_module($id_module);
           $sub_category = $object->get_category_by_idmodule($id_module1);
		   
           if($value["m_tree"] == 0)
          {
             
              ?>
              <li ><a href="<?php echo $sub_category[0]['sc_path']; ?>?lang=<?php echo $lang; ?>&date=<?php echo $dat; ?>"><?php if($lang=='en'){echo $sub_category[0]['sc_name_en'];}else{echo $sub_category[0]['sc_name_es'];} ?><span class="sr-only">(<?php echo $current;?>)</span></a></li>
              
              <?php
          }
          if($value["m_tree"] == 1)
          {
			  //echo print_r($sub_category);
               ?>
               <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if($lang=='en'){echo $value["m_name_en"]; }else{echo $value["m_name_es"];}?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <?php
            foreach ($sub_category as $value2) {
              ?>
              <li><a href="<?php echo $value2['sc_path']; ?>?lang=<?php echo $lang; ?>&date=<?php echo $dat; ?>"><?php if($lang=='en'){echo $value2['sc_name_en'];}else{echo $sub_category[0]['sc_name_es'];} ?></a></li>
              <?php
            }
             ?>
               
                <!--li class="divider"></li-->
              
              </ul>
            </li>
                
               <?php
          }
           
        }?>
            
            
            
          </ul>
          
        </div>