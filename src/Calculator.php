<?php
namespace App;

final class Calculator{
    function sumar_datos (string $text){
        $stringSinEnter=str_replace("\n",',',$text);
        $srtingSinBarras=str_replace("/",'',$stringSinEnter);
        $StringFinal=$srtingSinBarras;
        $todoArray=str_split ($StringFinal);
        $delimitadorPropuesto=$todoArray[0];
        if (is_numeric($delimitadorPropuesto)==false AND $delimitadorPropuesto!=('-') AND $delimitadorPropuesto!=''){
            $StringFinal=str_replace($delimitadorPropuesto,",",$StringFinal);
            $todoArray=str_split ($StringFinal);
            foreach($todoArray as $letra){
                if (is_numeric($letra)==false AND $letra!=('-') AND $letra!=","){
                    $StringFinal=str_replace((string)$letra,",",$StringFinal);
                }
            }
        }
        $numberArray=explode(",",$StringFinal);
        $conteo=count ($numberArray);
        $suma=0;
        for ($i=0; $i<$conteo; $i++){
            $letra=$numberArray[$i];
            $numero=(int)$letra;
            if ($numero>=1000){
                $numero=0;
            }
            if ($numero<0){
                $error='negatives not allowed';
                return $error;
            }
            $suma=$numero+$suma;
        }
        return (int)$suma;
    }
}
?>