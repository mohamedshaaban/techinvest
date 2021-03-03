<template>
    <div id="page" class="hfeed site">

            <router-view :key="$route.fullPath"></router-view>

    </div>
</template>

<script>
    import Header from "./components/layout/header/Header";
    import Footer from "./components/layout/footer/Footer";
    export default {
     }
</script>
