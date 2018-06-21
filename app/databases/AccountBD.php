<?php 

namespace app\databases;
use framework\basedatos\Conection;

class AccountBD extends Conection
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

        CREATE TABLE IF NOT EXISTS account (
        id BIGSERIAL NOT NULL PRIMARY KEY,
        nationality varchar(1) NOT NULL,
        cedula varchar(9) NOT NULL UNIQUE,
        name varchar(50),
        last_name varchar(50),
        password varchar(128) NOT NULL,
        email varchar(255) UNIQUE,
        address text,
        level varchar(100) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP);

        DROP TRIGGER IF EXISTS set_timestamp ON account; 
        CREATE TRIGGER set_timestamp
        BEFORE UPDATE ON account
        FOR EACH ROW
        EXECUTE PROCEDURE trigger_set_timestamp();"; 
        $result = pg_query($query) or die('Crear la tabla fallo: ' . pg_last_error());
    }
}
?>