$(document).ready(function() {
	
	$(".btn-hienthithemsanpham").click(function (e) { 
		e.preventDefault();
		$(".themsanpham").fadeIn(300,"swing");
		$(".hienthisanpham").fadeOut(300,"swing");
	});	

	$(".btn-hienthidanhsachsp").click(function (e) { 
		e.preventDefault();
		$(".themsanpham").fadeOut(300,"swing");	
		$(".hienthisanpham").fadeIn(300,"swing");	
	});

	//Phân trang sản phẩm
	$('#phantrangsanpham').bootpag({
		total: $('#phantrangsanpham').attr("data-tongsotrang"),
		maxVisible: 5,
		page:1
	}).on("page", function(event, sotrang){
		
		$.ajax({
			type: "POST",
			url: "../html/page_product/function.php",
			data: {
				action: "LayDanhSachSanPhamLimit_Ajax",
				sotrang: sotrang				
			},			
			success: function (data) {			

				$(".hienthisanpham > table.table").find("tbody").empty();
				$(".hienthisanpham > table.table").find("tbody").append(data);

			}
		});	
	});

	//Xóa sản phẩm
	$("body").delegate(".btn-xoasanpham", "click", function() {
		var masp = $(this).parent().attr("data-id");
		var This = $(this);

		$.ajax({
			type: "POST",
			url: "../html/page_product/function.php",
			data: {
				action: "XoaSanPham_Ajax",
				masp: masp
			},			
			success: function (data) {	
				$(".thongbaoloi").empty();
				$(".thongbaoloi").append(data);
				This.closest('tr').remove();
			}
		});

	});

	//Cập nhật sản phẩm
	$("#btn-capnhatsp").click(function (e) { 
		e.preventDefault();
		var masp = $(this).attr("data-id");
		var tensp = $("#ip-tensanpham").val();
		var giasp = $("#ip-giasanpham").val();
		var soluong = $("#ip-soluong").val();
		var maloaisp = $("#sl-loaisanpham").val();
		var mathuonghieu = $("#sl-thuonghieu").val();
		var anhlon = "/hinhsanpham/" + $("#khunganhlon").find(".kv-zoom-cache").find(".file-preview-image").attr("title");
		var anhnho= "";		
		var demanhnho = $("#khunganhnho").find(".kv-zoom-cache").find(".file-preview-image").length;
		$("#khunganhnho").find(".kv-zoom-cache").find(".file-preview-image").each(function (index) {
			if (index == (demanhnho-1)) {
				anhnho += "/hinhsanpham/" + $(this).attr("title");
			} else {
				anhnho += "/hinhsanpham/" + $(this).attr("title") +",";
			}
		});
		var mota = tinymce.get("ip-thongtin").getContent();	
			
		var mangtenchitiet = [];
		$("input[name='mangtenchitietsanpham[]']").each(function () { 
			var value = $.trim($(this).val());
			if (value.length > 0) {
				mangtenchitiet.push(value);						
			}
		});	
		var manggiatrichitiet = [];
		$("input[name='manggiatrichitietsanpham[]']").each(function () { 
			var value = $.trim($(this).val());
			if (value.length > 0) {
				manggiatrichitiet.push(value);			
			}
		});	
		var mangmachitiet = [];
		$("input[name='mangmachitietsanpham[]']").each(function () { 
			var value = $.trim($(this).val());
			if (value.length > 0) {
				mangmachitiet.push(value);				
			}
		});

		var mangtenchitietsanphambosung = [];
		$("input[name='mangtenchitietsanpham[]'][disabled]").each(function () { 
			var value = $.trim($(this).val());
			if (value.length > 0) {
				mangtenchitietsanphambosung.push(value);				
			}
		});		
		
		var manggiatrichitietsanphambosung = [];
		$("input[name='manggiatrichitietsanpham[]'][disabled]").each(function () { 
			var value = $.trim($(this).val());
			if (value.length > 0) {
				manggiatrichitietsanphambosung.push(value);							
			}
		});			
		
		$.ajax({
			type: "POST",
			url: "../html/page_product/function.php",
			data: {
				action: "CapNhatSanPham_Ajax",
				masp:masp,
				tensp: tensp,
				giasp: giasp,
				soluong: soluong,				
				mathuonghieu: mathuonghieu,
				anhlon: anhlon,
				anhnho: anhnho,
				mota: mota,				
				maloaisp: maloaisp,
				mangtenchitiet: mangtenchitiet,
				manggiatrichitiet: manggiatrichitiet,
				mangmachitiet: mangmachitiet,
				mangtenchitietsanphambosung:mangtenchitietsanphambosung,
				manggiatrichitietsanphambosung:manggiatrichitietsanphambosung
			},			
			success: function (data) {	
				$(".thongbaoloi").empty();
				$(".thongbaoloi").append(data);
			}
		});
		
	});
	//Sửa sản phẩm
	$("body").delegate(".btn-suasanpham", "click", function() {
	
		htmlAnhLon = '<label for="ip-anhlon">Ảnh lớn</label><div class="form-group"><div class="file-loading"><input id="ip-anhlon" name="ip-anhlon" class="file-loading" type="file"></div></div>';
		htmlAnhNho = '<label for="ip-anhnho">Ảnh nhỏ</label><div class="form-group"><div class="file-loading"><input id="ip-anhnho" name="ip-anhnho" multiple class="file-loading" type="file"></div></div>';
		
		$(".themsanpham").fadeIn(300,"swing");
		$("#khunganhlon").empty();
		$("#khunganhlon").append(htmlAnhLon);

		$("#khunganhnho").empty();
		$("#khunganhnho").append(htmlAnhNho);
		
		masp = $(this).parent().attr("data-id");
		$("#btn-capnhatsp").attr("data-id",masp);
		anhnho = $(this).closest("tr").find(".anhnho").attr("data-anhnho");
		thongtin = $(this).closest("tr").find(".thongtin").attr("data-thongtin");
		anhlon = $(this).closest("tr").find(".anhlon").attr("data-anhlon");
		tensp = $(this).closest("tr").find(".tensp").attr("data-tensp");
		maloaisp = $(this).closest("tr").find(".maloaisp").attr("data-maloaisp");		
		mathuonghieu = $(this).closest("tr").find(".mathuonghieu").attr("data-mathuonghieu");
		gia = $(this).closest("tr").find(".gia").attr("data-gia");
		soluong = $(this).closest("tr").find(".soluong").attr("data-soluong");		
	
		$("#ip-tensanpham").val(tensp);
		$("#ip-giasanpham").val(gia);
		$("#ip-soluong").val(soluong);
		$("#sl-loaisanpham").val(maloaisp);
		$("#sl-thuonghieu").val(mathuonghieu);
		tinymce.get("ip-thongtin").setContent(thongtin);	

		vitricat = anhlon.lastIndexOf("/");
		tenhinhanhlon = anhlon.substring(vitricat+1);		
	
		$("#ip-anhlon").fileinput({	
			uploadUrl: "../html/page_product/uploadhinh.php",			
			uploadAsync: true,
			overwriteInitial: true,
			initialPreview: [
				".."+anhlon
			],
			initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
			initialPreviewFileType: 'image', // image is the default and can be overridden in config below
			initialPreviewConfig: [
				{caption: tenhinhanhlon}				
			]			
		});

		arrayanhnholist = anhnho.split(",");
		arrayanhnho = [];
		arraytenanhnho = [];
		for (i=0;i<arrayanhnholist.length;i++) {
			arrayanhnho.push(".."+arrayanhnholist[i]);
			vitricatnho = arrayanhnholist[i].lastIndexOf("/");
			tenhinhanhnho = arrayanhnholist[i].substring(vitricatnho+1);			
			arraytenanhnho.push({caption: tenhinhanhnho});			
		}

		$("#ip-anhnho").fileinput({	
			uploadUrl: "../html/page_product/uploadhinh.php",		
			overwriteInitial: true,
			uploadAsync: true,
			initialPreview: arrayanhnho,
			initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
			initialPreviewFileType: 'image', // image is the default and can be overridden in config below
			initialPreviewConfig: arraytenanhnho			
		});
		//Load chi tiết sản phẩm		

		$.ajax({
			type: "POST",
			url: "../html/page_product/function.php",
			data: {
				action: "LayChiTietSanPhamTheoMa_Ajax",
				masp:masp
			},			
			success: function (data) {
				$("#khungchitietsanpham").empty();									
				$("#khungchitietsanpham").append(data);
				$("#khungchitietsanpham").append($(".anchitietsanpham").find("tr").clone().removeClass("anchitietsanpham"));
			}
		});

		$("html, body").animate({ scrollTop: 0 }, "slow");
	});

	// upload hinh san pham
	$("#ip-anhlon").fileinput({ 
		uploadUrl: "../html/page_product/uploadhinh.php",
		uploadAsync: true,			         
        allowedFileExtensions: ['jpg', 'png', 'gif']
	});
	
	$("#ip-anhnho").fileinput({  
		uploadUrl: "../html/page_product/uploadhinh.php",	
		uploadAsync: true,	
		allowedFileExtensions: ['jpg', 'png', 'gif']		
    });
	
	//Thêm chi tiết sản phẩm
	$("body").delegate(".btn-themchitietsanpham", "click", function(){
		var khungchitietsanpham = $(".anchitietsanpham").clone().removeClass("anchitietsanpham");
		$("#khungchitietsanpham").append(khungchitietsanpham);
		$(this).parent().find(".btn-xoachitietsanpham").removeClass("anbutton");
		$(this).closest("tr").find("input").attr("disabled",true);
		$(this).remove();		
	});

	// xóa xử lý động thêm chi tiết sản phẩm
	$("body").delegate(".btn-xoachitietsanpham", "click", function(){
		$(this).closest("tr").remove();			
	});

	//Xử lý click thêm sản phẩm
	$("#btn-themsp").click(function (e) { 
		e.preventDefault();
		var tensp = $("#ip-tensanpham").val();
		var giasp = $("#ip-giasanpham").val();
		var soluong = $("#ip-soluong").val();
		var maloaisp = $("#sl-loaisanpham").val();
		var mathuonghieu = $("#sl-thuonghieu").val();
		var anhlon = "/hinhsanpham/" + $("#khunganhlon").find(".kv-zoom-cache").find(".file-preview-image").attr("title");
		var anhnho= "";		
		var demanhnho = $("#khunganhnho").find(".kv-zoom-cache").find(".file-preview-image").length;
		$("#khunganhnho").find(".kv-zoom-cache").find(".file-preview-image").each(function (index) {
			if (index == (demanhnho-1)) {
				anhnho += "/hinhsanpham/" + $(this).attr("title");
			} else {
				anhnho += "/hinhsanpham/" + $(this).attr("title") +",";
			}
		});
		var mota = tinymce.get("ip-thongtin").getContent();		
		var mangtenchitiet = [];
		$("input[name='mangtenchitietsanpham[]']").each(function () { 
			var value = $.trim($(this).val());
			if (value.length > 0) {
				mangtenchitiet.push(value);			
			}
		});	
		var manggiatrichitiet = [];
		$("input[name='manggiatrichitietsanpham[]']").each(function () { 
			var value = $.trim($(this).val());
			if (value.length > 0) {
				manggiatrichitiet.push(value);			
			}
		});	
		
		$.ajax({
			type: "POST",
			url: "../html/page_product/function.php",
			data: {
				action: "ThemSanPham_Ajax",
				tensp: tensp,
				giasp: giasp,
				soluong: soluong,				
				mathuonghieu: mathuonghieu,
				anhlon: anhlon,
				anhnho: anhnho,
				mota: mota,				
				maloaisp: maloaisp,
				mangtenchitiet: mangtenchitiet,
				manggiatrichitiet: manggiatrichitiet
			},			
			success: function (data) {	
				$(".thongbaoloi").empty();
				$(".thongbaoloi").append(data);
			}
		});
	});	

	//tinymce mô tả sản phẩm
	tinymce.init({
		selector: 'textarea#ip-thongtin',
		height: 500,
		menubar: false,
		plugins: [
		  'advlist autolink lists link image charmap print preview anchor textcolor',
		  'searchreplace visualblocks code fullscreen',
		  'insertdatetime media table contextmenu paste code help wordcount'
		],
		toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
		content_css: [
		  '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		  '//www.tinymce.com/css/codepen.min.css']
	  });		

	//Thực hiện chức năng thêm loại sản phẩm
	$("#btn-themloaisp").click(function(e) {
		e.preventDefault();
		var tenloaisp = $("#ip-tenloaisanpham").val();	
		var maloaisp = $("#sl-cha").val();	
		$.ajax({
			type: "POST",
			url: "../html/page_product/function.php",
			data: {
				action: "ThemLoaiSanPham_Ajax",
				tenloaisp: tenloaisp,
				maloaisp: maloaisp
			},			
			success: function (data) {	
				$(".thongbaoloi").empty();
				$(".thongbaoloi").append(data);
			}
		});
	});

	//đăng ký luôn luôn chạy lại sự kiện phân trang 
	$("body").delegate("#bootstrap-data-table_paginate > ul.pagination > li","click", function (e){
		e.preventDefault();
		$("#bootstrap-data-table_paginate > ul.pagination > li").not($(this)).removeClass("active");
		$(this).addClass("active");	

		var sotrang = $(this).text();
		$.ajax({
			type: "POST",
			url: "../html/page_product/function.php",
			data: {
				action: "LayDanhSachLoaiSanPhamLimit_Ajax",
				sotrang: sotrang				
			},			
			success: function (data) {	
				$("table.table").find("tbody").empty();
				$("table.table").find("tbody").append(data);

			}
		});		
	});	

	//thực hiện chức năng tìm kiếm
	$("#btn-timkiemloaisp").click(function (e) { 
		e.preventDefault();
		var noidungtimkiem = $("#txt-timtenloaisp").val();
		$.ajax({
			type: "POST",
			url: "../html/page_product/function.php",
			data: {
				action: "TimKiemLoaiSanPhamTheoTen_Ajax",	
				noidungtimkiem: noidungtimkiem								
			},			
			success: function (data) {	
				$("table.table").find("tbody").empty();
				$("table.table").find("tbody").append(data);
				$("ul.pagination").empty();
			}
		});	

	});

	//checkbox chọn tất cả
	$("#cb-chontatca").click(function (e) { 
		e.preventDefault();
		var allcheckbox = $(this).closest("table").find("tbody input:checkbox");
		if($(this).is(":checked")) {
			allcheckbox.prop("checked",true);
		} else {
			allcheckbox.prop("checked",false);
		}		
	});
	
	
	//xóa loại sản phẩm
	$("#btn-xoaloaisanpham").click(function (e) { 
		e.preventDefault();
		var mangcheckbox = [];
		$("input[name='cb-mang[]']:checked").each(function () { 
			var maloai = $(this).attr("data-id");
			mangcheckbox.push(maloai);
		});
		$.ajax({
			type: "POST",
			url: "../html/page_product/function.php",
			data: {
				action: "XoaLoaiSanPhamTheoMa_Ajax",
				mangmaloaisp: mangcheckbox				
			},			
			success: function (data) {	
				//load lại nội dung loại sản phẩm khi xóa
				$.ajax({
					type: "POST",
					url: "../html/page_product/function.php",
					data: {
						action: "LayDanhSachLoaiSanPhamLimit_Ajax",	
						sotrang: 1								
					},			
					success: function (dulieu) {	
						$("table.table").find("tbody").empty();
						$("table.table").find("tbody").append(dulieu);
					}
				});	
				//loai lại phân trang 
				$.ajax({
					type: "POST",
					url: "../html/page_product/function.php",
					data: {
						action: "HienThiPhanTrang_Ajax",									
					},			
					success: function (dulieuphantrang) {	
						$("ul.pagination").empty();
						$("ul.pagination").append(dulieuphantrang);
					}
				});
			}
		});	
	});
});	

