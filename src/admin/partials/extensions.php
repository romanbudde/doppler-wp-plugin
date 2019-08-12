<section class="dplr_settings dplr-extensions">

<div class="wrap dplr_connect text-center">
		
    <h2></h2>
		
    <a href="<?php _e('https://www.fromdoppler.com/en/?utm_source=landing&utm_medium=integracion&utm_campaign=wordpress', 'doppler-form')?>" target="_blank" id="dplr_logo" class="d-inline-block"><img src="<?= plugins_url( '/../img/logo-doppler.svg', __FILE__ ); ?>" alt="Doppler"></a>
    
    <h1 class="size-huge margin-auto mb-1">
        <?php _e("Enjoy our extensions", "doppler-form" ); ?>
    </h1>
    
    <p class="subtitle margin-auto mb-1"><?php _e("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","doppler-form") ;?> :)</p>
                                 
        <div class="dplr-boxes">
                                    
            <div>
                <figure>
                    <img src="<?php echo plugins_url( '/../img/woocommerce-logo.png', __FILE__ ); ?>" alt="<?php _e('Doppler for WooCommerce', 'doppler-form')?>"/>
                </figure>
                <div>
                    <h3><?php _e('Doppler for WooCommerce', 'doppler-form')?></h3>
                    <p>
                        <?php _e('This should be a brief description of the Doppler for WooCommerce extension.', 'doppler-form') ?>
                    </p>
					
					<?php if(!$this->extension_manager->has_dependency('doppler-for-woocommerce')):?>
						<p class="notice notice-error text-small"><?php _e('You should have <a href="https://wordpress.org/plugins/woocommerce/">WooCommerce plugin</a> installed and active first.', 'doppler-form')?></p>
					<?php else: ?>
						<?php if( !$this->extension_manager->is_active('doppler-for-woocommerce')):  ?>
							<button class="dp-button primary-green button-medium" data-extension="doppler-for-woocommerce"><?php _e('Install', 'doppler-form') ?></button>
						<?php else: ?>
							<?php _e('Plugin is installed. Go to <a href="'.admin_url('admin.php?page='.$this->extension_manager->extensions['doppler-for-woocommerce']['settings']).'">settings page</a>.', 'doppler-form') ?>
						<?php endif; ?>
					<?php endif; ?>
                </div>
            </div>
			
			<div>
                <figure>
                    <img src="<?php echo plugins_url( '/../img/learnpress-logo.png', __FILE__ ); ?>" alt="<?php _e('Doppler for LearnPress', 'doppler-form');?>"/>
                </figure>
                <div>
                    <h3><?php _e('Doppler for LearnPress', 'doppler-form');?></h3>
                    <p>
                        <?php _e('This should be a brief description of the Doppler for LearnPress extension.', 'doppler-form') ?>
                    </p>
					
					<?php if(!$this->extension_manager->has_dependency('doppler-for-learnpress')):?>
						<p class="notice notice-error text-small"><?php _e('You should have <a href="https://wordpress.org/plugins/learnpress/">LearnPress plugin</a> installed and active first.', 'doppler-form')?></p>
					<?php else: ?>
						<?php if( !$this->extension_manager->is_active('doppler-for-learnpress')):  ?>
							<button class="dp-button primary-green button-medium" data-extension="doppler-for-learnpress"><?php _e('Install', 'doppler-form') ?></button>
						<?php else: ?>
							<?php _e('Plugin is installed. Go to <a href="'.admin_url('admin.php?page='.$this->extension_manager->extensions['doppler-for-learnpress']['settings']).'">settings page</a>.', 'doppler-form') ?>
						<?php endif; ?>
					<?php endif; ?>
                </div>
            </div>
            
        </div> <!-- fin 3 boxes -->	

</div>	

</section>