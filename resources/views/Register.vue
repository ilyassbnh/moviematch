<template>
    <div>
        <h1>Register</h1>
        <form @submit.prevent="register">
            <input type="text" v-model="name" placeholder="Name">
            <input type="email" v-model="email" placeholder="Email">
            <input type="password" v-model="password" placeholder="Password">
            <input type="password" v-model="password_confirmation" placeholder="Confirm Password">
            <button type="submit">Register</button>
        </form>
    </div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
    name: 'Register',
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
        };
    },
    methods: {
        ...mapActions(['register']),
    },
};
</script>
