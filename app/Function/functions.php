<?php
function MenuMulti($data,$parent_id ,$str="",$select)
{
    foreach ($data as $val) {
        $id = $val["id"];
        $ten= $val["name"];
        if ($val['parent_id'] == $parent_id) {
            // print_r($select);  exit();
            if ($select!=0 && $id == $select) {
                echo '<option value="'.$id.'" selected >'.$str." ".$ten.'</option>';
            }	else {
                echo '<option value="'.$id.'">'.$str." ".$ten.'</option>';
            }
            MenuMulti($data,$id,$str.'--',$select);
        }
    }
}
function listcate ($data,$parent_id =0,$str="")
{
    foreach ($data as $val) {
        $id = $val["id"];
        $ten= $val["name"];
        if ($val['parent_id'] == $parent_id) {
            echo '<tr>';
            if ($str =="") {
                echo '<td ><strong>'.$id.'</strong></td>';
                echo '<td ><strong style="color:blue;">'.$str.'- '.$ten.'</strong></td>';
            } else {
                echo '<td ><strong>'.$id.'</strong></td>';
                echo '<td style="color:green;">'.$str.'--'.$ten.'</td>';
            }
            echo '<td class="list_td aligncenter">
		            <a href="admin/category/edit/'.$id.'" title="Sửa"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;
		            <a href="admin/category/delete/'.$id.'" title="Xóa" onclick="return xacnhan(\'Xóa danh mục này ?\') "> <span class="glyphicon glyphicon-remove"></span> </a>
			      </td>    
			    </tr>';
            listcate ($data,$id,$str." -- ");
        }
    }
}
function showCategories($categories, $parent_id = 0, $char = '')
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }
     
    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child)
    {
        echo '<ul>';
        foreach ($cate_child as $key => $item)
        {
            // Hiển thị tiêu đề chuyên mục
            echo '<li>'.$item['name'];
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['id'], $char.'|---');
            echo '</li>';
        }
        echo '</ul>';
    }
}

?>
