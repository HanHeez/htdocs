<div>
    <a class="btn-hienthithemsanpham btn btn-success">Thêm sản phẩm</a>
    <a class="btn-hienthidanhsachsp btn btn-success">Hiển thị danh sách sản phẩm</a>
</div>
<div class="themsanpham zoom anbutton">
        <div class="page-title form-style">
            <br>
            <h1>Sản phẩm</h1>            
            <div class="description">Quản lý nội dung sản phẩm</div>
            <br>
            <table>
                <tr>
                    <td>
                        <label for="ip-tensanpham">Tên sản phẩm</label>                                        
                        <input type="text" class="form-control" id="ip-tensanpham" placeholder="Nhập tên loại sản phẩm">                
                    </td>

                    <td>
                        <label for="ip-giasanpham">Nhập vào giá</label>                
                        <input type="number" class="form-control" id="ip-giasanpham" placeholder="Nhập giá">                
                    </td>
                </tr>                 

                 <tr>
                    <td>
                        <label for="ip-loaisanpham">Loại sản phẩm</label>
                        <select name="select" id="sl-loaisanpham" class="form-control">
                            <optgroup label= 'Không'>;
                                <option value= '0'>Không</option>;
                            </optgroup>;	
                            <optgroup>
                                <?php
                                    include_once("../config.php");
                                    HienThiDanhMucLoaiSanPham();
                                ?>
                            </optgroup>
                        </select>
                    </td>

                    <td>
                        <label for="ip-soluong">Số lượng</label>                
                        <input type="number" class="form-control" id="ip-soluong" placeholder="Nhập số lượng">                
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="ip-thuonghieu">Thương hiệu</label>
                        <select name="select" id="sl-thuonghieu" class="form-control">                            
                            <optgroup>
                                <?php
                                    include_once "../config.php";
                                    LayDanhSachThuongHieu();
                                ?>
                            </optgroup>
                        </select>
                    </td>

                    <td rowspan="2">
                        <label for="ip-thongtin">Mô tả</label>    
                        <textarea id="ip-thongtin" class="form-control" rows="10">                            
                            
                        </textarea>            
                    </td>
                </tr>

                <tr>
                    <td id="khunganhlon">
                        <label for="ip-anhlon">Ảnh lớn</label>                
                        <div class="form-group">
                            <div class="file-loading">
                                <input id="ip-anhlon" name="ip-anhlon" class="file-loading" type="file">
                            </div>
                        </div>
                    </td>                    
                </tr>

                <tr>
                    <td id="khunganhnho">
                        <label for="ip-anhnho">Ảnh nhỏ</label>                
                        <div class="form-group">
                            <div class="file-loading">
                                <input id="ip-anhnho" name="ip-anhnho" multiple class="file-loading" type="file">
                            </div>
                        </div>
                    </td>
                    <th style="vertical-align:top">
                        <h3>Chi tiết sản phẩm</h3>
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
            <div class="anchitietsanpham">
                    <table>
                        <tr>
                            <th>Tên chi tiết: 
                                <input style="margin:5px; padding: 5px; width:50%" name="mangtenchitietsanpham[]" type="text"/>
                            </th>

                            <th>Giá trị: 
                                <input style="margin:5px; padding: 5px; width:50%" name="manggiatrichitietsanpham[]" type="text"/>
                                <a class="btn btn-primary btn-themchitietsanpham">Thêm</a> 
                                <a class="btn btn-danger anbutton btn-xoachitietsanpham">Xóa</a>
                            </th>
                        </tr>
                    </table>
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
                        Hình
                    </th>
                    <th>
                        Tên sản phẩm
                    </th>
                    <th>
                        Loại sản phẩm
                    </th>
                    <th>
                        Thương hiệu
                    </th>                       
                    <th>
                        Giá
                    </th>
                    <th>
                        Số lượng
                    </th>
                </div>
            </tr>
        </thead>
        <tbody>
            <?php
                include_once("../config.php");
                HienThiDanhMucSanPhamLimit(0);
            ?>
        </tbody>
    </table>
    <div id="phantrangsanpham" data-tongsotrang=<?php include_once("../config.php"); LayTongSoTrang()?>>

    </div>
</div>

<?php

    function HienThiDanhMucSanPhamLimit($limit)
	{
		global $conn;
		$truyvan = "SELECT * FROM sanpham sp, loaisanpham lsp, thuonghieu th 
        WHERE sp.MALOAISP = lsp.MALOAISP AND sp.MATHUONGHIEU = th.MATHUONGHIEU
         LIMIT ".$limit.",10";
		$ketqua = mysqli_query($conn, $truyvan);
		if ($ketqua) {
			while ($dong = mysqli_fetch_array($ketqua)) {
                echo "<tr>";
                echo '<td class="anbutton anhnho" data-anhnho="'.$dong["ANHNHO"].'"></td>';
                echo '<td class="anbutton thongtin" data-thongtin="'.$dong["THONGTIN"].'"></td>';
                echo '<td class="anhlon" data-anhlon="'.$dong["ANHLON"].'"><img style="width:50px;heigh:50px" src="..'.$dong["ANHLON"].'"/> </td>';
                echo '<td class="tensp" data-tensp="'.$dong["TENSP"].'">'.$dong["TENSP"].'</td>';
                echo '<td class="maloaisp" data-maloaisp="'.$dong["MALOAISP"].'">'.$dong["TENLOAISP"].'</td>';
                echo '<td class="mathuonghieu" data-mathuonghieu="'.$dong["MATHUONGHIEU"].'">'.$dong["TENTHUONGHIEU"].'</td>';
                echo '<td class="gia" data-gia="'.$dong["GIA"].'">'.$dong["GIA"].'</td>';
                echo '<td class="soluong" data-soluong="'.$dong["SOLUONG"].'">'.$dong["SOLUONG"].'</td>';   
                echo '<td class="masp" data-id="'.$dong['MASP'].'"><a class="btn btn-primary btn-suasanpham">Sửa</a> 
                <a class="btn btn-danger btn-xoasanpham">Xóa</a></th>';            
				echo "</tr>";
			}
		}
    }
    
    function LayDanhSachThuongHieu() {
        global $conn;
		$truyvan = "SELECT * FROM thuonghieu";
		$ketqua = mysqli_query($conn, $truyvan);
		if ($ketqua) {					
			while ($dong = mysqli_fetch_array($ketqua)) {				
				echo "<option value='" . $dong["MATHUONGHIEU"] . "'>" . $dong["TENTHUONGHIEU"] . "</option>";				
			}
		}
    }

	function LayTongSoTrang() {
        global $conn;
        $truyvan = "SELECT * FROM sanpham";
		$ketqua = mysqli_query($conn, $truyvan);
		$tongsotrang = ceil(mysqli_num_rows($ketqua)/10);
        echo $tongsotrang;        		
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