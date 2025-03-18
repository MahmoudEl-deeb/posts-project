<template>
    <AppLayout title="View Post">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                View Post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-2xl font-bold mb-4">{{ post.title }}</h1>
                        
                        <div class="mb-4">
                            <p class="text-gray-700">{{ post.description }}</p>
                        </div>
                        
                        <div v-if="post.image" class="mb-4">
                            <img :src="'/storage/' + post.image" alt="Post image" class="max-w-md rounded shadow">
                        </div>
                        
                        <div class="mt-6 pt-3 border-t">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Author:</span> 
                                {{ post.user ? post.user.name : 'Unknown' }}
                            </p>
                        </div>
                        
                        <div class="mt-4">
                            <Link :href="route('posts.index')" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:border-gray-500 transition ease-in-out duration-150">
                                Back to Posts
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
    components: {
        AppLayout,
        Link
    },
    props: {
        post: Object
    }
}
</script>