<?php

class conectar_db{
    private $host ="localhost";
    private $usuario ="root";
    private $clave ="";
    private $db ="gamefit";
    public $conexion;
    public function __construct(){

        //El constructor lleva la conexion
        $this->conexion = new mysqli($this->host, $this->usuario,$this->clave,$this->db)
        or die(mysqli_error($this->conexion));
        $this->conexion->set_charset("utf8");
    }

    //CONSULTAR
    public function consultar($consulta){

        $resultado = $this->conexion->query($consulta) or die($this->conexion->error);
        if($resultado)
            return $resultado;
            //return $resultado->fetch_all(MYSQLI_ASSOC);
        return false;
    }

    //Contar resultados

    public function contar_resultados(){
        $resultados = $this->conexion->affected_rows;
        return $resultados;
    }


    //CERRAR
    public function cerrar(){
        $this->conexion->close();
    }
    
}
function comprobar_sesion(){
    if(!isset($_SESSION["email_usuario"])){
        header("loaction:login_fit.php");
    }
    else{
        
    }
}

function cargar_datos_usuario($id_usuario){
    $conexion_perfil = new conectar_db();

    $query_perfil ="SELECT * FROM usuarios WHERE id_usuario = $id_usuario";

    $consulta_perfil= $conexion_perfil->consultar($query_perfil);

    $resultado_perfil = $consulta_perfil->fetch_all(MYSQLI_ASSOC);
    $conexion_perfil->cerrar();

    return $resultado_perfil[0];
}

function cargar_pasos(){
    $conexion_pasos = new conectar_db();
    $query_pasos= "SELECT * FROM pasos LEFT JOIN usuarios ON pasos.id_usuario=usuarios.id_usuario WHERE estado_usuario = 1 ORDER BY n_pasos DESC";
    $consulta_pasos= $conexion_pasos->consultar($query_pasos);
    $resultado_pasos=$consulta_pasos->fetch_all(MYSQLI_ASSOC);
    $conexion_pasos->cerrar();
    return $resultado_pasos; 
}

function cargar_empresas(){
    $conexion_empresas = new conectar_db();
    $query_empresas= "SELECT * FROM empresas";
    $consulta_empresas= $conexion_empresas->consultar($query_empresas);
    $resultado_empresas=$consulta_empresas->fetch_all(MYSQLI_ASSOC);
    $conexion_empresas->cerrar();
    return $resultado_empresas;
}

function cargar_usuarios(){
    $conexion_usuarios = new conectar_db();
    $query_usuarios = "SELECT * FROM usuarios LEFT JOIN pasos ON usuarios.id_usuario=pasos.id_usuario";
    $consulta_usuarios= $conexion_usuarios->consultar($query_usuarios);
    $resultado_usuarios=$consulta_usuarios->fetch_all(MYSQLI_ASSOC);
    $conexion_usuarios->cerrar();
    return $resultado_usuarios; 
}

function cargar_provincias(){ 
    $conexion_provincias=new conectar_db();
    $query_provincias= "SELECT `name` FROM provincias";
    $consulta_provincias= $conexion_provincias->consultar($query_provincias);
    $resultado_provincias=$consulta_provincias->fetch_all(MYSQLI_ASSOC);
    $conexion_provincias->cerrar();
    return $resultado_provincias; 
}

?>