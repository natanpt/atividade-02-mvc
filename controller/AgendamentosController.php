<?php 
    include "../../core/Conexao.php";
    
    class AgendamentosController {

        public function __construct() {}

        public function index() {
            $pdo = Conexao::conectar();
            $sql = $pdo->query("SELECT * FROM clientes");
        }

        public function show($id) {

        }

        public function create($id) {
             
        }

        public function store() {

        }

        public function edit($id) {

        }

        public function update() {

        }

        public function delete($id) {

        }
    }

?>