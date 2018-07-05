<template>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="/img/logo.svg">
              </div>
              <form class="pt-3" autocomplete="off" @submit.prevent="login" method="post">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" v-model="email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" v-model="password" required>
                </div>
                <div class="mt-3">
                  <button id="login" type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    <i class="input-helper"></i></label>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    data(){
      return {
        email: null,
        password: null,
        error: false
      }
    },
    methods: {
      login(){
        var params = {
          email: this.email,
          password: this.password
        };
        this.$auth.login({
            params: params, 
            success: function () {
                this.$notify({
                    title: 'Welcome!',
                });
            },
            error: function (response) {
                this.$notify({
                    title: response.response.data.msg,
                    type: 'error',
                });
            },
            rememberMe: true,
            redirect: '/',
            fetchUser: true,
        });
      },
    }
  } 
</script>