<?php
include("../../config.php");

$ham = $_POST["action"];
switch ($ham) {
    case 'ThemLoaiSanPham_Ajax':
        $ham();
        break;
    case 'LayDanhSachLoaiSanPhamLimit_Ajax':
        $ham();
        break;
    case 'XoaLoaiSanPhamTheoMa_Ajax':
        $ham();
        break;
    case 'HienThiPhanTrang_Ajax':
        $ham();
        break;       
    case 'TimKiemLoaiSanPhamTheoTen_Ajax':
        $ham();
        break;
        case 'ThemSanPham_Ajax':
        $ham();
        break;
        case 'XoaSanPham_Ajax':
        $ham();
        break;
        case 'LayChiTietSanPhamTheoMa_Ajax':
        $ham();
        break;
        case 'CapNhatSanPham_Ajax':
        $ham();
        break;
        case 'LayDanhSachSanPhamLimit_Ajax':
        $ham();
        break;
        case 'KiemTraDangNhap_Ajax':
        $ham();
        break;
    
    default:
        # code...
        break;
}

//Kiểm tra đăng nhập
function KiemTraDangNhap_Ajax() {
    global $conn;
    session_start();
    $tendangnhap = $_POST["tendangnhap"];
    $matkhau = $_POST["matkhau"];
    $nhotaikhoan = $_POST["nhotaikhoan"];

    $truyvan = "SELECT * FROM nhanvien WHERE TENDANGNHAP ='".$tendangnhap."' AND MATKHAU = '".$matkhau."'";
    $ketqua = mysqli_query($conn,$truyvan);   
    $sodong = mysqli_num_rows($ketqua);     
    if ($ketqua) {
        $sodong = mysqli_num_rows($ketqua);
        if ($nhotaikhoan) {           
            setcookie("tendangnhap", $tendangnhap, time() + (86400 * 7), "/"); 
            setcookie("matkhau", $matkhau, time() + (86400 * 7), "/"); 
        }
        if ($sodong > 0) {
            while ($dong = mysqli_fetch_array($ketqua)) {
                $_SESSION["tennv"] = $dong["TENNV"];
                $_SESSION["email"] = $dong["TENDANGNHAP"];
                $_SESSION["manv"] = $dong["MANV"];
                $_SESSION["maloainv"] = $dong["MALOAINV"];
                echo 1;
            }
        } else {
            echo 0;
        }
    } 
}

