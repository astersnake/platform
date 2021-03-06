@extends('platform::dashboard')
@section('title',__($name))
@section('description',__($description))
@section('controller','screen--base')
@section('navbar')
    @foreach($commandBar as $command)
        <li>
            {!! $command !!}
        </li>
    @endforeach
@stop
@section('content')
        <form id="post-form"
              class="px-3"
              method="post"
              enctype="multipart/form-data"
              data-controller="layouts--form"
              data-action="keypress->layouts--form#disableKey
                           layouts--form#submit"
              data-layouts--form-validation="{{ $formValidateMessage }}"
              novalidate
        >
            {!! $layouts !!}
            @csrf
        </form>
    <div id="modals-container">
        @stack('modals-container')
    </div>
    <div data-controller="screen--filter">
        <form id="filters" autocomplete="off" data-action="screen--filter#submit"></form>
    </div>
@stop
