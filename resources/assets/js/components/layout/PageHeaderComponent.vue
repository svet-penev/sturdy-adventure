<template>
    <div class="page-header">
        <h3 class="page-title">
            {{$pageHeader}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li v-for="breadCrumb in $pageBreadcrumb" class="breadcrumb-item active" aria-current="page">
                    <a >
                        {{breadCrumb.text}}
                    </a>
                </li>
            </ol>
        </nav>
    </div>
</template>

<script>

    export default {
    }
</script>
