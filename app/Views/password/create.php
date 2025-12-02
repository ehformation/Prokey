<h2><?php echo $title ?></h2>

<form action="" method="GET">
    <input type="hidden" name="project_id" value="<?php echo $project_id ?>">

    <label for="">Choisir le type</label>
    <select name="password_type_id" id="password_type_id" onchange="this.form.submit()" required>
        <?php foreach($password_types as $password_type): ?>
            <option value="">-- Sélectionner un type --</option>
            <option value="<?php echo $password_type['id'] ?>" <?= $selected_type == $password_type['id'] ? 'selected' : '' ?>><?php echo $password_type['label'] ?></option>
        <?php endforeach; ?>
    </select><br><br>
</form>

<?php if($selected_type): ?>
    <form action="<?php echo url('/projects/' . $project_id . '/passwords') ?>" method="POST">
        <input type="hidden" name="project_id" value="<?php echo $project_id ?>">
        <input type="hidden" name="password_type_id" value="<?php echo $selected_type ?>">

        <label for="label">Titre de mot de passe:</label><br>
        <input type="text" id="label" name="label" required><br><br>

        <?php foreach($fields as $field): ?>
            <label for="<?php echo $field['field_name'] ?>"><?php echo $field['field_label'] ?>:</label><br>
            <?php if($field['field_type'] == 'textarea'): ?>
                <textarea id="<?php echo $field['field_name'] ?>" name="extra[<?php echo $field['field_name'] ?>]" required></textarea><br><br>
            <?php else: ?>
                <input type="<?php echo $field['field_type'] ?>" id="<?php echo $field['field_name'] ?>" name="extra[<?php echo $field['field_name'] ?>]" required><br><br>
            <?php endif; ?>
        <?php endforeach; ?>

        <input type="submit" value="Ajouter le mot de passe">
    </form>
<?php endif; ?>