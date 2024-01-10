<!-- start #account -->
<section id="account" class="py-3">
    <?php if ($_SESSION['logged'] == false) {
        header("Location: login.php");
    } ?>
    <div class="container-xxl">
        <div class="row">
            <div class="col-9">
                <form method="POST" id="account-member" >
                    <div class="form-group">
                        <table class="table table-striped table-bordered table-data">
                        <thead>
                        <tr>
                             <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Privilege</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                            <tbody>
                                <?php foreach ($accData as $item): ?>
                                    <tr data-id="<?php echo $item['id'] ?>">
                                        <td>
                                            <input type="number" value="<?php echo $item['id'] ?>" readonly
                                                name="id-<?php echo $item['id'] ?>">
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $item['username'] ?>"
                                                name="username-<?php echo $item['id'] ?>" class="text-center">
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $item['password'] ?>"
                                                name="password-<?php echo $item['id'] ?>" class="text-center">
                                        </td>
                                        <td>
                                            <select name="privilege-<?php echo $item['id'] ?>">
                                                <option value="<?php echo $item['privilege'] ?>" selected>
                                                    <?php echo $item['privilege'] ? 'Admin' : 'User'; ?>
                                                </option>
                                                <option value="1">Admin</option>
                                                <option value="0">User</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" name="account-update"
                                                formmethod="POST"
                                                formaction="account.php?id=<?php echo $item['id'] ?>"
                                                class="btn btn-warning">Update</button>
                                        </td>
                                        <td>
                                            <button type="submit" name="account-delete"
                                                formmethod="POST"
                                                formaction="account.php?id=<?php echo $item['id'] ?>"
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