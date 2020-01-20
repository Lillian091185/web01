<?php
 $useTable="admin";
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">管理者帳號管理</p>
  <form method="post" action="./api/edit.php">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="45%">帳號</td>
          <td width="45%">密碼</td>
          <td width="10%">刪除</td>
          <td></td>
        </tr>
        <?php
        $rows=all($useTable);

        foreach($rows as $r){
        ?>
        <tr class="cent">
          <td>
            <input type="text" name="acc[]" value="<?=$r['acc'];?>">
          </td>
          <td>
            <input type="password" name="pw[]" value="<?=$r['pw'];?>">
          </td>
          <td>
            <input type="checkbox" name="del[]" value="<?=$r['id'];?>">
          </td>
          <td>
            <input type="hidden" name="id[]" value="<?=$r['id'];?>">
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <input type="hidden" name="table" value="<?=$useTable;?>">

          <td width="200px">
            <input type="button"      
                   onclick="op('#cover','#cvr','./view/<?=$useTable;?>.php?table=<?=$useTable;?>')" 
                   value="新增管理者帳號">
          </td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>