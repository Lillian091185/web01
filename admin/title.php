<?php
$useTable = "title";
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站標題管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">網站標題</td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $rows = all($useTable);

                foreach ($rows as $r) {
                ?>
                    <tr class="cent">
                        <td>
                            <img src="./img/<?= $r['file']; ?>" style="width:300px;height:30px">
                        </td>
                        <td>
                            <input type="text" name="text[]" value="<?= $r['text']; ?>">
                        </td>
                        <td>

                            <input type="radio" name="sh" value="<?= $r['id']; ?>" <?= ($r['sh'] == 1) ? "checked" : ""; ?>>
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
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $useTable; ?>">

                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./view/<?= $useTable; ?>.php?table=<?= $useTable; ?>')" value="新增網站標題圖片">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>