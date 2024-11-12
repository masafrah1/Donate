@extends('front-layout.layout')
@section('title', 'أمل المستقبل')
@section('content')
    @include('front-layout.carousel')

    @if (session('toastr_error'))
        <script>
            toastr.error("{!! session('toastr_error') !!}");
        </script>
    @endif
    @include('front-layout.donate-form')

@endsection
