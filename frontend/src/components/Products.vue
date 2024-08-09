<template>
  <div class="container mt-5">
    <h1 class="mb-4">Товари</h1>
    <div v-if="products.length" class="row">
      <ProductCard
          v-for="product in products"
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

<script>
import axios from '../axios';
import ProductCard from './ProductCard.vue';

export default {
  components: {
    ProductCard
  },

  name: 'Products',
  data() {
    return {
      products: [],
    };
  },
  created() {
    this.fetchGoods();
  },
  methods: {
    async fetchGoods() {
      try {
        const response = await axios.get('goods');
        this.products = response.data;
      } catch (error) {
        console.error('Error fetching goods:', error);
      }
    },
    goToProduct(id) {
      this.$router.push(`/products/${id}`);
    },
    handleAddToCart(product) {
      // Логіка додавання товару в кошик
      console.log('Added to cart:', product);
    }
  }


};
</script>

