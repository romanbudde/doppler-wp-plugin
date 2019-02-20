<div class="dplr">
  <form class="" method="post">
    <input type="hidden" name="create" value="true">
    <div class="grid">
      <div class="col-4-5 panel nopd">
        <div class="panel-header">
          <h2>Form Basic Information</h2>
        </div>
        <div class="panel-body">
          <div class="dplr_input_section">
            <label for="title">Form name</label>
            <input type="text" name="title" placeholder="" value="" />
          </div>
          <div class="dplr_input_section">
            <label for="list_id">Doppler List</label>
            <select class="" name="list_id" id="list-id">
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
          <h2>Form Fields</h2>
        </div>
        <div class="panel-body grid">
          <div class="col-1-2 dplr_input_section">
            <label for="list_id">Select the fields to include</label>
            <select id="fieldList" class="" name="">
              <option value="" disabled selected hidden>select the fields you want to add to your form</option>
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
          <h2>Form settings</h2>
        </div>
        <div class="panel-body grid">
          <div class="dplr_input_section">
            <label for="submit_text">Text to show in button</label>
            <input type="text" name="settings[button_text]" value="" placeholder="submit"/>
          </div>
          <div class="dplr_input_section">
            <label for="submit_text">Message success submit</label>
            <input type="text" name="settings[message_success]" value="" placeholder="Thanks for Subscribing"/>
          </div>
          <div class="dplr_input_section">
            <label for="settings[button_position]">Select a position</label>
            <select class="" name="settings[button_position]">
              <option value="left">Left</option>
              <option value="center">Center</option>
              <option value="right">Right</option>
              <option value="fill">Fill</option>
            </select>
          </div>
          <div class="dplr_input_section">
            <label for="settings[button_color]">Color Background</label>
            <input class="color-selector" type="text" name="settings[button_color]" value="">
          </div>
        </div>
      </div>
    </div>
    <input type="submit" value="ok" class="button button-primary">
  </form>
</div>
<script type="text/javascript">
var all_fields = <?php echo json_encode($dplr_fields); ?>;
var form_fields = [];
var view = new FormFieldsView(all_fields, form_fields, jQuery("#fieldList"), jQuery("#formFields"));
jQuery(".color-selector").colorpicker();
</script>
