@extends('layouts.master')

@section('page_title', 'Kitap Ekle - Yetenek')

@section('page_description', 'İSTKA Kitap Ekleme Sayfasıdır.')

@section('page_head_css')

@endsection

@section('content')
    
    @include('layouts.sections.book._page_header')
    @include('layouts.sections.book._createBook')

@endsection
