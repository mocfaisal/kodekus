@extends('admin.layouts.master')

@section('meta-content')
<title>Tag &middot; {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.tags.edit', $tag) }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.tags.tag-form tagId="{{ $tag->id }}" />
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection