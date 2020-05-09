<?php
use PHPUnit\Framework\TestCase;
use App\Calculator;

final class StrCalculatorTest extends TestCase
{
    public function test_suma_vacia (){
        $text="";
        
        $calculadora= new Calculator();
        $resultado= $calculadora-> sumar_datos($text);
        $this->assertSame(0, $resultado);
    }
    public function test_suma_igual_a_un_digitos (){
        $text="1,2";
        
        $calculadora= new Calculator();
        $resultado= $calculadora-> sumar_datos($text);
        $this->assertSame(3, $resultado);
    }

    public function test_suma_igual_a_dos_digitos (){
        $text="10,2,3";
        
        $calculadora= new Calculator();
        $resultado= $calculadora-> sumar_datos($text);
        $this->assertSame(15, $resultado);
    }   
    
    public function test_suma (){
        $text="100,2,3,5";
        
        $calculadora= new Calculator();
        $resultado= $calculadora-> sumar_datos($text);
        $this->assertSame(110, $resultado);
    }

    public function test_suma_mil (){
        $text="1000,3,5";
        
        $calculadora= new Calculator();
        $resultado= $calculadora-> sumar_datos($text);
        $this->assertSame(8, $resultado);
    }

    public function test_salto_de_linea (){
        $text="1\n2";
        
        $calculadora= new Calculator();
        $resultado= $calculadora-> sumar_datos($text);
        $this->assertSame(3, $resultado);
    }
    public function test_salto_de_linea_dos_digitos (){
        $text="1\n2,100";
        
        $calculadora= new Calculator();
        $resultado= $calculadora-> sumar_datos($text);
        $this->assertSame(103, $resultado);
    }
    public function test_negativos (){
        $text="-1,100";
        
        $calculadora= new Calculator();
        $resultado= $calculadora-> sumar_datos($text);
        $this->assertSame('negatives not allowed', $resultado);
    }
    public function test_negativos_por_ahi (){
        $text="2,100,-3";
        
        $calculadora= new Calculator();
        $resultado= $calculadora-> sumar_datos($text);
        $this->assertSame('negatives not allowed', $resultado);
    }
    public function test_delimeters (){
        $text="//&2&100&3";
        
        $calculadora= new Calculator();
        $resultado= $calculadora-> sumar_datos($text);
        $this->assertSame(105, $resultado);
    }
    public function test_delimeters_multiples (){
        $text="//*&2*100&3";
        
        $calculadora= new Calculator();
        $resultado= $calculadora-> sumar_datos($text);
        $this->assertSame(105, $resultado);
    }
    public function test_delimeters_multiples_multiples_veces (){
        $text="//***&&&2***100&&&3";
        
        $calculadora= new Calculator();
        $resultado= $calculadora-> sumar_datos($text);
        $this->assertSame(105, $resultado);
    }
}
?>