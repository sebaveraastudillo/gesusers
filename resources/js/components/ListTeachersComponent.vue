<template>
<div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="teacher in teachers">
                        <td>{{ teacher.nombre }}</td>
                        <td>{{ teacher.apellido }}</td>
                        <td>{{ teacher.email }}</td>
                        <td><a href="#" data-toggle="modal" v-bind:data-target="'#deletemodal_' + teacher.id">Eliminar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div v-bind:id="'deletemodal_' + teacher.id" v-for="(teacher, index) in teachers" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar Profesor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            Esta seguro que desea eliminar el profesor?
                        </div>
                        <div class="col-md-12">
                            <div v-show="deletesuccess" class="alert alert-success">
                                Se eliminó el profesor con éxito.
                            </div>
                            <div v-show="deleteerror" class="alert alert-danger">
                                No se logró eliminar el profesor.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button v-on:click="deleteTeacher(teacher, index)" type="button" class="btn btn-primary">Aceptar</button>
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
                teachers: [],
                deletesuccess: false,
                deleteerror: false,
            }
        },
        mounted() {
            this.list();
        },
        methods: {
        
            list: function () {
                var self = this;

                $.ajax({
                    url: $("input[name='base_url']").val() + "/getTeachers",
                    method: 'POST',
                    data: {'_token': $('input[name="_token"]').val()},
                    success: function (data) {
                        self.teachers = data.teachers;
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            },
            deleteTeacher: function (teacher, index) {
                var self = this;
                $.ajax({
                    url: $("input[name='base_url']").val() + "/deleteTeacher",
                    method: 'POST',
                    data: {'_token': $('input[name="_token"]').val(), id: teacher.id},
                    success: function (data) {

                        if (data.status == "OK") {
                            self.deletesuccess = true;
                            self.teachers.splice(index, 1);
                        } else {
                            self.deleteerror = true;
                        }

                        setTimeout(function () {
                            self.deletesuccess = false;
                            self.deleteerror = false;
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
