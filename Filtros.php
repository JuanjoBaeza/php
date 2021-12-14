
<?php

$filters = array('name' => array('filter' => FILTER_VALIDATE_REGEXP, 
				 				 'options' => array('regexp' => '/^[a-z]+$/i')
				 				 ),

				 'age' => array('filter' => FILTER_VALIDATE_INT,
				 				 'options' => array('min_range' => 13)
				 				)
				 );

$clean = filter_input_array(INPUT_POST, $filters);

$statement = $db->prepare("INSERT INTO users (name, age) VALUES (:name, :age)");

$statement->bindParam(':name', $clean['name']);
$statement->bindParam(':age', $clean['age']);

$statement->execute();

// -----------------------------------------------------------------------------------

$data   = filter_input(INPUT_POST, 'data', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

// Las variables escalares son aquellas que contienen un integer, float, string o boolean. 
// Tipos array, object y resource no son escalares. 

// FILTER_REQUIRE_ARRAY will return false if the POST variable contains a scalar value. 
// If you're unsure or just intend on the POST variable accepting both scalar and array values, 
// use FILTER_FORCE_ARRAY instead, which will treat any input as an array, essentially casting 
// scalar values accordingly.

$data = filter_input(INPUT_POST, 'data', FILTER_DEFAULT, FILTER_FORCE_ARRAY);

// -------------------------------------------------------------------------------------

$html['username'] = htmlentities($clean['username'], ENT_QUOTES, 'UTF-8');

// -------------------------------------------------------------------------------------

$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);