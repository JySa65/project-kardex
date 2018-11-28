<?php 

namespace app\databases;
use framework\basedatos\Conection;
class ProductBD extends Conection
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

        CREATE TABLE IF NOT EXISTS product (
        id BIGSERIAL NOT NULL PRIMARY KEY,
        id_category INT NOT NULL,
        name varchar(1000) NOT NULL,
        description text,
        minimo INT DEFAULT 0,
        price INT DEFAULT 0,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (id_category) REFERENCES category(id));


        DROP TRIGGER IF EXISTS set_timestamp ON product; 
        CREATE TRIGGER set_timestamp
        BEFORE UPDATE ON product
        FOR EACH ROW
        EXECUTE PROCEDURE trigger_set_timestamp();"; 
        $result = pg_query($query) or die('Crear la tabla fallo: ' . pg_last_error());
    }
}
?>