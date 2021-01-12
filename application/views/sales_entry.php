<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">

    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="ms-panel ms-panel-fh">
                <div class="ms-panel-header">
                    <h6>Sales Entry</h6>
                </div>
                <div class="ms-panel-body">
                    <?php if ($this->session->flashdata('msg')): ?>
                    <div class="alert alert-info alert-dismissible fade show" role = "alert" >
                    <p><?= $this->session->flashdata('msg');?></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                endif;
                ?>
                <form class="needs-validation clearfix" novalidate="" id="sales-entry-form" method="post"
                      action="<?= base_url('save-sales-entry'); ?>">
                    <div class="form-row">
                        <div class="col-xl-4 col-md-4 ">
                            <label for="patient-name">Patient Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="patient-name" name="patientName"
                                       placeholder="Patient Name" required="true">
                                <div class="invalid-feedback">
                                    Patient Name
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 ">
                            <label for="patient-id">Patient Id</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="patient-id" name="id"
                                       placeholder="Patient Id" required="true" readonly>
                                <div class="invalid-feedback">
                                    Patient Id
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <label class="" for="center">Choose Center</label>
                            <select class="form-control" id="center" name="centerId" readonly>
                                <option value="-1">---Select Center---</option>
                                <?php foreach ($centers as $center): ?>
                                    <option value="<?= $center->id ?>"><?= $center->name ?></option>
                                <?php endforeach; ?>
                                <option value="0">All</option>
                            </select>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <label for="date">Date</label>
                            <div class="input-group">
                                <input type="date" class="form-control ui-datepicker" id="date" name="date"
                                       required="true" value="<?php echo date('Y-m-d'); ?>">
                                <div class="invalid-feedback">
                                    Date
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <label for="mrp" data-toggle="tooltip" data-placement="left"
                                   title="Select Injection">Select Injection </label>
                            <div class="input-group">
                                <select class="form-control" id="injection" required="true" name='injectionId'>
                                    <option value="-1" selected disabled>---Select Injection---</option>
                                    <?php foreach ($injections as $injection): ?>
                                        <option value="<?= $injection->id ?>"><?= $injection->name ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <label for="unit" data-toggle="tooltip" data-placement="left"
                                   title="Select Unit">Select Unit </label>
                            <div class="input-group">
                                <select class="form-control" id="unit" required="true" name='unit'>
                                    <option value="-1" selected disabled>---Select Unit---</option>
                                    <option value="Vial">Vial</option>
                                    <option value="Vial">Ampoule</option>
                                    <option value="IU">IU</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <label for="quantity" data-toggle="tooltip" data-placement="left"
                                   title="Quantity">Quantity</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                       placeholder="Quantity" required="true">
                                <div class="invalid-feedback">
                                    Please provide quantity
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-4 col-md-4">
                            <label for="cost" data-toggle="tooltip" data-placement="left"
                                   title="Cost">Total Cost</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cost" name="cost"
                                       placeholder="Cost" required="true">
                                <div class="invalid-feedback">
                                    Please provide cost
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <label for="amount-paid" data-toggle="tooltip" data-placement="left"
                                   title="Amount Paid">Amount Paid</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="amount-paid" name="paidAmount"
                                       placeholder="Amount Paid" required="true">
                                <div class="invalid-feedback">
                                    Amount Paid
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <label for="amount-due" data-toggle="tooltip" data-placement="left"
                                   title="Amount Due">Amount Due</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="amount-due" name="dueAmount"
                                       placeholder="Amount Due">
                                <div class="invalid-feedback">
                                    Amount Due
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary float-right" type="submit" id="save-btn">Save</button>
                        </div>

                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
</div>