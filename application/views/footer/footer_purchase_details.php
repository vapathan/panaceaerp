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


<!--  core JavaScript -->
<script src="<?= base_url('assets/js/framework.js'); ?>"></script>

<!-- Settings -->
<script src="<?= base_url('assets/js/settings.js'); ?>"></script>

<script>
    function loadPurchaseDetails() {
        let startDate = $('#start-date').val();
        let endDate = $('#end-date').val();
        var table = $('#purchase-details-table').DataTable({
            "destroy": true,
            "processing": true,
            "dom": 'Bfrtilp',
            buttons: [
                'excel', 'pdf'
            ],
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "scrollX": true,
            "ajax": {
                url: "<?php echo site_url("Main/getPurchaseDetails") ?>",
                type: 'POST',
                data: {startDate: startDate, endDate: endDate}
            },
            'language': {
                'emptyTable': 'No Purchase',
                'processing': '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
            }
        });
    }

    $('#btn-load').on('click', function (e) {
        e.preventDefault();

            loadPurchaseDetails();

    })


</script>

</body>


</html>

