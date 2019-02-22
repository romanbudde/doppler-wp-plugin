<section class="dplr_settings theme_dplr">
	<div class="wrap">
		<a href="http://www.fromdoppler.com" target="_blank"><img id="dplr_logo" src="<?php echo plugins_url( '/../img/logo-doppler.svg', __FILE__ ); ?>" alt="Doppler"></a>
		<?php
		if ($connected) { ?>
		<h1><?php echo esc_html("¡Successful connection!", "doppler-form" ); ?></h1>
		<p class="subtitle"><?php echo esc_html("Your account is now officially connected","doppler-form") ;?> :)</p>
		<div class="disconnect_box">
			<form method="POST" action="options.php" >
				<?php settings_fields('dplr_plugin_options'); ?>
				<input type="hidden" name="dplr_settings[action]" value="disconnect" />
				<span><button class="button button--small button--fourth"><?php echo esc_html("Disconnect", "doppler-form"); ?></button></span>
			</form>
		</div>
		<div class="updated_message">
			<img width="54" src="<?php  echo plugins_url( '/../img/ok-message.svg', __FILE__ ); ?>" alt="">
			<hr/>
			<div class="dplr-pasos">
				<h2><?php echo esc_html('¡You are almost done! Follow this steps', 'doppler-form')?></h2>
				<div>
					<div>
						<figure>
							<img src="<?php  echo plugins_url( '/../img/screenshot-1.png', __FILE__ ); ?>" alt="step 1"/>
						</figure>
						<span>
							1.
						</span>
						<p>
						<?php 
							echo esc_html('Go to the Forms tab and create a new form.  Select the list you want to populate and the fields you want to add.', 'doppler-form');
						?>
						</p>
					</div>
					<div>
						<figure>
							<img src="<?php  echo plugins_url( '/../img/screenshot-2.png', __FILE__ ); ?>" alt="step 2"/>
						</figure>
						<span>
							2.
						</span>
						<p>
						<?php 
							echo esc_html('Go to Appearance > Widgets.  Click in Doppler Forms and select where you want your new form to show.', 'doppler-form');
						?>
						</p>
					</div>
					<div>
						<figure>
							<img src="<?php  echo plugins_url( '/../img/screenshot-3.png', __FILE__ ); ?>" alt="step 3"/>
						</figure>
						<span>
							3.
						</span>
						<p>
						<?php 
							echo esc_html('¡Done! You should now see your new form published with your theme\'s appearance.', 'doppler-form');
						?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<?php } else {?>
		<h1><?php _e("Connect with Doppler and create your forms from wordpress", "doppler-form" ); ?></h1>
		<p class="subtitle"><?php _e("Create forms that automatically adapt to your site's styles and send your new contacts automatically from wordpress to your Doppler Lists. The only thing you need to do is enter your user and API key to connect.","doppler-form") ;?>
		<div class="dplr_form_wrapper" >
			<form method="POST" action="options.php" id="dplr_apikey_options" class="<?php echo $error?'error':''; ?>">
				<?php settings_fields('dplr_plugin_options'); ?>
        <div class="input-container input-horizontally input-text tooltip tooltip-warning <?php echo isset($errorMessages['user_account']) ? 'tooltip-initial input-error' : 'tooltip-hide'; echo $options['dplr_option_useraccount'] ? ' notempty' : ''; ?>">
          <label><?php echo esc_html('Email', 'doppler-form');?></label>
					<input class="validation"  onfocus="this.placeholder = ''" data-validation-email="<?php _e("Ouch! Enter a valid Email address.", "doppler-form"); ?>" <?php echo isset($errorMessages['user_account']) ? "data-validation-fixed='".$errorMessages['user_account']."'" : "";?>" onblur="this.placeholder = '<?php _e("Your Doppler user ;)", "doppler-form");?>'" type="text" placeholder="<?php _e("Your Doppler user ;)", "doppler-form");?>" name="dplr_settings[dplr_option_useraccount];"  autocomplete="off" value="<?php echo $options['dplr_option_useraccount'];?>" />
          <div class="tooltip-container">
            <span></span>
          </div>
        </div>
        <div class="input-container input-horizontally input-text input-icon tooltip tooltip-warning <?php echo isset($errorMessages['api_key']) ? 'input-error' : 'tooltip-hide'; echo $options['dplr_option_apikey'] ? ' notempty' : ''; ?>">
					<label>API key 
					<div class="icon">
            <span class="tooltip tooltip-info tooltip-top tooltip-hover">?
              <div class="tooltip-container">
                <p><?php _e("Don’t know where to find your Api Key?", "doppler-form"); ?> <a href="http://help.fromdoppler.com/en/api-interfaz-de-programacion-de-aplicaciones/?utm_source=wordpress&utm_medium=blog&utm_campaign=plugin"><?php _e("Read this post", "doppler-form"); ?></a><br>
                <small><?php _e("Pst! Remember that this benefit is only available for paid accounts", "doppler-form"); ?></small></p>
              </div>
            </span>
          </div>
					</label>
					<input data-validation-required="<?php _e("Ouch! The field is empty.", "doppler-form"); ?>" <?php echo isset($errorMessages['api_key']) ? "data-validation-fixed='".$errorMessages['api_key']."'" : "";?>"   onfocus="this.placeholder = ''" onblur="this.placeholder = '<?php _e("Enter your API Key.", "doppler-form");?>'" data-validation="noempty" type="text" placeholder="<?php _e("Enter your API Key.", "doppler-form");?>" name="dplr_settings[dplr_option_apikey];"  autocomplete="off" value="<?php echo $options['dplr_option_apikey'];?>" />
          <div class="tooltip-container">
            <span></span>
					</div>
					<!--
          <div class="tooltip-container">
            <span><?php echo isset($errorMessages['user_account']) ? $errorMessages['user_account'] : ''; ?></span>
					</div>
						-->
        </div>
        <button><div class="loading"></div><span><?php _e("CONNECT", "doppler-form"); ?></span></button>
			</form>
			
			<div class="errorMessageBox <?php echo $error?'error':''; ?>"><?php echo $errorMessage; ?></div>
			<div class="loader">Loading...</div>
		</div>
		<?php } ?>
	
	</div>
</section>
