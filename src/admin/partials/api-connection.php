<section class="dplr_settings theme_dplr">
	<div class="wrap">
		<a href="http://www.fromdoppler.com" target="_blank"><img id="dplr_logo" src="<?php echo plugins_url( '/../img/logo-doppler.svg', __FILE__ ); ?>" alt="Doppler"></a>
		<h1><?php _e("Conecta con Doppler y crea tus formularios desde wordpress", "doppler-form" ); ?></h1>
		<p class="subtitle"><?php _e("Crea formularios que se adapten automáticamente a los estilos de tu sitio y envía tus nuevos contactos desde wordpress automáticamente a tus Listas de Doppler. Lo único que necesitas hacer es ingresar tu usuario y API key para conectarte.","doppler-form") ;?>			<?php
		if ($connected) { ?>
		<div class="disconnect_box">
			<form method="POST" action="options.php" >
				<?php settings_fields('dplr_plugin_options'); ?>
				<input type="hidden" name="dplr_settings[action]" value="disconnect" />
				<span><i><?php _e("Your account is connected", "doppler-form"); ?></i><button class="button button--small button--fourth"><?php _e("Disconnect", "doppler-form"); ?></button></span>
			</form>
		</div>
		<div class="updated_message">
			<img width="54" src="<?php  echo plugins_url( '/../img/check.png', __FILE__ ); ?>" alt="">
			<p style="color:#65BF92; font-family: 'Proxima Nova', Arial; font-size: 16px; line-height:21px;"><i>
				<?php _e("The process was a success! Your API Key is officially connected.", "doppler-form"); ?>
			</i></p>
			<img width="860" src="<?php  echo plugins_url( '/../img/bar.png', __FILE__ ); ?>" style="margin: 30px 0 5px 0;" alt="">
			<p style="color: #525843; font-size:16px; line-height: 21px; font-family: 'Proxima Nova', Arial; max-width:860px; width: 100%; display: inline-block;">
				<?php _e("You're almost there! Go to the tab", "doppler-form"); ?> <img width="18px" src="<?php  echo plugins_url( '/../img/icon.png', __FILE__ ); ?>" alt=""><?php _e("<b>Appearance>Widgets>Doppler Form</b> and choose the Lists where your new Subscribers will be saved", "doppler-form"); ?>
			</p>
		</div>
		<?php } else {?>

		<div class="dplr_form_wrapper" >
			<form method="POST" action="options.php" id="dplr_apikey_options" class="<?php echo $error?'error':''; ?>">
				<?php settings_fields('dplr_plugin_options'); ?>
        <div class="input-container input-horizontally input-text tooltip tooltip-warning <?php echo isset($errorMessages['user_account']) ? 'tooltip-initial input-error' : 'tooltip-hide'; echo $options['dplr_option_useraccount'] ? ' notempty' : ''; ?>">
          <label>Email</label>
					<input class="validation"  onfocus="this.placeholder = ''" data-validation-email="<?php _e("Ouch! Enter a valid Email address.", "doppler-form"); ?>" <?php echo isset($errorMessages['user_account']) ? "data-validation-fixed='".$errorMessages['user_account']."'" : "";?>" onblur="this.placeholder = '<?php _e("Tu usuario de Doppler ;)", "doppler-form");?>'" type="text" placeholder="<?php _e("Tu usuario de Doppler ;)", "doppler-form");?>" name="dplr_settings[dplr_option_useraccount];"  autocomplete="off" value="<?php echo $options['dplr_option_useraccount'];?>" />
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
