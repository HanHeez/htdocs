<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <?php
        session_start();
        include("header.html");
    ?>

</head>
<body>
        <!-- Left Panel -->
    <?php
        include("sidebar-leftpanel.html");
    ?>
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <?php 
            include("header-menu.php");
        ?>     

        <div class="content mt-3">
            <?php
                switch ($_GET["page"]) {
                    case 'loaisanpham':                        
                        include("page_product/loaisanpham.php");                        
                        break;
                    case 'sanpham':
                        include("page_product/sanpham.php");
                            # code...
                        break;
                        
                    default:
                        include("page_product/hoadon.php");
                        # code...
                        break;
                }
            ?>
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <?php
        include("footer.html");
    ?>

</body>