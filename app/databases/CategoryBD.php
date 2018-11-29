<?php 

namespace app\databases;
use framework\basedatos\Conection;
class CategoryBD extends Conection
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

        CREATE TABLE IF NOT EXISTS category (
        id BIGSERIAL NOT NULL PRIMARY KEY,
        code text,
        name varchar(1000) NOT NULL,
        description text,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP);

        DROP TRIGGER IF EXISTS set_timestamp ON category; 
        CREATE TRIGGER set_timestamp
        BEFORE UPDATE ON category
        FOR EACH ROW
        EXECUTE PROCEDURE trigger_set_timestamp();"; 
        $result = pg_query($query) or die('Crear la tabla fallo: ' . pg_last_error());
    }
}
?>