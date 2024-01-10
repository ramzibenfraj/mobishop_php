<!-- start #account -->
<section id="account" class="py-3">
    <div class="container-xxl">
        <div class="row">
            <div class="col-9">
                <form method="POST" id="categorie" >
                    <div class="form-group">
                        <table class="table table-striped table-bordered table-data">
                        <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Brand</th>
                                    <th>Company</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($brandData as $item): ?>
                                    <tr data-id="<?php echo $item['id'] ?>">
                                        <td>
                                            <input type="number" value="<?php echo $item['id'] ?>" readonly
                                                name="id-<?php echo $item['id'] ?>">
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $item['brand'] ?>"
                                                name="brand-<?php echo $item['id'] ?>" class="text-center">
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $item['company'] ?>"
                                                name="company-<?php echo $item['id'] ?>" class="text-center">
                                        </td>
                                        <td>
                                            <button type="submit" name="cat-update"
                                                formmethod="POST"
                                                formaction="categorie.php?id=<?php echo $item['id'] ?>"
                                                class="btn btn-warning">Update</button>
                                        </td>
                                        <td>
                                            <button type="submit" name="cat-delete"
                                                formmethod="POST" 
                                                formaction="categorie.php?id=<?php echo $item['id'] ?>"
                                                class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-secondary addItem">Add Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- !start #account -->