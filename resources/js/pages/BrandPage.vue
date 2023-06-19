<template>
    <div>
        <!-- Brand Page start from here....  -->

        <div class="container mx-auto py-4">
            <h1 class="text-2xl font-bold mb-4">All Brands</h1>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div
                    v-for="brand in brandData"
                    class="p-4 bg-white shadow rounded-lg"
                >
                    <img
                        :src="brand.brandImage"
                        alt="brand Image"
                        class="w-full h-32 object-cover mb-2"
                    />

                    <h2 class="text-lg font-bold">
                        {{ brand.brandName }}
                    </h2>
                    <p class="text-sm text-gray-500 mb-2">
                        {{ brand.brandDesc }}
                    </p>

                    <!-- <router-link
                        :to="`/categories/${category.id}`"
                        class="text-blue-500 hover:underline"
                        >View Products</router-link
                    > -->
                    <a class="text-blue-500 hover:underline">
                        View Products
                    </a>
                </div>
            </div>
        </div>

        <!-- Brand Page ends here....  -->
    </div>
</template>


<script setup>

import {ref, onMounted } from 'vue';

const brandData = ref([]);

onMounted(()=>{

    axios
    .get('/api/brands')
    .then((response)=>{
        brandData.value = response.data.data;
    }).catch((error)=>{
        console.log(error);
    });

});


</script>
