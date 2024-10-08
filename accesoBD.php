<?php
require_once 'conexion.php';

date_default_timezone_set("UTC");

class accesoBD {
  
  public static function subirDatos($valor, $tipo, $id_dispositivo) {
      $pArray = new stdClass();
      $fecha = date('Y-m-d H:i:s');
      $sql = "INSERT INTO datos (tipo, valor, fecha, id_dispositivo) VALUES ('{$tipo}','{$valor}','{$fecha}', '{$id_dispositivo}')";
      if (conexion::ejecutarSQL($sql)) {
          $pArray->code = '200';
      } else {
          $pArray->code = '300';
      }
      conexion::cerrarConexion();
      return $pArray;
  }

  public static function leerDatos() {
      $pArray = new stdClass();
      $sql = "SELECT * FROM datos;";
      $res = conexion::ejecutarSQL($sql);
      if ($res->num_rows > 0) {
          while ($campos = $res->fetch_object()) {
              $pArray->datos[] = array('id' => $campos->id, 'valor' => $campos->valor, 'fecha' => $campos->fecha, 'tipo' => $campos->tipo, 'id_dispositivo' => $campos->id_dispositivo);
          }
          $pArray->code = '200';
      } else {
          $pArray->code = '300';
      }
      conexion::cerrarConexion();
      return $pArray;
  }
}
?>
