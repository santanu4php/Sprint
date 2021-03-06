<br />
<h1><?php echo lang('docs_search_results') ?></h1>

<div class="well">
    <?php echo form_open( current_url(), 'class="form-inline"'); ?>
        <input type="text" name="search_terms" class="form-control" style="width: 85%" value="<?php echo set_value('search_terms', $search_terms) ?>" />
        <input type="submit" name="submit" class="btn btn-primary" value="<?php echo lang('docs_search'); ?>"/>
    <?php echo form_close(); ?>
</div>

<p><small><?php echo isset($results) && isset($results) ? count($results) : 0; ?> result<?= count($results) == 1 ? '' : 's'; ?> found in <?php echo $search_time ?> seconds.</small></p>

<?php if (isset($results) && is_array($results) && count($results)) : ?>

    <?php foreach ($results as $result) : ?>
    <div class="search-result">
        <p class="result-header">
            <a href="<?php echo site_url($result['url']) ?>"><?php echo $result['title'] ?></a>
        </p>
        <p class="result-url"><?php echo $result['url'] ?></p>
        <p class="result-excerpt">
            <?php echo preg_replace("/({$search_terms})/", "<mark>$1</mark>", $result['extract']); ?>
        </p>
    </div>
    <?php endforeach; ?>

<?php else: ?>

    <div class="alert alert-info">
        <?php echo sprintf(lang('docs_no_results'), $search_terms); ?>
    </div>

<?php endif; ?>
