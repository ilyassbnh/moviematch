import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        user: null,
        token: null,
    },
    mutations: {
        setUser(state, user) {
            state.user = user;
        },
        setToken(state, token) {
            state.token = token;
        },
    },
    actions: {
        async register({ commit }, user) {
            const response = await axios.post('/api/register', user);
            commit('setToken', response.data.token);
            axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`;
        },
        async login({ commit }, user) {
            const response = await axios.post('/api/login', user);
            commit('setToken', response.data.token);
            axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`;
        },
        async logout({ commit }) {
            await axios.post('/api/logout');
            commit('setToken', null);
            commit('setUser', null);
            delete axios.defaults.headers.common['Authorization'];
        },
    },
});
