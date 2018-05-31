<?php 
use framework\basedatos\Conection;
namespace framework\basedatos;
class ORMysql extends Conection
{
	protected static $table;

    public function save()
    {
        $values = $this->getColumns();
        $filtered = null;
        $params = "";
        foreach ($values as $key => $value) {
            if ($value !== null && !is_integer($key) && $value !== '' && strpos($key, 'obj_') === false && $key !== 'id') {
                if ($value === false) {
                    $value = 0;
                }
                $filtered[$key] = $value;
            }
        }
        $columns = array_keys($filtered);
        if ($this->id) {
            for ($i=0; $i < count($columns); $i++) {
                $params .= $columns[$i] . " = ?" . ",";
            }
            $params =  trim($params,",");
            $query = "UPDATE " . static ::$table . " SET $params WHERE id =" . $this->id;
        } else {
            for ($i=1; $i <= count($columns); $i++) {
                $params[] = "?";
            }
            $params = join(", ", $params);
            $columns = join(", ", $columns);
            $query = "INSERT INTO " . static ::$table . " ($columns) VALUES ($params)";
        }
        try {
            $pre = $this->getconn()->prepare($query);
            $a_params = [""];
            $arg = array_values($filtered);
            for ($i=0; $i < count($arg); $i++) { 
                $a_params[0] .= typeVar($arg[$i]);
                $a_params[] = & $arg[$i];
            }
            if (call_user_func_array([$pre, 'bind_param'], $a_params)) {
                if ($pre->execute()){
                    $this->id = $pre->insert_id;
                    $this->destroy();
                    return true;
                }else{
                    die("Falló la ejecución: (" . $pre->errno . ") " . $pre->error);
                }
            }else{
                die("Falló la vinculación de parámetros: (" . $pre->errno . ") " . $pre->error);
            }
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }  
    }

    public function where($columna, $signo, $valor)
    {
        $table = static::$table;
        $query = "SELECT * FROM {$table} WHERE {$columna} {$signo} ?";
        $class = get_called_class();
        $pre = $this->getconn()->prepare($query);
        $result = null;
        if ($pre->bind_param(typeVar($valor), $valor)) {
            if ($pre->execute()) {
                $result = $pre->get_result();
                $obj = [];
                while ($row = $result->fetch_assoc()){
                    $obj[] = new $class($row);
                }  
                self::destroy();
                return $obj;
            }else{
                die("Falló al ejecutar la query: (" . $pre->errno . ") " . $pre->error);
            }
        }else{
            die("Falló la vinculación de parámetros: (" . $pre->errno . ") " . $pre->error);
        }

    }

    public function find($columna, $signo, $id)
    {
        $resultado = self::where($columna, $signo, $id);
        if(count($resultado)){
            return $resultado[0];
        }else{
            return [];
        }
    }

    public function all(){
        $table = static::$table;
        $query = "SELECT * FROM {$table}";
        $class = get_called_class();
        $pre = $this->getconn()->prepare($query);
        $pre->execute();
        $result = $pre->get_result();
        $obj = [];
        while ($row = $result->fetch_assoc()){
            $obj[] = new $class($row);
        }  
        self::destroy();
        return $obj;
    }

    public function delete($valor=null,$columna=null)
    {
        $table = static::$table;
        $colum = (is_null($columna)?"id":$columna);
        $query = "DELETE FROM {$table} WHERE {$colum} = ?";
        $pre = $this->getconn()->prepare($query);
        $rs = null;
        if(!is_null($valor)){
            $pre->bind_param(typeVar($valor), $valor);
        }else{
            if (is_null($this->id)) {
                $rs = $pre->query("DELETE FROM {$table}");
            }else{
                $pre->bind_param("i", $this->id);
            }
        }
        if($pre->execute()){
            self::destroy();
            return true;
        }else{
            return false;
        }
    }

}

?>