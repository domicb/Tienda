<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Scaffolding extends CI_Controller {

    private $avoidThisFields = array("id", "date_record", "date_update", "is_deleted");

    public function __construct() {
        parent::__construct();
        $this->load->model('Scaffolding_Model');
    }

    public function index() {
        makeDirectory("models");
        makeDirectory("controllers");
        makeDirectory("views");
        $stringMenu = "";
        //obtener tablas
        $tables = $this->Scaffolding_Model->listTables();
        foreach ($tables as $table) {
            $fieldsView = "";
            $fieldsViewNew = "";
            $postReceiver = "";
            $fieldController = "";
            $fieldControllerNew = "";
            $tdForHeaderList = "";
            $tdForBodyList = "";
            $modelsAditionals = "";

            //obtener campos de esa tabla
            $fields = $this->Scaffolding_Model->listFieldsOfTable($table);
            $i = 0;
            foreach ($fields as $field) {


                //determinar si es indice >> no hacer nada
                if (!in_array($field, $this->avoidThisFields)) {
                    $tdForHeaderList = $tdForHeaderList."<th>".$field."</th>\n";
                    $tdForBodyList = $tdForBodyList."<td><?php echo \$dataList->".$field."; ?></td>\n";

                    $i++;
                    //si es foraneo crear un select
                    if ($this->Scaffolding_Model->fieldIsForeing($table, $field) == true) {
                       

                        $constraints = $this->Scaffolding_Model->getConstraintsInTableField($table, $field);
                        $rowConstraints = $constraints->row();
                        $modelsAditionals.='$this->load->model(\''.ucwords(strtolower($rowConstraints->foreing_table)).'_Model\'); ';

                        $fieldController.="\$field['options_".$i."']['".$field."']=\$this->".ucwords(strtolower($rowConstraints->foreing_table))."_Model->getSelectData() ;  \n"
                               ." ";
                        $fieldControllerNew.="\$field['options_".$i."']['".$field."']=\$this->".ucwords(strtolower($rowConstraints->foreing_table))."_Model->getSelectData() ;  \n"
                               ." ";

                        $fieldsView.="<tr>\n"
                               ."    <td><label for='$field' class='sr-only'>".$field."</label></td>\n"
                               ."    <td><?php echo form_dropdown('$field', \$options_".$i."['$field'], \$data->$field); ?></td>\n"
                               ."</tr>\n"
                               ."";
                        $fieldsViewNew.="<tr>\n"
                               ."    <td><label for='$field' class='sr-only'>".$field."</label></td>\n"
                               ."    <td><?php echo form_dropdown('$field', \$options_".$i."['$field'], ''); ?></td>\n"
                               ."</tr>\n"
                               ."";
                    } else {

                        
                        $fieldController.="\$field['".$field."']= array(
              				'name'        => '".$field."',
              				'id'          => '".$field."',
              				'value'       => \$data->".$field.",
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => '".$field."' 
            			);  \n
                                ";
                        $fieldControllerNew.="\$field['".$field."']= array(
              				'name'        => '".$field."',
              				'id'          => '".$field."',
              				'value'       => '',
              				'maxlength'   => '100',
              				'size'        => '50',
              				'style'       => 'width:50%',
              				'class'		  => 'form-control',
              				'placeholder' => '".$field."'
            			); 
                                ";

                        $fieldsView.="<tr>\n"
                                . "    <td><label for='. $field .' class='sr-only'>".$field."</label></td>\n"
                                . "    <td><?php echo form_input(\$field['".$field."']); ?></td>\n"
                                . "</tr>\n";
                        $fieldsViewNew.="<tr>\n"
                                . "    <td><label for='. $field .' class='sr-only'>".$field."</label></td>\n"
                                . "    <td><?php echo form_input(\$field['".$field."']); ?></td>\n"
                                . "</tr>\n";
                    }//if
                    $postReceiver = "\$postData['$field'] =  \$this->input->post('$field');\n ".$postReceiver;
                    if (!in_array($field, $this->avoidThisFields)) {
                        $postReceiver = "\$this->form_validation->set_rules('$field' , '$field' , 'trim|required');\n". $postReceiver; 
                    }
                    
                }//field
            }//foreach 2

            $createView = factoryViewStringCreate($table, $fieldsViewNew);
            $updateView = factoryViewStringUpdate($table, $fieldsView);
            $list = factoryViewStringList($table, $tdForHeaderList, $tdForBodyList);
            $controller = factoryControllerString($table, $modelsAditionals, $fieldController, $fieldControllerNew, $postReceiver);
            $model = factoryModelString($table);

            makeFile("views/".formatName($table)."_new.php", $createView);
            makeFile("views/".formatName($table)."_update.php", $updateView);
            makeFile("views/".formatName($table)."_index.php", $list);
            makeFile("controllers/".formatName($table).".php", $controller);
            makeFile("models/".formatName($table)."_Model.php", $model);
            $stringMenu.="<li id=\"".$table."_dashboard\" class=\"<?php if (\$active == '".formatName($table)."') { echo 'active'; } ?>\">"
                    . "<a class=\"dark\" href=\"<?php echo base_url(); ?>".formatName($table)."\">".formatName($table)."</a>"
                    . "</li> \n";
        }//foreach 1
        $menu = factoryViewStringMenu($stringMenu);
        makeFile("views/menu.php", $menu);
    }

}
