<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nền tảng - Kiến thức cơ bản về WEB | Bảng tin</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="../assets/css/app.css" type="text/css">
</head>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb21s6";
$danh = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM sanpham";
$result = mysqli_query($conn, $sql);
$countDBRows = mysqli_num_rows($result);

mysqli_close($conn);
?>
    <!-- header -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
        <div class="container">
            <a class="navbar-brand" href="https://nentang.vn">Nền tảng</a>
            <div class="navbar-collapse collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.html">Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://nentang.vn">Quản trị</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.html">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="new_product.php">Thêm Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Liên hệ</a>
                    </li>
                </ul>
                <form class="form-inline mt-2 mt-md-0" method="get" action="search.html">
                    <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm" aria-label="Search"
                        name="keyword_tensanpham">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
            </div>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="cart.html">Giỏ hàng</a>
                </li>
                <li class="nav-item text-nowrap">
                    <!-- Nếu chưa đăng nhập thì hiển thị nút Đăng nhập -->
                    <a class="nav-link" href="login.html">Đăng nhập</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- end header -->

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <!-- Danh sách sản phẩm -->
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Danh sách Sản phẩm</h1>
                <p class="lead text-muted">Các sản phẩm với chất lượng, uy tín, cam kết từ nhà Sản xuất, phân phối và
                    bảo hành
                    chính hãng.</p>
            </div>
        </section>

        <!-- Giải thuật duyệt và render Danh sách sản phẩm theo dòng, cột của Bootstrap -->
        <div class="danhsachsanpham py-5 bg-light">
            <div class="container">
			<?php
				//var_dump($countDBRows);
				$countUIRow = 0;
				$s = '';
				while($row = mysqli_fetch_assoc($result)) {
					if($countUIRow == 0) {
						echo '<div class="row">';
					}
					// add col
					echo '<div class="col-md-4">';
					
					// content of col here ?>
					<div class="card mb-4 shadow-sm">
						<a href="product-detail.php?idSp=<?=$row['ID']?>">
							<img class="bd-placeholder-img card-img-top" width="100%" height="350"
								src="<?=$row['HinhSP']?>">
						</a>
						<div class="card-body">
							<a href="product-detail.html">
								<h5><?=$row['TenSP']?></h5>
							</a>
							<h6>Điện thoại</h6>                         
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
									<a class="btn btn-sm btn-outline-secondary" href="product-detail.html">Xem
										chi tiết</a>
								</div>
								<small class="text-muted text-right">
									<b><?=number_format($row['GiaSP'], 0, '', ',')?> vnđ</b>
								</small>
							</div>
							<div class="d-flex justify-content-between align-items-center">
								<a href="edit_product.php?idSP=<?=$row['ID']?>">Sửa</a>
								<a onclick="return confirm('Mày có chắc là xóa không');" href="xoaSP.php?idSP=<?=$row['ID']?>">Xóa</a>
							</div>
						</div>
					</div>
					<?php
					echo '</div>'; // end of col
					$countUIRow++;
					if($countUIRow == 3) {
						echo '</div>'; // end of row
						$countUIRow = 0;
					}
				};
				if($countUIRow > 0) {
					echo '</div>';
				}
				//echo $s;
			?>
            </div>
        </div>

        <!-- End block content -->
    </main>

    <!-- footer -->
    <footer class="footer mt-auto py-3">
        <div class="container">
            <span>Bản quyền © bởi <a href="https://nentang.vn">Nền Tảng</a> - <script>document.write(new Date().getFullYear());</script>.</span>
            <span class="text-muted">Hành trang tới Tương lai</span>

            <p class="float-right">
                <a href="#">Về đầu trang</a>
            </p>
        </div>
    </footer>
    <!-- end footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popperjs/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom script - Các file js do mình tự viết -->
    <script src="../assets/js/app.js"></script>

</body>

</html>