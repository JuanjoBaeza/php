<?php 

// Ejemplo Constructor, Clases y visibilidad
// Definimos la clase

class Coche {
     
    /* Atributos protected accesibles en clases que hereden de esta */
    protected $modelo;
    protected $color;
    protected $velocidad;
     
    /* Constructor, siempre tiene que ser publico */
    public function __construct($modelo, $color, $velocidad = 0){
        $this->modelo = $modelo;
        $this->color = $color;
        $this->velocidad = $velocidad;
    }
     
    /* Métodos privados solo se pueden llamar dentro esta clase */
    private function getColor(){
        return $this->color;
    }
     
    private function setColor($color){
        $this->color = $color;
    }
     
    private function acelerar(){
        $this->velocidad++;
    }
     
    private function frenar(){
        $this->velocidad--;
    }
     
    private function getVelocidad(){
        return $this->velocidad;
    }
     
    public function mostrarInfo(){
         
        // Llamamos a otros métodos
        $info = "<h1>Información del coche:</h1>";
        $info.= "Modelo: ".$this->modelo;
        $info.= "<br/> Color: ".$this->getColor();
        $info.= "<br/> Velocidad: ".$this->getVelocidad();
         
        return $info;
    }
}
?>
 
<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>El constructor</title>
</head>
<body>
 
<?php

// Creamos el objeto / Instanciamos la clase y le pasamos los parámetros del constructor
$coche = new Coche("BMW VICTOR", "ROJO", 100);
 
// Mostramos la información del primer coche
echo $coche->mostrarInfo();
 
$coche2 = new Coche("SEAT 500", "VERDE");
 
// Mostramos la información del segundo coche
echo $coche2->mostrarInfo();
?>
 
</body>
</html>

// ------------------------------------------------------------------------------------------------------ //

<?php 

// Ejemplo Clases y Objetos
// Definimos la clase

class OtroCoche {
     
    // Atributos
    public $color;
    public $modelo = "BMW Generico";
    public $velocidad;
     
    //Métodos
    public function getColor(){
 
    // Con el operador $this le decimos que busque el atributo color en esta clase
        return $this->color;
    }
    public function setColor($color){
        $this->color = $color;
    }
    public function acelerar($acelera){
        $this->velocidad = $this->velocidad + $acelera;
    }
    public function frenar(){
        $this->velocidad--;
    }
    public function getVelocidad(){
        return $this->velocidad;
    }
}

// Creamos el objeto / Instanciamos la clase
$coche = new OtroCoche();
 
// Usamos los métodos
$coche->setColor("ROJO");
echo "Color del coche: ".$coche->getColor();
 
// Le sumamos 7 y le restamos 1 al atributo
$coche->acelerar(1);
$coche->frenar();
$coche->acelerar(7);

echo "<br/> Velocidad actual: ".$coche->getVelocidad();