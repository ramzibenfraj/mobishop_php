<!-- start product -->
<?php
$id = $_GET['id'];
foreach ($product->getData() as $item):
    if ($item['id'] == $id):
        ?>
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?php echo $item['image']; ?>" alt="product" class="img-fluid">
                        <div class="pt-4 font-size-16">
                            <div class="col">
                                <button type="submit" class="btn btn-success form-control"
                                    onclick="alert('This is demo only')">Proceed to Buy</button>
                            </div>
                            <div class="col">
                                <form method="POST">
                                    <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $_COOKIE['user_id'] ?? 0 ?>">
                                    <?php                                    
                                    if (in_array($item['id'], $in_cart ?? [])) {
                                        echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                    } else {
                                        if (isset($_SESSION['logged']) && $_SESSION['logged'] == false) {
                                            echo '<a href="./login.php" class="btn btn-warning font-size-12">Login to Add to Cart</a>';
                                        } else {
                                            echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                        }
                                    } 
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <h5 class="font-size-20">
                            <?php echo $item['name']; ?>
                        </h5>
                        <small>by
                            <?php echo $manage->getBrand($item['brand'])['brand']; ?>
                        </small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-size-14">20,534 ratings | 1000+ answered questions</a>
                        </div>
                        <hr class="m-0">

                        <!--- product price -->
                        <table class="my-3 font-size-14">
                            <tr>
                                <td>M.R.P:</td>
                                <td><strike><span>
                                        <?php echo $item['price']+200 ?? 0 ?> DT
                                    </span></strike></td>
                            </tr>
                            <tr>
                                <td>Deal Price:</td>
                                <td class="font-size-20 text-danger">
                                    <span>
                                        <?php echo $item['price'] ?? 0; ?> DT
                                    </span>
                                </td>
                                <td>
                                    <span class="font-size-12">&nbsp;&nbsp;Inclusive of all taxes</span>
                                </td>
                            </tr>
                            <tr>
                                <td>You Save:</td>
                                <td><span class="font-size-16 text-danger"><?php echo $item['price'] ?? 0 ?> DT</span></td>
                            </tr>
                        </table>
                        <!-- !product price -->

                        <!-- #policy -->
                        <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center me-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-size-12">10 Days <br> Replacement</a>
                                </div>
                                <div class="return text-center me-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-truck  border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-size-12">About <br>Our</a>
                                </div>
                                <div class="return text-center me-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-size-12">1 Year <br>Warranty</a>
                                </div>
                            </div>
                        </div>
                        <!-- !policy -->
                        <hr>
                        <!-- order-details -->
                        <div id="order-details" class="d-flex flex-column">
                            <small>Delivery by : Mar 29 - Apr 1</small>
                            <small>Sold by <a href="#">Daily Electronics </a>(4.5 out of 5 | 18,198 ratings)</small>
                            <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer -
                                424201</small>
                        </div>
                        <!-- !order-details -->
                        <div class="row align-items-center">
                            <div class="col-6">
                                <!-- color -->
                                <div class="color my-3">
                                    <div class="d-flex justify-content-between">
                                        <h6>Color:</h6>
                                        <div class="p-2 color-yellow-bg rounded-circle">
                                            <button class="btn font-size-14"></button>
                                        </div>
                                        <div class="p-2 color-primary-bg rounded-circle">
                                            <button class="btn font-size-14"></button>
                                        </div>
                                        <div class="p-2 color-second-bg rounded-circle">
                                            <button class="btn font-size-14"></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- !color -->
                            </div>
                            <div class="col-6">
                                <!-- product qty section -->
                                <div class="qty d-flex">
                                    <h6>Quantity</h6>
                                    <div class="px-4 d-flex">
                                        <button class="qty-up border bg-light w-25" data-id="pro1"><i
                                                class="fas fa-angle-up"></i></button>
                                        <input type="text" data-id="pro1"
                                            class="qty_input text-center border px-2 w-50" disabled value="1"
                                            placeholder="1">
                                        <button data-id="pro1" class="qty-down border bg-light w-25"><i
                                                class="fas fa-angle-down"></i></button>
                                    </div>
                                </div>
                                <!-- !product qty section -->
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <h6>Product Description</h6>
                        <hr>
                        <p class="font-size-14">Écran 6.1" AMOLED dynamique 2X, 120Hz, HDR10+, 1750 nits(1080 x 2340pixels) Corning Gorilla Verre Victus 2 -Processeur: Qualcomm SM8550-AC Snapdragon 8 Gen 2 (4 nm) Octa-core, Adréno 740 - Système d'exploitation: Android 13 une interface utilisateur 5.1 - Mémoire RAM: 8Go - Stockage: 256 Go - Caméra arrière: Trio 50 MP, f/1.8, 24 mm (large) + 10 MP, f/2.4, 70mm (téléobjectif), 1/3.94" + 12 MP, f/2.2, 13mm, 120˚ (ultra large) - Avant: 12 MP, f/2.2, 26 mm (large), PDAF double pixels - WiFi 5G, Bluetooth 5.3 - Lecteur d'empreinte digitale - Batterie: 3900 mAh - Charge rapide 25W - résistant à l'eau: IPX8 - Couleur: beige - Garantie: 1 an
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- !start product -->
        <?php
    endif;
endforeach;
?>