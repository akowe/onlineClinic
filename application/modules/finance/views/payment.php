
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-money"></i>  <?php echo lang('payments'); ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix no-print">
                        <a href="<?php echo site_url();?>finance/addPaymentView">
                            <div class="btn-group">
                                <button id="" class="btn green">
                                    <i class="fa fa-plus-circle"></i> <?php echo lang('add_payment'); ?>
                                </button>
                            </div>
                        </a>
                        <button class="export no-print" onclick="javascript:window.print();"><?php echo lang('print'); ?></button>     
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th><?php echo lang('date'); ?></th>
                                <th><?php echo lang('invoice_id'); ?></th>
                                <th><?php echo lang('doctor'); ?></th>
                                <th><?php echo lang('patient'); ?></th>


                                <th><?php echo lang('sub_total'); ?></th>
                                <th><?php echo lang('discount'); ?></th>
                                <th><?php echo lang('grand_total'); ?></th>
                                <th><?php echo lang('paid'); ?> <?php echo lang('amount'); ?></th>
                                <th><?php echo lang('due'); ?></th>
                                <th><?php echo lang('remarks'); ?></th>
                                <th class="option_th no-print"><?php echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                        <style>

                            .img_url{
                                height:20px;
                                width:20px;
                                background-size: contain; 
                                max-height:20px;
                                border-radius: 100px;
                            }
                            .option_th{
                                width:18%;
                            }

                        </style>
                     
                        <?php foreach ($payments as $payment) { ?>
                            <?php $patient_info = $this->db->get_where('patient', array('id' => $payment->patient))->row(); ?>
                            
                                                        <tr class="">
                                                            <td><?php echo date('d/m/y', $payment->date); ?></td>
                            
                                                            <td>
                            <?php
                            echo $payment->id;
                            ?>
                                                            </td>

                                                            <td><?php
                                                                echo $payment->doctor;
                                                                ?></td>
                                                            <td>
                            <?php
                            if (!empty($patient_info)) {
                                echo 'Chip: ', $patient_info->chip. '</br>'.$patient_info->name . '</br>' . $patient_info->address . '</br>' . $patient_info->phone;
                            }
                            ?>
                                                            </td>


                                                            <td><?php echo $settings->currency; ?> <?php echo $payment->amount; ?></td>              
                                                            <td><?php echo $settings->currency; ?> <?php
                            if (!empty($payment->flat_discount)) {
                                echo $payment->flat_discount;
                            } else {
                                echo '0';
                            }
                            ?></td>
                                                            <td><?php echo $settings->currency; ?> <?php echo $grand_total = $payment->gross_total; ?></td>
                                                            <td><?php echo $settings->currency; ?> <?php echo $amount_received = $this->finance_model->getDepositAmountByPaymentId($payment->id); ?></td>
                                                            <td><?php echo $settings->currency; ?> <?php echo $grand_total - $amount_received; ?></td>



                                                            <td>
                             <?php
                            echo $patient_info->remarks;
                            ?>                              </td>


                            


                                                            <td class="no-print"> 
                            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                                                        <a class="btn btn-info btn-xs editbutton" title="<?php echo lang('edit'); ?>" href="<?php  echo site_url();?>finance/editPayment?id=<?php echo $payment->id; ?>"><i class="fa fa-edit"> </i> <?php echo lang('edit'); ?></a>
                            <?php } ?>
                            
                                                                <a class="btn btn-xs invoicebutton" title="<?php echo lang('invoice'); ?>" style="color: #fff;" href="<?php  echo site_url();?>finance/invoice?id=<?php echo $payment->id; ?>"><i class="fa fa-file-text"></i> <?php echo lang('invoice'); ?></a>
                            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                                                        <a class="btn btn-info btn-xs delete_button" title="<?php echo lang('delete'); ?>" href="<?php  echo site_url();?>finance/delete?id=<?php echo $payment->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?></a>
                            <?php } ?>
                                                                </button>
                                                            </td>
                                                        </tr>
                        <?php } ?>
                        
                    
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
                            $(document).ready(function () {
                            $(".flashmessage").delay(3000).fadeOut(100);
                            });</script>



<!--
<script>


    $(document).ready(function () {
    $('#editable-sample').DataTable({
    responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
            url : "finance/patient_deposit",
                    type : 'POST',
            },
            scroller: {
            loadingIndicator: true
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    'print'

            ],
            aLengthMenu: [
            [10, 25, 50, 100, - 1],
            [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 100,
            "order": [[ 0, "desc" ]],
<?php if ($this->router->fetch_method() == 'sent') { ?>
        "order": [[ 0, "asc" ]],
<?php } ?>
<?php if ($this->router->fetch_method() == 'upcoming') { ?>
        "order": [[ 0, "asc" ]],
<?php } ?>

    "language": {
    "lengthMenu": "_MENU_ records per page",
    }





    });
    });</script>

end-->