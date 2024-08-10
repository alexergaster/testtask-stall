<template>
  <div class="container mt-5">
    <h1 class="mb-4">Оформлення замовлення</h1>

    <form @submit.prevent="submitOrder">
      <div class="form-group">
        <label for="name">Ім’я:</label>
        <input
            type="text"
            id="name"
            v-model="name"
            class="form-control"
            :class="{ 'is-invalid': nameError }"
        />
        <div v-if="nameError" class="invalid-feedback">{{ nameError }}</div>
      </div>
      <div class="form-group mt-3">
        <label for="phone">Номер телефону:</label>
        <input
            type="text"
            id="phone"
            v-model="phone"
            class="form-control"
            :class="{ 'is-invalid': phoneError }"
        />
        <div v-if="phoneError" class="invalid-feedback">{{ phoneError }}</div>
      </div>

      <div class="form-group mt-3">
        <label for="email">Ел. пошта:</label>
        <input
            type="email"
            id="email"
            v-model="email"
            class="form-control"
            :class="{ 'is-invalid': emailError }"
        />
        <div v-if="emailError" class="invalid-feedback">{{ emailError }}</div>
      </div>

      <div class="form-group mt-3">
        <label for="products">Ваші товари:</label>
        <div v-for="product in products" :key="product.id">
          <h5>{{ product.title }} - <span class="text-success">{{ product.price }} грн</span></h5>
        </div>
      </div>
      <div class="form-group mt-3" v-if="message !== ''">
        <p class="text-center border p-2 rounded">{{ message }}</p>
      </div>
      <button type="submit" class="btn btn-success btn-lg mt-4">
        Підтвердити замовлення
      </button>
    </form>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import axios from '../axios';

const name = ref('');
const phone = ref('');
const email = ref('');
const nameError = ref('');
const phoneError = ref('');
const emailError = ref('');
const products = ref(JSON.parse(localStorage.getItem('cart')) || []);
let message = ref('');

function validateForm() {
  nameError.value = '';
  phoneError.value = '';
  emailError.value = '';

  let isValid = true;

  if (!name.value || name.value.length < 3) {
    nameError.value = 'Ім’я повинно містити принаймні 3 символи';
    isValid = false;
  }

  const phonePattern = /^\d{10,12}$/;
  if (!phone.value || !phonePattern.test(phone.value)) {
    phoneError.value = 'Введіть коректний номер телефону (10-12 цифр)';
    isValid = false;
  }

  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!email.value || !emailPattern.test(email.value)) {
    emailError.value = 'Введіть коректну електронну пошту';
    isValid = false;
  }

  return isValid;
}

async function submitOrder() {
  message.value = '';
  if (validateForm()) {
    const data = {
      name: name.value,
      phone: phone.value,
      email: email.value,
      productsId: products.value,
    };

    try {
      const response = await axios.post('users', data);
      message.value = response.data.message;
    } catch (error) {
      message.value = 'При оформленні замовлення сталась поимлка';
      console.error('There was an error creating the user:', error);
    }
  }
}
</script>

<style scoped>
.card-body {
  text-align: center;
}

.btn {
  width: 100%;
}
</style>
