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

class repository_pod extends repository {
	const POD_THUMBS_PER_PAGE = 12;

	public function search($search_text, $start = '', $end = '') {
		$client = Elasticsearch\ClientBuilder::create()->build();
	}
}