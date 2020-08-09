<template>
    <div>
    <div v-bind:id="'usermodal_' + user.id" v-for="user_modal in users_modal" class="modal" tabindex="-1" role="dialog">
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
                                <tbodyd>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>@{{ user_modal.first_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Apellido</td>
                                        <td>@{{ user_modal.last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>@{{ user_modal.email }}</td>
                                    </tr>
                                </tbodyd>
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
                users_modal: []
            }
        }
    }
</script>
