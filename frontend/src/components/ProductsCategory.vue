<template>
  <div class="container mt-5">
    <h2 class="mb-4">Товари в категорії: {{ category }}</h2>
    <div class="row">
      <ProductCard
          v-for="product in products"
          :key="product.id"
          :product="product"
          @selectProduct="goToProduct"
          @addToCart="handleAddToCart"
      />
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import axios from '@/axios.js';
import ProductCard from '@/components/ProductCard.vue';

const products = ref([]);
const category = ref(null);
const route = useRoute();
const router = useRouter();

const fetchCategory = async () => {
  const categoryId = route.params.id;
  try {
    const response = await axios.get(`categories/${categoryId}`);
    products.value = response.data.products;
    category.value = response.data.name;
  } catch (error) {
    console.error('Error fetching goods:', error);
  }
};

const goToProduct = (id) => {
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

onMounted(fetchCategory);
</script>

<style scoped>

</style>
