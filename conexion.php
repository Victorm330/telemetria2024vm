<?php
class Conexion {
  
    public static function conectar() {
        $user = "xtupo2dee3dj72qv";
        $host = "tk3mehkfmmrhjg0b.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $db_name = "ww2a2mafwu5e3dol";
        $pass = "vmo5aeah0dxmwk5k";
        return new mysqli($host, $user, $pass, $db_name, 3306);
    }
  
    public static function ejecutarSQL($sql) {
        return self::conectar()->query($sql);
    }

    public static function cerrarConexion() {
        return self::conectar()->close();
    }
}
?>
