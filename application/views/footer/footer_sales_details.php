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

</body>

<script>
    function loadSalesDetails(e) {

        e.preventDefault();
        getSalesDetails();

    }

    function getSalesDetails(){

        let centerId = $('#center').val();
        let startDate = $('#start-date').val();
        let endDate = $('#end-date').val();

        var table = $('#sales-details-table').DataTable({
            "destroy": true,
            "processing": true,
            "dom": 'Bfrtilp',
            buttons: [
                'excel', 'pdf'
            ],
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "scrollX": true,
            "ajax": {
                url: "<?php echo site_url("Main/getSalesDetails") ?>",
                type: 'POST',
                data: {'centerId': centerId, startDate: startDate, endDate: endDate}
            },
            'language': {
                'emptyTable': 'No Purchase',
                'processing': '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
            },
            "columnDefs": [
                {
                    "targets": [10],
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": [11],
                    "visible": false,
                    "searchable": false
                }
            ]
        });
    }

    $('#sales-details-table tbody').on('click', 'td', function () {

        var table = $('#sales-details-table').DataTable();

        var colIdx = table.cell(this).index().columnVisible;
        if (colIdx == 9) {

            var rowIdx = table
                .cell(this)
                .index().row;

            var data = table.row(rowIdx).data();

            $('#patientName').text(data[1]);
            $('#centerName').text(data[2]);
            $('#dueAmount').text(data[8]);
            $('#totalAmount').text(data[6]);
            $('#paidAmount').text(data[7]);

            $('#patientId').val(data[10])
            $('#salesOrderId').val(data[11])

            $('#paymentModal').modal('show');

        }
    })

    $('#paymentModal').on('hide.bs.modal', function (e) {
        $('#payment-form')[0].reset();
    })

    $('#payment-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: '<?=base_url("Main/collectPayment");?>',
            data: $(this).serialize(),
            success: function (response) {
                if (response.status == 'success') {
                    $('#paymentModal').modal('hide');
                    swal('Success', response.msg, 'success');
                    getSalesDetails();
                } else {
                    swal('Error', response.msg, 'error');
                }
            }
        });
    });

</script>

</html>

