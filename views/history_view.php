<div class="container-xxl">
    <div class="row">
        <div class="col-9 mx-auto mt-5">
            <div class="form-group">
            <h2 class="text-center mb-3">History of bought products</h2>
                <table class="table table-striped table-bordered table-data">
                    <thead>
                        <tr>
                            <th>ID Ordres</th>
                            <th>product name</th>
                            <th>Date of paiment</th>
                            <th>user name</th>
                            <th>etat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($get_history as $item): ?>
                            <tr data-id="<?php echo $item['id'] ?>">
                                <td>
                                    <input type="number" value="<?php echo $item['id'] ?>" readonly>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $item['product_name'] ?>" readonly class="text-center">
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $item['date'] ?>" readonly class="text-center">
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $item['user_id'] ?>" readonly class="text-center">
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $item['etat'] ?>" readonly class="text-center">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
