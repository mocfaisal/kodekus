@extends('admin.layouts.master')

@section('meta-content')
<title>Category | {{ config('app.name') }} </title>
@endsection

@section('breadcrumbs')
{{ Breadcrumbs::render('admin.categories.index') }}
@endsection

@section('content')
<div class="flex-1 flex flex-col p-8">
  <livewire:admin.categories.categories-table>
</div>

@endsection

@push('styles')

@endpush

@section('scripts')

@endsection