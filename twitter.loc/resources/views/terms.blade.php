@extends('layouts.layout')

@section('title', 'Terms')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            <h1>Terms page</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, dolore ea eligendi error ex minima
                obcaecati! Delectus enim error ex maiores non quia sint. A ad amet culpa dignissimos doloribus, ducimus enim
                esse est eveniet exercitationem explicabo facere magnam neque, nesciunt nisi non pariatur quae rem sit
                tempora
                ut voluptate?
            </p>
        </div>
        <div class="col-3">
            @include('shared.search')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
