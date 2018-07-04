<template>
    <div class="w-100">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div v-if="error">
                    <b-alert variant="danger" show> {{ error }}</b-alert>
                    </div>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="user-name">Name</label>
                            <input type="text" class="form-control" id="user-name" placeholder="Name" v-model="item.name">
                        </div>
                        <div class="form-group">
                            <label for="user-email">Email address</label>
                            <input type="email" class="form-control" id="user-email" placeholder="Email"  v-model="item.email">
                        </div>
                        <div class="form-group">
                            <label for="user-password">Password</label>
                            <input type="password" class="form-control" id="user-password" placeholder="Password"  v-model="item.password">
                        </div>
                        <button id="user-submit" type="button" class="btn btn-gradient-primary mr-2" @click="saveData">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    export default {
        mounted() {
            this.$pageHeader = 'Create User';
            this.$pageBreadcrumb = [
                {text: 'Users', link: null},
                {text: 'Create', link: null},
            ];
        },
        data() {
            return {
                loading: false,
                item: null,
                error: null,
            };
        },
        created() {
            this.item = {};
        },
        methods: {
            saveData() {
                this.error = null;
                this.loading = true;
                this.http
                    .post('/users', this.item)
                    .then(response => {
                        this.item = response.data.data
                        this.loading = false;
                        this.$notify({
                            title: 'User was succesfully created!',
                        });
                        this.$router.push('update/'+this.item.id);
                    }).catch(error => {
                        this.loading = false;
                        this.error = error;
                        this.$notify({
                            type: 'error',
                            title: 'Something goes wrong!',
                        });
                    });
            }
        }
    }
</script>