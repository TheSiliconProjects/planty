<?php
		$_error = NULL;
		if (array_key_exists('error', $_REQUEST)) {
			$_error = $_REQUEST['error'];
		}
?>
		<div class="logo-container" style="padding: 50px 0px 10px 20px">
			<a href="https://www.wpserveur.net/"  target="_blank" style="padding-right: 20px;"><img src="<?php echo plugins_url($this->getPluginLogo(), __FILE__); ?>" /></a>
			<a href="http://blogvault.net/"  target="_blank"><img width="180" src="<?php echo plugins_url('../img/logo.png', __FILE__); ?>" /></a>
		</div>
		<div id="wrapper" class="toplevel_page_wpserveur-automated-migration">
			<form id="wpserveur_migrate_form" dummy=">" action="<?php echo $this->bvinfo->appUrl(); ?>/home/migrate" style="padding:0 2% 2em 1%;" onsubmit="document.getElementById('migratesubmit').disabled = true;" method="post" name="signup">
				<h1>Migrez votre site WordPress sur WPServeur</h1>
				<p><font size="3">Le plugin WPServeur Migration facilite la migration de votre WordPress sur <a href="https://www.wpserveur.net/" target="_blank">l’hébergement WPServeur.</A> <br>Assurez-vous avant de commencer, d’avoir créé un WordPress sur votre console WPServeur et d’être en possession des accès FTP de ce dernier.</font></p>
		<div style="float:right;margin:20px;">
			<iframe src="https://player.vimeo.com/video/156818749?color=ff9933&title=0&byline=0&portrait=0" width="500" height="282" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
<?php if ($_error == "email") { 
	echo '<div class="error" style="padding-bottom:0.5%;"><p>There is already an account with this email.</p></div>';
} else if ($_error == "blog") {
	echo '<div class="error" style="padding-bottom:0.5%;"><p>Could not create an account. Please contact <a href="http://blogvault.net/contact/">blogVault Support</a></p></div>';
} else if (($_error == "custom") && isset($_REQUEST['bvnonce']) && wp_verify_nonce($_REQUEST['bvnonce'], "bvnonce")) {
	echo '<div class="error" style="padding-bottom:0.5%;"><p>'.esc_html(base64_decode($_REQUEST['message'])).'</p></div>';
}
?>
				<input type="hidden" name="passive" value="true" />
				<input type="hidden" name="bvsrc" value="wpplugin" />
				<input type="hidden" name="migrate" value="wpserveur" />
				<input type="hidden" name="type" value="ftp" />
<?php echo $this->siteInfoTags(); ?>
				<div class="row-fluid">
					<div class="span5" style="border-right: 1px solid #EEE; padding-top:1%;">
						<label id='label_email'>Email de notification</label>
			 			<div class="control-group">
							<div class="controls">
								<input type="text" id="email" name="email" placeholder="ex. user@mydomain.com">
							</div>
						</div>
						<label class="control-label" for="input02">URL de destination WPServeur</label>
						<div class="control-group">
							<div class="controls">
								<input type="text" class="input-large" name="newurl" placeholder="http://exemple.wpserveur.net">
							</div>
						</div>
						<label class="control-label" for="inputip">URL du FTP WPServeur</label>
						<div class="control-group">
							<div class="controls">
								<input type="text" class="input-large" placeholder="ftp://exemple.wpserveur.net" name="address">
								<p class="help-block"></p>
							</div>
						</div>
						<label class="control-label" for="input01">Identifiant FTP WPServeur</label>
						<div class="control-group">
							<div class="controls">
								<input type="text" class="input-large" placeholder="ex. installname" name="username">
								<p class="help-block"></p>
							</div>
						</div>
						<label class="control-label" for="input02">Mot de passe FTP WPServeur</label>
						<div class="control-group">
							<div class="controls">
								<input type="password" class="input-large" name="passwd">
							</div>
						</div>
<?php if (array_key_exists('auth_required_source', $_REQUEST)) { ?>
						<div id="source-auth">
							<label class="control-label" for="input02" style="color:red">User <small>(for this site)</small></label>
							<div class="control-group">
								<div class="controls">
									<input type="text" class="input-large" name="httpauth_src_user">
								</div>
							</div>
							<label class="control-label" for="input02" style="color:red">Password <small>(for this site)</small></label>
							<div class="control-group">
								<div class="controls">
									<input type="password" class="input-large" name="httpauth_src_password">
								</div>
							</div>
						</div>
<?php } ?>
						<div class="control-group">
							<div class="controls">
								<input type="checkbox" name="consent" onchange="document.getElementById('migratesubmit').disabled = !this.checked;" value="1"/>J'accepte Blogvault <a href="https://blogvault.net/tos" target="_blank" rel="noopener noreferrer">Conditions d'utilisation</a> et <a href="https://blogvault.net/privacy" target="_blank" rel="noopener noreferrer">politique de confidentialité</a>
							</div>
						</div>
						</div>

					</div>
				</div>
				<input type='submit' disabled id='migratesubmit' value='Migrer mon Site sur WPServeur' class="button button-primary">
			</form>
		</div> <!-- wrapper ends here -->