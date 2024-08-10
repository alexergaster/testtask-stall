<template>
  <div class="container mt-5">
    <div v-if="product" class="row">
      <div class="col-md-6">
        <img :src="productImageUrl" class="img-fluid" alt="">
      </div>
      <div class="col-md-6">
        <h1>{{ product.title }}</h1>
        <p class="lead">{{ product.description }}</p>
        <a :href="`/categories/${product.category.id}`" class="card-text text-muted">Категорія: {{ product.category.name }}</a>
        <p class="text-primary h4">{{ product.price }} грн</p>
        <button @click="handleAddToCart" class="btn btn-primary mt-3">Купити</button>
      </div>
    </div>
    <div v-else>
      <p>Товар не знайдено</p>
    </div>
  </div>
</template>

<script setup>
import {ref, onMounted, computed} from 'vue';
import { useRoute } from 'vue-router';
import axios from '../axios';

const product = ref(null);
const route = useRoute();

const fetchProduct = async () => {
  const productId = route.params.id;
  try {
    const response = await axios.get(`products/${productId}`);
    product.value = response.data;
  } catch (error) {
    console.error('Error fetching product:', error);
  }
};

const handleAddToCart = () => {
  let cart = JSON.parse(localStorage.getItem('cart')) || {};

  if (cart[product.value.id]) {
    cart[product.value.id].quantity++;
  } else {
    cart[product.value.id] = { ...product.value, quantity: 1 };
  }

  localStorage.setItem('cart', JSON.stringify(cart));
};

const productImageUrl = computed(() => `../public/${product.value?.image}`);

onMounted(fetchProduct);
</script>

<style scoped>

</style>
