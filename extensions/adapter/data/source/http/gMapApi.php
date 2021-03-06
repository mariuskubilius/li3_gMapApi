<?php

namespace li3_gMapApi\extensions\adapter\data\source\http;

use lithium\util\String;
use lithium\util\Inflector;

class gMapApi extends \lithium\data\source\Http {
	
	protected $_classes = array(
		'service' => 'lithium\net\http\Service',
		'entity' => 'lithium\data\entity\Document',
		'set' => 'lithium\data\collection\DocumentSet',
	);
	
	
	public function __construct(array $config = array()) {
		$defaults = array(
			'scheme' => 'http',
			'host' => 'maps.googleapis.com',
			'port' => 80,
			'basePath' => '/maps/api',
			'key' => null,
			'sensor' => 'false',
			'output' => 'json',
		);
		$config += $defaults;
		parent::__construct($config + $defaults);	
	}
	
	public function read($query, array $options = array()) {
		
		$paths = array(
			'directions' => '/directions/'.$this->_config['output'],
			'distancematrixes' => '/distancematrix/'.$this->_config['output'],
			'elevations' => '/elevation/'.$this->_config['output'],
			'geocodes' => '/geocode/'.$this->_config['output'],
			'places' => '/place/'.$this->_config['output'],
		);
		$params = $query->export($this, array('source', 'conditions'));
		$source = $params['source'];
		$conditions = (array) $params['conditions'] + array(
			'sensor' => $this->_config['sensor'], 
			//'key' => $this->_config['key'], 
		);
		if (!isset($paths[$source])) {
			return null;
		}
		
		$path = $paths[$source];
		$result = json_decode($this->connection->get($this->_config['basePath'].$path, $conditions), true);
		return $this->item($query->model(), $result, array('class' => 'set'));
	}
	
	public function cast($entity, array $data, array $options = array()) {
		$model = $entity->model();
		var_dump($data);
		foreach ($data as $key => $val) {
			if (!is_array($val)&&!is_numeric($key)) {
				continue;
			}
		$data[$key] = $this->item($model, $val, array('class' => 'entity'));
		}
    	return parent::cast($entity, $data, $options);
	}
	
}

?>