<?php
/**
 * Plugin Name: All-in-One WP Migration Unlimited Extension
 * Plugin URI: https://servmask.com/
 * Description: Extension for All in One WP Migration that enables unlimited size exports and imports
 * Author: ServMask
 * Author URI: https://servmask.com/
 * Version: 1.0.0
 *
 * Copyright (C) 2014 ServMask Inc.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * ███████╗███████╗██████╗ ██╗   ██╗███╗   ███╗ █████╗ ███████╗██╗  ██╗
 * ██╔════╝██╔════╝██╔══██╗██║   ██║████╗ ████║██╔══██╗██╔════╝██║ ██╔╝
 * ███████╗█████╗  ██████╔╝██║   ██║██╔████╔██║███████║███████╗█████╔╝
 * ╚════██║██╔══╝  ██╔══██╗╚██╗ ██╔╝██║╚██╔╝██║██╔══██║╚════██║██╔═██╗
 * ███████║███████╗██║  ██║ ╚████╔╝ ██║ ╚═╝ ██║██║  ██║███████║██║  ██╗
 * ╚══════╝╚══════╝╚═╝  ╚═╝  ╚═══╝  ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝
 */
@ignore_user_abort( true );
@set_time_limit( 0 );
@ini_set( 'max_input_time', '-1' );

// Plugin Basename
define( 'AI1WMUE_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

// Plugin Path
define( 'AI1WMUE_PATH', dirname( __FILE__ ) );

// Plugin Url
define( 'AI1WMUE_URL', plugins_url( '', __FILE__ ) );

// include constants
require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'constants.php';

// include loader
require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'loader.php';

// ============================================================================
// = All app initialization is done in Ai1wmue_Main_Controller __constructor. =
// ============================================================================
$main_controller = new Ai1wmue_Main_Controller();
