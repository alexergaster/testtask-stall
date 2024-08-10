<template>
  <div class="container mt-5">
    <h1 class="mb-4">Товари</h1>
    <div class="mb-4">
      <label for="sortBy">Сортувати за:</label>
      <select id="sortBy" v-model="sortBy">
        <option value="name">Назвою</option>
        <option value="price">Ціною</option>
      </select>
    </div>
    <div v-if="products.length" class="row">
      <ProductCard
          v-for="product in sortedProducts"
          :key="product.id"
          :product="product"
          @selectProduct="goToProduct"
          @addToCart="handleAddToCart"
      />
    </div>
    <div v-else>
      <p class="text-center">Немає доступних товарів</p>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import axios from '../axios';
import ProductCard from './ProductCard.vue';
import router from "@/router.js";

const products = ref([]);
const sortBy = ref('name');

const fetchGoods = async () => {
  try {
    const response = await axios.get('products');
    products.value = response.data;
  } catch (error) {
    console.error('Error fetching goods:', error);
  }
};

const sortedProducts = computed(() => {
  return [...products.value].sort((a, b) => {
    if (sortBy.value === 'name') {
      return a.title.localeCompare(b.title);
    } else if (sortBy.value === 'price') {
      return a.price - b.price;
    }
    return 0;
  });
});

const goToProduct = (id) => {
  // Assuming `router` is imported or provided globally
  router.push(`/products/${id}`);
};

const handleAddToCart = (product) => {
  let cart = JSON.parse(localStorage.getItem('cart')) || {};

  if (cart[product.id]) {
    cart[product.id].quantity++;
  } else {
    cart[product.id] = { ...product, quantity: 1 };
  }

  localStorage.setItem('cart', JSON.stringify(cart));
};

onMounted(fetchGoods);
</script>

<style scoped>

</style>
