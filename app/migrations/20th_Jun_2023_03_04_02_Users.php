<?php

namespace Thunder;

defined('ROOTPATH') OR exit('Access Denied!');

/**
 * Users class
 */
class Users extends Migration
{
	
	public function up()
	{

		/** create a table **/
		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('image varchar(1024) NULL');
		$this->addColumn('first_name varchar(50) NULL');
		$this->addColumn('last_name varchar(50) NULL');
		$this->addColumn('username varchar(30) NULL');
		$this->addColumn('birthday date NULL');
		$this->addColumn('email varchar(100) NULL');
		$this->addColumn('phone integer(11) NULL');
		$this->addColumn('address varchar(100) NULL');
		$this->addColumn('role varchar(20) NULL');
		$this->addColumn('password varchar(255) NULL');
		$this->addColumn('date_created datetime NULL');
		$this->addColumn('date_updated datetime NULL');
		$this->addPrimaryKey('id');
		/*
		$this->addUniqueKey();
		*/
		$this->createTable('users');

		/** insert data **/
		$this->addData('first_name','Rafael');
		$this->addData('last_name','Villanueva');
		$this->addData('username','raffy');
		$this->addData('email','faeyldojo@email.com');
		$this->addData('phone','09056073442');
		$this->addData('address','Nueva Ecija');
		$this->addData('role','admin');
		$this->addData('password',password_hash('password', PASSWORD_DEFAULT));
		$this->addData('date_created',date("Y-m-d H:i:s"));
		$this->addData('date_updated',date("Y-m-d H:i:s"));

		$this->insertData('users');
	} 

	public function down()
	{
		$this->dropTable('users');
	}

}