@extends('base.base')

@section('content')
<search-component></search-component>
<list-users-component></list-users-component>

<modal-user-not-found-component></modal-user-not-found-component>

<div class="row">
    <div class="col-md-12">
        <a href="{{ url("/teachers") }}" class="btn btn-primary">Usuarios Registrados</a>
    </div>
</div>
@endsection