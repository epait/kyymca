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
abstract class Ai1wm_Export_Abstract {

	protected $args    = array();

	protected $exclude = array(
		AI1WM_PLUGIN_NAME,
		'all-in-one-wp-migration-dropbox-extension',
		'all-in-one-wp-migration-gdrive-extension',
		'all-in-one-wp-migration-s3-extension',
		'all-in-one-wp-migration-multisite-extension',
		'all-in-one-wp-migration-unlimited-extension',
		'.DS_Store',
		'backup-db',
		'backups',
		'cache',
		'upgrade',
		'envato-backups',
		'updraft',
	);

	protected $storage = null;

	public function __construct( array $args = array() ) {
		// Set arguments
		$this->args = $args;

		// Set exclude files and directories
		$this->exclude = apply_filters( 'ai1wm-exclude-folders-from-export', $this->exclude );
	}

	/**
	 * Create empty archive and add package config
	 *
	 * @return void
	 */
	public function start() {
		// Set default progress
		Ai1wm_Status::set( array(
			'total'     => 0,
			'processed' => 0,
			'type'      => 'info',
			'message'   => __( 'Creating an empty archive...', AI1WM_PLUGIN_NAME )
		) );

		// Get package file
		$service = new Ai1wm_Service_Package( $this->args );
		$service->export();

		// Get archive file
		$archive = new Ai1wm_Compressor( $this->storage()->archive() );

		// Add package file
		$archive->add_file( $this->storage()->package(), AI1WM_PACKAGE_NAME );
		$archive->close();

		// Set progress
		Ai1wm_Status::set( array(
			'message' => __( 'Done creating an empty archive.', AI1WM_PLUGIN_NAME )
		) );

		// Redirect
		$this->route_to( 'enumerate' );
	}

	/**
	 * Enumerate content files and directories
	 *
	 * @return void
	 */
	public function enumerate() {
		// Set progress
		Ai1wm_Status::set( array(
			'message' => __( 'Retrieving a list of all WordPress files...', AI1WM_PLUGIN_NAME )
		) );

		// Create map file
		$filemap = fopen( $this->storage()->filemap(), 'a+' );

		// Total files
		$total = 0;

		// Iterate over WP_CONTENT_DIR directory
		$iterator = new RecursiveIteratorIterator(
			new Ai1wm_Exclude_Directory_Filter(
				new Ai1wm_Recursive_Directory_Iterator(
					WP_CONTENT_DIR
				),
				$this->exclude
			),
			RecursiveIteratorIterator::SELF_FIRST
		);

		foreach ( $iterator as $item ) {
			if ( $item->isFile() ) {
				// Write path line
				if ( fwrite( $filemap, $iterator->getSubPathName() . PHP_EOL ) ) {
					$total++;
				}
			}
		}

		fclose( $filemap );

		// Set progress
		Ai1wm_Status::set( array(
			'total'   => $total,
			'message' => __( 'Done retrieving a list of all WordPress files.', AI1WM_PLUGIN_NAME )
		) );

		// Redirect
		$this->route_to( 'content' );
	}

	/**
	 * Add content files and directories
	 *
	 * @return void
	 */
	public function content() {
		// Total and processed files
		$total = Ai1wm_Status::get( 'total' ); // returns false if key is not found
		$total = $total ? $total : 1;          // make sure we have a number

		$processed = Ai1wm_Status::get( 'processed' ); // returns false if key is not found
		$processed = $processed ? $processed : 0;      // make sure we have a number

		// what percent of files have we processed?
		$progress  = (int) ( ( $processed / $total ) * 100 );

		// Set progress
		Ai1wm_Status::set( array(
			'message' => sprintf( __( 'Archiving %d files...<br />%d%% complete', AI1WM_PLUGIN_NAME ), $total, $progress )
		) );

		// Get map file
		$filemap = fopen( $this->storage()->filemap(), 'r' );

		// Start time
		$start = microtime( true );

		// Flag to hold if all files have been processed
		$completed = true;

		// Set file map pointer at the current index
		if ( fseek( $filemap, $this->pointer() ) !== -1 ) {
			// Get archive
			$archive = new Ai1wm_Compressor( $this->storage()->archive() );

			while ( $path = trim( fgets( $filemap ) ) ) {
				// Add file to archive
				$archive->add_file( WP_CONTENT_DIR . DIRECTORY_SEPARATOR . $path, $path );

				$processed++;

				// time elapsed
				$time = microtime( true ) - $start;

				if ( $time > 3 ) {
					// More than 3 seconds have passed, break and do another request
					$completed = false;
					break;
				}
			}

			$archive->close();
		}

		// Set new file map pointer
		$this->pointer( ftell( $filemap ) );

		fclose( $filemap );

		// Set progress
		Ai1wm_Status::set( array( 'processed' => $processed ) );

		// Redirect
		if ( $completed ) {
			// Redirect
			$this->route_to( 'database' );
		} else {
			$this->route_to( 'content' );
		}
	}

