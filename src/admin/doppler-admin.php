<?php

/**
 * The admin-specific functionality of the plugin.
 *
 */
class Doppler_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	private $version;

	private $doppler_service;

	private $admin_notice;

	private $success_message;

	private $error_message;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version,  $doppler_service ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->doppler_service = $doppler_service;
		$this->success_message = false;
		$this->error_message = false;
		$this->form_controller = new DPLR_Form_Controller($doppler_service);
		$this->extension_manager = new Doppler_Extension_Manager();
		$this->connection_status = false;
	}

	public function get_version() {
		return $this->version;
	}

	public function set_connection_status($status){
		$this->connection_status = $status;
	}

	public function get_connection_status(){
		return $this->connection_status;
	}

	public function set_error_message($message) {
		$this->error_message = $message;
	}

	public function set_success_message($message) {
		$this->success_message = $message;
	}

	public function get_error_message() {
		return $this->error_message;
	}

	public function get_success_message() {
		return $this->success_message;
	}

	public function display_error_message() {
		if($this->get_error_message()!=''):
		?>
		<div id="displayErrorMessage" class="messages-container blocker">
			<p><?php echo $this->get_error_message(); ?></p>
		</div>
		<?php
		endif;
	}

	public function display_success_message() {
		if($this->get_success_message()!=''):
		?>
		<div id="displaySuccessMessage" class="messages-container info">
			<p><?php echo $this->get_success_message(); ?></p>
		</div>
		<?php
		endif;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/doppler-form-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'jquery-ui-dialog', includes_url() . 'css/jquery-ui-dialog.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/doppler-form-admin.js', array( 'jquery', 'jquery-ui-sortable' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'object_string', array( 
			'Delete'   	=> __( 'Delete', 'doppler-form' ),
			'Cancel'    => __( 'Cancel', 'doppler-form'),
			'ConnectionErr' 	=> __( 'Ouch! There\'s something wrong with your Username or API Key. Please, try again.', 'doppler-form'),
			'listSavedOk'   	=> __( 'The List has been created correctly.', 'doppler-form'),
			'maxListsReached' 	=> __( 'Ouch! You\'ve reached the maximum number of Lists created.', 'doppler-form'),
			'duplicatedName'	=> __( 'Ouch! You\'ve already used this name for another List.', 'doppler-form'),	
			'tooManyConn'		=> __( 'Ouch! You\'ve made several actions in a short period of time. Please wait a few minutes before making another one.', 'doppler-form'),
			'validationError'	=> __( 'Ouch! The List name is invalid. Please choose another.', 'doppler-form'),
			'APIConnectionErr'  => __( 'Ouch! An error ocurred while trying to communicate with the API. Try again later.' , 'doppler-form'),
			'installing' 		=> __( 'Installing', 'doppler-form'),
			'wrongCredentials'  => __( 'Ouch! There\'s something wrong with your Username or API Key. Please, try again.', 'doppler-form'),
			'CannotDeleteSubscribersListWithAnAssociatedForm' => __('Ouch! The List is associated with a Form. To delete it, go to Doppler and disassociate them.', 'doppler-form'),
			'CannotDeleteSubscribersListWithAnScheduledCampaign' => __('Ouch! The List is associated to a Campaign in sending process.', 'doppler-form'),
			'CannotDeleteSubscribersListWithAnAssociatedSegment' => __('Ouch! The List has associated Segments. To delete it, go to Doppler and disassociate them.', 'doppler-form'),
			'CannotDeleteSubscribersListWithAnAssociatedEvent' => __('Ouch! The List is associated with an active Automation. To delete it, go to Doppler and disassociate them.', 'doppler-form'),
			'CannotDeleteSubscribersListWithAnAssociatedIntegration' => __('Ouch! The List is associated with an active integration. To delete it, go to Doppler and disconnect the integration.', 'doppler-form'),
			'CannotDeleteSubscribersListInMergingProcess' => __('Ouch! The List is in the process of union with another one.', 'doppler-form'),
			'CannotDeleteSubscribersListInSegmentGenerationProcess'	=> __('Ouch! The List is still in the process of being created.', 'doppler-form'),
			'CannotDeleteSubscribersListInImportSubscribersProcess' => __('Ouch! The List is in the process of loading.', 'doppler-form'),
			'CannotDeleteSubscribersListInExportSubscribersProcess' => __('Ouch! the list is in process of being exported.', 'doppler-form'),
			'CannotDeleteSubscribersListInDeletingProcess' => __('Ouch! The List is in the process of being deleted.', 'doppler-form'),
		) ); 
		wp_enqueue_script('field-module', plugin_dir_url( __FILE__ ) . 'js/field-module.js', array($this->plugin_name), $this->version, false);
		wp_localize_script( 'field-module', 'ObjStr', array( 
			'editField'   		=> __( 'Edit Field', 'doppler-form' ),
			'Required'    		=> __( 'Required', 'doppler-form'),
			'LabelToShow' 		=> __( 'Label to be shown', 'doppler-form'),
			'Placeholder' 		=> __( 'Placeholder', 'doppler-form'),
			'Description' 		=> __( 'Description', 'doppler-form'),
			'TextType'    		=> __( 'Lines', 'doppler-form'),
			'OneSingleLine' 	=> __( 'Simple', 'doppler-form'),
			'MultipleLines' 	=> __( 'Multiple', 'doppler-form'),
		) );
		wp_enqueue_script('jquery-colorpicker', plugin_dir_url( __FILE__ ) . 'js/colorpicker.js', array($this->plugin_name), $this->version, false);
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-dialog');
		
	}

	public function init_widget() {
		require_once(plugin_dir_path( __FILE__ ) . "../includes/class-doppler-form-widget.php");
		register_widget('Dplr_Subscription_Widget');
	}
	
	public function init_settings(){
		register_setting('dplr_plugin_options', 'dplr_settings');
	}

	public function init_menu() {
		add_menu_page(
			__('Doppler', 'doppler-form'),
		  __('Doppler', 'doppler-form'),
			'manage_options',
			'doppler_forms_menu',
			array($this, "display_connection_screen"),
			plugin_dir_url( __FILE__ ) . 'img/icon-doppler-menu.png'
		);
	}

	/**
	 * Checks if credentials are saved, 
	 * doesnt check against API anymore to reduce requests.
	 */
	public function is_api_connected(){

		if( $this->check_connection_status() && current_user_can('manage_options') ){
			$this->set_connection_status(true);
			return true;
		}
		return false;
	}

	public function add_submenu() {

		$options = get_option('dplr_settings', [
		'dplr_option_apikey' => '',
		'dplr_option_useraccount' => ''
		]);

		add_submenu_page(
			'doppler_forms_menu',
			__('Connect with Doppler', 'doppler-form'),
			__('Connect with Doppler', 'doppler-form'),
			'manage_options',
			'doppler_forms_menu',
			array($this, 'display_connection_screen')
		);

		if ( $this->is_api_connected() && $options['dplr_option_apikey'] != '' &&  !empty($options['dplr_option_useraccount']) ){
			
			add_submenu_page(
				'doppler_forms_menu',
				__('Doppler Forms', 'doppler-form'),
				__('Doppler Forms', 'doppler-form'),
				'manage_options',
				'doppler_forms_main',
				array($this, 'doppler_forms_screen')
			);

			
			add_submenu_page(
				'doppler_forms_menu',
				__('Extensions', 'doppler-form'),
				__('Extensions', 'doppler-form'),
				'manage_options',
				'doppler_forms_extensions',
				array($this, 'doppler_extensions_screen')
			);

			do_action('dplr_add_extension_submenu');
		
		}
	
	}

	/**
	 * Displays connection form and handles connection with API 
	 * Check credentials with API, then save credentials.
	 * On failing, credentials wont be saved and plugin will
	 * check for filled credentials, to avoid api calls.
	 */
	public function display_connection_screen() {

		$options = get_option('dplr_settings', [
			'dplr_option_apikey' => '',
			'dplr_option_useraccount' => ''
			]);

		$connected = false;
		$errors = false;
		$error = '';

	  if (!empty($options['dplr_option_apikey'])) {

		try{
				//Credentials are saved. Check against API only in connection screen.
				if($this->doppler_service->setCredentials(['api_key' => $options['dplr_option_apikey'], 'user_account' => $options['dplr_option_useraccount']])){
					//neccesary check against api here?
					$connection_status = $this->doppler_service->connectionStatus();

					if( is_array($connection_status) && $connection_status['response']['code'] === 200 ){
						$connected = true;
					}
				}
				//If saved credentials don't pass API test, unset them, disconnect and show error.
				if ($connected !== true) {
					$this->doppler_service->unsetCredentials();
					$error = true;
					$errorMessage = __("Ouch! There's something wrong with your Username or API Key. Please, try again.", "doppler-form");
				}else{
					delete_option('dplr_2_0_updated');
				}

			} catch(Doppler_Exception_Invalid_APIKey $e) {
				
				$errors = true;
				$errorMessages['api_key'] = __("Ouch! Enter a valid Email.", "doppler-form");
			
			} catch(Doppler_Exception_Invalid_Account $e) {
				
				$errors = true;
				$errorMessages['user_account'] = __("Ouch! The field is empty.", "doppler-form");
			
			}
		
		}
		
		include "partials/api-connection.php";
	}

	public function doppler_forms_screen() {

		(!isset($_GET['tab']))? $active_tab = 'forms' : $active_tab = $_GET['tab'];

		if(!empty($_POST)){
			if(isset($_POST['form-create'])){
				if($this->form_controller->create($_POST) == 1){
					$this->set_success_message(__('Pst! Go to', 'doppler-form') . ' <a href="' .  admin_url( 'widgets.php') . '">'. __('Appearance > Widgets', 'doppler-form') . '</a> '  . __('to choose the place on your Website where you want your Form to appear.','doppler-form'));
				}else{
					$this->set_error_message(__('Ouch! An error ocurred and the Form couldn\'t be created. Try again later.','doppler-form'));
				}
			}
			if(isset($_POST['form-edit'])){
				if($this->form_controller->update($_POST['form_id'], $_POST) == 1){
					$this->set_success_message(__('The Form has been edited correctly.','doppler-form'));
				}else{
					$this->set_error_message(__('Ouch! An error ocurred and the Form couldn\'t be edited. Try again later.','doppler-form'));
				}
			}
		}

		if( !empty($_GET['action']) && $_GET['action'] === 'delete' ){
			if( !empty($_GET['form_id']) && $this->form_controller->delete($_GET['form_id']) == 1 ){
				$this->set_success_message(__('The Form has been deleted correctly.','doppler-form'));
			}else{
				$this->set_error_message(__('Ouch! An error ocurred and the Form couldn\'t be deleted. Try again later.','doppler-form'));
			}
		}


		if($active_tab == 'forms'){
			$forms = $this->form_controller->getAll();
			$create_form_url = admin_url( 'admin.php?page=doppler_forms_main&tab=new');
			$edit_form_url = admin_url( 'admin.php?page=doppler_forms_main&tab=edit&form_id=[FORM_ID]' );
			$delete_form_url = admin_url( 'admin.php?page=doppler_forms_main&action=delete&form_id=[FORM_ID]' );
			$list_resource = $this->doppler_service->getResource('lists');
			$dplr_lists = $list_resource->getAllLists();
			if(is_array($dplr_lists)){
				foreach($dplr_lists as $k=>$v){
					if(is_array($v)):
					foreach($v as $i=>$j){
						$dplr_lists_aux[$j->listId] = trim($j->name);
					}
					endif;
				}
				$dplr_lists_arr = $dplr_lists_aux;
			}
		}

		require_once('partials/doppler-forms-display.php');

	}

	public function doppler_extensions_screen() {
		require_once('partials/extensions.php');
	}

	public function show_admin_notices() {

		$options = get_option('dplr_settings');

		if( '1' === get_option('dplr_2_0_updated') && !$options['dplr_option_useraccount'] ):
		?>	
			<div class="notice notice-warning is-dismissible">
				<p>
					<?php _e( 'You\'ve updated the <strong>Doppler Forms</strong> plugin into the <strong>2.0.0</strong> version. Please,', 'doppler-form');?>
					<a href="<?= admin_url( 'admin.php?page=doppler_forms_menu' )?>">
						<?php _e('enter your Username', 'doppler-form')?>
					</a> <?php _e('in addition to the API Key and re-connect your Doppler account.', 'doppler-form' ); ?>
				</p>
			</div>
		<?php
		endif;

	}

	/**
	 * Check connection status. Doesnt check against 
	 * API anymore to reduce requests.
	 */
	public function check_connection_status() {

		$options = get_option('dplr_settings');

		if ( ! is_admin() ||  empty($options) ) {
			return false;
		}

		isset($options['dplr_option_useraccount'])? $user = $options['dplr_option_useraccount'] : '';
		isset($options['dplr_option_apikey'])? 		$key = $options['dplr_option_apikey'] : '';

		if( !empty($user) && !empty($key) ){
			if(empty($this->doppler_service->config['crendentials'])){
				$this->doppler_service->setCredentials(array('api_key' => $key, 'user_account' => $user));
			}
			return true;
		}

		return false;

	}

	/**
	 * Called upon user pressing the connect button.
	 * Check if user is valid, then it continues
	 * the form submission and save the settings.
	 */
	public function ajax_connect() {
		if( empty($_POST['key']) || empty($_POST['user']) ) return false;
		$this->doppler_service->setCredentials(['api_key' => $_POST['key'], 'user_account' => $_POST['user']]);
		$connection_status = $this->doppler_service->connectionStatus();
		if( is_array($connection_status)){
			echo json_encode($connection_status);
			exit();
		}
	}

	/**
	 * Set the credentials to doppler service
	 * before running ajax calls.
	 */
	private function set_credentials(){

		$options = get_option('dplr_settings');

		if ( ! is_admin() ||  empty($options) ) {
			return;
		}

		$this->doppler_service->setCredentials(array(	
			'api_key' => $options['dplr_option_apikey'], 
			'user_account' => $options['dplr_option_useraccount'])
		);
	
	}

	public function ajax_delete_form() {
		if(empty($_POST['listId'])) return false;
		$this->set_credentials();
		echo $this->form_controller->delete($_POST['listId']);
		wp_die();
	}

	/**
	 * CRUD
	 */
	public function ajax_get_lists() {
		$this->set_credentials();
		echo json_encode($this->get_lists_by_page($_POST['page'], $_POST['per_page']));
		wp_die();
	}

	public function ajax_save_list() {
		if(empty($_POST['listName'])) return false;
		$this->set_credentials();
		echo $this->create_list($_POST['listName']);
		wp_die();
	}

	public function ajax_delete_list() {
		if(empty($_POST['listId'])) return false;
		$this->set_credentials();
		$subscribers_lists = get_option('dplr_subscribers_list');
		$subscriber_resource = $this->doppler_service->getResource('lists');
		echo json_encode($subscriber_resource->deleteList( $_POST['listId'] ));
		wp_die();
	}

	public function get_lists_by_page( $page = 1, $per_page ) {
		$list_resource = $this->doppler_service->getResource( 'lists' );
		return $list_resource->getListsByPage( $page , $per_page );
	}

	private function create_list($list_name) {
		$subscriber_resource = $this->doppler_service->getResource('lists');
		return $subscriber_resource->saveList( $list_name )['body'];
	}

}