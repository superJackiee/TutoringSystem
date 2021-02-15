<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="form-group">
    <label class="control-label">Subcategory</label>
    <select name="subcategory_id" class="form-control max-600">
        <option value="">Select a category</option>
        <?php foreach ($subcategories as $item): ?>
            <?php if ($item->id == old('category_id')): ?>
                <option value="<?php echo html_escape($item->id); ?>"
                        selected><?php echo html_escape($item->name); ?></option>
            <?php else: ?>
                <option value="<?php echo html_escape($item->id); ?>"><?php echo html_escape($item->name); ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
</div>