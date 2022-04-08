<?php
include('../engine/addGoodFunc.php');
?>
<a href="../templates/">на главную</a>
<form enctype="multipart/form-data" action="" method="POST">
    <fieldset>
        <legend>Добавить товар</legend>
        <div>
            <table>
                <tr>
                    <td><label for="title">Наименование:</label></td>
                    <td><input name="title" id="title" type="text" required></td>
                </tr>
                <tr>
                    <td><label for="price">Цена:</label></td>
                    <td><input name="price" id="price" type="number" min="0.01" step="0.01" required></td>
                </tr>
                <tr>
                    <td><label for="info">Описание:</label></td>
                    <td><textarea name="info" id="info" cols="60" rows="10" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="img">Картинка:</label></td>
                    <td><input name="img" type="file" required accept="image/jpeg"> </td>
                </tr>
                <tr>
                    <td></td>
                    <td><br><input type="submit" name="addgood"></td>
                </tr>
            </table>
        </div>
    </fieldset>
</form>