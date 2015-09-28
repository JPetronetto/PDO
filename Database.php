<?php

class Database extends PDO {
	
	private static $instance;
	
	public function Database($dsn, $username = "", $password = "") {
		// The PDO constructor.
		parent::__construct($dsn, $username, $password);
	}

	public static function getInstance() {

	// If the instance don't exists a one new is created.
	if(!isset( self::$instance )) {
		try {
			self::$instance = new Database(DSN.DB_HOST.DB_NAME, DB_USER, DB_PASS);
			self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
		} catch (PDOException $e) {
			echo 'Could not connect the database. Error: ' . $e->getMessage();
			exit ();
		}
	}
	// If the instance already exists, this is returned.
	return self::$instance;
	}
}