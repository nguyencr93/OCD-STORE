<?php

    include_once "model/connectdb.php";
    include_once "model/catalog.php";
    include_once "model/product.php";

    // echo var_dump($list);

    include_once "view/header.php";

    if(isset($_GET['pg'])&&($_GET['pg']!="")){
        switch($_GET['pg']){
            case 'product':
                $cataloglist = get_catalog();
                if(isset($_GET['idcatalog'])&&($_GET['idcatalog']>0)){
                    $idcatalog = $_GET['idcatalog'];                   
                }else{
                    $idcatalog = 0;
                }
                $productlist = getproduct($idcatalog);
                include_once "view/product.php";
            break;
            case 'checkout':
                include_once "view/checkout.php";
            break;
            case 'cart':
                include_once "view/cart.php";
            break;
            case 'contact':
                include_once "view/contact.php";
            break;
            case 'my-account':
                include_once "view/my-account.php";
            break;
            case 'login-register':
                include_once "view/login-register.php";
            break;
            case 'single-product':
                if(isset($_GET['idproduct'])&&($_GET['idproduct']>0)){
                    $idproduct = $_GET['idproduct'];
                    $detail = get_detail_product($idproduct);
                    include_once "view/single-product.php";
                }else{
                    include_once "view/home.php";
                }     
            break;
            default:
            // $newproduct=...;
            // $featureproduct=...;
            // $onsale=...;
            $newproduct = getproduct();
            $onsaleproduct = get_onsale_product();
            $featureproduct = get_feature_product();
                include_once "view/home.php";
            break;
        }     
    }else{
        // $newproduct=...;
        // $featureproduct=...;
        // $onsale=...;
        $newproduct = getproduct();
        $onsaleproduct = get_onsale_product();
        $featureproduct = get_feature_product();
        include_once "view/home.php";
    }
    
    include_once "view/footer.php";
?>