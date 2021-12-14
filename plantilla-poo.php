<?php

 class BlogAutores {

    protected $type = "freelancer";

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

        // Este metodo actualiza el numero de articulos //

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