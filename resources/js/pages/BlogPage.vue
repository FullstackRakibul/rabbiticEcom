<template>
    <div>
        <!-- Blog page start from here  -->

        <div
            class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5"
        >
            <div
                class="rounded overflow-hidden shadow-lg"
                v-for="blog in blogData"
            >
                <img class="w-48" :src="blog.blogImage" />
                <div class="px-6 py-4">
                    <router-link :to="{name:'singleBlog', params: { id:blog.id }}">
                        <div class="font-bold text-xl mb-2">
                            {{ blog.blogTitle }}
                        </div>
                    </router-link>
                    <p class="text-gray-700 text-base">
                        {{ blog.blogContent }}
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
        <!-- Blog page ends here  -->
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

const blogData = ref([]);

onMounted(() => {
    axios
        .get("/api/auth/blogs")
        .then((response) => {
            blogData.value = response.data.data;
            // console.log(response.data.data);
        })
        .catch((error) => {
            console.log(error);
        });
});
</script>
