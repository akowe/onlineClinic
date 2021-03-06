<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row state-overview" style="padding: 0px 19px;">

        <?php if (!$this->ion_auth->in_group('superadmin')) { ?>

            <!--state overview start-->

            <!--
            <div class="state-overview col-md-3" style="padding: 23px 0px;">
            <?php if ($this->ion_auth->in_group(array('admin', 'Accoutant', 'Receptionist', 'Doctor'))) { ?> 
                                                            <div class="col-lg-12 col-sm-6">
                                                                <a href="finance/addPaymentView">
                                                                    <div class="panel-heading"> <?php echo lang('add_payment'); ?> </div>
                                                                </a>
                                                            </div>
            <?php } ?>
            <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?> 
                                                            <div class="col-lg-12 col-sm-6">
                                                                <a href="patient/addNewView">
                                                                    <div class="panel-heading add_patient"> <?php echo lang('add_patient'); ?> </div>
                                                                </a>
                                                            </div>
            <?php } ?>
            <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist'))) { ?>
                                                            <div class="col-lg-12 col-sm-6">
                                                                <a href="appointment/addNewView">
                                                                    <div class="panel-heading add_appointment"> <?php echo lang('add_appointment'); ?> </div>
                                                                </a>
                                                            </div>
            <?php } ?>
            <?php if ($this->ion_auth->in_group(array('admin'))) { ?> 
                                                            <div class="col-lg-12 col-sm-6">
                                                                <a href="prescription/addNewPrescription">
                                                                    <div class="panel-heading add_prescription"> <?php echo lang('add_prescription'); ?> </div>
                                                                </a>
                                                            </div>
            <?php } ?>
            <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist', 'Doctor'))) { ?>
                                                            <div class="col-lg-12 col-sm-6">
                                                                <a href="lab/addLabView">
                                                                    <div class="panel-heading add_lab_report"> <?php echo lang('add_lab_report'); ?> </div>
                                                                </a>
                                                            </div>
            <?php } ?>
            <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                            <div class="col-lg-12 col-sm-6">
                                                                <a href="patient/documents">
                                                                    <div class="panel-heading add_patient"> <?php echo lang('add_documents'); ?> </div> 
                                                                </a>
                                                            </div>
            <?php } ?>
            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                                            <div class="col-lg-12 col-sm-6">
                                                                <a href="settings">
                                                                    <div class="panel-heading add_appointment"> <?php echo lang('change_settings'); ?> </div> 
                                                                </a>
                                                            </div>
            <?php } ?>
            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                                            <div class="col-lg-12 col-sm-6">
                                                                <a href="settings/language">
                                                                    <div class="panel-heading add_prescription"> <?php echo lang('change_language'); ?> </div> 
                                                                </a>
                                                            </div>
            <?php } ?>
                
            </div>
            
            
            -->   

            <?php
            if (!$this->ion_auth->in_group(array('superadmin'))) {
                $hospital_id = $this->hospital_model->hospitalId();
                $modules = $this->hospital_model->modules();
            }
            ?>

            <!-- only admin to view home-->
            <?php if ($this->ion_auth->in_group('admin')) { ?>

            <div class="state-overview col-md-12" style="padding: 23px 0px;">
                <?php if (in_array('doctor', $modules)) { ?>
                    <div class="col-lg-3 col-sm-6">
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <a href="<?php echo site_url(); ?>doctor">
                            <?php } ?>
                            <section class="panel">
                                <div class="symbol terques">
                                    <i class="fa fa-stethoscope"></i>
                                </div>

                                <div class="value">

                                    <h1 class="">

                                        <?php
                                        $this->db->where('hospital_id', $hospital_id);
                                        $this->db->from('doctor');
                                        $count = $this->db->count_all_results();
                                        echo $count;
                                        ?>
                                    </h1>
                                    <p><?php echo lang('doctor'); ?></p>
                                </div>
                            </section>
                            <?php if (!$this->ion_auth->in_group('admin')) { ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>

                <?php if (in_array('patient', $modules)) { ?>
                    <div class="col-lg-3 col-sm-6">
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <a href="<?php echo site_url(); ?>patient">
                            <?php } ?>
                            <section class="panel">
                                <div class="symbol blue">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="value">
                                    <h1 class="">
                                        <?php
                                        $this->db->where('hospital_id', $hospital_id);
                                        $this->db->from('patient');
                                        $count = $this->db->count_all_results();
                                        echo $count;
                                        ?>
                                    </h1>
                                    <p><?php echo lang('patient'); ?></p>
                                </div>
                            </section>
                            <?php if ($this->ion_auth->in_group('admin')) { ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>

                <?php if (in_array('appointment', $modules)) { ?>
                    <div class="col-lg-3 col-sm-6">
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <a href="<?php echo site_url(); ?>appointment">
                            <?php } ?>
                            <section class="panel">
                                <div class="symbol yellow">
                                    <i class="fa fa-plus-square-o"></i>
                                </div>
                                <div class="value">
                                    <h1 class="">
                                        <?php
                                        $this->db->where('hospital_id', $hospital_id);
                                        $this->db->from('appointment');
                                        $count = $this->db->count_all_results();
                                        echo $count;
                                        ?>
                                    </h1>
                                    <p><?php echo lang('appointment'); ?></p>
                                </div>
                            </section>
                            <?php if ($this->ion_auth->in_group('admin')) { ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>

                <?php if (in_array('prescription', $modules)) { ?>
                    <div class="col-lg-3 col-sm-6">
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <a href="<?php echo site_url(); ?>prescription/all">
                            <?php } ?>
                            <section class="panel">
                                <div class="symbol terques">
                                    <i class="fa fa-plus-square-o"></i>
                                </div>
                                <div class="value">
                                    <h1 class="">
                                        <?php
                                        $this->db->where('hospital_id', $hospital_id);
                                        $this->db->from('prescription');
                                        $count = $this->db->count_all_results();
                                        echo $count;
                                        ?>
                                    </h1>
                                    <p><?php echo lang('prescription'); ?></p>
                                </div>
                            </section>
                            <?php if ($this->ion_auth->in_group('admin')) { ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>

                <?php if (in_array('patient', $modules)) { ?>
                    <div class="col-lg-3 col-sm-6">
                        <?php if ($this->ion_auth->in_group('admin', 'farm' )) { ?>
                            <a href="<?php echo site_url(); ?>patient/caseList">
                            <?php } ?>
                            <section class="panel">
                                <div class="symbol blue">
                                    <i class="fa fa-medkit"></i>
                                </div>
                                <div class="value">
                                    <h1 class="">
                                        <?php
                                        $this->db->where('hospital_id', $hospital_id);
                                        $this->db->from('medical_history');
                                        $count = $this->db->count_all_results();
                                        echo $count;
                                        ?>
                                    </h1>
                                    <p><?php echo lang('case_history'); ?></p>
                                </div>
                            </section>
                            <?php if ($this->ion_auth->in_group('admin')) { ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>

                <?php if (in_array('lab', $modules)) { ?>
                    <div class="col-lg-3 col-sm-6">
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <a href="<?php echo site_url(); ?>lab">
                            <?php } ?>
                            <section class="panel">
                                <div class="symbol terques">
                                    <i class="fa fa-medkit"></i>
                                </div>
                                <div class="value">
                                    <h1 class="">
                                        <?php
                                        $this->db->where('hospital_id', $hospital_id);
                                        $this->db->from('lab');
                                        $count = $this->db->count_all_results();
                                        echo $count;
                                        ?>
                                    </h1>
                                    <p><?php echo lang('lab_report'); ?></p>
                                </div>
                            </section>
                            <?php if ($this->ion_auth->in_group('admin')) { ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>



                <?php if (in_array('patient', $modules)) { ?>
                    <div class="col-lg-3 col-sm-6">
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <a href="<?php echo site_url(); ?>patient/documents">
                            <?php } ?>
                            <section class="panel">
                                <div class="symbol blue">
                                    <i class="fa fa-file"></i>
                                </div>
                                <div class="value">
                                    <h1 class="">
                                        <?php
                                        $this->db->where('hospital_id', $hospital_id);
                                        $this->db->from('patient_material');
                                        $count = $this->db->count_all_results();
                                        echo $count;
                                        ?>
                                    </h1>
                                    <p><?php echo lang('documents'); ?></p>
                                </div>
                            </section>
                            <?php if ($this->ion_auth->in_group('admin')) { ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>

                <?php if (in_array('finance', $modules)) { ?>
                    <div class="col-lg-3 col-sm-6">
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <a href="<?php echo site_url(); ?>finance/payment">
                            <?php } ?>
                            <section class="panel">
                                <div class="symbol yellow">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="value">
                                    <h1 class="">
                                        <?php
                                        $this->db->where('hospital_id', $hospital_id);
                                        $this->db->from('payment');
                                        $count = $this->db->count_all_results();
                                        echo $count;
                                        ?>
                                    </h1>
                                    <p><?php echo lang('payment'); ?> <?php echo lang('invoice'); ?></p>
                                </div>
                            </section>
                            <?php if ($this->ion_auth->in_group('admin')) { ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>




                <?php if (in_array('medicine', $modules)) { ?>
                    <div class="col-lg-3 col-sm-6">
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <a href="<?php echo site_url(); ?>medicine">
                            <?php } ?>
                            <section class="panel">
                                <div class="symbol blue">
                                    <i class="fa fa-medkit"></i>
                                </div>
                                <div class="value">
                                    <h1 class="">
                                        <?php
                                        $this->db->where('hospital_id', $hospital_id);
                                        $this->db->from('medicine');
                                        $count = $this->db->count_all_results();
                                        echo $count;
                                        ?>
                                    </h1>
                                    <p><?php echo lang('medicine'); ?></p>
                                </div>
                            </section>
                            <?php if ($this->ion_auth->in_group('admin')) { ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>


                <?php if ($this->ion_auth->in_group('admin')) { ?>
                    <?php if (in_array('finance', $modules)) { ?>
                        <div class="col-lg-6 col-sm-6">    
                            <a href="<?php echo site_url(); ?>finance/payment">
                                <section class="panel">
                                    <div class="symbol terques">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="value">
                                        <h1 class=" count14">
                                            <?php echo $settings->currency; ?> <?php echo number_format($sum[0]->gross_total, 2); ?>
                                        </h1>
                                        <p><?php echo lang('total_payment'); ?></p>
                                    </div>
                                </section>         
                            </a>     
                        </div>
                    <?php } ?>

                    
                        <div class="col-lg-3 col-sm-6">
                            <?php if ($this->ion_auth->in_group('admin')) { ?>
                                <a href="<?php echo site_url(); ?>settings">
                                <?php } ?>
                                <section class="panel">
                                    <div class="symbol blue">
                                        <i class="fa fa-cogs"></i>
                                    </div>
                                    <div class="value">
                                        <h1 class="">

                                        </h1>
                                        <p><?php echo lang('settings'); ?></p>
                                    </div>
                                </section>
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                </a>
                            <?php } ?>
                        </div>

                <?php } ?>

            </div>

            <?php } ?> <!-- end for only admin to view home-->


            <!-- only accountant to view home-->
            <?php if ($this->ion_auth->in_group('Accountant')) { ?>

                <div class="state-overview col-md-12" style="padding: 23px 0px;">
                    <?php if (in_array('doctor', $modules)) { ?>
                        <div class="col-lg-3 col-sm-6">
                            <?php if ($this->ion_auth->in_group('Accountant')) { ?>
                            <a href="<?php echo site_url(); ?>doctor">
                                <?php } ?>
                                <section class="panel">
                                    <div class="symbol terques">
                                        <i class="fa fa-stethoscope"></i>
                                    </div>

                                    <div class="value">

                                        <h1 class="">

                                            <?php
                                            $this->db->where('hospital_id', $hospital_id);
                                            $this->db->from('doctor');
                                            $count = $this->db->count_all_results();
                                            echo $count;
                                            ?>
                                        </h1>
                                        <p><?php echo lang('doctor'); ?></p>
                                    </div>
                                </section>
                                <?php if (!$this->ion_auth->in_group('Accountant')) { ?>
                            </a>
                        <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if (in_array('patient', $modules)) { ?>
                        <div class="col-lg-3 col-sm-6">
                            <?php if ($this->ion_auth->in_group('Accountant')) { ?>
                            <a href="<?php echo site_url(); ?>patient">
                                <?php } ?>
                                <section class="panel">
                                    <div class="symbol blue">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="value">
                                        <h1 class="">
                                            <?php
                                            $this->db->where('hospital_id', $hospital_id);
                                            $this->db->from('patient');
                                            $count = $this->db->count_all_results();
                                            echo $count;
                                            ?>
                                        </h1>
                                        <p><?php echo lang('patient'); ?></p>
                                    </div>
                                </section>
                                <?php if ($this->ion_auth->in_group('Accountant')) { ?>
                            </a>
                        <?php } ?>
                        </div>
                    <?php } ?>



                    <?php if (in_array('finance', $modules)) { ?>
                        <div class="col-lg-3 col-sm-6">
                            <?php if ($this->ion_auth->in_group('Accountant')) { ?>
                            <a href="<?php echo site_url(); ?>finance/payment">
                                <?php } ?>
                                <section class="panel">
                                    <div class="symbol yellow">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="value">
                                        <h1 class="">
                                            <?php
                                            $this->db->where('hospital_id', $hospital_id);
                                            $this->db->from('payment');
                                            $count = $this->db->count_all_results();
                                            echo $count;
                                            ?>
                                        </h1>
                                        <p><?php echo lang('payment'); ?> <?php echo lang('invoice'); ?></p>
                                    </div>
                                </section>
                                <?php if ($this->ion_auth->in_group('Accountant')) { ?>
                            </a>
                        <?php } ?>
                        </div>
                    <?php } ?>




                    <?php if (in_array('medicine', $modules)) { ?>
                        <div class="col-lg-3 col-sm-6">
                            <?php if ($this->ion_auth->in_group('Accountant')) { ?>
                            <a href="<?php echo site_url(); ?>medicine">
                                <?php } ?>
                                <section class="panel">
                                    <div class="symbol blue">
                                        <i class="fa fa-medkit"></i>
                                    </div>
                                    <div class="value">
                                        <h1 class="">
                                            <?php
                                            $this->db->where('hospital_id', $hospital_id);
                                            $this->db->from('medicine');
                                            $count = $this->db->count_all_results();
                                            echo $count;
                                            ?>
                                        </h1>
                                        <p><?php echo lang('medicine'); ?></p>
                                    </div>
                                </section>
                                <?php if ($this->ion_auth->in_group('Accountant')) { ?>
                            </a>
                        <?php } ?>
                        </div>
                    <?php } ?>


                    <?php if ($this->ion_auth->in_group('Accountant')) { ?>
                        <?php if (in_array('finance', $modules)) { ?>
                            <div class="col-lg-6 col-sm-6">
                                <a href="<?php echo site_url(); ?>finance/payment">
                                    <section class="panel">
                                        <div class="symbol terques">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="value">
                                            <h1 class=" count14">
                                                <?php echo $settings->currency; ?> <?php echo number_format($sum[0]->gross_total, 2); ?>
                                            </h1>
                                            <p><?php echo lang('total_payment'); ?></p>
                                        </div>
                                    </section>
                                </a>
                            </div>
                        <?php } ?>

                    <?php } ?>

                </div>

            <?php } ?> <!-- end for only accountant to view home-->


            <!-- only Doctors to view home-->
            <?php if ($this->ion_auth->in_group('Doctor')) { ?>

                <div class="state-overview col-md-12" style="padding: 23px 0px;">


                    <?php if (in_array('patient', $modules)) { ?>
                        <div class="col-lg-3 col-sm-6">
                            <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <a href="<?php echo site_url(); ?>patient">
                                <?php } ?>
                                <section class="panel">
                                    <div class="symbol blue">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="value">
                                        <h1 class="">
                                            <?php
                                            $this->db->where('hospital_id', $hospital_id);
                                            $this->db->from('patient');
                                            $count = $this->db->count_all_results();
                                            echo $count;
                                            ?>
                                        </h1>
                                        <p><?php echo lang('patient'); ?></p>
                                    </div>
                                </section>
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                            </a>
                        <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if (in_array('appointment', $modules)) { ?>
                        <div class="col-lg-3 col-sm-6">
                            <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                            <a href="<?php echo site_url(); ?>appointment">
                                <?php } ?>
                                <section class="panel">
                                    <div class="symbol yellow">
                                        <i class="fa fa-plus-square-o"></i>
                                    </div>
                                    <div class="value">
                                        <h1 class="">
                                            <?php
                                            $this->db->where('hospital_id', $hospital_id);
                                            $this->db->from('appointment');
                                            $count = $this->db->count_all_results();
                                            echo $count;
                                            ?>
                                        </h1>
                                        <p><?php echo lang('appointment'); ?></p>
                                    </div>
                                </section>
                                <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                            </a>
                        <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if (in_array('prescription', $modules)) { ?>
                        <div class="col-lg-3 col-sm-6">
                            <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                            <a href="<?php echo site_url(); ?>prescription/all">
                                <?php } ?>
                                <section class="panel">
                                    <div class="symbol terques">
                                        <i class="fa fa-plus-square-o"></i>
                                    </div>
                                    <div class="value">
                                        <h1 class="">
                                            <?php
                                            $this->db->where('hospital_id', $hospital_id);
                                            $this->db->from('prescription');
                                            $count = $this->db->count_all_results();
                                            echo $count;
                                            ?>
                                        </h1>
                                        <p><?php echo lang('prescription'); ?></p>
                                    </div>
                                </section>
                                <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                            </a>
                        <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if (in_array('patient', $modules)) { ?>
                        <div class="col-lg-3 col-sm-6">
                            <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                            <a href="<?php echo site_url(); ?>patient/caseList">
                                <?php } ?>
                                <section class="panel">
                                    <div class="symbol blue">
                                        <i class="fa fa-medkit"></i>
                                    </div>
                                    <div class="value">
                                        <h1 class="">
                                            <?php
                                            $this->db->where('hospital_id', $hospital_id);
                                            $this->db->from('medical_history');
                                            $count = $this->db->count_all_results();
                                            echo $count;
                                            ?>
                                        </h1>
                                        <p><?php echo lang('case_history'); ?></p>
                                    </div>
                                </section>
                                <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                            </a>
                        <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if (in_array('lab', $modules)) { ?>
                        <div class="col-lg-3 col-sm-6">
                            <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                            <a href="<?php echo site_url(); ?>lab">
                                <?php } ?>
                                <section class="panel">
                                    <div class="symbol terques">
                                        <i class="fa fa-medkit"></i>
                                    </div>
                                    <div class="value">
                                        <h1 class="">
                                            <?php
                                            $this->db->where('hospital_id', $hospital_id);
                                            $this->db->from('lab');
                                            $count = $this->db->count_all_results();
                                            echo $count;
                                            ?>
                                        </h1>
                                        <p><?php echo lang('lab_report'); ?></p>
                                    </div>
                                </section>
                                <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                            </a>
                        <?php } ?>
                        </div>
                    <?php } ?>



                    <?php if (in_array('patient', $modules)) { ?>
                        <div class="col-lg-3 col-sm-6">
                            <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                            <a href="<?php echo site_url(); ?>patient/documents">
                                <?php } ?>
                                <section class="panel">
                                    <div class="symbol blue">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="value">
                                        <h1 class="">
                                            <?php
                                            $this->db->where('hospital_id', $hospital_id);
                                            $this->db->from('patient_material');
                                            $count = $this->db->count_all_results();
                                            echo $count;
                                            ?>
                                        </h1>
                                        <p><?php echo lang('documents'); ?></p>
                                    </div>
                                </section>
                                <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                            </a>
                        <?php } ?>
                        </div>
                    <?php } ?>



                    <?php if (in_array('medicine', $modules)) { ?>
                        <div class="col-lg-3 col-sm-6">
                            <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                            <a href="<?php echo site_url(); ?>medicine">
                                <?php } ?>
                                <section class="panel">
                                    <div class="symbol blue">
                                        <i class="fa fa-medkit"></i>
                                    </div>
                                    <div class="value">
                                        <h1 class="">
                                            <?php
                                            $this->db->where('hospital_id', $hospital_id);
                                            $this->db->from('medicine');
                                            $count = $this->db->count_all_results();
                                            echo $count;
                                            ?>
                                        </h1>
                                        <p><?php echo lang('medicine'); ?></p>
                                    </div>
                                </section>
                                <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                            </a>
                        <?php } ?>
                        </div>
                    <?php } ?>


                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                        <?php if (in_array('finance', $modules)) { ?>
                            <div class="col-lg-6 col-sm-6">
                                <a href="<?php echo site_url(); ?>finance/payment">
                                    <section class="panel">
                                        <div class="symbol terques">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="value">
                                            <h1 class=" count14">
                                                <?php echo $settings->currency; ?> <?php echo number_format($sum[0]->gross_total, 2); ?>
                                            </h1>
                                            <p><?php echo lang('total_payment'); ?></p>
                                        </div>
                                    </section>
                                </a>
                            </div>
                        <?php } ?>


                        <div class="col-lg-3 col-sm-6">
                            <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <a href="<?php echo site_url(); ?>settings">
                                <?php } ?>
                                <section class="panel">
                                    <div class="symbol blue">
                                        <i class="fa fa-cogs"></i>
                                    </div>
                                    <div class="value">
                                        <h1 class="">

                                        </h1>
                                        <p><?php echo lang('settings'); ?></p>
                                    </div>
                                </section>
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                            </a>
                        <?php } ?>
                        </div>

                    <?php } ?>

                </div>

            <?php } ?> <!-- end for only Doctors to view home-->



            <?php if (in_array('appointment', $modules)) { ?>
                <div class="state-overview col-md-12">
                    <aside class="calendar_ui">
                        <section class="">
                            <div class="">
                                <div id="calendar" class="has-toolbar calendar_view"></div>
                            </div>
                        </section>
                    </aside>
                </div>
            <?php } ?>

            <!--


            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
            <?php echo lang('patient_appointment_graph'); ?>
                    </header>
                    <div class="panel-body">
                        <div id="hero-bar2" class="graph"></div>
                    </div>
                </section>
            </div>

            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
            <?php echo lang('expense_graph'); ?>
                    </header>
                    <div class="panel-body">
                        <div id="hero-bar1" class="graph"></div>
                    </div>
                </section>
            </div>
            
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
            <?php echo lang('sales_graph'); ?>
                    </header>
                    <div class="panel-body">
                        <div id="hero-bar" class="graph"></div>
                    </div>
                </section>
            </div>

            -->

            <style>

                table{
                    box-shadow: none;
                }

                .fc-head{

                    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);

                }

                .panel-body{
                    background: #fff;
                }

                thead{
                    background: #fff;
                }

                .panel-body {
                    background: #fff;
                }

                .panel-heading {
                    border-radius: 0px;
                    background: #fff !important;
                    color: #000;
                    padding-left: 10px;
                    font-size: 13px !important;
                    margin-top: 3px;
                    text-align: center;
                }

                .add_patient{
                    background: #009988;
                }

                .add_appointment{
                    background: #f8d347;
                }

                .add_prescription{
                    background: blue;
                }

                .add_lab_report{

                }

                .y-axis li span {
                    display: block;
                    margin: -20px 0 0 -25px;
                    padding: 0 20px;
                    width: 40px;
                }

                .sale_color{
                    background: #69D2E7 !important;
                    padding: 10px !important;
                    font-size: 5px;
                    margin-right: 10px;
                }

                .expense_color{
                    background: #F38630 !important;
                    padding: 10px !important;
                    font-size: 5px;
                    margin-right: 10px;
                }

                audio, canvas, progress, video {
                    display: inline-block;
                    vertical-align: baseline;
                    width: 100% !important;
                    height: 101% !important;
                    margin-bottom: 18%;
                }  


            </style>


            </div>
            <!--state overview end-->
        </section>


    <?php } else { ?>
        <section class="col-md-12">
            <div class="col-lg-6 col-sm-6 row">
                <h1><span class="livee">Online </span> Clinic</h1>
            </div>
        </section>
        <?php foreach ($hospitals as $hospital) { ?>    
            <div class="col-lg-6 col-sm-6">
                <section class="panel">
                    <div class="symbol super">
                        <?php echo $hospital->name; ?>
                    </div>
                    <div class="value super1"> 
                        <p class="">
                            Email:   <?php echo $hospital->email; ?>
                        </p>
                        <p class="">
                            Address:   <?php echo $hospital->address; ?>
                        </p>
                        <p class="">
                            Phone:  <?php echo $hospital->phone; ?>
                        </p>
                    </div>
                </section>
            </div>
        <?php } ?>
    <?php } ?>


