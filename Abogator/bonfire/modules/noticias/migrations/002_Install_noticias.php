<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_noticias extends Migration {

	public function up()
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE,
			),
			'noticias_titulo' => array(
				'type' => 'VARCHAR',
				'constraint' => 1000,
				
			),
			'noticias_fecha' => array(
				'type' => 'DATE',
				'default' => '0000-00-00',
				
			),
			'noticias_texto' => array(
				'type' => 'TEXT',
				
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('noticias');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('noticias');

	}

	//--------------------------------------------------------------------

}