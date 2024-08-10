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

<script setup>
import { ref, onMounted } from 'vue';
import axios from "@/axios.js";

const categories = ref([]);

async function fetchCategories() {
  try {
    const response = await axios.get('categories');
    categories.value = response.data;
  } catch (error) {
    console.error('Error fetching goods:', error);
  }
}

onMounted(() => {
  fetchCategories();
});
</script>

<style scoped>
.card-body {
  text-align: center;
}

.btn {
  width: 100%;
}
</style>
