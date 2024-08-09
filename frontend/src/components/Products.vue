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
      sortBy: 'name',
    };
  },
  computed: {
    sortedProducts() {
      return [...this.products].sort((a, b) => {
        if (this.sortBy === 'name') {
          return a.title.localeCompare(b.title);
        } else if (this.sortBy === 'price') {
          return a.price - b.price;
        }
        return 0;
      });
    }
  },
  created() {
    this.fetchGoods();
  },
  methods: {
    async fetchGoods() {
      try {
        const response = await axios.get('products');
        this.products = response.data;
      } catch (error) {
        console.error('Error fetching goods:', error);
      }
    },
    goToProduct(id) {
      this.$router.push(`/products/${id}`);
    },
    handleAddToCart(product) {
      console.log('Added to cart:', product);
    }
  }
};
</script>