//
function LayDanhSachSanPhamLimit_Ajax() {
    global $conn;
    $sotrang = $_POST["sotrang"];
    $limit =  ($_POST["sotrang"]-1)*10;        

    $truyvan = "SELECT * FROM sanpham sp, loaisanpham lsp, thuonghieu th 
    WHERE sp.MALOAISP = lsp.MALOAISP AND sp.MATHUONGHIEU = th.MATHUONGHIEU
        LIMIT ".$limit.",10";
    $ketqua = mysqli_query($conn, $truyvan);
    if ($ketqua) {
        while ($dong = mysqli_fetch_array($ketqua)) {                
            echo "<tr>";
            echo '<td>'.$limit.'</td>';
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

//Cập nhật sản phẩm theo mã sản phẩm
function CapNhatSanPham_Ajax() {
    global $conn;        
    $masp = $_POST["masp"];
    $tensp = $_POST["tensp"]; 
    $giasp = $_POST["giasp"];       
    $soluong = $_POST["soluong"];       
    $maloaisp = $_POST["maloaisp"];
    $mathuonghieu = $_POST["mathuonghieu"];       
    $anhlon = $_POST["anhlon"];       
    $anhnho = $_POST["anhnho"];       
    $mota = $_POST["mota"];               
    $mangtenchitiet = $_POST["mangtenchitiet"];
    $manggiatrichitiet = $_POST["manggiatrichitiet"];
    $mangmachitiet = $_POST["mangmachitiet"];
    $luotmua=0;  
    $manv=1;
    
    $mangtenchitietsanphambosung = $_POST["mangtenchitietsanphambosung"];
    $manggiatrichitietsanphambosung = $_POST["manggiatrichitietsanphambosung"];  
    
    $truyvan = "UPDATE sanpham SET TENSP='".$tensp."',GIA = '".$giasp."'
    ,SOLUONG = '".$soluong."',MALOAISP = '".$maloaisp."',MATHUONGHIEU = '".$mathuonghieu."',
    ANHLON = '".$anhlon."',ANHNHO = '".$anhnho."',
    THONGTIN = '".$mota."',LUOTMUA = 0,MANV =1 WHERE MASP = ".$masp;        
    $ketqua = mysqli_query($conn,$truyvan);
    

    if($ketqua) {        
        $dem = count($mangmachitiet);        
        for ($i=0;$i<$dem;$i++) {
            $tenchitiet = $mangtenchitiet[$i];
            $giatrichitiet = $manggiatrichitiet[$i];
            $machitiet = $mangmachitiet[$i];            
            $truyvanchitiet = "UPDATE chitietsanpham SET TENCHITIET='".$tenchitiet."',GIATRI='".$giatrichitiet."',MASP='".$masp."' WHERE MACHITIET =".$machitiet;
            $ketquachitiet = mysqli_query($conn,$truyvanchitiet);            
        }  
            $demchitietbosung = count($mangtenchitietsanphambosung);         
            if ($demchitietbosung>0) {
        for($i=0;$i<$demchitietbosung;$i++) {
            $truyvanbosung = "INSERT INTO chitietsanpham(MASP,TENCHITIET,GIATRI) VALUES ('".$masp."','".$mangtenchitietsanphambosung[$i]."','".$manggiatrichitietsanphambosung[$i]."')";
            $ketquabosung = mysqli_query($conn,$truyvanbosung);
        }
    }
    

    echo "<h4>Cập nhật thành công</h4>";            
    } else {
        echo "<h4>Cập nhật thất bại</h4>".mysqli_error($conn);
    }
}

function LayChiTietSanPhamTheoMa_Ajax() {
    global $conn;
    $masp = $_POST["masp"];
    $truyvan = "SELECT * FROM chitietsanpham WHERE MASP = ".$masp;
    $ketqua = mysqli_query($conn,$truyvan);
    if ($ketqua) {
        while ($dong = mysqli_fetch_array($ketqua)) {
            echo '<tr>
            <th>
                <input id="mangmachitietsanpham" name="mangmachitietsanpham[]" class="anbutton" value="'.$dong["MACHITIET"].'"/>
                Tên chi tiết: 
                <input style="margin:5px; padding: 5px; width:50%" name="mangtenchitietsanpham[]" type="text" value="'.$dong["TENCHITIET"].'"/>
            </th>

            <th>Giá trị: 
                <input style="margin:5px; padding: 5px; width:50%" name="manggiatrichitietsanpham[]" type="text" value="'.$dong["GIATRI"].'"/>
                <a class="btn btn-primary anbutton btn-themchitietsanpham">Thêm</a> 
                <a class="btn btn-danger btn-xoachitietsanpham">Xóa</a>
            </th>
            </tr>';
        }
    }
}

//Xóa sản phẩm
function XoaSanPham_Ajax() {
    global $conn;
    $masp = $_POST["masp"];
    
    XoaChiTietKhuyenMaiTheoMaSP($masp);
    XoaChiTietSanPhamTheoMaSP($masp);
    XoaChiTietHoaDonTheoMaSP($masp);
    XoaDanhGiaTheoMaSP($masp);

    $truyvan = "DELETE FROM sanpham WHERE MASP = ".$masp;
    $ketqua = mysqli_query($conn,$truyvan);

    if ($ketqua) {
        echo "Bạn đã xóa thành công";
    }

}

//Thêm sản phẩm
function ThemSanPham_Ajax() {
    global $conn;
    $tensp = $_POST["tensp"]; 
    $giasp = $_POST["giasp"];       
    $soluong = $_POST["soluong"];       
    $maloaisp = $_POST["maloaisp"];
    $mathuonghieu = $_POST["mathuonghieu"];       
    $anhlon = $_POST["anhlon"];       
    $anhnho = $_POST["anhnho"];       
    $mota = $_POST["mota"];   
    $manv = 1;
    $luotmua = 0;
    $mangtenchitiet = $_POST["mangtenchitiet"];
    $manggiatrichitiet = $_POST["manggiatrichitiet"];
    
    $truyvan = "INSERT INTO sanpham(TENSP,GIA,SOLUONG,MATHUONGHIEU,ANHLON,ANHNHO,THONGTIN,MALOAISP,MANV,LUOTMUA) VALUES 
        ('".$tensp."','".$giasp."','".$soluong."','".$mathuonghieu."','".$anhlon."'
        ,'".$anhnho."','".$mota."','".$maloaisp."','".$manv."','".$luotmua."')";
    $ketqua = mysqli_query($conn,$truyvan);

    $masp = mysqli_insert_id($conn);
    $dem = count($manggiatrichitiet);        
    for ($i=0;$i<$dem;$i++) {
        $tenchitiet = $mangtenchitiet[$i];
        $giatrichitiet = $manggiatrichitiet[$i];

        $truyvanchitiet = "INSERT INTO chitietsanpham(MASP,TENCHITIET,GIATRI) VALUES ('".$masp."','".$tenchitiet."','".$giatrichitiet."')";
        $ketquachitiet = mysqli_query($conn,$truyvanchitiet);            
    }

    if ($ketqua) {
        echo "<h4>Thêm thành công</h4>";
    } else {
        echo "<h4>Thêm thất bại</h4>";
    }

}

//Phân trang Pagination
function HienThiPhanTrang_Ajax() {
    global $conn;
    $truyvan = "SELECT * FROM loaisanpham";
    $ketqua = mysqli_query($conn, $truyvan);
    $tongsotrang = round(mysqli_num_rows($ketqua)/10);
    $j = 1;
    echo '<li class="paginate_button page-item previous disabled" id="bootstrap-data-table_previous">
                <a href="#" class="page-link"><</a>
            </li>';
    for ($i=1;$i<=$tongsotrang;$i++) {	
        if ($i>$j*10) {
            echo '</ul>';
            echo '<ul class="pagination2">';
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
    </li>';
}

//Tìm kiếm loại sp theo tên
function TimKiemLoaiSanPhamTheoTen_Ajax() {
    global $conn;
    $tenloaisp = $_POST["noidungtimkiem"];        

    $truyvan = "SELECT * FROM loaisanpham WHERE TENLOAISP LIKE '%".$tenloaisp."%'";
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

//Thêm loại sản phẩm
function ThemLoaiSanPham_Ajax() {
    global $conn;
    $tenloaisp = $_POST["tenloaisp"];
    $maloaisp = $_POST["maloaisp"];
    $loi = "Đã xảy ra lỗi trong quá trình thêm dữ liệu";        
    if($tenloaisp=="") {
        echo $loi;        
    } else {
        $truyvan = "INSERT INTO loaisanpham(TENLOAISP,MALOAI_CHA) VALUES 
        ('".$tenloaisp."','".$maloaisp."')";
        $ketqua = mysqli_query($conn,$truyvan);
        if ($ketqua) {
            echo "<h4 style=\"color:red\">Thêm thành công</h4>";
        } else {
            echo $loi;
        }

    }
}

//lây danh sách sản phẩm theo trang
function LayDanhSachLoaiSanPhamLimit_Ajax()
{
    global $conn;
    $sotrang = $_POST['sotrang'];
    $limit =  ((int) $sotrang-1)*10;

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

//Xóa loại sản phẩm
function XoaLoaiSanPhamTheoMa_Ajax() {
    global $conn;
    $mangmaloaisp = $_POST["mangmaloaisp"];
    $kiemtra = false;        
    for ($i=0; $i < count($mangmaloaisp); $i++) {                        
        DeQuyLayMaLoaiSPTheoMaLoaiCha($mangmaloaisp[$i]);
        XoaBangLienQuanToiMaLoaiSP($mangmaloaisp[$i]);            
    }

    echo "Bạn đã xóa thành công";
}

function DeQuyLayMaLoaiSPTheoMaLoaiCha($maloaisp) {
    global $conn;
    $truyvan = "SELECT * FROM loaisanpham WHERE MALOAI_CHA =".$maloaisp; 
    $ketqua = mysqli_query($conn,$truyvan);
    $maloai = 0;
    if ($ketqua) {
        while ($dong = mysqli_fetch_array($ketqua)) {
            $maloai = $dong["MALOAISP"];                
            XoaBangLienQuanToiMaLoaiSP($maloai);
            DeQuyLayMaLoaiSPTheoMaLoaiCha($maloai);
            
        }
    }
}

//Xóa tất cả mọi thứ liên quan tới bảng loại sản phẩm
function XoaBangLienQuanToiMaLoaiSP($maloaisp) {

    LayMaSPVaXoaSanPhamTheoMaLoaiSP($maloaisp);
    XoaChiTietThuongHieuTheoMaLoaiSP($maloaisp);
    LayMaKhuyenMaiVaXoaChiTietKhuyenMaiTheoMaKhuyenMai($maloaisp);
    XoaKhuyenMaiTheoMaLoaiSP($maloaisp);
    XoaBangLoaiSanPhamTheoMaLoaiSP($maloaisp); 
}

function XoaBangLoaiSanPhamTheoMaLoaiSP($maloaisp) {
    global $conn;
    $truyvan = "DELETE FROM loaisanpham WHERE MALOAISP = ".$maloaisp;
    mysqli_query($conn,$truyvan);

}

function LayMaKhuyenMaiVaXoaChiTietKhuyenMaiTheoMaKhuyenMai($maloaisp) {
    global $conn;
    $truyvan = "SELECT * FROM khuyenmai WHERE MALOAISP =".$maloaisp; 
    $ketqua = mysqli_query($conn,$truyvan); 
    $makm = 0;
    if ($ketqua) {
        while ($dong = mysqli_fetch_array($ketqua)) {
            $makm = $dong['MAKM'];
            XoaChiTietKhuyenMaiTheoMaKM($makm);
        }
    }
}

function XoaKhuyenMaiTheoMaLoaiSP($maloaisp) {
    global $conn;
    $truyvan = "DELETE FROM khuyenmai WHERE MALOAISP = ".$maloaisp;
    mysqli_query($conn,$truyvan);         
}

function XoaChiTietKhuyenMaiTheoMaKM($makm) {
    global $conn;
    $truyvan = "DELETE FROM chitietkhuyenmai WHERE MAKM = ".$makm; 
    mysqli_query($conn,$truyvan); 
}

function XoaChiTietThuongHieuTheoMaLoaiSP($maloaisp)
{
    global $conn;
    $truyvan = "DELETE FROM chitietthuonghieu WHERE MALOAISP = ".$maloaisp; 
    mysqli_query($conn,$truyvan); 
}

// Xóa tất cả mọi thứ liên quan tới sản phẩm và loại sản phẩm tương ứng
function LayMaSPVaXoaSanPhamTheoMaLoaiSP($maloaisp) {
    global $conn;
    $truyvan = "SELECT * FROM sanpham WHERE MALOAISP =".$maloaisp; 
    $ketqua = mysqli_query($conn,$truyvan); 
    $masp = 0;
    if ($ketqua) {
        while ($dong = mysqli_fetch_array($ketqua)) {
            $masp = $dong["MASP"];
            
            XoaChiTietKhuyenMaiTheoMaSP($masp);
            XoaChiTietSanPhamTheoMaSP($masp);
            XoaChiTietHoaDonTheoMaSP($masp);
            XoaDanhGiaTheoMaSP($masp);
        }
        $truyvan = "DELETE FROM sanpham WHERE MALOAISP = ".$maloaisp; 
        mysqli_query($conn,$truyvan);
    }
}

function XoaDanhGiaTheoMaSP($masp) {
    global $conn;
    $truyvan = "DELETE FROM danhgia WHERE MASP = ".$masp; 
    mysqli_query($conn,$truyvan);
}

function XoaChiTietHoaDonTheoMaSP($masp) {
    global $conn;
    $truyvan = "DELETE FROM chitiethoadon WHERE MASP = ".$masp; 
    mysqli_query($conn,$truyvan);
}

function XoaChiTietSanPhamTheoMaSP($masp) {
    global $conn;
    $truyvan = "DELETE FROM chitietsanpham WHERE MASP = ".$masp; 
    mysqli_query($conn,$truyvan);
}

function XoaChiTietKhuyenMaiTheoMaSP($masp) {
    global $conn;
    $truyvan = "DELETE FROM chitietkhuyenmai WHERE MASP = ".$masp; 
    mysqli_query($conn,$truyvan); 
}
    
?>