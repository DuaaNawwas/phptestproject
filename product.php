<!DOCTYPE html>
<html lang="en">
<?php
$pageName = "product";
require_once './layout/head.php';
require_once 'config.php';
require_once 'functions.php';
$categories = getAllData("categories");

$products = getAllData('products');



?>

<body class="animsition">

	<?php require_once './layout/header.php'; ?>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>

				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<?php if (isset($_GET['categoryid'])) : ?>
						<?php $categoryid = $_GET['categoryid'];
						// $productbycategory = filterBySelectedCategory('products', 'categories', $categoryid);
						$productbycategory = getDataByForeignKey('products',  $categoryid);
						// print_r($productbycategory);
						// die;
						?>

						<a href="./product.php?categoryid=all" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php if ($categoryid == 'all') echo 'how-active1' ?>" data-filter="*">
							All Products
						</a>

						<?php foreach ($categories as $category) : ?>

							<a href="./product.php?categoryid=<?php echo $category['id'] ?>" name="submit" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php if ($categoryid == $category['id']) echo 'how-active1' ?>">
								<?= $category["name"] ?>
							</a>

						<?php endforeach; ?>
					<?php else : ?>
						<a href="./product.php?categoryid=all" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1 ?>" data-filter="*">
							All Products
						</a>

						<?php foreach ($categories as $category) : ?>

							<a href="./product.php?categoryid=<?php echo $category['id'] ?>" name="submit" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 ">
								<?= $category["name"] ?>
							</a>

						<?php endforeach; ?>
					<?php endif; ?>

				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>

				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<form action="" method="post">
						<div class="bor8 dis-flex p-l-15">
							<button type="submit" name="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>
							<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
						</div>
					</form>
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter p-l-250  w-50 p-t-10">
					<div class="wrap-filter flex-w bg6 w-full  p-lr-40 p-t-27 p-lr-15-sm" style="margin-left: 600px !important;">

						<div class="filter-col p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<?php if (isset($_GET['lowprice'])) : ?>
								<?php $lowprice = $_GET['lowprice'];



								if (isset($_GET['topprice'])) {
									$topprice = $_GET['topprice'];
									$sql = "SELECT * FROM products WHERE price >= $lowprice AND price <= $topprice";
								} else {
									$sql = "SELECT * FROM products WHERE price >= $lowprice ";
								}
								$stmt = $conn->prepare($sql);
								$stmt->execute();

								$filterPrice = $stmt->fetchAll();
								?>



								<ul>

									<li class="p-b-6">
										<a href="./product.php?lowprice=0" class="filter-link stext-106 trans-04 ">
											All
										</a>
									</li>



									<li class="p-b-6">
										<a href="./product.php?topprice=50&lowprice=0.1" class="filter-link stext-106 trans-04  <?php if ($lowprice == 0.1) echo 'filter-link-active' ?>">
											0.00 - 50.00 JOD
										</a>
									</li>


									<li class="p-b-6">
										<a href="./product.php?topprice=100&lowprice=50" class="filter-link stext-106 trans-04 <?php if ($lowprice == 50) echo 'filter-link-active' ?>">
											50.00 - 100.00 JOD
										</a>
									</li>


									<li class="p-b-6">
										<a href="./product.php?topprice=150&lowprice=100" class="filter-link stext-106 trans-04 <?php if ($lowprice == 100) echo 'filter-link-active' ?>">
											100.00 - 150.00 JOD
										</a>
									</li>


									<li class="p-b-6">
										<a href="./product.php?topprice=200&lowprice=150" class="filter-link stext-106 trans-04 <?php if ($lowprice == 150) echo 'filter-link-active' ?>">
											150.00 - 200.00 JOD
										</a>
									</li>


									<li class="p-b-6">
										<a href="./product.php?lowprice=200" class="filter-link stext-106 trans-04 <?php if ($lowprice == 200) echo 'filter-link-active' ?>">
											200.00+ JOD
										</a>
									</li>

								</ul>

							<?php else : ?>
								<ul>

									<li class="p-b-6">
										<a href="./product.php?lowprice=0" class="filter-link stext-106 trans-04  filter-link-active">
											All
										</a>
									</li>


									<li class="p-b-6">
										<a href="./product.php?topprice=50&lowprice=0.1" class="filter-link stext-106 trans-04  ">
											0.00 - 50.00 JOD
										</a>
									</li>

									<li class="p-b-6">
										<a href="./product.php?topprice=100&lowprice=50" class="filter-link stext-106 trans-04 ">
											50.00 - 100.00 JOD
										</a>
									</li>

									<li class="p-b-6">
										<a href="./product.php?topprice=150&lowprice=100" class="filter-link stext-106 trans-04 ">
											100.00 - 150.00 JOD
										</a>
									</li>

									<li class="p-b-6">
										<a href="./product.php?topprice=200&lowprice=150" class="filter-link stext-106 trans-04 ">
											150.00 - 200.00 JOD
										</a>
									</li>

									<li class="p-b-6">
										<a href="./product.php?lowprice=200" class="filter-link stext-106 trans-04 ">
											200.00+ JOD
										</a>
									</li>

								</ul>

							<?php endif; ?>
						</div>



					</div>
				</div>
			</div>


			<div class="row isotope-grid">

				<?php if (isset($filterPrice)) :  ?>
					<?php foreach ($filterPrice as $filterproduct) : ?>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="<?php echo $filterproduct['image'] ?>" alt="IMG-PRODUCT">

									<a href="./product-detail.php?productid=<?php echo $filterproduct['id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
										View
									</a>
								</div>

								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="./product-detail.php?productid=<?php echo $filterproduct['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<?php echo $filterproduct['name'] ?>
										</a>
										<?php if ($filterproduct['discount'] != 1) : ?>
											<span style="text-decoration:line-through"><?php echo $filterproduct['price'] ?> JOD</span>
											<span class="stext-105 cl3">
												<?php
												$discount = $filterproduct['price'] * $filterproduct['discount'];
												$priceAfterDiscount = $filterproduct['price'] - $discount;
												echo $priceAfterDiscount . " JOD"
												?>
											</span>
										<?php else : ?>
											<span><?php echo $filterproduct['price'] ?> JOD</span>
										<?php endif; ?>

									</div>

									<div class="block2-txt-child2 flex-r p-t-3">
										<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
											<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
											<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				<?php elseif (isset($categoryid) && $categoryid != 'all') : ?>
					<?php foreach ($productbycategory as $catproduct) : ?>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="<?php echo $catproduct['image'] ?>" alt="IMG-PRODUCT">

									<a href="./product-detail.php?productid=<?php echo $catproduct['id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
										View
									</a>
								</div>

								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="./product-detail.php?productid=<?php echo $catproduct['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<?php echo $catproduct['name'] ?>
										</a>
										<?php if ($catproduct['discount'] != 1) : ?>
											<span style="text-decoration:line-through"><?php echo $catproduct['price'] ?> JOD</span>
											<span class="stext-105 cl3">
												<?php
												$discount = $catproduct['price'] * $catproduct['discount'];
												$priceAfterDiscount = $catproduct['price'] - $discount;
												echo $priceAfterDiscount . " JOD"
												?>
											</span>
										<?php else : ?>
											<span><?php echo $catproduct['price'] ?> JOD</span>
										<?php endif; ?>

									</div>

									<div class="block2-txt-child2 flex-r p-t-3">
										<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
											<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
											<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else : ?>
					<?php foreach ($products as $product) : ?>
						<?php if (isset($_POST['submit'])) : ?>
							<?php $searchName = $_POST['search-product']; ?>
							<?php if ($searchName == $product['name']) : ?>
								<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="<?php echo $product['image'] ?>" alt="IMG-PRODUCT">

											<a href="./product-detail.php?productid=<?php echo $product['id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
												View
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="./product-detail.php?productid=<?php echo $product['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													<?php echo $product['name'] ?>
												</a>
												<?php if ($product['discount'] != 1) : ?>
													<span style="text-decoration:line-through"><?php echo $product['price'] ?> JOD</span>
													<span class="stext-105 cl3">
														<?php
														$discount = $product['price'] * $product['discount'];
														$priceAfterDiscount = $product['price'] - $discount;
														echo $priceAfterDiscount . " JOD"
														?>
													</span>
												<?php else : ?>
													<span><?php echo $product['price'] ?> JOD</span>
												<?php endif; ?>

											</div>

											<div class="block2-txt-child2 flex-r p-t-3">
												<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
													<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
													<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
												</a>
											</div>
										</div>
									</div>
								</div>
								<?php echo "<script>
								if ( window.history.replaceState ) {
									window.history.replaceState( null, null, window.location.href );
								}
							</script>" ?>
							<?php endif; ?>
						<?php else : ?>
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="<?php echo $product['image'] ?>" alt="IMG-PRODUCT">

										<a href="./product-detail.php?productid=<?php echo $product['id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
											View
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="./product-detail.php?productid=<?php echo $product['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												<?php echo $product['name'] ?>
											</a>
											<?php if ($product['discount'] != 1) : ?>
												<span style="text-decoration:line-through"><?php echo $product['price'] ?> JOD</span>
												<span class="stext-105 cl3">
													<?php
													$discount = $product['price'] * $product['discount'];
													$priceAfterDiscount = $product['price'] - $discount;
													echo $priceAfterDiscount . " JOD"
													?>
												</span>
											<?php else : ?>
												<span><?php echo $product['price'] ?> JOD</span>
											<?php endif; ?>

										</div>

										<div class="block2-txt-child2 flex-r p-t-3">
											<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
												<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
												<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
											</a>
										</div>
									</div>
								</div>
							</div>

						<?php endif ?>
					<?php endforeach; ?>
				<?php endif; ?>



			</div>

		</div>
	</div>


	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Women
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Men
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shoes
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Watches
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> All rights reserved |Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>


	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function() {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>