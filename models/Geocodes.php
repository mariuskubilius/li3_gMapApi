<?php
namespace li3_gMapApi\models;

class Geocodes extends  \lithium\data\Model{
	/**
	 *  Usage example for Geocoding
	 * 	us as you would use any model
	 * 	for info on acceptable conditions please take a peak at:
	 * 	http://code.google.com/apis/maps/documentation/webservices/index.html
	 * 	
	 * 	$conditions = array(
	 * 		'address' => 'Chicago, USA',
	 * 	);
	 * 	Geocodes::all(compact('conditions'))
	 */
	public $_meta = array('connection' => 'gmapapi');
	
}
?>