<template>
    <p>Hello World!</p>

</template>

<script>
    export default {
        mounted() {
            this.$color = 'a';
            console.log(this.$color);
        }
    }

</script>