<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 12/8/2017
 * Time: 3:03 AM
 */

class Estic_Util extends CI {

    public function validate_modulo($mod,$subMod){

        $dir = MODULEPATH.$mod.'/'.$subMod.'/';

        if(is_dir($dir) && $this->table_exists(config_item('sys')[$mod].'_'.$subMod)){

            if(file_exists($dir.'Ctrl_'.ucfirst($subMod).'.php') && file_exists($dir.'Model_'.ucfirst($subMod).'.php') && is_dir($dir.'/views/')){

                return true;
            }
        }
        return false;
    }
    public function saveOrUpdate($data,$id = null, $with_id = true){
        // insert
        if ($id == null){
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = null;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            if($with_id){
                $id = $this->db->insert_id();
            }
        }

        // update
        else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }
    }
}