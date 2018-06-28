<?php 

namespace app\databases;
use framework\basedatos\Conection;
class InputAndOutputBD extends Conection
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

        CREATE TABLE IF NOT EXISTS inpout (
        id BIGSERIAL NOT NULL PRIMARY KEY,
        id_product INT,
        id_reason INT,
        quantity INT,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (id_product) REFERENCES product(id),
        FOREIGN KEY (id_reason) REFERENCES reason(id));

        DROP TRIGGER IF EXISTS set_timestamp ON inpout; 
        CREATE TRIGGER set_timestamp
        BEFORE UPDATE ON inpout
        FOR EACH ROW
        EXECUTE PROCEDURE trigger_set_timestamp();"; 
        $result = pg_query($query) or die('Crear la tabla fallo: ' . pg_last_error());
    }
}
?>