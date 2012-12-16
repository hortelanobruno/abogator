<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_user_emails extends Migration {

	public function up()
	{
		$prefix = $this->db->dbprefix;

		$fields = array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE,
			),
			'user_emails_email' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				
			),
			'user_emails_fecha' => array(
				'type' => 'DATETIME',
				'default' => '0000-00-00 00:00:00',
				
			),
			'user_emails_sistema' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('user_emails');

	}

	//--------------------------------------------------------------------

	public function down()
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('user_emails');

	}

	//--------------------------------------------------------------------

}