<div id="content">
    <?php echo $this->layout->load_view('layout/alerts'); ?>

    <div class="row <?php if ($this->mdl_settings->setting('disable_quickactions') == 1) {
        echo 'hidden';
    } ?>">
        <div class="col-xs-12">

            <div id="panel-quick-actions" class="panel panel-default quick-actions">

                <div class="panel-heading">
                    <b><?php echo trans('quick_actions'); ?></b>
                </div>

                <div class="btn-group btn-group-justified no-margin">
                    <a href="<?php echo site_url('clients/form'); ?>" class="btn btn-default">
                        <i class="fa fa-user fa-margin"></i>
                        <span class="hidden-xs"><?php echo trans('add_client'); ?></span>
                    </a>
                    <a href="javascript:void(0)" class="create-quote btn btn-default">
                        <i class="fa fa-file fa-margin"></i>
                        <span class="hidden-xs"><?php echo trans('create_quote'); ?></span>
                    </a>
                    <a href="<?php echo site_url('products/form'); ?>" class="btn btn-default">
                        <i class="fa fa-file-text fa-margin"></i>
                        <span class="hidden-xs"><?php echo trans('create_product'); ?></span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-3">

            <div id="panel-quote-overview" class="panel panel-default overview">

                <div class="panel-heading">
                    <b><i class="fa fa-bar-chart fa-margin"></i> <?php echo trans('quote_overview'); ?></b>
                    <span class="pull-right text-muted"><?php echo lang($quote_status_period); ?></span>
                </div>

                <table class="table table-bordered table-condensed no-margin">
                    <?php foreach ($quote_status_totals as $total) { ?>
                        <tr>
                            <td>
                                <a href="<?php echo site_url($total['href']); ?>">
                                    <?php echo $total['label']; ?>
                                </a>
                            </td>
                            <td class="amount">
                        <span class="<?php echo $total['class']; ?>">
                            <?php echo ($total['num_total']); ?>
                        </span>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-12">

            <div id="panel-recent-quotes" class="panel panel-default">

                <div class="panel-heading">
                    <b><i class="fa fa-history fa-margin"></i> <?php echo trans('recent_quotes'); ?></b>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-condensed no-margin">
                        <thead>
                        <tr>
                            <th><?php echo trans('status'); ?></th>
                            <th style="min-width: 15%;"><?php echo trans('date'); ?></th>
                            <th style="min-width: 15%;"><?php echo trans('quote'); ?></th>
                            <th style="min-width: 35%;"><?php echo trans('client'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($quotes as $quote) { ?>
                            <tr>
                                <td>
                                <span class="label
                                <?php echo $quote_statuses[$quote->quote_status_id]['class']; ?>">
                                    <?php echo $quote_statuses[$quote->quote_status_id]['label']; ?>
                                </span>
                                </td>
                                <td>
                                    <?php echo date_from_mysql($quote->quote_date_created); ?>
                                </td>
                                <td>
                                    <?php echo anchor('quotes/view/' . $quote->quote_id, ($quote->quote_number ? $quote->quote_number : $quote->quote_id)); ?>
                                </td>
                                <td>
                                    <?php echo anchor('clients/view/' . $quote->client_id, $quote->client_name); ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="6" class="text-right small">
                                <?php echo anchor('quotes/status/all', trans('view_all')); ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
