</main>


<!-- SCRIPTS -->
<!-- Global Required Scripts Start -->
<script src="<?= base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/perfect-scrollbar.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-ui.min.js'); ?>"></script>
<!-- Global Required Scripts End -->

<!-- Page Specific Scripts End -->
<script src="<?= base_url('assets/js/datatables.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/data-tables.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vfs_fonts.js"></script>

<script src="<?= base_url('assets/js/sweetalert2.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sweet-alerts.js'); ?>"></script>
<script src="<?= base_url('assets/js/promise.min.js'); ?>"></script>

<!--  core JavaScript -->
<script src="<?= base_url('assets/js/framework.js'); ?>"></script>

<!-- Settings -->
<script src="<?= base_url('assets/js/settings.js'); ?>"></script>
<script>

    $('#addPatientModal').on('hide.bs.modal', function (e) {
        $('#add-patient-form')[0].reset();
    });

    $('#add-patient-form').submit(function (e) {

        e.preventDefault();
        let formData = new FormData($(this)[0]);
        $.ajax({
            method: 'POST',
            url: '<?=base_url("Main/addPatient");?>',
            dataType: 'json',
            data: $(this).serialize(),
            success: function (response) {
                if (response.status == 'success') {
                    $('#addPatientModal').modal('hide');
                    swal('Success', response.msg, 'success');
                } else {
                    swal('Error', respose.msg, 'error');
                }
            }

        })


    });

    $("#age").keyup(function () {
        var $this = $(this);
        $this.val($this.val().replace(/[^\d]/g, ''));
    });

    $('#mobile').keyup(function () {
        var $this = $(this);
        $this.val($this.val().replace(/[^\d]/g, ''));
    });


    function loadPatients(e) {
        e.preventDefault();

        var centerId = $('#center').val();

        if (centerId) {
            var table = $('#patients-table').DataTable({
                "destroy": true,
                "processing": true,
                "dom": 'Bfrtilp',
                buttons: [
                    'excel', 'pdf'
                ],
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                "scrollX": true,
                "ajax": {
                    url: "<?php echo site_url("Main/getPatients") ?>",
                    type: 'POST',
                    data: {'centerId': centerId}
                },
                'language': {
                    'emptyTable': 'No Patients',
                    'processing': '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                }
            });
        }

    }
</script>

</body>


</html>