	/**
	 * Add database
	 *
	 * @return void
	 */
	public function database() {
		// Set progress
		Ai1wm_Status::set( array( 'message' => __( 'Exporting database...', AI1WM_PLUGIN_NAME ) ) );

		// Get databsae file
		$service  = new Ai1wm_Service_Database( $this->args );
		$service->export();

		// Get archive file
		$archive = new Ai1wm_Compressor( $this->storage()->archive() );

		// Add database to archive
		$archive->add_file( $this->storage()->database(), AI1WM_DATABASE_NAME );
		$archive->close();

		// Set progress
		Ai1wm_Status::set( array( 'message' => __( 'Done exporting database.', AI1WM_PLUGIN_NAME ) ) );

		// Redirect
		$this->route_to( 'export' );
	}

	/**
	 * Stop export and clean storage
	 *
	 * @return void
	 */
	public function stop() {
		$this->storage()->clean();
	}


	/**
	 * Clean storage path
	 *
	 * @return void
	 */
	public function clean() {
		$this->storage()->clean();
	}

	/**
	 * Get export package
	 *
	 * @return void
	 */
	abstract public function export();

	/*
	 * Get storage object
	 *
	 * @return Ai1wm_Storage
	 */
	protected function storage() {
		if ( $this->storage === null ) {
			if ( isset( $this->args['archive'] ) ) {
				$this->args['archive'] = basename( $this->args['archive'] );
			} else {
				$this->args['archive'] = $this->filename();
			}

			$this->storage = new Ai1wm_Storage( $this->args );
		}

		return $this->storage;
	}

	/**
	 * Get filemap pointer or set new one
	 *
	 * @param  int $pointer Set new file pointer
	 * @return int
	 */
	protected function pointer( $pointer = null ) {
		if ( ! isset( $this->args['pointer'] ) ) {
			$this->args['pointer'] = 0;
		} else if ( ! is_null( $pointer ) ) {
			$this->args['pointer'] = $pointer;
		}

		return (int) $this->args['pointer'];
	}

	/**
	 * Get file name
	 *
	 * @return string
	 */
	protected function filename() {
		$url  = parse_url( home_url() );
		$name = array();

		// Add domain
		if ( isset( $url['host'] ) ) {
			$name[] = $url['host'];
		}

		// Add path
		if ( isset( $url['path'] ) ) {
			$name[] = trim( $url['path'], '/' );
		}

		// Add year, month and day
		$name[] = date( 'Ymd' );

		// Add hours, minutes and seconds
		$name[] = date( 'His' );

		// Add unique identifier
		$name[] = rand( 100, 999 );

		return sprintf( '%s.wpress', implode( '-', $name ) );
	}

	/**
	 * Get folder name
	 *
	 * @return string
	 */
	protected function foldername() {
		$url  = parse_url( home_url() );
		$name = array();

		// Add domain
		if ( isset( $url['host'] ) ) {
			$name[] = $url['host'];
		}

		// Add path
		if ( isset( $url['path'] ) ) {
			$name[] = trim( $url['path'] , '/' );
		}

		return implode( '-', $name );
	}

	/**
	 * Route to method
	 *
	 * @param  string $method Name of the method
	 * @return void
	 */
	protected function route_to( $method ) {
		// Redirect arguments
		$this->args['method']     = $method;
		$this->args['secret_key'] = get_site_option( AI1WM_SECRET_KEY, false, false );

		// Check the status of the export, maybe we need to stop it
		if ( ! is_file( $this->storage()->archive() ) ) {
			exit;
		}

		$headers = array();

		// HTTP authentication
		$auth_user     = get_site_option( AI1WM_AUTH_USER, false, false );
		$auth_password = get_site_option( AI1WM_AUTH_PASSWORD, false, false );
		if ( $auth_user !== false && $auth_password !== false ) {
			$headers['Authorization'] = 'Basic ' . base64_encode( $auth_user . ':' . $auth_password );
		}

		// HTTP request
		remove_all_filters( 'http_request_args', 1 );
		wp_remote_post(
			admin_url( 'admin-ajax.php?action=ai1wm_export' ),
			array(
				'timeout'    => 0.01,
				'blocking'   => false,
				'sslverify'  => apply_filters( 'https_local_ssl_verify', false ),
				'user-agent' => 'ai1wm',
				'body'       => $this->args,
				'headers'    => $headers,
			)
		);
	}
}
