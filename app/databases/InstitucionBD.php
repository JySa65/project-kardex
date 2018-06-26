<?php 

namespace app\databases;
use framework\basedatos\Conection;
class InstitucionBD extends Conection
{
	function __construct()
	{
		$this->getconn();
		$query = "
        CREATE OR REPLACE FUNCTION trigger_set_timestamp()
        RETURNS TRIGGER AS $$
        BEGIN
        NEW.updated_at = NOW();
        RETURN NEW;
        END;
        $$ LANGUAGE plpgsql;

        CREATE TABLE IF NOT EXISTS institucion (
        id BIGSERIAL NOT NULL PRIMARY KEY,
        rif varchar(10),
        name varchar(1000) NOT NULL,
        description text,
        address text,
        tlf varchar(11),
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP);


        DROP TRIGGER IF EXISTS set_timestamp ON institucion; 
        CREATE TRIGGER set_timestamp
        BEFORE UPDATE ON institucion
        FOR EACH ROW
        EXECUTE PROCEDURE trigger_set_timestamp();"; 
        $result = pg_query($query) or die('Crear la tabla fallo: ' . pg_last_error());
    }
}
?>