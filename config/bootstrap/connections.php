<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2011, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

use lithium\data\Connections;

/**
 * Adding gMapApi connection
 */
Connections::add('gmapapi', array(
    'type'     => 'http',
    'adapter'  => 'gMapApi',
    'key'    => 'AIzaSyA7yJKKr4EZgnCL32tXwGiHDgMajGKNuP0',
));

?>