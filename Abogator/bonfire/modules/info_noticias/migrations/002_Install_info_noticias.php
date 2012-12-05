<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_info_noticias extends Migration {

	public function up()
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE,
			),
			'titulo' => array(
				'type' => 'VARCHAR',
				'constraint' => 1000,
				
			),
			'fecha' => array(
				'type' => 'DATE',
				'default' => '0000-00-00',
				
			),
			'descripcion' => array(
				'type' => 'VARCHAR',
				'constraint' => 2000,
				
			),
			'contenido' => array(
				'type' => 'TEXT',
				
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('info_noticias');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('info_noticias');

	}

	//--------------------------------------------------------------------

}