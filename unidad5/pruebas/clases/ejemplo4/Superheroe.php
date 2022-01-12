<?php

#Importar modelo de abstraccion de base de datos
require_once('DBAbstractModel.php');

class Superheroe extends DBAbstractModel {
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;
    public static function getInstancia(){
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone(){
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    private $id;
    private $nombre;
    private $velocidad;
    private $created_at;
    private $updated_at;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
      public function setVelocidad($velocidad) {
        $this->velocidad = $velocidad ;
    }

    public function set($user_data=array()) {
        foreach ($user_data as $campo=>$valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO superheroes(nombre, velocidad)
                        VALUES(:nombre, :velocidad)";
        $this->parametros['nombre']= $nombre;
        $this->parametros['velocidad']= $velocidad;
        $this->get_results_from_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function edit($user_data=array()) {
        foreach ($user_data as $campo=>$valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE superheroes SET nombre= :nombre, velocidad= : velocidad WHERE id= :id";
        $this->parametros['nombre']= $nombre;
        $this->parametros['velocidad']= $velocidad;
        $this->parametros['id']= $id;
        $this->get_results_from_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function delete($user_data=array()) {
        foreach ($user_data as $campo=>$valor) {
            $$campo = $valor;
        }
        $this->query = "DELETE FROM superheroes WHERE id= :id";
        $this->parametros['id']= $id;
        $this->get_results_from_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function get($user_data=array()) {
        foreach ($user_data as $campo=>$valor) {
            $$campo = $valor;
        }
        $this->query = "SELECT nombre,velocidad,id FROM superheroes ";
        $this->parametros['nombre']= $nombre;
        $this->parametros['velocidad']= $velocidad;
        $this->parametros['id']= $id;
        $this->get_results_from_query();
        $this->mensaje = 'SH agregado correctamente';
    }
}
?>