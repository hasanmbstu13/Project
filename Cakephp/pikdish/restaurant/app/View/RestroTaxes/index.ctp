<?php $this->assign('title', 'Settings'); ?>
<style>
    .error
    {
        padding-left:10px;
        color:red
    }
    input
    {
        padding:5 5 5 5;
        border-radius: 4px !important;
        width:125%

    }

    .bs-searchbox input
    {
        width:100% !important;
    }
</style>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Settings </h3>
            </div>
            <div class="title_right">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel"><?php echo $this->Session->flash(); ?><div class="x_content">
                        <?php echo $this->Form->create('Restaurant', array('name' => 'editForm', 'class' => 'form-horizontal form-label-left', 'type' => 'file')); ?>

                        <?php echo $this->Form->input('id'); ?>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> <span class="required"></span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12"> 
                                <?php $checked = $this->Form->value('TaxMaster.TaxMaster'); ?>
                                <table class="table table-bordered table-hover" id="tab_logic">
                                    <thead>
                                        <tr style="background:#FF9" >
                                            <th style="width: 10%;">S.No.</th>
                                            <th style="width: 20%;">Select</th>
                                            <th style="width: 45%;">Tax name</th>
                                            <th style="width: 25%;">Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($taxMasters as $taxMaster): ?>
                                            <tr>
                                                <?php $id = $taxMaster['TaxMaster']['id']; ?>
                                                <td style="text-align:center; padding-top:12px;background:#FF9"><?php echo $i; ?></td>
                                                <td>
                                                    <?php
                                                    echo $this->Form->input("TaxMaster.checkbox.$id", array(
                                                        'label' => false,
                                                        'type' => 'checkbox',
                                                        'checked' => (isset($checked[$id]) ? 'checked' : false),
                                                    ));
                                                    ?>
                                                </td>
                                                <td><?php echo $taxMaster['TaxMaster']['tax_name']; ?></td>
                                                <td><?php echo $taxMaster['TaxMaster']['rate']; ?></td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" id="submit" class="btn btn-success">Submit</button>
                                <a href="<?php echo $path ?>" class="btn btn-primary">Cancel</a> </div>
                        </div>
                        </form>
                        <div>
                            <p>- Ctrl + S for Save Data</p>
                            <p>- Ctrl + C for go to Home page</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- /page content -->
<script>
    $('body').on('keydown', 'input, select, textarea', function (e) {
        var self = $(this)
                , form = self.parents('form:eq(0)')
                , focusable
                , next
                , prev
                ;

        if (e.shiftKey) {
            if (e.keyCode == 13) {
                focusable = form.find('input,a,select,button,textarea').filter(':visible:not([readonly]):enabled');
                prev = focusable.eq(focusable.index(this) - 1);

                if (prev.length) {
                    prev.focus();
                } else {
                    form.submit();
                }
            }
        }
        else
        if (e.keyCode == 13) {
            focusable = form.find('input,a,select,button,textarea').filter(':visible:not([readonly]):enabled');
            next = focusable.eq(focusable.index(this) + 1);
            if (next.length) {
                next.focus();
            } else {
                form.submit();
            }
            return false;
        }
    });
    $(document).ready(function () {

        $(document).bind('keydown', function (event) {
            //19 for Mac Command+S
            if (!(String.fromCharCode(event.which).toLowerCase() == 's' && event.ctrlKey) && !(event.which == 19))
                return true;

            event.preventDefault();
            console.log("Ctrl-s pressed");
            $("#submit").click();
            return false;

        });



    });

    shortcut.add("Ctrl+C", function () {
        window.location.href = '<?php echo $path ?>';

    });

</script>