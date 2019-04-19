
<?php
    require __DIR__ . "/model.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Title</title>
    <link	rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"	integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"	crossorigin="anonymous"/>
    <link href="./styles/main.css" rel="stylesheet">
    <script src="./index.js" defer></script>
</head>
<body>
  <header>
		<div class="container"><h2>Header</h2></div>
  </header>
  <main class="main-wrapper">
    <div class="container">
    <section class="products-list">
      <ul class="cards-list">
        <?php foreach (getItems(1, 4) as $item): ?>
        <li class="card">
          <a href="#">
						<div class="card-image">
							<img src="<?php echo $item['img']; ?>" alt="<?php echo $item['title']; ?>" />              
              <?php if ($item['discountCost']): ?>
                <div class="sale">sale</div>
              <?php endif; ?>
              <?php if ($item['new']): ?>
                <div class="new">new</div>
              <?php endif; ?>
						</div>
					</a>
						<div class="details">
              <a href="#">
                <div class="card-title"><?php echo $item['title']; ?></div>
                <p class="description"><?php echo $item['description']; ?></p>
              </a>
						</div>
						<div class="prices">
              <?php if ($item['discountCost']!== null) : ?>
                <span class="current-cost">&#36;<?php echo $item['discountCost']; ?></span> <span class="old-cost">&#36;<?php echo $item['cost']; ?></span>
              <?php else: ?>
                <span class="current-cost">&#36;<?php echo $item['cost']; ?></span>
              <?php endif; ?>
            </div>
						<div class="buttons-container">
							<a href="#" class="add-to-cart">Add to cart</a> <a href="#" class="view-card">View</a>
						</div>
        </li>
        <?php endforeach; ?>
      </ul>
      <div class="spinner"><i class="fas fa-spinner fa-spin"></i></div>
      <button class="load-more-btn">Load more</button>
      </section>
    </div>
  </main>
    <footer>
			<div class="container">
				<div class="footer-wrapper">
					<div class="offers">
						<div class="offer-title">Hot offers</div>
						<p  class="offer-text">
							Vestibulum ante ipsum Vestibulum ante ipsum primis in faucibus orci luctus et ultrice orci
							luctus et ultrice Vestibulum ante ipsum primis in faucibus orci luctus et ultriceVestibulum
							ante Vestibulum ante ipsum primis in faucibus orci luctus et ultriceipsum primis in faucibus
							orci luctus et ultrice
						</p>
						<ul class="offer-list">
							<li>
								<i class="fas fa-caret-right"></i>Vestibulum ante ipsum primis in faucibus orci luctus
							</li>
							<li><i class="fas fa-caret-right"></i>Nam elit magna</li>
							<li>
								<i class="fas fa-caret-right"></i>Vestibulum ante ipsum primis in faucibus orci luctus
							</li>
							<li>
								<i class="fas fa-caret-right"></i>Vestibulum ante ipsum primis in faucibus orci luctus
							</li>
							<li>
								<i class="fas fa-caret-right"></i>Vestibulum ante ipsum primis in faucibus orci luctus
							</li>
						</ul>
					</div>
					<div class="offers">
						<div class="offer-title">Hot offers</div>
						<p  class="offer-text">
							Vestibulum ante ipsum Vestibulum ante ipsum primis in faucibus orci luctus et ultrice orci
							luctus et ultrice Vestibulum ante ipsum primis in faucibus orci luctus et ultriceVestibulum
							ante Vestibulum ante ipsum primis in faucibus orci luctus et ultriceipsum primis in faucibus
							orci luctus et ultrice
						</p>
						<ul class="offer-list">
							<li>
								<i class="fas fa-caret-right"></i>Vestibulum ante ipsum primis in faucibus orci luctus
							</li>
							<li><i class="fas fa-caret-right"></i>Nam elit magna</li>
							<li>
								<i class="fas fa-caret-right"></i>Vestibulum ante ipsum primis in faucibus orci luctus
							</li>
							<li>
								<i class="fas fa-caret-right"></i>Vestibulum ante ipsum primis in faucibus orci luctus
							</li>
							<li>
								<i class="fas fa-caret-right"></i>Vestibulum ante ipsum primis in faucibus orci luctus
							</li>
						</ul>
					</div>
					<div class="store-info">
						<div class="store-info-title">Store information</div>
						<ul class="store-info-list">
							<li class="store-info-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>Vestibulum ante ipsum primis in faucibus orci</span>
							</li>
							<li class="store-info-item"><i class="fas fa-phone"></i><span>Nam elit magna</span></li>
							<li class="store-info-item"><i class="far fa-envelope"></i><span>Vestibulum ante ipsum primis in faucibus orci luctus</span></li>
							<li class="store-info-item"><i class="fab fa-skype"></i><span>Vestibulum ante ipsum primis in faucibus orci luctus</span></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
</body>
</html>