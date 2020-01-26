<?php 

$connect = mysqli_connect("localhost", "root", "admin", "test");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Webslesson Demo | Simple PHP Mysql Shopping Cart</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
<body>
		<br />
		<div class="container">
			<br />
			<br />
			<br />
			<h3 align="center">Tutorial - <a href="http://www.webslesson.info/2016/08/simple-php-mysql-shopping-cart.html" title="Simple PHP Mysql Shopping Cart">Simple PHP Mysql Shopping Cart</a></h3><br />
			<br /><br />
			<?php
				#		$query = "SELECT  `tbl_product`.*\n"

 				#			   . "FROM `tbl_product`\n"

   				#				 . "WHERE `tbl_product`.`id` = \'3\'";

				$item_id = $_GET["id"] ;

				$query = "SELECT * FROM tbl_product WHERE tbl_product.id = $item_id ";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
				
					<div class="col-md12">
						<form method="post" action="index.php?action=update&id=<?php echo $row["id"]; ?>">
							<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
								<a href="index.php?action=update&id=<?php echo $row["id"]; ?>">
								<img src="images/<?php echo $row["image"]; ?>"  class="img-responsive"
								 /></a>
								 <br />

								<h4 class="text-info"><?php echo $row["name"]; ?> </h4>

								<h4 class="text-danger"><?php echo $row["price"]; ?></h4>

								<input type="text" name="quantity" value="1" class="form-control" />

								<input type="text" name="name" value="<?php echo $row["name"]; ?>" />
								<input type="text" name="category" value="<?php echo $row["category"]; ?>" />

								<input type="text" name="price" value="<?php echo $row["price"]; ?>" />

								<input type="submit" name="update" style="margin-top:5px;" class="btn btn-success" value="update" />

							</div>
						</form>
					</div>
			<?php
					}
				}
			?>
			</div>



		<br />
	</body>
</html>
