<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
    <div class="ms-panel">
        <div class="ms-panel-header">
            <h6 class="mb-3">Purchase Details</h6>
            <form class=" form-inline">
                <div class="form-group">
                    <label class="" for="center">Choose Center</label>
                    <select class="form-control mx-sm-3" id="center">
                        <option value="-1">---Select Center---</option>
                        <?php foreach ($centers as $center): ?>
                            <option value="<?= $center->id ?>"><?= $center->name ?></option>
                        <?php endforeach; ?>
                        <option value="0">All</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Start Date</label>
                    <input type="date" id="start-date" name="startDate" class="form-control mx-sm-3"
                           value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label for="">End Date</label>
                    <input type="date" id="end-date" name="endtDate" class="form-control mx-sm-3"
                           value="<?php echo date('Y-m-d'); ?>">
                </div>
                <button class="btn btn-outline-primary" id="btn-load" onclick="loadSalesDetails(event);">Search</button>
            </form>
        </div>
        <div class="ms-panel-body">
            <div class="table-responsive">
                <table id="sales-details-table" class="table table-striped thead-primary w-100">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Center</th>
                        <th scope="col">Injection</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Amount Paid</th>
                        <th scope="col">Amount Due</th>
                        <th scope="col">Action</th>
                        <th scope="col">Patient Id</th>
                        <th scope="col">Sales Order Id</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
     aria-labelledby="addPatientModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Collect Due Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <p><strong>Patient Name : </strong> <span id="patientName"></span></p>
                        <p><strong>Center : </strong> <span id="centerName"></span></p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <p><strong>Toal Amount : </strong> <span id="totalAmount"></span></p>
                        <p><strong>Paid Amount : </strong> <span id="paidAmount"></span></p>
                        <p><strong>Amount Due : </strong> <span id="dueAmount"></span></p>
                    </div>
                </div>
                <form class="needs-validation clearfix" id="payment-form" novalidate="" method="post">
                    <div class="form-group row">
                        <label for="amount" class="col-sm-2 col-form-label">Amount</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="amount" placeholder="amount"
                                   name="amount" required="true">
                            <div class="invalid-feedback">
                                Please enter amount.
                            </div>
                        </div>
                        <label for="" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-4">

                            <input type="date" id="date" name="date" class="form-control"
                                   value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <input type="hidden" id="patientId" name="patientId">
                    <input type="hidden" id="salesOrderId" name="salesOrderId">
                    <div class="modal-footer">
                        <button class="btn btn-neutral" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>