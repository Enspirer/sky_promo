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

Breadcrumbs::for('admin.campaign.edit', function ($trail) {
    $trail->push('Campaign Edit', route('admin.campaign.edit',1));
});

Breadcrumbs::for('admin.companies.index', function ($trail) {
    $trail->push('Companies', route('admin.companies.index'));
});

Breadcrumbs::for('admin.queue.index', function ($trail) {
    $trail->push('Queue Process', route('admin.queue.index'));
});

Breadcrumbs::for('admin.singlemail.index', function ($trail) {
    $trail->push('Single Mail', route('admin.singlemail.index'));
});

Breadcrumbs::for('admin.singlemail.create', function ($trail) {
    $trail->push('Single Mail Create', route('admin.singlemail.create'));
});

Breadcrumbs::for('admin.singlemail.show_statics', function ($trail) {
    $trail->push('Single Campaign Static', route('admin.singlemail.show_statics',1));
});

Breadcrumbs::for('admin.sky_promotion_email.index', function ($trail) {
    $trail->push('Promotion Email', route('admin.sky_promotion_email.index'));
});



require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
