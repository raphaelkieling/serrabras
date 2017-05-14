<?php
    class M_gerenciadordedias extends CI_Model{
        function cadastrar($dias){
            $this->db->insert('dia',$dias);
            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }

        function pegaDias(){
            $this->db->join('local','local.idLocal = dia.codLocal');
            $this->db->order_by("idDia desc");
            return $this->db->get('dia')->result_array();
        }

        function deletar($id){
            $this->db->where('idDia',$id);
            $this->db->delete('dia');

            if($this->db->affected_rows()>0){
                return true;
            }else{
                return false;
            }
        }
    }
?>