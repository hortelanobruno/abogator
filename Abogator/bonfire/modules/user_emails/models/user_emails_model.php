<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_emails_model extends BF_Model {

	protected $table		= "user_emails";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
}
