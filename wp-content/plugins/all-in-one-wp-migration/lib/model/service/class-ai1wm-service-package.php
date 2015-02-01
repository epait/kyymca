<?php

/**
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
class Ai1wm_Service_Package implements Ai1wm_Service_Interface {

	protected $args    = array();

	protected $storage = null;

	public function __construct( array $args = array() ) {
		// Set arguments
		$this->args = $args;
	}

	/**
	 * Import package configuration
	 *
	 * @return array
	 */
	public function import() {
		global $wp_version;

		$config = array();
		$config = json_decode( file_get_contents( $this->storage()->package() ), true );

		// Get config file
		if ( false === is_null( $config ) ) {
			// Add plugin version
			if ( ! isset( $config['Plugin']['Version'] ) ) {
				$config['Plugin']['Version'] = AI1WM_VERSION;
			}

			// Add WordPress version
			if ( ! isset( $config['WordPress']['Version'] ) ) {
				$config['WordPress']['Version'] = $wp_version;
			}

			// Add WordPress content
			if ( ! isset( $config['WordPress']['Content'] ) ) {
				$config['WordPress']['Content'] = WP_CONTENT_DIR;
			}
		} else {
			throw new Ai1wm_Import_Exception( 'Unable to parse package.json file' );
		}

		return $config;
	}

	/**
	 * Export package configuration
	 *
	 * @return string
	 */
	public function export() {
		global $wp_version;

		$config = array(
			'SiteURL'   => site_url(),
			'HomeURL'   => home_url(),
			'Plugin'    => array( 'Version' => AI1WM_VERSION ),
			'WordPress' => array( 'Version' => $wp_version, 'Content' => WP_CONTENT_DIR ),
		);

		// Save config
		$package = fopen( $this->storage()->package(), 'w' );
		fwrite( $package, json_encode( $config ) );
		fclose( $package );
	}

	/*
	 * Get storage object
	 *
	 * @return Ai1wm_Storage
	 */
	protected function storage() {
		if ( $this->storage === null ) {
			$this->storage = new Ai1wm_Storage( $this->args );
		}

		return $this->storage;
	}
}
