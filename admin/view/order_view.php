
<section id="" class="py-3">
    <div class="container-xxl">
        <div class="row">
            <div class="col-9">
                <form method="POST" id="" >
                    <div class="form-group">
                        <table class="table table-striped table-bordered table-data">
                        <thead>
                            <th>ID Ordres</th>
                            <th>product name</th>
                            <th>Date of paiment</th>
                            <th>user name</th>
                            <th>etat</th>
                            <th>etat</th>
                        </thead>
                            <tbody>
                                <?php foreach ($get_order as $item): ?>
                                    <tr data-id="<?php echo $item['id'] ?>">
                                        <td>
                                            <input type="number" value="<?php echo $item['id'] ?>" readonly
                                                name="id-<?php echo $item['id'] ?>">
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $item['product_name'] ?>" readonly
                                                name="name-<?php echo $item['id'] ?>" class="text-center">
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $item['date'] ?>" readonly
                                                name="date-<?php echo $item['id'] ?>" class="text-center">
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $item['user_id'] ?>" readonly
                                                name="uname-<?php echo $item['id'] ?>" class="text-center">
                                        </td>
                                        <td>
                                        <select name="etat-<?php echo $item['id'] ?>">
                                        <option value="<?php echo $item['etat'] ?>" selected>
                                        <?php echo $item['etat']; ?>
                                        </option>
                                          <option value="verification in progress">verification in progress</option>
                                          <option value="pending delivery">pending delivery</option>
                                          <option value="delivered">delivered</option>
                                        </select>
                                        </td>
                                        <td>
                                            <button type="submit" name="ord-update"
                                                formmethod="POST"
                                                formaction="order.php?id=<?php echo $item['id'] ?>"
                                                class="btn btn-warning">Update</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
