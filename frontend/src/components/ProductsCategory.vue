<template>
  <div class="container mt-5">
    <h2 class="mb-4">Tовари в категорії: {{ category }}</h2>
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

<script>
import axios from "@/axios.js";
import ProductCard from "@/components/ProductCard.vue";

export default {
  components: {ProductCard},

  data() {
    return {
      products: [],
      category: null,
    };
  },
  created() {
    this.fetchCategory();
  },
  methods: {
    async fetchCategory() {
      const categoryId = this.$route.params.id;
      try {
        const response = await axios.get(`categories/${categoryId}`);
        this.products = response.data.products;
        this.category = response.data.name;
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

<style scoped>
.card-img-top {
  height: 200px;
  object-fit: cover;
}

.card-body {
  text-align: center;
}

.btn {
  width: 100%;
}
</style>
