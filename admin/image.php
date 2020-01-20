<?php
$useTable = "image";
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">校園映像資料管理</p>
  <form method="post" action="./api/edit.php">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="70%">校園映像資料圖片</td>
          <td width="7%">顯示</td>
          <td width="7%">刪除</td>
          <td></td>
        </tr>
        <?php

        $sum = nums($useTable);
        $div = 3;
        $pages = ceil($sum / $div);
        $p = (!empty($_GET['p'])) ? $_GET['p'] : 1;
        $start = ($p - 1) * $div;
        $rows = all($useTable, [], "LIMIT $start,$div");

        foreach ($rows as $r) {
        ?>
          <tr class="cent">
            <td>
              <img src="./img/<?= $r['file']; ?>" style="width:100px;height:68px">
            </td>
            <td>
              <input type="checkbox" name="sh[]" value="<?= $r['id']; ?>" <?= ($r['sh'] == 1) ? "checked" : ""; ?>>
            </td>
            <td>
              <input type="checkbox" name="del[]" value="<?= $r['id']; ?>">
            </td>
            <td>

              <input type="button" value="更新圖片" onclick="op('#cover','#cvr','./view/update_<?= $useTable; ?>.php?id=<?= $r['id']; ?>&table=<?= $useTable; ?>')">

              <input type="hidden" name="id[]" value="<?= $r['id']; ?>">
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <div class="cent">
      
      <?php

          if(($p-1) > 0){
            echo "<a href='admin.php?do=$useTable&p=".($p - 1)."' style='text-decoration:none'> < </a>";
          }

          for($i=1;$i<=$pages;$i++){
            $fontSize=($i==$p)?"24px":"16px";
            echo "<a href='admin.php?do=$useTable&p=$i' style='font-size:$fontSize;text-decoration:none'> ".$i." </a>";
          }

          if(($p+1) <= $pages){
            echo "<a href='admin.php?do=$useTable&p=".($p + 1)."' style='text-decoration:none'> > </a>";
          }
      ?>
    </div>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <input type="hidden" name="table" value="<?= $useTable; ?>">

          <td width="200px">
            <input type="button" onclick="op('#cover','#cvr','./view/<?= $useTable; ?>.php?table=<?= $useTable; ?>')" value="新增校園映像圖片">
          </td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>