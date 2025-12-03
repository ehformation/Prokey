<h2>Modifier le mot de passe : <?php echo htmlspecialchars($password['label']) ?></h2>

<form method="POST" action="<?php echo url('/projects/' . $project_id . '/passwords/' . $password['id'] . '/update'); ?>">
    <div>
        <label for="label">Libellé :</label>
        <input type="text" id="label" name="label" value="<?php echo htmlspecialchars($password['label']); ?>" required>
    </div>

    <div>
        <label for="password_type_id">Type de mot de passe :</label>
        <select id="password_type_id" name="password_type_id" required>
            <?php foreach ($password_types as $type): ?>
                <option value="<?php echo htmlspecialchars($type['id']); ?>" <?php if ($type['id'] == $password['type_id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($type['label']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <?php foreach ($fields as $field): ?>
        
        <label><?php echo htmlspecialchars($field['field_label']); ?>:</label>
        <?php if($field['field_type'] === 'textarea') : ?>
            <textarea name="extra[<?php echo htmlspecialchars($field['field_name']); ?>]"><?php echo htmlspecialchars($extra[$field['field_name']] ?? ''); ?></textarea>
        <?php else : ?>
            <input type="<?php echo htmlspecialchars($field['field_type']); ?>" name="extra[<?php echo htmlspecialchars($field['field_name']); ?>]" value="<?php echo htmlspecialchars($extra[$field['field_name']] ?? ''); ?>">
        <?php endif; ?>
        <br>
    <?php endforeach; ?>

    <button type="submit">Mettre à jour le mot de passe</button>