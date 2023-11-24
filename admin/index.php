<?php
    require_once "../model/connectdb.php";
    require_once "../model/catalog.php";
    require_once "../model/product.php";
    require_once "public/head.php";
    require_once "public/nav.php";
    
    if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'home':
                require_once('public/home.php');
                break;
            case 'delform':
                    if(isset($_GET['id'])&&($_GET['id']>0)){
                    //Xóa danh mục 
                     $id=$_GET['id'];
                     delete_catalog($id);   
                
                }    
                    //loại lại sau khi xóa
                    $cataloglist = get_catalog();
                    require_once('public/categories.php');
                    
                    break;       
            case 'categories':
                $cataloglist = get_catalog();
                require_once('public/categories.php');
                break;
            case 'edit':
                if(isset($_POST['btnedit'])&&($_POST['btnedit'])){
                    if(isset($_POST['id'])&&($_POST['id']>0)){
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        set_catalog($id,$name);
                        $cataloglist=get_catalog();
                        require_once('public/categories.php');
                    }
                }
                break;
            case 'editform':
                if(isset($_GET['id'])&&($_GET['id'] > 0)){
                    $id = $_GET['id'];
                    $catalogone = get_catalog_one($id);
                    require_once('public/editform.php');
                }else{
                    require_once('public/404.php');
                }
                break;
            case 'products':
                require_once('public/products.php');
                break;
            case 'users':
                require_once('public/users.php');
                break;
            default:
                require_once('public/404.php');
        }
    }else{
        require_once "public/home.php";
    }
 
    require_once "public/footer.php";
?>