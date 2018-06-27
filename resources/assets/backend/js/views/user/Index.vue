<template>
    <div class="w-100">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
            {{ error }}
        </div>

        <div v-if="items" class="col-lg-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body">
                    <div class="mb-1 float-right">
                        <router-link :to="{ name: 'users.create' }" class="btn btn-gradient-primary btn-icon-text btn-sm">
                            <i class="mdi mdi-plus"></i> Create User
                        </router-link>
                    </div>

                    <b-table hover :items="items">
                        <template slot="action" slot-scope="data">
                            <b-link :to="{ name: 'users.update', params: { 'id': data.item.action } }">
                                <i class="mdi mdi-grease-pencil"></i>
                            </b-link>
                            <b-link @click="deleteData(data)">
                                <i class="mdi mdi-delete"></i>
                            </b-link>
                        </template>
                    </b-table>

                    <b-pagination align="right" :total-rows="pagination.total" v-model="pagination.current_page" :per-page="pagination.per_page" @change="pageChange">
                    </b-pagination>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            this.$pageHeader = 'Users';
            this.$pageBreadcrumb = [
                {text: 'Users', link: null},
                {text: 'List', link: null},
            ];
        },
        data() {
            return {
                loading: false,
                items: null,
                error: null,
                pagination: null
            };
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData(page) {
                this.error = this.items = null;
                this.loading = true;
                this.http
                    .get('/api/users?page='+page)
                    .then(response => {
                        this.loading = false;
                        this.items = this.buildTableColumns(response.data.data, ['email', 'name']);
                        this.pagination = response.data.meta;
                    }).catch(error => {
                        this.loading = false;
                        this.error = error.response.data.message || error.message;
                    });
            },
            pageChange(page) {
                this.fetchData(page);
            },
            deleteData(item) {
                 this.http
                    .delete('/api/users/'+item.item.action)
                    .then(response => {
                          this.$notify({
                            title: 'Delete User',
                            text: response.data.data.name+' was succesfully deleted!'
                        });
                        this.loading = false;
                        this.fetchData();
                    }).catch(error => {
                        this.loading = false;
                        this.$notify({
                            type: 'error',
                            title: 'Something goes wrong!',
                        });
                    });
            }   
        }
    }
</script>