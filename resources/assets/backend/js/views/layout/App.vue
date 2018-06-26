<template>
    <div>
        <notifications/>
        <top-bar-component></top-bar-component>
        <div class="container-fluid page-body-wrapper">


            <menu-component></menu-component>

            <div class="main-panel">
                <div class="content-wrapper">
                    <page-header-component></page-header-component>
                    <div class="row">
                        <router-view></router-view>
                    </div>
                </div>


                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {

        }
    }
</script>