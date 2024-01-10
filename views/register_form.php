<!-- start register -->
<section class="register">
    <div class="main py-3">
        <!-- sign up -->
        <form method="POST" class="form" id="sign-up">
            <h3 class="heading">Sign up</h3>
            <p class="desc">Register to receive offers from us right now!</p>
            <div class="row" style="width: 800px;">
                <div class="col">
                    <div class="form-group">
                        <label for="fullname" class="form-label">Fullname (*)</label>
                        <input id="fullname" name="fullname" type="text" rules="required" placeholder="full name"
                            class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="username" class="form-label">Username (*)</label>
                        <input id="username" name="username" type="text" rules="required|min:3|max:10"
                            placeholder="username" class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password (*)</label>
                        <input id="password" name="password" type="password" rules="required|min:3"
                            placeholder="password" class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm password (*)</label>
                        <input id="password_confirmation" name="password_confirmation"
                            rules="required|confirm:#password" placeholder="confirm password" type="password"
                            class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Phone (*)</label>
                        <input id="phone" name="phone" type="number" rules="required|min:10|max:10"
                            placeholder="phone number" class="form-control">
                        <span class="form-message"></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input id="avatar" name="avatar" type="file" class="form-radio-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="city" class="form-label">City (*)</label>
                        <select id="city" rules="required" name="city" class="form-control">
                            <option value="">-- chek your city --</option>
                            <option value="nabeul">nabeul</option>
                            <option value="tunis">tunis</option>
                            <option value="sfax">sfax</option>
                            <option value="sousse">sousse</option>
                            <option value="monastir">monastir</option>
                            <option value="mahdia">mahdia</option>
                            <option value="bizerte">bizerte</option>
                        </select>
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Gender (*)</label>
                        <div class="form-radio-control">
                            <div>
                                <input name="gender" type="radio" rules="checkone:gender" value="men"
                                    class="form-radio">men
                            </div>
                            <div>
                                <input name="gender" type="radio" rules="checkone:gender" value="wom"
                                    class="form-radio">wom
                            </div>
                        </div>
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <input id="address" name="address" type="text" placeholder="full adress"
                            class="form-control">
                        <span class="form-message"></span>
                    </div>
                </div>
            </div>

            <button class="form-submit" type="submit" name="register-submit">Sign up</button>
            <p class="desc">Already have an account? <a href="./login.html">Sign in</a></p>
        </form>

    </div>
</section>
<!-- !start register -->