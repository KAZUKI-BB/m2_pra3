<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>派遣情報編集</title>
</head>
<body>
    <h1>派遣情報編集</h1>
    <form method="POST" action="<?php echo route('dispatches.update', $dispatch->id); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div>
            <label for="event_id">イベント</label>
            <select id="event_id" name="event_id" required>
                <?php foreach ($events as $event): ?>
                    <option value="<?php echo $event->id; ?>" <?php echo $event->id == $dispatch->event_id ? 'selected' : ''; ?>>
                        <?php echo $event->name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="worker_id">人材</label>
            <select id="worker_id" name="worker_id" required>
                <?php foreach ($workers as $worker): ?>
                    <option value="<?php echo $worker->id; ?>" <?php echo $worker->id == $dispatch->worker_id ? 'selected' : ''; ?>>
                        <?php echo $worker->name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="accepted">承諾状況</label>
            <select id="accepted" name="accepted">
                <option value="1" <?php echo $dispatch->accepted ? 'selected' : ''; ?>>承諾</option>
                <option value="0" <?php echo !$dispatch->accepted ? 'selected' : ''; ?>>未承諾</option>
            </select>
        </div>
        <button type="submit">更新</button>
    </form>
</body>
</html>
