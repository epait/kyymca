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
?>

<div class="ai1wm-container">
	<div class="ai1wm-row">
		<div class="ai1wm-left">
			<?php include AI1WM_TEMPLATES_PATH . '/common/maintenance-mode.php'; ?>

			<div class="ai1wm-holder">
				<h1><i class="ai1wm-icon-publish"></i> <?php _e( 'Import Site', AI1WM_PLUGIN_NAME ); ?></h1>

				<?php include AI1WM_TEMPLATES_PATH . '/common/report-problem.php'; ?>

				<p class="ai1wm-clear">
					<?php _e( 'Use the box below to upload the archive file.', AI1WM_PLUGIN_NAME ); ?><br />
					<?php _e( 'When the file is successfully uploaded, it will be automatically restored on the current WordPress instance.', AI1WM_PLUGIN_NAME ); ?>
				</p>

				<?php if ( is_readable( AI1WM_STORAGE_PATH ) && is_writable( AI1WM_STORAGE_PATH ) ): ?>
					<div class="ai1wm-import-messages"></div>

					<div class="ai1wm-import-form">
						<form action=""  method="post" enctype="multipart/form-data">
							<div class="hide-if-no-js" id="ai1wm-plupload-upload-ui">
								<div class="ai1wm-drag-drop-area" id="ai1wm-drag-drop-area">
									<div id="ai1wm-import-init">
										<p>
											<i class="ai1wm-icon-cloud-upload"></i><br />
											<?php _e( 'Drag & Drop to upload', AI1WM_PLUGIN_NAME ); ?>
										</p>
										<div class="ai1wm-button-group ai1wm-button-group-import ai1wm-expandable">
											<div class="ai1wm-button-main">
												<span><?php _e( 'Import From', AI1WM_PLUGIN_NAME ); ?></span>
												<span class="ai1mw-lines">
													<span class="ai1wm-line ai1wm-line-first"></span>
													<span class="ai1wm-line ai1wm-line-second"></span>
													<span class="ai1wm-line ai1wm-line-third"></span>
												</span>
											</div>
											<ul class="ai1wm-dropdown-menu ai1wm-import-providers">
												<?php foreach ( apply_filters( 'ai1wm_import_buttons', array() ) as $button ) : ?>
													<li>
														<?php echo $button; ?>
													</li>
												<?php endforeach; ?>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>

					<p>
						<?php _e( 'Maximum upload file size:' ); ?>
						<?php if ( ( $max_file_size = apply_filters( 'ai1wm_max_file_size', AI1WM_MAX_FILE_SIZE ) ) ): ?>
							<span class="ai1wm-max-upload-size"><?php echo size_format( $max_file_size ); ?></span>
							<span class="ai1wm-unlimited-import">
								<a href="<?php echo AI1WM_UNLIMITED_EXT_URL; ?>" target="_blank" class="ai1wm-label">
									<i class="ai1wm-icon-notification"></i>
									<?php _e( 'Get unlimited', AI1WM_PLUGIN_NAME ); ?>
								</a>
							</span>
						<?php else: ?>
							<span class="ai1wm-max-upload-size"><?php _e( 'Unlimited', AI1WM_PLUGIN_NAME ); ?></span>
						<?php endif; ?>
					</p>
				<?php else: ?>
					<div class="ai1wm-message ai1wm-red-message">
						<?php
						printf(
							__(
								'Site could not be imported!<br />' .
								'Please make sure that storage directory <strong>%s</strong> has read and write permissions.',
								AI1WM_PLUGIN_NAME
							),
							AI1WM_STORAGE_PATH
						);
						?>
					</div>
				<?php endif; ?>

				<?php do_action( 'ai1wm_import_left_end' ); ?>
			</div>
		</div>
		<div class="ai1wm-right">
			<div class="ai1wm-sidebar">
				<div class="ai1wm-segment">
					<?php if ( ! AI1WM_DEBUG ) : ?>
						<?php include AI1WM_TEMPLATES_PATH . '/common/share-buttons.php'; ?>
					<?php endif; ?>

					<h2><?php _e( 'Leave Feedback', AI1WM_PLUGIN_NAME ); ?></h2>

					<?php include AI1WM_TEMPLATES_PATH . '/common/leave-feedback.php'; ?>
				</div>
			</div>
		</div>
	</div>
</div>
