<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Результат кешированной функции</h1>
<table class="table">
    <tr>
        <th>Дата</th>
        <th>Тип</th>
        <th>Id юзера</th>
    </tr>
    <?php foreach ($datas as $data): ?>
    <tr>
        <td> <?= $data->date ?> </td>
        <td> <?= $data->type ?> </td>
        <td> <?= $data->user_id ?> </td>
    </tr>
    <?php endforeach; ?>
</table>
