<?php

// 3 tipos de metodos en POO PHP:
//
// Private   -> Accesible solamente desde la clase que lo definió
// Public    -> Accesible desde dentro y fuera de la clase
// Protected -> Accesible solo desde dentro de la clase

 class BlogAutores {

    // Declaramos aqui variables de la clase fuera del constructor, no obligatorias en la creación del objeto

    protected $type = "freelancer";

    // Inicializamos el constructor y variables, obligatorio pasarlas al crear el objeto e instanciar la clase

    public function __construct($nombre_autor, $numero_articulos){
        
        // Aqui variables de instancia, el constructor siempre visibilidad pública //

        $this->nombre_autor = $nombre_autor;
        $this->numero_articulos = $numero_articulos;
    }

    public function mostrar_articulos(){

        // Este metodo muestra los detalles del autor //

        echo "Metodo mostrar";
        echo "Nombre de autor: ".$this->nombre_autor."\nArticulos publicados:".$this->numero_articulos."\nTipo autor: ".$this->type."\n\n";
    }

    private function actualiza_articulos($numero_articulos){

        // Este metodo privado actualiza el numero de articulos, es llamado desde un metodo publico //

        echo "Metodo actualizar articulos";
        $this->numero_articulos = $numero_articulos;
    }

    public function actualiza($numero_articulos){

        return $this->actualiza_articulos($numero_articulos);
    }

}

$autor = new BlogAutores("Pedro", 10);

$autor->mostrar_articulos();
$autor->actualiza(30);
$autor->mostrar_articulos();

 ?>