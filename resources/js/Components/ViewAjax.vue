<template>
    <div>
        <button @click="fetchPost" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            View Post
        </button>

        <div v-if="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-5 rounded shadow-lg w-1/3 max-w-md">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">{{ post.title }}</h2>
                    <button @click="showModal = false" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mb-4">
                    <p class="text-gray-600">{{ post.description }}</p>
                </div>
                <div class="mt-2 text-sm border-t pt-3">
                    <p><strong>Author:</strong> {{ post.username }}</p>
                    <p><strong>Email:</strong> {{ post.useremail }}</p>
                </div>
                <div class="mt-4 text-right">
                    <button @click="showModal = false" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: {
        id: {
            type: [Number, String],
            required: true
        }
    },
    data() {
        return {
            post: {},
            showModal: false,
            loading: false,
            error: null
        };
    },
    methods: {
        async fetchPost() {
            this.loading = true;
            try {
               
                const response = await axios.get(`/api/posts/${this.id}`);
                this.post = response.data;
                this.showModal = true;
                this.error = null;
            } catch (error) {
                console.error("Error fetching post:", error);
                this.error = "Failed to load post data";
            } finally {
                this.loading = false;
            }
        },
    },
};
</script>