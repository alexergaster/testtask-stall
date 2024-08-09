<template>
  <div class="container mt-5">
    <h2 class="mb-4">Категорії</h2>
    <div class="row">
      <div class="col-md-4" v-for="category in categories" :key="category.id">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title mb-4">{{ category.name }}</h5>
            <a :href="`categories/${category.id}`" class="btn btn-primary">
              Переглянути товари
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "@/axios.js";

export default {

  data() {
    return {
      categories: []
    };
  },
  created() {
    this.fetchCategories();
  },
  methods: {
    async fetchCategories() {
      try {
        const response = await axios.get('categories');
        this.categories = response.data;
      } catch (error) {
        console.error('Error fetching goods:', error);
      }
    },
  }
};
</script>

<style scoped>
.card-body {
  text-align: center;
}

.btn {
  width: 100%;
}
</style>
