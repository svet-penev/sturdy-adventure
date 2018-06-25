<template>
    <div class="w-100">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
            {{ error }}
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" v-model="item.name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email"  v-model="item.email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password"  v-model="item.password">
                        </div>
                        <button type="button" class="btn btn-gradient-primary mr-2" @click="saveData">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        mounted() {
            this.$pageHeader = 'Update User';
            this.$pageBreadcrumb = [
                {text: 'Users', link: null},
                {text: 'Update', link: null},
            ];
        },
        data() {
            return {
                loading: false,
                item: null,
                id: null,
                error: null,
            };
        },
        created() {
            this.item = {};
            this.item.id = this.$route.params.id;
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.error = null;
                this.loading = true;
                axios
                    .get('/api/users/'+this.item.id)
                    .then(response => {
                        this.item = response.data.data;
                        this.loading = false;
                    }).catch(error => {
                        this.loading = false;
                    });
            },
            saveData() {
                this.error = null;
                this.loading = true;
                axios
                    .put('/api/users/'+this.item.id, this.item)
                    .then(response => {
                        this.loading = false;
                    }).catch(error => {
                        this.loading = false;
                    });
            }
        }
    }
</script>