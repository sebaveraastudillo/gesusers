<template>
<div class="row">
    <div class="col-md-6">
        <form class="form">
            <input id="search" type="number" class="form-control" placeholder="Busca un usuario por su id" v-on:keyup="list(this)" min="0" max="15">
        </form>
    </div>
    <div class="col-md-6">
        <a href="#" class="btn btn-primary">Usuarios Registrados</a>
    </div>
</div>
</template>
