<template>
    <div>
    <div class="card">
        <div class="card-header">
            <h5 class="d-flex justify-content-between align-items-center">Roles 
               <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addRoleModal">
                + Role
                </button>             
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Display Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created at</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    
    <div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Role Name</label>
                            <input type="text" v-model="form.role_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role Description</label>
                            <input type="text" v-model="form.role_description" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click.prevent="addRole">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    name: 'RoleManagementComponent',
    data(){
        return{
            form:{
                role_name: '',
                role_description: '',
            }
        }
    },
    methods: {
        addRole() {
            console.log(this.form);
        }
    }
}
</script>

<style>

</style>