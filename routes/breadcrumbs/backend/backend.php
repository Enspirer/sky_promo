<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

Breadcrumbs::for('admin.emailbulk.index', function ($trail) {
    $trail->push('Email Bulk', route('admin.emailbulk.index'));
});

Breadcrumbs::for('admin.campaign.index', function ($trail) {
    $trail->push('Email Campaign', route('admin.campaign.index'));
});

Breadcrumbs::for('admin.campaign.create', function ($trail) {
    $trail->push('Campaign Create', route('admin.campaign.create'));
});

Breadcrumbs::for('admin.campaign.show_statics', function ($trail) {
    $trail->push('Campaign Static', route('admin.campaign.show_statics',1));
});


require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
