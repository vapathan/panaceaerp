<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
    <div class="ms-panel">
        <div class="ms-panel-header">
            <h6 class="mb-3">Patients</h6>
            <div class="d-flex justify-content-between align-items-center">
                <form class="form-inline">
                    <div class="form-group">
                        <label class="" for="center">Choose Center</label>
                        <select class="form-control mx-sm-3" id="center">
                            <option value="-1" selected disabled>---Select Center---</option>
                            <?php foreach ($centers as $center): ?>
                                <option value="<?= $center->id ?>"><?= $center->name ?></option>
                            <?php endforeach; ?>
                            <option value="0">All</option>
                        </select>
                    </div>


                    <button class="btn btn-outline-primary" id="btn-load" onclick="loadPatients(event);">Search
                    </button>

                </form>
                <button class="btn btn-outline-info float-right" id="btn-add" data-toggle="modal"
                        data-target="#addPatientModal"><i class="fa fa-plus"></i> Add
                </button>
            </div>
        </div>
        <div class="ms-panel-body">
            <div class="table-responsive">
                <table id="patients-table" class="table table-striped thead-primary w-100">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Husband Name</th>
                        <th scope="col">Patient Type</th>
                        <th scope="col">Center</th>
                        <th scope="col">Age</th>
                        <th scope="col">Contact No.</th>
                        <th scope="col">Reg. Date</th>
                        <th scope="col">Address</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addPatientModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
     aria-labelledby="addPatientModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new patient</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation clearfix" id="add-patient-form" novalidate="" method="post">
                    <div class="form-group row">
                        <label for="patient-id" class="col-sm-2 col-form-label">Patient id</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="patient-id" placeholder="Patient id"
                                   name="id" required="true">
                            <div class="invalid-feedback">
                                Please enter patient id.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="patient-name" class="col-sm-2 col-form-label">Patient name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="patient-name" placeholder="Patient name"
                                   name="name" required="true">
                            <div class="invalid-feedback">
                                Please enter patient name.
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="husband-name" class="col-sm-2 col-form-label">Husband name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="husband-name" placeholder="Husband name"
                                   name="husbandName" required>
                            <div class="invalid-feedback">
                                Please enter husband name.
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="patient-type" class="col-sm-2 col-form-label">Patient Type</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="patient-type"
                                    name="patientType" required>
                                <option value="-1" disabled selected>---Select Patient Type---</option>
                                <?php foreach ($patientTypes as $patientType): ?>
                                    <option value="<?= $patientType->type ?>"><?= $patientType->type ?></option>
                                <?php endforeach; ?>

                            </select>
                            <div class="invalid-feedback">
                                Please select patient type.
                            </div>
                        </div>
                        <label for="pt-center" class="col-sm-2 col-form-label">Center</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="pt-center"
                                    name="centerId" required>
                                <option value="-1" disabled selected>---Select Center---</option>
                                <?php foreach ($centers as $center): ?>
                                    <option value="<?= $center->id ?>"><?= $center->name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a center.
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="age" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="age" placeholder="Age"
                                   name="age" required>
                            <div class="invalid-feedback">
                                Please enter age of patient.
                            </div>
                        </div>
                        <label for="mobile" class="col-sm-2 col-form-label">Contact number</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="mobile" placeholder="Contact number"
                                   name="mobile" required>
                            <div class="invalid-feedback">
                                Please enter contact number of patient
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Reg. Date</label>
                        <div class="col-sm-4">

                            <input type="date" id="reg-date" name="regDate" class="form-control"
                                   value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-4">
                            <textarea id="address" name="address" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-neutral" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>