<template>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2">{{$auth.user().name}}</span>
                    </div>
                    <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                </a>
            </li>
            <li class="nav-item">
                <router-link :to="{ name: 'users.index' }" class="nav-link">
                    <span class="menu-title">Users</span>
                    <i class="mdi mdi-account-multiple menu-icon"></i>
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        mounted() {
        }
    }
</script>
