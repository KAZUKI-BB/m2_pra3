<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理メニュー</title>
</head>
<body>
    <h1>管理メニュー</h1>
    <ul>
        <li><a href="<?php echo route('events.index'); ?>">イベント管理</a></li>
        <li><a href="<?php echo route('workers.index'); ?>">人材管理</a></li>
        <li><a href="<?php echo route('dispatches.index'); ?>">派遣情報管理</a></li>
    </ul>
    <form method="POST" action="<?php echo route('logout'); ?>">
        <?php echo csrf_field(); ?>
        <button type="submit">ログアウト</button>
    </form>
</body>
</html>
