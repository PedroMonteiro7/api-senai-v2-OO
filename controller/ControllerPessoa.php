<?php

    class ControllerPessoa {

        private $_method;
        private $_modelPessoa;
        private $_codPessoa;

        public function __construct($model) {

            $this->_modelPessoa = $model;
            $this->_method = $_SERVER['REQUEST_METHOD'];

            //PERMITE RECEBER DADOS JSON ATRAVÉS DA REQUISIÇÃO
            $json = file_get_contents("php://input");
            $dadosPessoa = json_decode($json);

            //se tiver algo, passa essa alguma coisa. Se não, passa nulo
            $this->_codPessoa = $dadosPessoa->cod_pessoa ?? null;
        }

        function router() {

            switch ($this->_method) {
                case 'GET':

                    if (isset($this->_codPessoa)) {
                        return $this->_modelPessoa->findById();
                    }
                    return $this->_modelPessoa->findAll();
                    
                    break;

                case 'POST':
                    return $this->_modelPessoa->create();
                    break;

                case 'PUT':
                    return $this->_modelPessoa->update();
                    break;

                case 'DELETE':
                    return $this->_modelPessoa->delete();
                    break;
                
                default:
                    # code...
                    break;
            }

        }

    }