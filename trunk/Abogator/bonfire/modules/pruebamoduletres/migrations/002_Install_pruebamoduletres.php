<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_pruebamoduletres extends Migration {

	public function up()
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE,
			),
			'pruebamoduletres_coluno' => array(
				'type' => 'VARCHAR',
				'constraint' => 1000,
				
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('pruebamoduletres');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('pruebamoduletres');

	}

	//--------------------------------------------------------------------

}