
<div class="themhoadon zoom">
        <div class="page-title form-style">
            <br>
            <h1>Hóa đơn</h1>            
            <div class="description">Quản lý nội dung hóa đơn</div>
            <br>
            <table>
                <tr>
                    <td>
                        <label for="ip-chuhoadon">Chủ đơn hàng</label>                                        
                        <input type="text" class="form-control" id="ip-chuhoadon" placeholder="Nhập tên chủ đơn hàng">                
                    </td>

                    <td>
                        <label for="ip-sodtdonhang">Số điện thoại</label>                
                        <input type="number" class="form-control" id="ip-sodtdonhang" placeholder="Số điện thoại">                
                    </td>
                </tr>   
                
                <tr>
                    <td>
                        <label for="ip-diachi">Địa chỉ</label>                                        
                        <input type="text" class="form-control" id="ip-diachi" placeholder="Địa chỉ">                
                    </td>

                    <td>
                        <label for="ip-machuyenkhoan">Mã chuyển khoản (nếu có)</label>                
                        <input type="text" class="form-control" id="ip-machuyenkhoan" placeholder="Mã chuyển khoản">                
                    </td>
                </tr>    

                <tr>
                    <td>
                        <label for="ip-ngaymua">Ngày mua</label>                                        
                        <input type="text" class="form-control" id="ip-ngaymua" placeholder="Ngày mua">                
                    </td>

                    <td>
                        <label for="ip-ngaygiao">Ngày giao</label>                
                        <input type="text" class="form-control" id="ip-ngaygiao" placeholder="Ngày giao">                
                    </td>
                </tr>  

                <tr>
                    <td>
                        <label for="sl_tinhtranghoadon">Trạng thái</label>
                        <select name="sl_tinhtranghoadon" id="sl_tinhtranghoadon"  class="form-control">
                            <optgroup label="tình trạng">
                                <option value="chờ kiểm duyệt">chờ kiểm duyệt</option>
                                <option value="đã hủy">đã hủy</option>
                                <option value="đang giao hàng">đang giao hàng</option>
                                <option value="hoàn thành">hoàn thành</option>
                            </optgroup>
                        </select>
                    </td>

                    <th>
                    <label for="sl_chuyenkhoan">Chuyển khoản</label>
                        <select name="sl_chuyenkhoan" id="sl_chuyenkhoan"  class="form-control">
                            <option value="đã thanh toán">đã thanh toán</option>
                            <option value="chưa thanh toán">chưa thanh toán</option>
                        </select>
                    </th>
                </tr>

                <tr>                    
                    <th style="vertical-align:top">
                        <h3>Chi tiết hóa đơn</h3>
                        <br>
                        
                        <div>
                        <select name="" id="" class="form-control">
                            <?php
                                include_once("../config.php"); 
                                LayDanhSachSanPham();
                            ?>

                        </select>
                        </div>

                        <br>
                        <div id="khungchitietsanpham">
                            <table>
                                <tr>
                                    <th>Tên chi tiết: 
                                        <input style="margin:5px; padding: 5px; width:40%" name="mangtenchitietsanpham[]" type="text"/>
                                    </th>
                                
                                    <th>Giá trị: 
                                        <input style="margin:5px; padding: 5px; width:40%" name="manggiatrichitietsanpham[]" type="text"/>
                                        <a class="btn btn-primary btn-themchitietsanpham">Thêm</a> 
                                        <a class="btn btn-danger anbutton btn-xoachitietsanpham">Xóa</a>
                                    </th>
                                </tr>
                            </table>

                        </div>
                    </th>
                </tr>

                
            </table>   
            
            <div class="xacnhan">
            <input class="btn btn-success" id="btn-themsp" type="submit" value="Đồng ý">
            <input class="btn btn-success" id="btn-capnhatsp" type="submit" value="Cập nhật">
            </div>
            <div class="thongbaoloi">
            </div>            
        </div>
</div>

<div class="card hienthisanpham">
    <div>
        <div id="col-right">
            <table class="timkiem">
                <tr>
                    <td>
                        <input type="text" class="form-control" id="txt-timkiemtensp" placeholder="Nhập tên loại sản phẩm cần tìm" />
                    </td>
                    <td>
                        <button class="btn btn-default" id="btn-timkiemsp">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </td>
                </tr>
            </table>
        </div>            
    </div>
    <table class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
        <thead>
            <tr>
                <div class="form-group custom-checkbox">                        
                    <th>
                        Chủ đơn hàng
                    </th>
                    <th>
                        Số điện thoại
                    </th>
                    <th>
                        Địa chỉ
                    </th>
                    <th>
                        Tình trạng
                    </th>                       
                    <th>
                        Ngày mua
                    </th>
                    <th>
                        Ngày giao
                    </th>
                    <th>
                        Chuyển khoản
                    </th>
                    <th>
                        #
                    </th>
                </div>
            </tr>
        </thead>
        <tbody>  
            <?php 
            include_once("../config.php"); 
            LayDanhSachHoaDon();
            ?>          
        </tbody>
    </table>
    <div id="phantranghoadon" data-tongsotrang=<?php include_once("../config.php"); LayTongSoTrangHoaDon();?>>

    </div>
    
</div>

<?php
    function LayTongSoTrangHoaDon() {
    global $conn;
    $truyvan = "SELECT * FROM hoadon";
    $ketqua = mysqli_query($conn, $truyvan);
    $tongsotrang = ceil(mysqli_num_rows($ketqua)/10);
    echo $tongsotrang;        		
}

function LayDanhSachSanPham()
	{
		global $conn;
		$truyvan = "SELECT * FROM sanpham";
		$ketqua = mysqli_query($conn, $truyvan);
		if ($ketqua) {					
			while ($dong = mysqli_fetch_array($ketqua)) {				
				echo "<option value='" . $dong["MASP"] . "'>" . $dong["TENSP"] . "</option>";				
			}
		}
	}

function LayDanhSachHoaDon()
	{
		global $conn;
		$truyvan = "SELECT * FROM hoadon LIMIT 0,10";
		$ketqua = mysqli_query($conn, $truyvan);
		if ($ketqua) {					
			while ($dong = mysqli_fetch_array($ketqua)) {
                echo "<tr>";
                echo '<td data-tennguoinhan="'.$dong["TENNGUOINHAN"].'">'.$dong["TENNGUOINHAN"].'</td>';
                echo '<td data-sodt="'.$dong["SODT"].'">'.$dong["SODT"].'</td>';
                echo '<td data-diachi="'.$dong["DIACHI"].'">'.$dong["DIACHI"].'</td>';
                echo '<td data-tinhtrang="'.$dong["TRANGTHAI"].'">'.$dong["TRANGTHAI"].'</td>';
                echo '<td data-ngaymua="'.$dong["NGAYMUA"].'">'.$dong["NGAYMUA"].'</td>';
                echo '<td data-ngaygiao="'.$dong["NGAYGIAO"].'">'.$dong["NGAYGIAO"].'</td>';
                $chuyenkhoan = $dong["CHUYENKHOAN"];
                if ($chuyenkhoan!=0) {
                    echo '<td data-chuyenkhoan="đã thanh toán">đã thanh toán</td>';
                } else {
                    echo '<td data-chuyenkhoan="chưa thanh toán">chưa thanh toán</td>';
                }
                echo '<td><a class="btn btn-success btn-capnhathoadon">Cập nhật</a><a class="btn btn-danger btn-xoahoadon">Xóa</a></td>';
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
			while ($dong = mysqli_fetch_array($ketqua)) {
				echo "<optgroup label='" . $dong["TENLOAISP"] . "'>";
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