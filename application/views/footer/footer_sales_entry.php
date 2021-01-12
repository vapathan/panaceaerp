</main>


<!-- SCRIPTS -->
<!-- Global Required Scripts Start -->
<script src="<?= base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/perfect-scrollbar.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-ui.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.easy-autocomplete.min.js'); ?>"></script>
<!-- Global Required Scripts End -->

<!-- Page Specific Scripts End -->

<!--  core JavaScript -->
<script src="<?= base_url('assets/js/framework.js'); ?>"></script>

<!-- Settings -->
<script src="<?= base_url('assets/js/settings.js'); ?>"></script>
<script>

    $(function () {

        setTimeout(function () {
            $(".alert").alert('close');
        }, 2000);


        var options = {
            url: function (phrase) {
                if (phrase.length > 0) {
                    return "<?=base_url('Main/searchPatients');?>?phrase=" + phrase;
                } else {
                    return false;
                }
            },
            getValue: "name",
            list: {

                onSelectItemEvent: function () {
                    var id = $("#patient-name").getSelectedItemData().id;
                    $("#patient-id").val(id).trigger("change");

                    var centerId = $('#patient-name').getSelectedItemData().centerId;

                    $('#center').val(centerId);
                }
            }
        }

        $("#patient-name").easyAutocomplete(options);

        $('div.easy-autocomplete').attr('style', 'width:100%;');

    });

    function calculateCost() {
        let injectionId = $('#injection').val();
        let quantity = $('#quantity').val();
        let unit = $('#unit').val();

        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: '<?=base_url("Main/calculateCost");?>',
            data: {injectionId: injectionId, quantity: quantity, unit: unit},
            success: function (response) {
                if (response.status == 'success') {
                    $('#cost').val(response.msg);
                }
            }

        });

    }


    $("#quantity").keyup(function () {

            calculateCost();
    });


    $('#unit').change(function () {
        calculateCost();
    })

    $('#amount-paid').keyup(function () {
        var $this = $(this);
        $this.val($this.val().replace(/[^\d.]/g, ''));
        if ($this.val() > 0) {
            var pendingAmount = $('#cost').val() - $('#amount-paid').val();
            $('#amount-due').val(pendingAmount);
        }
    })

    $('#cost').keyup(function () {
        var $this = $(this);
        $this.val($this.val().replace(/[^\d.]/g, ''));
    });
    $('#amount-due').keyup(function () {
        var $this = $(this);
        $this.val($this.val().replace(/[^\d.]/g, ''));
    });


</script>

</body>


</html>

