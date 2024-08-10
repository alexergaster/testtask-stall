<template>
  <div class="container mt-5">
    <div v-if="product" class="row">
      <div class="col-md-6">
        <img :src="`../public/${product.image}`" class="img-fluid" alt="">
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

<script>
import axios from '../axios';
export default {
  name: 'ProductDetail',
  data() {
    return {
      product: null
    };
  },
  created() {
    this.fetchProduct();
  },
  methods: {
    async fetchProduct() {
      const productId = this.$route.params.id;
      try {
        const response = await axios.get(`products/${productId}`);
        this.product = response.data

      } catch (error) {
        console.error('Error fetching goods:', error);
      }
    },
    handleAddToCart() {
      let cart = JSON.parse(localStorage.getItem('cart')) || {};

      if (cart[this.product.id]) {
        cart[this.product.id].quantity++;
      } else {
        cart[this.product.id] = this.product;
        cart[this.product.id].quantity = 1;
      }

      localStorage.setItem('cart', JSON.stringify(cart));

      console.log(localStorage.getItem('cart'))
    }
  }
}
</script>

<style scoped>
/* Можете додати кастомні стилі для компоненту тут */
</style>
