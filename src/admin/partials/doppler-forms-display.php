<?php

if ( ! current_user_can( 'manage_options' ) ) {
    return;
}
   
if( isset($_GET['tab']) ) {
    $active_tab = $_GET['tab'];
 }else{
    $active_tab = 'forms';
} 

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
        $this->form_controller->getAll();
        break;
    case 'new':
        $this->form_controller->create($_POST);
        break;
    case 'lists':
        break;
    default:
        break;
}

/*
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'list':
        $this->form_controller->getAll();
        break;
    case 'create':
        $this->form_controller->create($_POST);
        break;
    case 'edit':
        $this->form_controller->update($_GET['form_id'], $_POST);
        break;
    case 'delete':
        $this->form_controller->delete($_GET['form_id']);
        break;
}
*/

