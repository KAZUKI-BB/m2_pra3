<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>人材一覧</title>
</head>
<body>
    <h1>人材一覧</h1>
    <a href="<?php echo route('workers.create'); ?>">新規人材登録</a>
    <table>
        <thead>
            <tr>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($workers as $worker): ?>
                <tr>
                    <td><?php echo $worker->name; ?></td>
                    <td><?php echo $worker->email; ?></td>
                    <td>
                        <a href="<?php echo route('workers.edit', $worker->id); ?>">編集</a>
                        <form action="<?php echo route('workers.destroy', $worker->id); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- 管理画面に戻るボタン -->
    <br>
    <a href="<?php echo route('home'); ?>">管理画面に戻る</a>
</body>
</html>
