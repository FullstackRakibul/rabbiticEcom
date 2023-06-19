<template>
    <div>
        <div class="rounded overflow-hidden shadow-lg">
            <img class="w-48" :src="singleBlogData.blogImage" />
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">
                    {{ singleBlogData.blogTitle }}
                </div>
                <p class="text-gray-700 text-base">
                    {{ singleBlogData.blogContent }}
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
                    >#photography</span
                >
                <span
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
                    >#travel</span
                >
                <span
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
                    >#winter</span
                >
            </div>
        </div>
    </div>
</template>

<script setup>

import { ref, onMounted } from "vue";
import { useRoute } from 'vue-router';

// const props = defineProps({
//     id: Number,
//     blogTitle: String,
//     blogImage: String,
//     blogContent: String,
// });

const route=useRoute();

const singleBlogData = ref([]);

onMounted(()=>{
    axios.get(`/api/auth/blog/show/${route.params.id}`)
    .then((response)=>{
        singleBlogData.value = response.data.data;
    })
    .catch((error) => {
            console.log(error);
        });
});
</script>
