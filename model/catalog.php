<?php
    function get_catalog(){
        $sql = " SELECT * FROM catalog WHERE 1 ORDER BY name";
        return get_all($sql);
    }

    function get_catalog_one($id){
        $sql = " SELECT * FROM catalog WHERE id=".$id;
        return get_one($sql);
    }

    function set_catalog($id,$name){
        $sql = "UPDATE catalog SET name='".$name."' WHERE id=".$id;
        update($sql);
    }
    function delete_catalog($id){
        $sql="DELETE FROM catalog WHERE id=".$id;
        //kiểm tra datalog có sp không
        $dssp=getproduct($id);
        if(count($dssp)>0){
            $tb="Danh mục này có ".count($dssp)." sản phẩm.Bạn không được phép xóa";
        }else{
            delete($sql);
            $tb="Xóa thành công  ";
        }
        return $tb;
    }
?>