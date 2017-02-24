<script type="text/javascript">
    $(function () {
        $('#client_name').focus();
        $("#client_country").select2({
            placeholder: "<?php echo trans('country'); ?>",
            allowClear: true
        });
    });
</script>

<form method="post">

    <div id="headerbar">
        <h1><?php echo trans('client_form'); ?></h1>
        <?php $this->layout->load_view('layout/header_buttons'); ?>
    </div>

    <div id="content">

        <?php $this->layout->load_view('layout/alerts'); ?>

        <input class="hidden" name="is_update" type="hidden"
            <?php if ($this->mdl_clients->form_value('is_update')) {
                echo 'value="1"';
            } else {
                echo 'value="0"';
            } ?>
        >

        <fieldset>
            <legend><?php echo trans('personal_information'); ?></legend>
            <div class="input-group col-xs-6">
              <span class="input-group-addon">
                <?php echo trans('active_client'); ?>:
                <input id="client_active" name="client_active" type="checkbox" value="1"
                    <?php if ($this->mdl_clients->form_value('client_active') == 1
                        or !is_numeric($this->mdl_clients->form_value('client_active'))
                    ) {
                        echo 'checked="checked"';
                    } ?>
                >
              </span>
                <input id="client_name" name="client_name" type="text" class="form-control"
                       placeholder="<?php echo trans('client_name'); ?>"
                       value="<?php echo htmlspecialchars($this->mdl_clients->form_value('client_name')); ?>">
            </div>
        </fieldset>

        <div class="row">

            <div class="col-xs-12 col-sm-6">
                <fieldset>
                    <legend><?php echo trans('address'); ?></legend>

                    <div class="form-group">
                        <label><?php echo trans('street_address'); ?>: </label>

                        <div class="controls">
                            <input type="text" name="client_address_1" id="client_address_1" class="form-control"
                                   value="<?php echo htmlspecialchars($this->mdl_clients->form_value('client_address_1')); ?>">
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="col-xs-12 col-sm-6">
                <fieldset>

                    <legend><?php echo trans('contact_information'); ?></legend>

                    <div class="form-group">
                        <label><?php echo trans('phone_number'); ?>: </label>

                        <div class="controls">
                            <input type="text" name="client_phone" id="client_phone" class="form-control"
                                   value="<?php echo htmlspecialchars($this->mdl_clients->form_value('client_phone')); ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label><?php echo trans('mobile_number'); ?>: </label>

                        <div class="controls">
                            <input type="text" name="client_mobile" id="client_mobile" class="form-control"
                                   value="<?php echo htmlspecialchars($this->mdl_clients->form_value('client_mobile')); ?>">
                        </div>
                    </div>


                </fieldset>
            </div>


        </div>

        <?php if ($custom_fields) { ?>
            <div class="row">
                <div class="col-xs-12">
                    <fieldset>
                        <legend><?php echo trans('custom_fields'); ?></legend>
                        <?php foreach ($custom_fields as $custom_field) { ?>
                            <div class="form-group">
                                <label><?php echo $custom_field->custom_field_label; ?>: </label>

                                <div class="controls">
                                    <input type="text" class="form-control"
                                           name="custom[<?php echo $custom_field->custom_field_column; ?>]"
                                           id="<?php echo $custom_field->custom_field_column; ?>"
                                           value="<?php echo form_prep($this->mdl_clients->form_value('custom[' . $custom_field->custom_field_column . ']')); ?>">
                                </div>
                            </div>
                        <?php } ?>
                    </fieldset>
                </div>
            </div>
        <?php } ?>
    </div>
</form>
