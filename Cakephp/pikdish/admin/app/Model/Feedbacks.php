<?php
App::uses('Model','Model');


class Feedbacks extends Model
{
	public $belongsTo=array('Restaurant','User');
	
}