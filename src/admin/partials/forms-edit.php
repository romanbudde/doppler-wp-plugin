<?php echo "<script>console.log(".json_encode($form).");</script>"; ?>

<div class="dplr">
  <form class="" method="post">
    <input type="hidden" name="create" value="true">
      <div class="grid">
        <div class="col-4-5 panel nopd">
          <div class="panel-header">
            <h2><?php echo esc_html('Form Basic Information', 'doppler-form')?></h2>
          </div>
          <div class="panel-body">
            <div class="dplr_input_section">
              <label for="title"><?php echo esc_html('Form name', 'doppler-form')?></label>
              <input type="text" name="title" placeholder="" value="<?php echo $form->title; ?>" />
            </div>
            <div class="dplr_input_section">
              <label for="list_id"><?php echo esc_html('Doppler List', 'doppler-form')?></label>
              <select class="" name="list_id" id="list-id">
                <?php for ($i=0; $i < count($dplr_lists); $i++) { ?>
                  <option <?php echo $form->list_id == $dplr_lists[$i]->listId ? 'selected="selected"' : ''; ?> value="<?php echo $dplr_lists[$i]->listId; ?>">
                    <?php echo $dplr_lists[$i]->name; ?>
                  </option>
                <?php } ?>
                </select>
            </div>
          </div>
        </div>
      </div>
      <div class="grid">
          <div class="col-4-5 panel nopd">
            <div class="panel-header">
              <h2><?php echo esc_html('Form Fields', 'doppler-form')?></h2>
            </div>
            <div class="panel-body grid">
              <div class="col-1-2 dplr_input_section">
                <label for="list_id"><?php echo esc_html('Select the fields to include', 'doppler-form')?></label>
                <select id="fieldList" class="" name="">
                  <option value="" ><?php echo esc_html('Select the fields you want to add to your form', 'doppler-form')?></option>
                </select>
              </div>
              <div class="col-1-2">
                <ul class="sortable accordion" id="formFields">

                </ul></div>
            </div>
          </div>
      </div>
      <div class="grid">
        <div class="col-4-5 panel nopd">
          <div class="panel-header">
            <h2><?php echo esc_html('Form settings', 'doppler-form')?></h2>
          </div>
          <div class="panel-body grid">
            <div class="dplr_input_section">
              <label for="submit_text"><?php echo esc_html('Button text', 'doppler-form')?></label>
              <input type="text" name="settings[button_text]" value="<?php echo $form->settings["button_text"] ?>" placeholder="submit"/>
            </div>
            <div class="dplr_input_section">
              <label for="submit_text"><?php echo esc_html('Confirmation message', 'doppler-form')?></label>
              <input type="text" name="settings[message_success]" value="<?=$form->settings["message_success"] ?>"  placeholder="Thanks for Subscribing" />
            </div>
            <div class="dplr_input_section">
              <label for="settings[button_position]"><?php echo esc_html('Button position', 'doppler-form')?></label>
              <?php $button_position = $form->settings["button_position"]; ?>
              <select class="" name="settings[button_position]">
                <option <?php if($button_position == 'left') echo 'selected="selected"';?> value="left"><?php echo esc_html('Left', 'doppler-form')?></option>
                <option <?php if($button_position == 'center') echo 'selected="selected"';?> value="center"><?php echo esc_html('Center', 'doppler-form')?></option>
                <option <?php if($button_position == 'right') echo 'selected="selected"';?> value="right"><?php echo esc_html('Right', 'doppler-form')?></option>
                <option <?php if($button_position == 'fill') echo 'selected="selected"';?> value="fill"><?php echo esc_html('Fill', 'doppler-form')?></option>
              </select>
            </div>
            <div class="dplr_input_section">
              <label for="settings[button_color]"><?php echo esc_html('Button background color', 'doppler-form')?></label>
              <input class="color-selector" type="text" name="settings[button_color]" value="<?php echo $form->settings["button_color"]; ?>">
            </div>
          </div>
        </div>
      </div>
    <input type="submit" value="<?php echo esc_html('Save', 'doppler-form')?>" class="button button-primary"> <a href="<?php echo admin_url('admin.php?page=doppler_forms_submenu_forms')?>"  class="button button-primary"><?php echo esc_html('Cancel', 'doppler-form')?></a>
  </form>
</div>
<script type="text/javascript">
var all_fields = <?php echo json_encode($dplr_fields); ?>;
var form_fields = <?php echo json_encode($fields); ?>;
var fieldsView = new FormFieldsView(all_fields, form_fields, jQuery("#fieldList"), jQuery("#formFields"));
jQuery(".color-selector").colorpicker({color: "<?php echo $form->settings["button_color"]; ?>"});
</script>