
<div id="col-left" class="col-sm-4 col-md-5 col-lg-6">
		<div class="page-title form-style">
			<h1>Loại sản phẩm</h1>
			<div class="description">Quản lý nội dung loại sản phẩm</div>
			<b>
				<label for="ip-tenloaisanpham">Tên loại sản phẩm</label>
			</b>
			<div>
				<input type="text" class="form-control" id="ip-tenloaisanpham" placeholder="Nhập tên loại sản phẩm">
			</div>

			<b>
				<label for="ip-tenloaisanpham">Loại cha</label>
			</b>
			</br>
			<select name="select" id="sl-cha" class="form-control">
				<optgroup>
					<?php
						include_once "../config.php";
						HienThiDanhMucLoaiSanPham();
					?>
				</optgroup>
			</select>
			</br>
			<input class="btn btn-success" id="btn-themloaisp" type="submit" value="Thêm">
			<div class="thongbaoloi">
			</div>
		</div>
	</div>
<div id="col-right" class="col-sm-8 col-md-7 col-lg-6">
<div class="card">
	<div>
		<div id="col-right">
			<table class="timkiem">
				<tr>
					<td>
						<input type="text" class="form-control" id="txt-timtenloaisp" placeholder="Nhập tên loại sản phẩm cần tìm" />
					</td>
					<td>
						<button class="btn btn-default" id="btn-timkiemloaisp">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</td>
				</tr>
			</table>
		</div>
		<input type="button" class="btn btn-default" id="btn-xoaloaisanpham" value="Xóa" />
	</div>
	<table id="bootstrap-data-table" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
		<thead>
			<tr>
				<div class="form-group custom-checkbox">
					<th>
						<input type="checkbox" id="cb-chontatca">
						<label for="cb-chontatca">Tất cả</label>
					</th>
					<th>
						Tên loại
					</th>
				</div>
			</tr>
		</thead>
		<tbody>
			<?php
			include_once "../config.php";
			HienThiDanhMucLoaiSanPhamLimit(0);
			?>
		</tbody>
	</table>
	<?php
		include_once "../config.php";
		HienThiPhanTrang();
		?>
</div>
</div>	





<?php
	function HienThiPhanTrang() {
		global $conn;
		$truyvan = "SELECT * FROM loaisanpham";
		$ketqua = mysqli_query($conn, $truyvan);
		$tongsotrang = round(mysqli_num_rows($ketqua)/10);
		$j = 1;
		echo '<div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table_paginate">
			<ul class="pagination">
				<li class="paginate_button page-item previous disabled" id="bootstrap-data-table_previous">
					<a href="#" class="page-link"><</a>
				</li>';
		for ($i=1;$i<=$tongsotrang;$i++) {	
			if ($i>$j*10) {
				echo '</ul>';
				echo '<ul class="pagination">';
				$j++;
			}
			if ($i==1) {
				echo '<li class="paginate_button page-item active">
				<a href="#" class="page-link">'.$i.'</a>
				</li>';
			} else {
			echo '<li class="paginate_button page-item">
					<a href="#" class="page-link">'.$i.'</a>
					</li>';	
			} 
		}
		echo '<li class="paginate_button page-item next disabled" id="bootstrap-data-table_previous">
		<a href="#" class="page-link">></a>
		</li>
		</ul>
		</div>';
	}
	function HienThiDanhMucLoaiSanPhamLimit($limit)
	{
		global $conn;

		$truyvan = "SELECT * FROM loaisanpham LIMIT ".$limit.",10";
		$ketqua = mysqli_query($conn, $truyvan);
		if ($ketqua) {
			while ($dong = mysqli_fetch_array($ketqua)) {
				echo "<tr>";
				echo '<th><input name="cb-mang[]" data-id="' . $dong["MALOAISP"] . '" type="checkbox" id="cb-' . $dong["MALOAISP"] . '">
				<label for="cb-' . $dong["MALOAISP"] . '"></label></th>';
				echo "<td>" . $dong["TENLOAISP"] . "</td>";
				echo "</tr>";
			}
		}
	}
	function HienThiDanhMucLoaiSanPham()
	{
		global $conn;

		$truyvan = "SELECT * FROM loaisanpham WHERE MALOAI_CHA=0";
		$ketqua = mysqli_query($conn, $truyvan);
		if ($ketqua) {	
			echo "<optgroup label= 'Không'>";
			echo "<option value= '0'>Không</option>";
			echo "</optgroup>";		
			while ($dong = mysqli_fetch_array($ketqua)) {
				echo "<optgroup label= '" . $dong["TENLOAISP"] . "'>";
				echo "<option value='" . $dong["MALOAISP"] . "'>" . $dong["TENLOAISP"] . "</option>";
				$truyvancon = "SELECT * FROM loaisanpham WHERE MALOAI_CHA=" . $dong["MALOAISP"];
				$ketquacon = mysqli_query($conn, $truyvancon);
				if ($ketquacon) {
					while ($dongcon = mysqli_fetch_array($ketquacon)) {
						echo "<option value='" . $dongcon["MALOAISP"] . "'>" . $dongcon["TENLOAISP"] . "</option>";
					}
				}
				echo "</optgroup>";
			}
		}
	}

?>