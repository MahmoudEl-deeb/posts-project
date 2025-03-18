<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    posts: Object
});
</script>

<template>
    <div>
        <div class="text-center">
            <Link href="/posts/create" class="mt-4 px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Create Post
            </Link>
        </div>
        <div class="mt-6 rounded-lg border border-gray-200">
            <div class="overflow-x-auto rounded-t-lg">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="text-left">
                        <tr>
                            <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">ID</th>
                            <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Title</th>
                            <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Posted By</th>
                            <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Slug</th>
                            <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Image</th>
                            <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Created At</th>
                            <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr v-for="post in posts.data" :key="post.id">
                            <td class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">{{ post.id }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ post.title }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ post.user ? post.user.name : 'No User' }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ post.slug }}</td>
                            <td class="py-2" v-if="post.image"><img :src="post.image" alt="Post Image" width="100"></td>
                            <td v-else class="px-4 py-2 whitespace-nowrap text-gray-700">No Image</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700">{{ post.created_at }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-700 space-x-2">
                                <Link :href="`/posts/${post.id}`" class="inline-block px-4 py-1 text-xs font-medium text-white bg-blue-400 rounded hover:bg-blue-500">View</Link>
                                <Link :href="`/posts/${post.id}/edit`" class="inline-block px-4 py-1 text-xs font-medium text-white bg-yellow-600 rounded hover:bg-blue-700">Update</Link>
                                <Link :href="`/posts/${post.id}/delete`" class="inline-block px-4 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-blue-700">Delete</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <pagination :links="posts.links" />
            </div>
        </div>
    </div>
</template>
