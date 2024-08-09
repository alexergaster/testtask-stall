<template>
  <div @click="goToProduct(product.id)" class="col-md-4 mb-4 product">
    <div class="card h-100">
      <img :src="product.image" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title">{{ product.name }}</h5>
        <p class="card-text">{{ product.descriptor }}</p>
        <p class="card-text text-primary">{{ product.price }} грн</p>
        <p class="card-text text-muted">Категорія: {{ product.category }}</p>
        <button @click.stop="addToCart(product)" class="btn btn-primary mt-3">Купити</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ProductCard',
  props: {
    product: {
      type: Object,
      required: true
    }
  },
  methods: {
    goToProduct(id) {
      this.$emit('selectProduct', id);
    },
    addToCart(product) {
      this.$emit('addToCart', product);
    }
  }
}
</script>

<style scoped>
.product {
  cursor: pointer;
}
</style>