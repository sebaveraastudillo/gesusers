<template>
<div>
    <div class="row">
        <div class="col-md-6">
            <form class="form">
                <input id="search" type="number" class="form-control" placeholder="Busca un usuario por su id" v-on:keyup="list()" min="0" max="15">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users">
                        <td><a href="#" data-toggle="modal" v-bind:data-target="'#usermodal_' + user.id">{{ user.first_name }} {{ user.last_name }}</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div v-bind:id="'usermodal_' + user.id" v-for="user in users" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img v-bind:src="user.avatar">
                        </div>
                        <div class="col-md-9">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>{{ user.first_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Apellido</td>
                                        <td>{{ user.last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ user.email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <div v-show="registersuccess" class="alert alert-success">
                                Se registró el usuario con éxito.
                            </div>
                            <div v-show="registererror" class="alert alert-danger">
                                No se logró registrar el usuario.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button v-on:click="register(user)" type="button" class="btn btn-primary">Registrar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                users: [],
                registersuccess: false,
                registererror: false,
                usernotfound: false
            }
        },
        mounted() {
            this.list();
        },
        methods: {
        
            list: function () {
                var self = this;

                var id = $("#search").val();

                $.ajax({
                    url: $("input[name='base_url']").val() + "/users",
                    method: 'POST',
                    data: {'_token': $('input[name="_token"]').val(), id: id},
                    success: function (data) {

                        if (data.users != false) {
                            self.users = data.users;
                            self.usernotfound = false;
                        }
                        else{
                            if (!self.usernotfound) {
                                self.usernotfound = true;
                                self.users = [];
                                $("#modalusernotfound").modal();
                            }
                        }

                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            },
            register: function (user) {
                var self = this;
                $.ajax({
                    url: $("input[name='base_url']").val() + "/register",
                    method: 'POST',
                    data: {'_token': $('input[name="_token"]').val(), first_name: user.first_name, last_name: user.last_name, email: user.email},
                    success: function (data) {

                        if (data.state == "OK") {
                            self.registersuccess = true;
                        } else {
                            self.registererror = true;
                        }

                        setTimeout(function () {
                            self.registersuccess = false;
                            self.registererror = false;
                        }, 5000);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
        }
    }
</script>
