<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="ms-panel ms-panel-fh ms-crypto-orders">
                <div class="ms-panel-header">
                    <h6>Available Quantity</h6>

                </div>
                <div class="ms-panel-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover thead-light">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Injection</th>
                                <th scope="col">Quantity</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            foreach ($injections as $injection):
                            ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$injection->name?></td>
                                <td><?=$injection->availableQuantity?></td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>

