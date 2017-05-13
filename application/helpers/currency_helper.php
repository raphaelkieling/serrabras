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

    function dataConvertView($data){
        $ano = substr($data,0,4);
        $mes = substr($data,5,2);
        $dia = substr($data,8,2);

        return $dia."/".$mes."/".$ano;
        
    }
    
    function diasLabel($dias){
        $dias_array = explode(',',$dias);
        for($i = 0; $i < count($dias_array); $i++){
            $dia = strval($dias_array[$i]);

            if($dia == ""){$day = "";}
            if($dia == "0"){$day = "Dom";}
            if($dia == "1"){$day = "Seg";}
            if($dia == "2"){$day = "Ter";}
            if($dia == "3"){$day = "Qua";}
            if($dia == "4"){$day = "Qui";}
            if($dia == "5"){$day = "Sex";}
            if($dia == "6"){$day = "Sab";}

            echo "<span class='label label-success'>".$day."</span> ";
        }
    }
?>