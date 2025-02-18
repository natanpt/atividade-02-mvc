<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function ($class_name) {
	$class_file = __DIR__ . '/controller/' . $class_name . '.php';
	if (file_exists($class_file)) {
		include $class_file;
	} else {
		die("Erro: A classe '$class_name' não foi encontrada.");
	}
});

$classe = isset($_GET['classe']) ? ucfirst(strtolower($_GET['classe'])) . 'Controller' : null;
$metodo = isset($_GET['metodo']) ? strtolower($_GET['metodo']) : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($classe && $metodo) {
	if (class_exists($classe)) {

		$controller = new $classe();

		if (method_exists($controller, $metodo)) {

			if ($id !== null) {
				$controller->$metodo($id);
			} else {
				$controller->$metodo();
			}
		} else {
			die("Erro: O método '$metodo' não foi encontrado na classe '$classe'.");
		}
	} else {
		die("Erro: A classe '$classe' não foi encontrada.");
	}
} else {
	include 'controller/HomeController.php';
	$homeController = new HomeController();
	$homeController->index();
}
