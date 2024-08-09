<template>
  <div>
    <h1>Posts</h1>
    <div v-if="posts.length">
      {{ posts }}
      <div v-for="post in posts" :key="post.id">
        <h2>{{ post.name }}</h2>
      </div>
    </div>
    <div v-else>
      <p>No posts available</p>
    </div>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  data() {
    return {
      posts: []
    };
  },
  created() {
    this.fetchPosts();
  },
  methods: {
    async fetchPosts() {
      try {
        const response = await axios.get('goods');
        this.posts = response.data;
      } catch (error) {
        console.error('Error fetching posts:', error);
      }
    }
  }
};
</script>
