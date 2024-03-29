<!-- Shopping cart section  -->
<section id="cart" class="py-3 mb-5">
    <div class="container">
        <h5 class="font-size-20">
            Shopping Cart <span>
        </h5>
        <!--  shopping cart items -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                $products = $cart->getCart($_COOKIE['user_id'] ?? 0);
                $subTotal = [];
                foreach ($products as $productItems):
                    $item = $product->getProductall($productItems['item_id']);
                    ?>
                    <!-- cart item -->
                    <div class="row border-top py-3 mt-3">
                        <div class="col-sm-2">
                            <img src="<?php echo $item['image']; ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                        </div>
                        <div class="col-sm-8">
                            <h5 class="font-size-20">
                                <?php echo $item['name']; ?>
                            </h5>
                            <!-- product rating -->
                            <div class="d-flex">
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <a href="#" class="px-2 font-size-14">20,534 ratings</a>
                            </div>
                            <!--  !product rating-->

                            <!-- product qty -->
                            <div class="qty d-flex pt-2">
                                <div class="d-flex w-25">
                                    <button class="qty-up border bg-light w-25"
                                        data-id="<?php echo $item['id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                    <input type="text" data-id="<?php echo $item['id'] ?? '0'; ?>"
                                        class="qty_input text-center border px-2 w-100 bg-light" disabled value="1"
                                        placeholder="1">
                                    <button data-id="<?php echo $item['id'] ?? '0'; ?>"
                                        class="qty-down border bg-light w-25"><i class="fas fa-angle-down"></i></button>
                                </div>

                                <form method="POST">
                                    <input type="hidden" value="<?php echo $item['id'] ?? 0; ?>" name="item_id">
                                    <button type="submit" name="delete-cart-submit"
                                        class="btn text-danger px-3 border-right">Delete</button>
                                </form>
                            </div>
                            <!-- !product qty -->
                        </div>
                        <div class="col-sm-2 text-right">
                            <div class="font-size-20 text-danger">
                                <span class="product_price" data-id="<?php echo $item['id'] ?? '0'; ?>">
                                    <?php
                                    $price = $item['price'] ?? 0;
                                    $subTotal[] = $price;
                                    echo $price;
                                    ?>
                                 DT</span>
                            </div>
                        </div>
                    </div>
                    <!-- !cart item -->
                    <?php
                endforeach;
                ?>
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12  text-success py-3">
                        <i class="fas fa-check"></i>
                        Your order is eligible for FREE Delivery.
                    </h6>
                    <div class="border-top py-4">
                        <h5 class="font-size-20">
                            <p>Subtotal (
                                <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item) :
                            </p>
                            <p class="text-danger">
                                <span>TND</span>
                                <span id="deal-price">
                                    <?php echo isset($subTotal) ? $cart->getSum($subTotal) : 0;
                                     ?>
                                </span>
                            </p>
                        </h5>
                        <button type="submit" class="btn btn-warning mt-3 max-w-10 !important" id='connect-button'>Connectez vous à Metamask</button>
                        <?php
                        
                        $button_text = '<span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> Payez';
                        if (isset($_SESSION['payment_completed'])) {
                        $button_text = '<i class="fas fa-check"></i> Payment complete';
                        }
                        ?>
                        <button type="submit" class="btn btn-warning mt-3" id='send-button'><?php echo $button_text; ?></button>

                        <script>
                            let tnd_eth_fx;
                            let price_tnd = <?php echo isset($subTotal) ? $cart->getSum($subTotal) : 0; ?>;
                            let account;

                            // Get the latest exchange rate from Coinbase API
                            fetch("https://api.coinbase.com/v2/exchange-rates?currency=ETH")
                               .then(response => response.json())
                               .then(data => {
                               tnd_eth_fx = data.data.rates.TND;
                            })
                            .catch(err => {
                            console.log("Error fetching exchange rate: ", err);
                             });

                            document.getElementById('connect-button').addEventListener('click', event => {
                            let button = event.target;
                            ethereum.request({method: 'eth_requestAccounts'}).then(accounts => {
                            account = accounts[0];
                            console.log(account);
                            button.textContent = account;

                            ethereum.request({method: 'eth_getBalance' , params: [account, 'latest']}).then(result => {
                                console.log('balance: '+ result);
                                let wei = parseInt(result,16);
                                console.log('wei: ' + wei);
                                let balance = wei / (10**18);
                               console.log(balance + ' ETH');
                              });
                             });
                            });

                            document.getElementById('send-button').addEventListener('click', event => {
                                 document.querySelector('#send-button .spinner-border').classList.remove('d-none');
                                let amount_eth = price_tnd / tnd_eth_fx;
                                let amount_wei = '0x' + (amount_eth * 10**18).toString(16);
                                console.log('amount_eth: ' + amount_eth);
                                console.log('amount_wei: ' + amount_wei);
                                let transactionParam = {
                                to: '0xc7b866431a63DE4397b839E02f3B3C8A7f0336f6',
                                from: account,
                                value: amount_wei
                            };
                            ethereum.request({method: 'eth_sendTransaction', params:[transactionParam]}).then(txhash => {
                               console.log(txhash);
                               checkTransactionconfirmation(txhash).then(r => alert(r));
                             });
                            });
                            function checkTransactionconfirmation(txhash) {
                               let checkTransactionLoop = () => {
                               return ethereum.request({method:'eth_getTransactionReceipt',params:[txhash]}).then(r => {
                               if(r !=null) {
                                    // Change the button's HTML content to a check mark icon
                                    document.querySelector('#send-button').innerHTML = '<i class="fas fa-check"></i> Payment complete';  
                                    let xhr = new XMLHttpRequest();
                                    xhr.open('POST', 'set_payment_status.php');
                                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                    xhr.send('status=completed');
                                    // Pass the payment status in the URL
                                    window.location.href = "History.php?payment_completed=true";
                                    window.location.replace("History.php");
                                }
                                else return checkTransactionLoop();
                                });
                                };
                                return checkTransactionLoop();
                            }
                    </script>

                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!-- !shopping cart items -->
    </div>
</section>
<!-- !Shopping cart section  -->