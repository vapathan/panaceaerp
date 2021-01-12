<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">

    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="ms-panel ms-panel-fh">

                <div class="ms-panel-body">
                    <form class="needs-validation clearfix" novalidate="" id="purchase-entry-form">
                        <div class="form-row">
                            <div class="col-xl-4 col-md-4">
                                <label for="mrp" data-toggle="tooltip" data-placement="left"
                                       title="Select Injection">Select Injection </label>
                                <div class="input-group">
                                    <select class="form-control" id="injection" required="true">
                                        <option value="-1" disabled>---Select Injection---</option>
                                        <?php foreach ($injections as $injection): ?>
                                            <option value="<?= $injection->id ?>"><?= $injection->name ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 ">
                                <label for="brand">Brand Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="brand"
                                           placeholder="Brand Name" required="">
                                    <div class="invalid-feedback">
                                        Brand Name
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 ">
                                <label for="supplier">Supplier Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="supplier"
                                           placeholder="Supplier Name" required="true">
                                    <div class="invalid-feedback">
                                        Supplier Name
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 ">
                                <label for="invoice">Invoice Number</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="invoice"
                                           placeholder="Invoice Number" required="true">
                                    <div class="invalid-feedback">
                                        Invoice Number
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-4">
                                <label for="date">Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control ui-datepicker" id="date"
                                           required="true" value="<?php echo date('Y-m-d'); ?>">
                                    <div class="invalid-feedback">
                                        Brand Name
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-4">
                                <label for="mrp" data-toggle="tooltip" data-placement="left"
                                       title="MRP">MRP</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="mrp"
                                           placeholder="MRP"">
                                    <div class="invalid-feedback">
                                        MRP
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-12">
                                <label for="quantity" data-toggle="tooltip" data-placement="left"
                                       title="Quantity">Quantity</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="quantity"
                                           placeholder="Quantity" required="true">
                                    <div class="invalid-feedback">
                                        Please provide quantity
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="discount" data-toggle="tooltip" data-placement="left"
                                       title="Discount">Purchase Rate</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="discount"
                                           placeholder="Purchase Rate" required="true">
                                    <div class="invalid-feedback">
                                        Purchase Rate
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-primary " type="button" id="add-btn">Add</button>
                            </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="ms-panel">
        <div class="ms-panel-header">
            <h6>Injection Purchase Entries</h6>
        </div>
        <div class="ms-panel-body">
            <button class="btn btn-green mr-2 mt-0 mb-2 ms-graph-metrics float-right" id="save-btn">Save</button>
            <div class="table-responsive">
                <table class="table table-hover thead-primary">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Injection</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Invoice No.</th>
                        <th scope="col">Date</th>
                        <th scope="col">MRP</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Discount(%)</th>
                        <th scope="col">Remove</th>
                    </tr>
                    </thead>
                    <tbody id="entries">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
