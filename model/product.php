<?php
    function getproduct($idcatalog=0){
        $sql = " SELECT * FROM product WHERE 1";
        
        if($idcatalog>0){
            $sql .= " AND idcatalog=".$idcatalog;
        }

        $sql .= " ORDER BY id DESC";
        return get_all($sql);
    }

    function get_onsale_product(){
        $sql = " SELECT * FROM product WHERE promotion > 0 ORDER BY promotion DESC";
        return get_all($sql);
    }

    function get_feature_product(){
        $sql = " SELECT * FROM product WHERE new = 1 ORDER BY id DESC";
        return get_all($sql);
    }

    function get_detail_product($idproduct){
        $sql = " SELECT * FROM product WHERE id =".$idproduct;
        return get_one($sql);
    }
?>