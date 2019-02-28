<div class="dplr">
  <form class="" method="post">
    <input type="hidden" name="create" value="true">
    <div class="grid">
      <div class="col-4-5 panel nopd">
        <div class="panel-header">
          <h2><?php _e('Form Basic Information', 'doppler-form')?></h2>
        </div>
        <div class="panel-body">
          <div class="dplr_input_section">
            <label for="name"><?php _e('Form name', 'doppler-form')?></label>
            <input type="text" name="name" placeholder="" value="" required/>
          </div>
          <div class="dplr_input_section">
            <label for="title"><?php _e('Form title', 'doppler-form')?></label>
            <input type="text" name="title" placeholder="" value=""/>
          </div>
          <div class="dplr_input_section">
            <label for="list_id"><?php _e('Doppler List', 'doppler-form')?></label>
            <select class="" name="list_id" id="list-id" required>
              <option value=""></option>
              <?php for ($i=0; $i < count($dplr_lists); $i++) { ?>
              <option value="<?php echo $dplr_lists[$i]->listId; ?>"><?php echo $dplr_lists[$i]->name; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="grid">
      <div class="col-4-5 panel nopd">
        <div class="panel-header">
          <h2><?php _e('Form Fields', 'doppler-form')?></h2>
        </div>
        <div class="panel-body grid">
          <div class="col-1-2 dplr_input_section">
            <label for="list_id"><?php _e('Select the fields to include', 'doppler-form')?></label>
            <select id="fieldList" class="" name="">
              <option value="" disabled selected hidden><?php _e('Select the fields you want to add to your form', 'doppler-form')?></option>
            </select>
          </div>
          <div class="col-1-2">
            <ul class="sortable accordion" id="formFields">
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="grid">
      <div class="col-4-5 panel nopd">
        <div class="panel-header">
          <h2><?php _e('Form settings', 'doppler-form')?></h2>
        </div>
        <div class="panel-body grid">
          <div class="dplr_input_section">
            <label for="submit_text"><?php _e('Button text', 'doppler-form')?></label>
            <input type="text" name="settings[button_text]" value="" placeholder="<?php _e('Submit', 'doppler-form')?>"/>
          </div>
          <div class="dplr_input_section">
            <label for="submit_text"><?php _e('Confirmation message', 'doppler-form')?></label>
            <input type="text" name="settings[message_success]" value="" placeholder="<?php _e('Thanks for subscribing', 'doppler-form')?>"/>
          </div>
          <div class="dplr_input_section">
            <label for="settings[button_position]"><?php _e('Button position', 'doppler-form')?></label>
            <select class="" name="settings[button_position]">
              <option value="left"><?php _e('Left', 'doppler-form')?></option>
              <option value="center"><?php _e('Center', 'doppler-form')?></option>
              <option value="right"><?php _e('Right', 'doppler-form')?></option>
              <option value="fill"><?php _e('Fill', 'doppler-form')?></option>
            </select>
          </div>
          <div class="dplr_input_section">
            <label for="settings[change_button_bg]"><?php _e('Button background color', 'doppler-form')?></label>
            <?php _e('Use my theme\'s default color', 'doppler-form')?><input type="radio" name="settings[change_button_bg]" class="dplr-toggle-selector" value="no" checked>&nbsp; 
            <?php _e('Choose another color', 'doppler-form')?><input type="radio" name="settings[change_button_bg]" class="dplr-toggle-selector" value="yes"> 
            <input class="color-selector" type="hidden" name="settings[button_color]" value="">   
          </div>
          <div class="dplr_input_section">
            <label for="settings[use_consent_field]"><?php _e('¿Use consent field?', 'doppler-form')?></label>
            <?php _e('Yes', 'doppler-form')?><input type="radio" name="settings[use_consent_field]" class="dplr-toggle-consent" value="yes" checked>&nbsp; 
            <?php _e('No', 'doppler-form')?><input type="radio" name="settings[use_consent_field]" class="dplr-toggle-consent" value="no"> 
          </div>
        </div>
      </div>
    </div>
    <div class="grid" id="dplr_consent_section">
      <div class="col-4-5 panel nopd">
        <div class="panel-header">
          <h2><?php _e('Consent field settings', 'doppler-form')?></h2>
        </div>
        <div class="panel-body grid">
            <div class="dplr_input_section">
              <label for="settings[consent_field_text]"><?php _e('Checkbox label', 'doppler-form')?></label>
              <input type="text" name="settings[consent_field_text]" value="" placeholder="<?php _e("I've read and accept the privace policy", "doppler-form")?>"/>
            </div>
            <div class="dplr_input_section">
              <label for="settings[consent_field_url]">
                <?php _e('Enter the URL of your privacy policy. Do you want to know more? Press ', 'doppler-form'); ?> 
                <?= '<a href="'.esc_url('https://help.fromdoppler.com/es/reglamento-general-de-proteccion-de-datos').'" target="blank">'.__('HELP','doppler-form').'</a>'?>
              </label>
              <input type="url" name="settings[consent_field_url]" pattern="https?://.+" value="" placeholder="<?php esc_html_e("https://www.mysite.com", "doppler-form")?>"/>
            </div>
        </div>
      </div>
    </div>
    <input type="submit" value="<?php _e('Save', 'doppler-form')?>" class="button button-primary"> <a href="<?php echo admin_url('admin.php?page=doppler_forms_submenu_forms')?>"  class="button button-primary"><?php _e('Cancel', 'doppler-form')?></a>
  </form>
</div>
<script type="text/javascript">
var all_fields = <?php echo json_encode($dplr_fields); ?>;
all_fields = jQuery.grep(all_fields, function(el, idx) {return el.type == "consent"}, true)
var form_fields = [];
var view = new FormFieldsView(all_fields, form_fields, jQuery("#fieldList"), jQuery("#formFields"));
jQuery(".color-selector").colorpicker();
</script>