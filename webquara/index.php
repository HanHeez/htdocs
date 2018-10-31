<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V5</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="html/assets/js/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="html/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="html/assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="html/assets/js/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="html/assets/js/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="html/assets/js/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="html/assets/js/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="html/assets/js/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="html/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="html/assets/css/main.css">
<!--===============================================================================================-->

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('html/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-53">
						Đăng nhập bằng
					</span>

					<a href="#" class="btn-face m-b-20">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="#" class="btn-google m-b-20">
						<img src="html/images/icons/icon-google.png" alt="GOOGLE">
						Google
					</a>
					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Tên đăng nhập
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Tên đăng nhập còn trống">
						<input class="input100" type="text" id="tendangnhap" name="tendangnhap" value='<?php 
						echo isset($_COOKIE["tendangnhap"])?$_COOKIE["tendangnhap"]:"";?>'>
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Mật khẩu
						</span>
						<a href="#" class="txt2 bo1 m-l-5">
							Quên mật khẩu?
						</a>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Mật khẩu còn trống">
						<input class="input100" type="password" id="matkhau" name="matkhau" value='<?php 
						echo isset($_COOKIE["matkhau"])?$_COOKIE["matkhau"]:"";?>'>
						<span class="focus-input100"></span>
					</div>
					<div class="p-t-13 p-b-9">						
						<input class="txt2 bo1 m-l-5" type="checkbox" name="nhotaikhoan" id="nhotaikhoan" value="Nhớ tài khoản">
						<label for="nhotaikhoan" class="txt1">Nhớ tài khoản</label>	
					</div>
					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" id="dongy">
							Đồng ý
						</button>
					</div>
					
					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Không phải là thành viên?
						</span>

						<a href="#" class="txt2 bo1">
							Đăng ký ngay
						</a>
					</div>
					<input type="hidden" id="url" value='<?php echo "http://$_SERVER[HTTP_HOST]/webquara/"?>'>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="html/assets/js/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="html/assets/js/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="html/assets/js/vendor/bootstrap/js/popper.js"></script>
	<script src="html/assets/js/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="html/assets/js/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="html/assets/js/vendor/daterangepicker/moment.min.js"></script>
	<script src="html/assets/js/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="html/assets/js/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="html/assets/js/main1.js"></script>

</body>
</html>

<script>
$(document).ready(function () {

	$("#dongy").click(function (e) { 
		e.preventDefault();
		tendangnhap = $("#tendangnhap").val();
		matkhau = $("#matkhau").val();
		nhotaikhoan = $("#nhotaikhoan").is(":checked");	
		duongdan = $("#url").val();
		
		$.ajax({
			type: "POST",
			url: "html/page_product/function.php",
			data: {
				action: "KiemTraDangNhap_Ajax",
				tendangnhap:tendangnhap,
				matkhau:matkhau,
				nhotaikhoan:nhotaikhoan
			},			
			success: function (data) {
				if (data != 0) {
					window.location.replace(duongdan+"html/index.php");
				}
			}
		});
	});
});
</script>