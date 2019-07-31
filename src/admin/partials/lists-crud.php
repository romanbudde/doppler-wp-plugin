<div id="dplr-crud" class="dplr-tab-content dplr-tab-content--crud panel">

    <form id="dplr-form-list-crud" action="" method="post">

        <label><?php _e('Create a Doppler List', 'doppler-form')?></label>
        <input type="text" value="" maxlength="20" disabled="disabled" maxlength="100" placeholder="<?php _e('Write the List name', 'doppler-for-woocommerce')?>"/>

        <button id="dplr-save-list" class="dp-button button-medium primary-green" disabled="disabled">
            <?php _e('Create List', 'doppler-form') ?>
        </button>

    </form>

    <div class="dplr-loading"></div>

    <div id="showErrorResponse"></div>
    <div id="showSuccessResponse"></div>

    <table id="dplr-tbl-lists" class="grid widefat mt-30">
        <thead>
            <tr>
                <th><?php _e('List ID', 'doppler-form')?></th>
                <th><?php _e('Name', 'doppler-form')?></th>
                <th><?php _e('Subscribers', 'doppler-form')?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

</div>

<div id="dplr-dialog-confirm" title="<?php _e('Are you sure you want to delete the List? ', 'doppler-form'); ?>">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span> <?php _e('It\'ll be deleted and can\'t be recovered.', 'doppler-form')?></p>
</div>