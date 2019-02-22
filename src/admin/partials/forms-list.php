<h1><?php echo esc_html('Forms List', 'doppler-form')?></h1>
<div class="dplr">
  <div class="panel">
    <div class="">
      <table class="fixed">
        <thead>
          <tr>
            <th class="cb"><input type="checkbox" name="" value=""></th>
            <th class="col-id"><?php echo esc_html('Id', 'doppler-form')?></th>
            <th class="col-title"><?php echo esc_html('Title', 'doppler-form')?></th>
            <th class="col-listname"><?php echo esc_html('List Name', 'doppler-form')?></th>
            <th class="col-listid"><?php echo esc_html('List Id', 'doppler-form')?></th>
          </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i <count($forms) ; $i++) {
            $form = $forms[$i];?>
          <tr>
            <td><input type="checkbox" name="" value=""></td>
            <td><?php echo $form->id; ?></td>
            <td>
              <a href="<?php echo str_replace('[FORM_ID]', $form->id , $edit_form_url); ?>" class="bold"> <?php echo $form->title; ?></a>
              <div class="column-actions">
                <a href="<?php echo str_replace('[FORM_ID]', $form->id , $edit_form_url); ?>"><?php echo esc_html('Edit', 'doppler-form')?></a> |
                <a href="<?php echo str_replace('[FORM_ID]', $form->id , $delete_form_url); ?>"><?php echo esc_html('Delete', 'doppler-form')?></a>
              </div>
            </td>
            <td><?php echo $dplr_lists_arr[$form->list_id] ?></td>
            <td><?php echo $form->list_id; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<a href="<?php echo $create_form_url; ?>" class="button button-primary"><?php echo esc_html('New Form', 'doppler-form')?></a>