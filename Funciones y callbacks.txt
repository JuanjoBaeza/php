array_map
ob_get_contents() - Devolver el contenido del búfer de salida
ob_end_clean() - Limpiar (eliminar) el búfer de salida y deshabilitar el almacenamiento en el mismo
ob_end_flush() - Volcar (enviar) el búfer de salida y deshabilitar el almacenamiento en el mismo
ob_implicit_flush() - Habilitar/deshabilitar el volcado implícito
ob_gzhandler() - Función de llamada de retorno de ob_start para comprimir el búfer de salida con gzip
ob_iconv_handler() - Convierte la codificación de caracteres al manejador del buffer de salida
mb_output_handler() - Función de llamada de retorno que convierte la codificación de caracteres en búfer de salida
ob_tidyhandler() - Función callback de ob_start para reparar el buffer

-----------------------------------------------

Estilos <pre>

<pre class="brush: php; title: ; notranslate" title="">

pre {
white-space: pre-wrap; /* css-3 */
white-space: -moz-pre-wrap !important; /* Mozilla, since 1999 */
white-space: -pre-wrap; /* Opera 4-6 */
white-space: -o-pre-wrap; /* Opera 7 */
word-wrap: break-word; /* Internet Explorer 5.5+ */
}

-----------------------------------------------
If you're using object-orientated code in PHP you may, like me, want to use a call-back function that is inside 
an object (i.e. a class function). In this case you send ob_start a two-element array as its single argument. 

The first element is the name of the object (without the $ at the start), and the second is the function to call. 
So to use a function 'indent' in an object called '$template' you would use <?php ob_start(array('template', 
'indent')); ?>.
-------------------------------------------------

http://php.net/manual/es/language.types.callable.php
http://php.net/manual/es/function.ob-start.php

-------------------------------------------------

function procesar($data) {   

$data=str_replace("foo","hoo",$data);   
return $data;
}

ob_start("procesar");
print("foo bar");
ob_end_flush();

-------------------------------------------------

Callbacks con OOP

<?php
class MyClass {

    public $property = 'Hello World!';

    public function MyMethod()
    {
        call_user_func(array($this, 'myCallbackMethod'));
    }

    public function MyCallbackMethod()
    {
        echo $this->property;
    }

}
?>

-------------------------------------------------

I was miffed that array_map didn't have a way to pass values *and* keys to the callback, but then I realized I could do this:

function callback($k, $v) { ... }

array_map( "callback", array_keys($array), $array);

-------------------------------------------------

<?php

function callback($búfer)
{
  // reemplazar todas las manzanas por naranjas
  return (str_replace("manzanas", "naranjas", $búfer));
}

ob_start("callback");

?>
<html>
<body>
<p>Es como comparar manzanas con naranjas.</p>
</body>
</html>
<?php

ob_end_flush();

?>

-------------------------------------------------

<?php
// Nuestra clausura
$doble = function($a) {
    return $a * 2;
};

// Este es nuestro rango de números
$números = range(1, 5);

// Usar la clausura como llamada de retorno para
// doblar el valor de cada elemento de nuestro
// rango
$números_nuevos = array_map($doble, $números);

print implode(' ', $números_nuevos);
?>

--------------------------------------------------

<?php
function cube($n)
{
    return($n * $n * $n);
}

$a = array(1, 2, 3, 4, 5);
$b = array_map("cube", $a);
print_r($b);
?>

-------------------------------------------------

<?php // CREATE index.html
   ob_start();
/* PERFORM COMLEX QUERY, ECHO RESULTS, ETC. */
   $page = ob_get_contents();
   ob_end_clean();
   $cwd = getcwd();
   $file = "$cwd" .'/'. "index.html";
   @chmod($file,0755);
   $fw = fopen($file, "w");
   fputs($fw,$page, strlen($page));
   fclose($fw);
   die();
?>

------------------------------------------------

<?php

ob_start();

echo "Hola ";

$salida1 = ob_get_contents();

echo "Mundo";

$salida2 = ob_get_contents();

ob_end_clean();

var_dump($salida1, $salida2);
?>

El resultado del ejemplo sería:

string(5) "Hola "
string(10) "Hola Mundo"

--------------------------------------
ob_start();
print("foo bar");
$res=ob_get_contents();
ob_end_clean();
$res=str_replace("foo","goo",$res);
echo "$res";

--------------------------------------

function procesar($data) {   
$data=str_replace("foo","hoo",$data);   
return $data;
}

ob_start("procesar");
print("foo bar");
ob_end_flush();

---------------------------------------

Mi favorito: Null Coalesce Operator

Para lo último, el cambio que ya quería que se produciera, 
el if-set-or por excelencia con el que contamos en otros lenguajes,
llega a PHP.

<?php
// Antes de PHP 7
$config = isset($config) ? $config : $this->config; 

// Ahora, en PHP 7
$config = $config ?? $this->config;

// Incluso, podemos encadenarlos
$config = $config ?? $this->config ?? [];
?>

---------------------------------------

<?php
declare(strict_types=1);

function test(int $a, string $b): string 
{
    echo 'Deberia repetir el texto ' . $b .
         ' al menos ' . $a . ' veces.';
}
?>

Los tipos que podemos indicar como un posible valor de retorno, 
son los anteriormente mencionados string, int, bool, float, array, 
callable, self.

---------------------------------------

$filename = 'archivo-xml-muy-grande.xml';

header('Content-type: text/xml');
header('Content-length: ' . filesize($filename));
header('Content-Disposition: attachment; filename="'.$filename.'"');

ob_end_flush();
readfile($filename);
exit;

----------------------------------------

Es muy útil a veces en POO sobrecargar los Constructores para poder 
instanciar el objeto de diferentes maneras (pasándole diferentes 
números de parámetros). Un truco para hacer esto en PHP es:

<?php
class MiClase
{
  public function __contruct()
  {
    $nombre = "metodo".func_num_args();
    $this->$nombre();
    // Notar que $this->nombre(); generalmente estaría mal
    // pero aqui $nombre es un string con el nombre del
    // método que se va a llamar
  }
  
  public function metodo1($x)
  {
    //código;
  }

  public function metodo2($x, $y)
  {
    //código;
  }
}
?>

Con este “trabajo extra” en la clase, el uso de la misma se vuelve 
transparente al usuario ( de la clase, no del sitio ) :

<?php
$obj1=new MiClase('1'); // llamará a metodo1
$obj2=new MiClase('1','2'); // llamará a metodo2
?>