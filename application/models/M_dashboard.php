<?php
    class M_dashboard extends CI_Model{
        function numeroAgendamentos(){
            return $this->db->count_all_results('agenda');
        }
        function numeroUsuarios(){
            return $this->db->count_all_results('usuario');
        }
        function horarios(){
            $this->db->join('local','local.idLocal = agenda.codLocal');
            return $this->db->get('agenda')->result_array();
        }
    }
?>