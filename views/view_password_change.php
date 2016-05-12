<?php

namespace adapt\users{

    /* Prevent Direct Access */
    defined('ADAPT_STARTED') or die;
    
    class view_password_change extends view{
        
        public function __construct($require_old_password = true, $user_data = array()){
            parent::__construct('div');
            $form_view = null;
            $form_title = null;
            $form = new \adapt\forms\model_form();
            
            $data = array();
            
            $data = array_merge($data, $user_data);
            
            $name = "change_password";
            if ($require_old_password == false) $name = "new_password";
            
            
            if ($form->load_by_name($name)){
                
                
                
                $form_view = $form->get_view($data);
                if ($form_view instanceof \adapt\html){
                    $form_title = $form_view->find('h1')->detach();
                    //if ($form_title && $form_title instanceof \frameworks\adapt\html){
                        $form_title = $form_title->get(0);
                    //}
                }
            }
            
            $row = new \bootstrap\views\view_row();
            
            $left_col = new \bootstrap\views\view_cell(new html_h3('Change password'), 12, 12, 12, 12);
            //$right_col = new \bootstrap\views\view_cell(new html_h3('Join now'), 12, 12, 6, 6);
            $left_col->add($form_view);
            
            
            $row->add($left_col);
            
            
            $panel = new \bootstrap\views\view_panel($row);
            $this->add($panel);
            
            if ($form_title) $panel->title = $form_title;
            
            
            
            
            
        }
        
    }
    
}


?>