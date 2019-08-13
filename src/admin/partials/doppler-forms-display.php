<?php

if ( ! current_user_can( 'manage_options' ) ) {
    return;
}


if($this->connectionStatus):
    
?>

<div class="wrap dplr_settings">

	<a href="<?php _e('https://www.fromdoppler.com/en/?utm_source=landing&utm_medium=integracion&utm_campaign=wordpress', 'doppler-form')?>" target="_blank" class="dplr-logo-header">
		<img id="" src="<?php echo DOPPLER_PLUGIN_URL?>admin/img/logo-doppler.svg" alt="Doppler logo"/>
	</a>

    <h2 class="main-title"><?php _e('Doppler Forms', 'doppler-form')?> <?php echo $this->get_version()?></h2> 

    <?php
    if( $active_tab == 'forms' || $active_tab == 'lists'){
        include plugin_dir_path( __FILE__ ) . "../partials/tabs-nav.php";
    }
    ?>

<?php

switch($active_tab){
    case 'forms':
        include plugin_dir_path( __FILE__ ) . "../partials/forms-list.php";
        break;
    case 'new':
        $this->form_controller->showCreateEditForm();
        break;
    case 'edit':
        $this->form_controller->showCreateEditForm($_GET['form_id']);
        break;
    case 'lists':
        include plugin_dir_path( __FILE__ ) . "../partials/lists-crud.php";
        break;
    default:
        break;
}

else:

    ?>
    <div class="notice notice-error"><?php echo $this->admin_notice[1]?></div>
    <?php

endif;