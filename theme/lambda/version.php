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
 * Parent theme: Bootstrapbase by Bas Brands
 * Built on: Essential by Julian Ridden
 *
 * @package   theme_lambda
 * @copyright 2014 redPIthemes
 *
 */

defined('MOODLE_INTERNAL') || die;

$plugin->component = 'theme_lambda'; // Full name of the plugin (used for diagnostics)
$plugin->release   = '1.44';
$plugin->version   = 2015110808; // The current module version (Date: YYYYMMDDXX)
$plugin->maturity  = MATURITY_STABLE;
$plugin->requires  = 2013051401; // Requires this Moodle version
$plugin->dependencies = array(
    'theme_bootstrapbase'  => 2013050100,
);