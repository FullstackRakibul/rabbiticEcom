<template>
    <div>
        <!-- Responsive navbar design with tailwind css start-->
        <div class="bg-primary-color text-white py-3.5 px-6 shadow md:flex justify-between items-center">
            <div class="flex justify-center item-center cursor-pointer">
                <h1 class="text-2xl text-secondary-color font-semi-bold text-center">
                    Rabbitic E-com
                </h1>
            </div>
            <div class="w-full max-w-xl relative flex">
                <span class="absolute left-4 top-3 text-lg text-gray-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" name="search" id="search"
                    class="w-full border border-primary border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none"
                    placeholder="search" />
                <button
                    class="bg-secondary-color border border-primary text-white px-8 rounded-r-md hover:bg-transparent hover:text-primary transition">
                    Search
                </button>
            </div>

            <span @click="MenuOpen()" class="absolute md:hidden right-6 top-1.5 coursor-pointer text-4xl">
                <i class="fas fa-bars"></i>
            </span>

            <ul class="md:flex md:flex-row md:items-start md:px-0 px-10 md:pb-0 pb-10 md:static absolute md:import md:w-auto w-full top-14 duration-700 ease-in"
                :class="[open ? 'left-0' : 'left-[100%]']">
                <li class="md:mx-4 md:my-0 my-6">
                    <router-link class="text-white hover:text-secondary-color mx-3 text-lg font-normal px-2"
                        v-for="item of navlist" :key="item" :to="item.path">{{ item.name }}
                    </router-link>
                </li>
            </ul>
        </div>
        <!-- Responsive navbar design with tailwind css end-->


    </div>
</template>

<script setup>

import { ref } from "vue";

let open = ref(false);

function MenuOpen() {
    open.value = !open.value;
}

const navlist = [
    { name: "Home", path: "/" },
    { name: "Login", path: "/login" },
    { name: "Register", path: "/register" },
    { name: "categories", path: "/categories" },
];


</script>
