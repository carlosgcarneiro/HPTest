<?php

$tabs = [
    [
        'title'=> trans('terms.information'),
        'link' => !isset($term)?route('admin.terms.create'):route('admin.terms.edit',['term' => $term->id])

    ],
    [
        'title'=> trans('terms.thumbnail_video'),
        'link' => !isset($term)?'#':route('admin.terms.uploads.create',['term' => $term->id]),
        'disable' =>!isset($term)?true:false

    ],
];
?>
<h3>
    {{trans('terms.manage_term')}}
</h3>
<div class="text-right">
    {!! Button::link(trans('terms.list_terms'))->asLinkTo(route('admin.terms.index')) !!}
</div>
{!! Navigation::tabs($tabs) !!}
<div>
    {!! $slot !!}
</div>