</section>
<!--main content end-->
<!--footer start-->
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->

<script src="common/js/jquery-1.8.3.min.js"></script>

<script src="common/js/all-chartjs.js"></script>

<script src="common/assets/morris.js-0.4.3/morris.min.js" type="text/javascript"></script>
<script src="common/assets/morris.js-0.4.3/raphael-min.js" type="text/javascript"></script>
<script src="common/assets/chart-master/Chart.js"></script>

<script>

    //owl carousel

    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay: true

        });
    });

    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

<?php
$total_this = $this_month[1] + $this_month[0];
?>

    var pieData = [
        {
            value: <?php echo $this_month[1] / $total_this * 180; ?>,
            color: "#F38630"
        },
        {
            value: <?php echo $this_month[0] / $total_this * 180; ?>,
            color: "#69D2E7"
        }

    ];

    new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);



    Morris.Bar({
        element: 'hero-bar2',
        data: [
            {device: 'Jan', geekbench: <?php echo $jan_total2; ?>},
            {device: 'Feb', geekbench: <?php echo $feb_total2; ?>},
            {device: 'March', geekbench: <?php echo $mar_total2; ?>},
            {device: 'April', geekbench: <?php echo $apr_total2; ?>},
            {device: 'May', geekbench: <?php echo $may_total2; ?>},
            {device: 'Jun', geekbench: <?php echo $jun_total2; ?>},
            {device: 'Jul', geekbench: <?php echo $jul_total2; ?>},
            {device: 'Ayg', geekbench: <?php echo $aug_total2; ?>},
            {device: 'Sep', geekbench: <?php echo $sep_total2; ?>},
            {device: 'Oct', geekbench: <?php echo $oct_total2; ?>},
            {device: 'Nov', geekbench: <?php echo $nov_total2; ?>},
            {device: 'Dec', geekbench: <?php echo $dec_total2; ?>}
        ],
        xkey: 'device',
        ykeys: ['geekbench'],
        labels: ['Geekbench'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
        barColors: ['#6883a3']
    });
    Morris.Bar({
        element: 'hero-bar1',
        data: [
            {device: 'Jan', geekbench: <?php echo $jan_total1; ?>},
            {device: 'Feb', geekbench: <?php echo $feb_total1; ?>},
            {device: 'March', geekbench: <?php echo $mar_total1; ?>},
            {device: 'April', geekbench: <?php echo $apr_total1; ?>},
            {device: 'May', geekbench: <?php echo $may_total1; ?>},
            {device: 'Jun', geekbench: <?php echo $jun_total1; ?>},
            {device: 'Jul', geekbench: <?php echo $jul_total1; ?>},
            {device: 'Ayg', geekbench: <?php echo $aug_total1; ?>},
            {device: 'Sep', geekbench: <?php echo $sep_total1; ?>},
            {device: 'Oct', geekbench: <?php echo $oct_total1; ?>},
            {device: 'Nov', geekbench: <?php echo $nov_total1; ?>},
            {device: 'Dec', geekbench: <?php echo $dec_total1; ?>}
        ],
        xkey: 'device',
        ykeys: ['geekbench'],
        labels: ['Geekbench'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
        barColors: ['#6883a3']
    });

    Morris.Bar({
        element: 'hero-bar',
        data: [
            {device: 'Jan', geekbench: <?php echo $jan_total; ?>},
            {device: 'Feb', geekbench: <?php echo $feb_total; ?>},
            {device: 'March', geekbench: <?php echo $mar_total; ?>},
            {device: 'April', geekbench: <?php echo $apr_total; ?>},
            {device: 'May', geekbench: <?php echo $may_total; ?>},
            {device: 'Jun', geekbench: <?php echo $jun_total; ?>},
            {device: 'Jul', geekbench: <?php echo $jul_total; ?>},
            {device: 'Ayg', geekbench: <?php echo $aug_total; ?>},
            {device: 'Sep', geekbench: <?php echo $sep_total; ?>},
            {device: 'Oct', geekbench: <?php echo $oct_total; ?>},
            {device: 'Nov', geekbench: <?php echo $nov_total; ?>},
            {device: 'Dec', geekbench: <?php echo $dec_total; ?>}
        ],
        xkey: 'device',
        ykeys: ['geekbench'],
        labels: ['Geekbench'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
        barColors: ['#6883a3']
    });

</script>

</body>
</html>
