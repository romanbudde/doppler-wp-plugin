<h1><?php _e('Created Forms', 'doppler-form')?></h1>
<div class="dplr">
  <div class="panel">
    <div class="">
      <table class="fixed">
        <thead>
          <tr>
            <th class="col-id"><?php _e('Form ID', 'doppler-form')?></th>
            <th class="col-title"><?php _e('Form Name', 'doppler-form')?></th>
            <th class="col-listname"><?php _e('List Name', 'doppler-form')?></th>
            <th class="col-listid"><?php _e('List ID', 'doppler-form')?></th>
          </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i <count($forms) ; $i++) {
            $form = $forms[$i];?>
          <tr>
            <td><?= $form->id; ?></td>
            <td>
              <a href="<?php echo str_replace('[FORM_ID]', $form->id , $edit_form_url); ?>" class="bold"> <?php echo $form->name; ?></a>
              <div class="column-actions">
                <a href="<?php echo str_replace('[FORM_ID]', $form->id , $edit_form_url); ?>"><?php _e('Edit', 'doppler-form')?></a> |
                <a href="<?php echo str_replace('[FORM_ID]', $form->id , $delete_form_url); ?>" class="dplr-remove"><?php _e('Delete', 'doppler-form')?></a>
              </div>
            </td>
            <td><?php echo $dplr_lists_arr[$form->list_id] ?></td>
            <td><?php echo isset($dplr_lists_arr[$form->list_id])? $form->list_id : '' ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<a href="<?php echo $create_form_url; ?>" class="button button-primary"><?php _e('Create Form', 'doppler-form')?></a>

<div id="dplr-dialog-confirm" title="<?php _e('Are you sure you want to delete the Form? ', 'doppler-form'); ?>">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span> <?php _e('It\'ll be deleted and can\'t be recovered.', 'doppler-form')?></p>
</div>