<?php
    function dataConvert($data,$metodo){
        $dia = substr($data,0,2);
        $mes = substr($data,3,2);
        $ano = substr($data,6,4);

        if($metodo == "mysql"){
            return $ano."-".$mes."-".$dia;
        }else{
            return $dia."/".$mes."/".$ano;
        }
        
    }
?>