<?php
$useTable = "menu";
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">選單管理</p>
  <form method="post" action="./api/edit.php">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="30%">主選單名稱</td>
          <td width="30%">選單連結網址</td>
          <td width="12%">次選單數</td>
          <td width="10%">顯示</td>
          <td width="10%">刪除</td>
          <td></td>
        </tr>
        <?php
        $rows = all($useTable,['parent'=>0]);

        foreach ($rows as $r) {
        ?>
          <tr class="cent">
            <td>
              <input type="text" name="text[]" value="<?= $r['text']; ?>">
            </td>
            <td>
              <input type="text" name="href[]" value="<?= $r['href']; ?>">
            </td>
            <td>
              <?= nums($useTable,["parent"=>$r['id']]);?>
            </td>
            <td>
              <input type="checkbox" name="sh[]" value="<?= $r['id']; ?>" <?= ($r['sh'] == 1) ? "checked" : ""; ?>>
            </td>
            <td>
              <input type="checkbox" name="del[]" value="<?= $r['id']; ?>">
            </td>
            <td>

              <input type="button" value="編輯次選單" onclick="op('#cover','#cvr','./view/sub_menu.php?id=<?= $r['id']; ?>&table=<?= $useTable; ?>')">

              <input type="hidden" name="id[]" value="<?= $r['id']; ?>">
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
          <input type="hidden" name="table" value="<?= $useTable; ?>">

          <td width="200px">
            <input type="button" onclick="op('#cover','#cvr','./view/<?= $useTable; ?>.php?table=<?= $useTable; ?>')" value="新增主選單">
          </td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>