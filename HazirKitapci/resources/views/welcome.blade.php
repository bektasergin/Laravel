@extends('layouts.master')

@section('page_title', 'Ana Sayda - Yetenek')

@section('page_description', 'İSTKA Ana Sayfasıdır.')

@section('page_head_css')

@endsection

@section('content')
    <!-- @include('layouts.sections.home._aboutHome') -->
    @include('layouts.sections.home._slider')
    @include('layouts.sections.home._feature')
    @include('layouts.sections.home._categories')
    @include('layouts.sections.home._books')



@endsection

@section('page_footer_js')

@endsection