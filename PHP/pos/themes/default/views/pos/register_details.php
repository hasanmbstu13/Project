<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $page_title . " " . lang("no") . " " . $inv->id; ?></title>
    <base href="<?= base_url() ?>"/>
    <meta http-equiv="cache-control" content="max-age=0"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="expires" content="0"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <link rel="shortcut icon" href="<?= $assets ?>images/icon.png"/>
    <link href="<?= $assets ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css" media="all">
        body { color: #000; }
        #wrapper { max-width: 480px; margin: 0 auto; padding-top: 20px; }
        .btn { border-radius: 0; margin-bottom: 5px; }
        .table { border-radius: 3px; }
        .table th { background: #f5f5f5; }
        .table th, .table td { vertical-align: middle !important; }
        h3 { margin: 5px 0; }

        @media print {
            .no-print { display: none; }
            #wrapper { max-width: 480px; width: 100%; min-width: 250px; margin: 0 auto; }
        }
    </style>
</head>

<body>

<div id="wrapper">
    <div id="receiptData">
    <div id="receipt-data">
        <div class="text-center">
                <?= $Settings->header; ?>
                <p>
            
                <?= lang('Register').' '.lang('opened_at').': '.$this->tec->hrld($this->session->userdata('register_open_time')); ?><br/>
                <?= lang('Current time:').' '.$this->tec->hrld(date('Y-m-d H:i:s')); ?>
                
                </p>
            <div style="clear:both;"></div>
            
            <table width="100%" class="table table-striped table-condensed">
                <tr>
                    <td style="border-bottom: 1px solid #EEE;" class="text-left"><?= lang('cash_in_hand'); ?>:</td>
                    <td style="text-align:right; border-bottom: 1px solid #EEE;">
                            <span><?= $this->tec->formatMoney($this->session->userdata('cash_in_hand')); ?></span>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid #EEE;" class="text-left"><?= lang('cash_sale'); ?>:</td>
                    <td style="text-align:right; border-bottom: 1px solid #EEE;">
                            <span><?= $this->tec->formatMoney($cashsales->paid ? $cashsales->paid : '0.00') . ' (' . $this->tec->formatMoney($cashsales->total ? $cashsales->total : '0.00') . ')'; ?></span>
                        </td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid #EEE;" class="text-left"><?= lang('ch_sale'); ?>:</td>
                    <td style="text-align:right;border-bottom: 1px solid #EEE;">
                            <span><?= $this->tec->formatMoney($chsales->paid ? $chsales->paid : '0.00') . ' (' . $this->tec->formatMoney($chsales->total ? $chsales->total : '0.00') . ')'; ?></span>
                        </td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid <?= (!isset($Settings->stripe)) ? '#DDD' : '#EEE'; ?>;" class="text-left"><?= lang('cc_sale'); ?>:</td>
                    <td style="text-align:right;border-bottom: 1px solid <?= (!isset($Settings->stripe)) ? '#DDD' : '#EEE'; ?>;">
                            <span><?= $this->tec->formatMoney($ccsales->paid ? $ccsales->paid : '0.00') . ' (' . $this->tec->formatMoney($ccsales->total ? $ccsales->total : '0.00') . ')'; ?></span>
                        </td>
                </tr>

                <?php /* if (isset($Settings->stripe)) { ?>
                    <tr>
                        <td style="border-bottom: 1px solid #DDD;"><?= lang('stripe'); ?>:</td>
                        <td style="text-align:right;border-bottom: 1px solid #DDD;">
                                <span><?= $this->tec->formatMoney($stripesales->paid ? $stripesales->paid : '0.00') . ' (' . $this->tec->formatMoney($stripesales->total ? $stripesales->total : '0.00') . ')'; ?></span>
                            </td>
                    </tr>
                <?php } */ ?>
                <tr>
                    <td width="300px;" style="font-weight:bold;" class="text-left"><?= lang('total_sales'); ?>:</td>
                    <td width="200px;" style="font-weight:bold;text-align:right;" class="text-left">
                            <span><?= $this->tec->formatMoney($totalsales->paid ? $totalsales->paid : '0.00') . ' (' . $this->tec->formatMoney($totalsales->total ? $totalsales->total : '0.00') . ')'; ?></span>
                        </td>
                </tr>

                <tr>
                    <td width="300px;" style="font-weight:bold;" class="text-left"><?= lang('expenses'); ?>:</td>
                    <td width="200px;" style="font-weight:bold;text-align:right;" class="text-left">
                            <span><?= $this->tec->formatMoney($expenses->total ? $expenses->total : '0.00'); ?></span>
                        </td>
                </tr>

                <tr>
                    <td width="300px;" style="font-weight:bold;" class="text-left"><strong><?= lang('total_cash'); ?></strong>:
                    </td>
                    <td style="text-align:right;">
                            <span><strong><?= $cashsales->paid ? $this->tec->formatMoney($cashsales->paid + ($this->session->userdata('cash_in_hand')) - ($expenses->total ? $expenses->total : 0.00)) : $this->tec->formatMoney($this->session->userdata('cash_in_hand') - ($expenses->total ? $expenses->total : 0.00)); ?></strong></span>
                        </td>
                </tr>
            </table>


            
        </div>
        <div style="clear:both;"></div>
    </div>

<div id="buttons" style="padding-top:10px; text-transform:uppercase;" class="no-print">
    <hr>
        <span class="pull-right col-xs-12">
        <a href="javascript:window.print()" id="web_print" class="btn btn-block btn-primary"
           onClick="window.print();return false;"><?= lang("web_print"); ?></a>
    </span>
    <div style="clear:both;"></div>

</div>

</div>
<canvas id="hidden_screenshot" style="display:none;">

</canvas>
<div class="canvas_con" style="display:none;"></div>
<script src="<?= $assets ?>plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <script type="text/javascript">
$(window).load(function () {
    window.print();
});

    </script>
</body>
</html>
