<?php

if ( ! current_user_can( 'manage_options' ) ) {
    return;
}


if($this->connectionStatus):
    
?>

<div class="wrap dplr_settings">

    <h2><?php _e('Doppler Forms', 'doppler-form')?> <?php echo $this->get_version()?></h2> 

    <h2 class="nav-tab-wrapper">
        <a href="?page=doppler_forms_main&tab=forms" class="nav-tab <?php echo $active_tab == 'forms' ? 'nav-tab-active' : ''; ?>"><?php _e('Forms', 'doppler-form')?></a>
        <a href="?page=doppler_forms_main&tab=new" class="nav-tab <?php echo $active_tab == 'new' ? 'nav-tab-active' : ''; ?>"><?php _e('Create Form', 'doppler-form')?></a>
        <a href="?page=doppler_forms_main&tab=lists" class="nav-tab <?php echo $active_tab == 'lists' ? 'nav-tab-active' : ''; ?>"><?php _e('Manage Lists', 'doppler-form')?></a>
    </h2>

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