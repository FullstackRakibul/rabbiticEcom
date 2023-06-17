<script setup>
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
</script>

<template>
    <div>
        <div>
            <Header class="container" />
            <div>
                <router-view v-slot="{ Component, route }">
                    <div :key="route.path">
                        <Component :is="Component" />
                    </div>
                </router-view>
            </div>
            <Footer />
        </div>
    </div>
</template>
