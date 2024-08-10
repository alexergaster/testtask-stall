<template>
  <div @click="goToProduct(product.id)" class="col-md-4 mb-4 product">
    <div class="card h-100">
      <img :src="`../public/${product.image}`" class="card-img-top" alt="">
      <div class="card-body">
        <h5 class="card-title">{{ product.title }}</h5>
        <p class="card-text text-primary">{{ product.price }} грн</p>
        <p v-if="product.category" class="card-text text-muted">Категорія: {{ product.category.name }}</p>
        <p v-if="isInCart" class="card-text text-danger">Кількість обрано: {{ product.quantity }}</p>
        <button v-if="!isInCart" @click.stop="addToCart(product)" class="btn btn-primary mt-3">Купити</button>
        <button v-if="isInCart" @click.stop="removeWithCart(product)" class="btn btn-danger mt-3">Видалити</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
  isInCart: {
    type: Boolean,
    default: false,
  },
  product: {
    type: Object,
    required: true,
  },
});

const emit = defineEmits(['selectProduct', 'addToCart', 'removeWithCart']);

function goToProduct(id) {
  emit('selectProduct', id);
}

function addToCart(product) {
  emit('addToCart', product);
}

function removeWithCart(product) {
  emit('removeWithCart', product);
}
</script>

<style scoped>
.product {
  cursor: pointer;
}
</style>
