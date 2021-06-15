<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

Breadcrumbs::for('admin.emailbulk.index', function ($trail) {
    $trail->push('Email Bulk', route('admin.emailbulk.index'));
});


require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
