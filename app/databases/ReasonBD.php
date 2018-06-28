<?php 
namespace app\databases;
use framework\basedatos\Conection;
class ReasonBD extends Conection
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

        CREATE TABLE IF NOT EXISTS reason (
        id BIGSERIAL NOT NULL PRIMARY KEY,
        id_account int,
		id_institute int,
		status int
		name varchar(1000),
		description text,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (id_account) REFERENCES account(id),
        FOREIGN KEY (id_institute) REFERENCES institucion(id));

        DROP TRIGGER IF EXISTS set_timestamp ON reason; 
        CREATE TRIGGER set_timestamp
        BEFORE UPDATE ON reason
        FOR EACH ROW
        EXECUTE PROCEDURE trigger_set_timestamp();"; 
        $result = pg_query($query) or die('Crear la tabla fallo: ' . pg_last_error());
    }
}
?>