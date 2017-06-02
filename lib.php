<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This plugin is used to access Pod videos
 *
 * @since Moodle 3.3
 * @package    repository_pod
 * @copyright  2017 Obled Joel
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once($CFG->dirroot . '/repository/lib.php');

/**
 * repository_pod class
 * This is a class used to browse videos from Pod
 *
 * @since Moodle 3.3
 * @package    repository_pod
 * @copyright  2017 Obled Joel 
 * @licence    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require 'vendor/autoload.php';
use Elasticsearch\ClientBuilder;

const ES_DOMAIN = 'pod.univ-lille1.fr';
const POD_THUMBS_PER_PAGE = 12;

class repository_pod extends repository {

	public function __construct($repositoryid, $context = SYSCONTEXTID, $options = array()) {
		parent::__construct($repositoryid, $context, $options);
	}

	public function init_elastic($domain, $port = 9200) {

		$hosts = [
			$domain . ':' . $port
		];

		$client = ClientBuilder::create()
							->setHosts($hosts)
							->build();
		return $client;
	}

	public function global_search() {
		return false;
	}

	public function search($search_text, $page = 0) {
		$client = $this->init_elastic(ES_DOMAIN);
		$search_results = array();

		$params = [
			'index' => 'pod',
			'body' => [
				'query' => [
					'multi_match' => [
						'query' => $search_text,
						'fields' => 'title^1.1'
					]
				]
			]
		];

		$query_results = $client->search($params);



		foreach($query_results['hits'] as $url) {
			foreach($url as $source) {
				$search_results['list'][] = [
					'shortitle' => $source['_source']['title'],
					'title' => $source['_source']['title'].'.mp4',
					'source' => $source['_source']['full_url'],
					'datecreated' => $source['_source']['date_added'],
					'size' => '',
					'thumbnail' => 'https:' . $source['_source']['thumbnail'],
					'thumbnail_width' => 120,
					'thumbnail_height' => 120	
				];
			}	
		}

		return $search_results;
	}

	public function get_listing($path = '', $page = '') {
		return array('list'=>array());
    }

    public function supported_returntypes() {
    	return FILE_EXTERNAL;
    }
}