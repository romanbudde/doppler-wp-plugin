<section class="dplr_settings theme_dplr">
	<div class="wrap">
		<h2></h2>
		<a href="<?php _e('https://www.fromdoppler.com/en/?utm_source=landing&utm_medium=integracion&utm_campaign=wordpress', 'doppler-form')?>" target="_blank"><img id="dplr_logo" src="<?= plugins_url( '/../img/logo-doppler.svg', __FILE__ ); ?>" alt="Doppler"></a>
		<?php
		if ($connected) { ?>
		<h1><?php _e("Successful connection!", "doppler-form" ); ?></h1>
		<p class="subtitle"><?php _e("Your account is now officially connected","doppler-form") ;?> :)</p>
		<div class="disconnect_box">
			<form method="POST" action="options.php" >
				<?php settings_fields('dplr_plugin_options'); ?>
				<input type="hidden" name="dplr_settings[action]" value="disconnect" />
				<span><button class="dplr_button button--small button--fourth"><?php _e("Disconnect", "doppler-form"); ?></button></span>
			</form>
		</div>
		<div class="updated_message">
			<img width="54" src="<?= plugins_url( '/../img/ok-message.svg', __FILE__ ); ?>" alt="">
			<hr/>
			<div class="dplr-pasos">
				<h2><?php _e('You are almost done! Follow this steps', 'doppler-form')?></h2>
				<div><!-- 3 boxes -->
					<div>
						<figure>
							<img src="<?= plugins_url( '/../img/'.__('screenshot-1.png', 'doppler-form'), __FILE__ ); ?>" alt="step 1"/>
						</figure>
						<span>
							1.
						</span>
						<p>
						<?php 
							_e('Go to Doppler Forms > Create Form.', 'doppler-form');
						?>
						</p>
					</div>
					<div>
						<figure>
							<img src="<?= plugins_url( '/../img/'.__('screenshot-2.png', 'doppler-form'), __FILE__ ); ?>" alt="step 2"/>
						</figure>
						<span>
							2.
						</span>
						<p>
						<?php 
							_e('Go to Appearance > Widgets > Doppler Form and select where do you want the forms to be displayed.', 'doppler-form');
						?>
						</p>
					</div>
					<div>
						<figure>
							<img src="<?= plugins_url( '/../img/'.__('screenshot-3.png', 'doppler-form'), __FILE__ ); ?>" alt="step 3"/>
						</figure>
						<span>
							3.
						</span>
						<p>
						<?php 
							_e('Done! You should now see your Form published on your website.', 'doppler-form');
						?>
						</p>
					</div>
				</div> <!-- fin 3 boxes -->
			</div> <!-- fin dplr_pasos -->
		</div> <!-- fin updated message -->
		<?php } else {?>
		<h1><?php _e("Connect your WordPress Forms with Doppler", "doppler-form" ); ?></h1>
		<p class="subtitle"><?php _e("Create Subscription Forms that respect your Website styles and automatically send your new Subscribers from WordPress to Doppler Lists.","doppler-form") ;?>
		<div class="dplr_form_wrapper" >
			<form method="POST" action="options.php" id="dplr_apikey_options" class="<?= $error?'error':''; ?>">
				<?php settings_fields('dplr_plugin_options'); ?>
        <div class="input-container input-horizontally input-text tooltip tooltip-warning <?= (isset($errorMessages['user_account']) || $error)  ? 'tooltip-initial input-error' : 'tooltip-hide'; echo $options['dplr_option_useraccount'] ? ' notempty' : ''; ?>">
          <label><?php _e('Username', 'doppler-form');?></label>
					<input class="validation"  data-validation-email="<?php _e("Ouch! Enter a valid Email.", "doppler-form"); ?>" <?= isset($errorMessages['user_account']) ? "data-validation-fixed='".$errorMessages['user_account']."'" : "";?> type="text" placeholder="" name="dplr_settings[dplr_option_useraccount];"  autocomplete="off" value="<?= $options['dplr_option_useraccount'];?>" />
					<div class="tooltip-container">
            <span></span>
          </div>
        </div>
        <div class="input-container input-horizontally input-text input-icon tooltip tooltip-warning <?= isset($errorMessages['api_key']) ? 'input-error' : 'tooltip-hide'; echo $options['dplr_option_apikey'] ? ' notempty' : ''; ?>">
					<label>API Key 
					<div class="icon">
            <span class="tooltip tooltip-info tooltip-top tooltip-hover">?
              <div class="tooltip-container">
                <p>
									<?php _e("How do you find your API KEY? Press", "doppler-form"); ?> <a href="<?php _e('https://help.fromdoppler.com/en/where-do-i-find-my-api-key/?utm_source=landing&utm_medium=integracion&utm_campaign=wordpress', 'doppler-form')?>"><?php _e("HELP", "doppler-form"); ?></a>.<br>
                </p>
              </div>
            </span>
          </div>
					</label>
					<input data-validation-required="<?php _e("Ouch! The field is empty.", "doppler-form"); ?>" <?= isset($errorMessages['api_key']) ? "data-validation-fixed='".$errorMessages['api_key']."'" : "";?>  data-validation="noempty" type="text" placeholder="" name="dplr_settings[dplr_option_apikey];"  autocomplete="off" value="<?= $options['dplr_option_apikey']; ?>" />
          <div class="tooltip-container">
            <span></span>
					</div>
        </div>
        <button>
					<div class="loading"></div>
					<span><?php _e("CONNECT", "doppler-form"); ?></span>
				</button>
			</form>

			<?php if($error): ?>
			<div class="tooltip tooltip-warning tooltip--user_api_error">
				<div class="tooltip-container">
            <span><?= $errorMessage  ?></span>
				</div>
			</div>
			<?php endif;?>
		
			<div class="loader">Loading...</div>
		</div>

		<p>
				<?php _e("Do you have any doubts about how to connect your Forms with Doppler? Press", "doppler-form")?>
				<?= '<a href="'.__('https://help.fromdoppler.com/en/how-to-integrate-wordpress-forms-with-doppler?utm_source=landing&utm_medium=integracion&utm_campaign=wordpress','doppler-form').'" target="blank">'.__('HELP','doppler-form').'</a>'?>.
		</p>
		<?php } ?>
	
	</div>
</section>