<!-- start login -->
<section class="login">
    <div class="main py-3">
        <!-- log in -->
        <form method="POST" class="form" id="sign-in">
            <?php if ($_SESSION['logged'] == true) { ?>
                <h3>
                    Welcome back,
                    <span>
                        <?php echo $acc->getAccount($_COOKIE['user_id'])['username'] ?>!
                    </span>
                </h3>
                <img src="<?php echo $acc->getAccount($_COOKIE['user_id'], 'user')['avatar'] ?>" alt="avatar"
                    class="rounded-circle my-3" style="width: 120px;height: 120px;" />
                <h5 class="mb-2">
                    <strong>
                        <?php echo $acc->getAccount($_COOKIE['user_id'], 'user')['fullname'] ?>
                    </strong>
                </h5>
                <p class="text-muted">
                    <?php echo $_COOKIE['user_type'] ? 'Web designer' : 'Customer' ?>
                    <span class="badge bg-primary">
                        <?php echo $_COOKIE['user_type'] ? 'Administrator' : 'User' ?>
                    </span>
                </p>
                <p class="mb-2">
                    <span>Money: </span>
                    <strong class="text-danger">
                        $
                        <?php echo $acc->getAccount($_COOKIE['user_id'], 'user')['money'] ?>
                    </strong>
                </p>
                <button class="form-submit" type="submit" name="logout-submit">Log out</button>
            <?php } ?>
        </form>
    </div>
</section>
<!-- !start login -->