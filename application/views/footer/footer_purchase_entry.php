</main>


<!-- SCRIPTS -->
<!-- Global Required Scripts Start -->
<script src="<?= base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/perfect-scrollbar.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-ui.min.js'); ?>"></script>
<!-- Global Required Scripts End -->
<script src="<?= base_url('assets/js/sweetalert2.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sweet-alerts.js'); ?>"></script>
<script src="<?= base_url('assets/js/promise.min.js'); ?>"></script>
<!-- Page Specific Scripts End -->

<!--  core JavaScript -->
<script src="<?= base_url('assets/js/framework.js'); ?>"></script>

<!-- Settings -->
<script src="<?= base_url('assets/js/settings.js'); ?>"></script>


<script>

    $('#add-btn').click(function (e) {
        if ($('#purchase-entry-form')[0].checkValidity())
            addEntryToTable();
    });

    function addEntryToTable() {
        if (!this.srNo) this.srNo = 1;

        var injection = $('#injection').val();
        var brand = $('#brand').val();
        var supplier = $('#supplier').val();
        var invoice = $('#invoice').val();
        var date = $('#date').val();
        var mrp = $('#mrp').val();
        var quantity = $('#quantity').val();
        var discount = $('#discount').val();


        $('#entries').append('<tr><td class="sr-no">' + this.srNo + '</td><td class="injection">' +
            injection + '</td><td class="brand">' + brand + '</td><td class="supplier">' +
            supplier + '</td><td class="invoice">' + invoice + '</td><td class="date">' +
            date + '</td><td class="mrp">' +
            mrp + '</td><td class="quantity">' + quantity + '</td><td class="discount">' +
            discount + '</td><td>' + '<a href="javascript:void(0);" class="btn-delete"><i class="far fa-trash-alt ms-text-danger"></i></a>' +
            '</td></tr>'
        );
        this.srNo += 1;

        $('#purchase-entry-form')[0].reset();
    }

    $("body").on("click", ".btn-delete", function () {
        $(this).parents("tr").remove();
    });


    $('#save-btn').click(function (e) {
        savePurchaseEntries();
    });

    function savePurchaseEntries() {
        var purchaseEntries = [];
        var columns = ["sr", "injectionId", "brand", "supplier", "invoiceNumber", "date", "mrp", "quantity", "discount"];
        $("#entries > tr").each(function () {

            let i = 0;
            let purchaseEntry = {};
            $(this).find('td').each(function () {

                if (i !== 0 && i < columns.length - 1) {
                    purchaseEntry[columns[i]] = $(this).text();
                }
                i++;

            });

            if (purchaseEntry != null) {
                purchaseEntries.push(purchaseEntry);
            }

        });

        purchaseEntries = JSON.stringify(purchaseEntries);

        if (purchaseEntries.length <= 0) {
            swal('Warning', 'Please add at least one entry', 'warning');
        } else {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?=base_url("Main/savePurchaseEntries");?>',
                data: {data: purchaseEntries},
                success: function (response) {
                    if (response.status == 'success') {
                        swal('Success', response.msg, 'success');
                        $("#entries > tr").remove();
                    }else{
                        swal('Error', response.msg, 'error');
                    }
                }

            });
        }

    }

</script>


</body>


</html>

