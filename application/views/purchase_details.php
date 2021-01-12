<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
    <div class="ms-panel">
        <div class="ms-panel-header">
            <h6 class="mb-3">Purchase Details</h6>
            <form class=" form-inline">
                <div class="form-group">
                    <label for="">Start Date</label>
                    <input type="date" id="start-date" name="startDate" class="form-control mx-sm-3" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label for="">End Date</label>
                    <input type="date" id="end-date" name="endtDate" class="form-control mx-sm-3" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <button class="btn btn-outline-primary" id="btn-load" onclick="loadPurchaseDetails(event);">Search</button>
            </form>
        </div>
        <div class="ms-panel-body">
            <div class="table-responsive">
                <table id="purchase-details-table" class="table table-striped thead-primary w-100">
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
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>