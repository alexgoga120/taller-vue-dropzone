import Vue from "vue";
import Vuex from 'vuex'

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        users: [],
    },
    actions: {
        addUserImageAction({commit, dispatch}, params) {
            axios.post(route('home.uploadFiles'), params).then(() => {
                dispatch('getUsersAction');
            }).catch();
        },
        getUsersAction({commit}) {
            axios.get(route('home.getUsers')).then(({data}) => {
                commit('getUsers', data.users);
            }).catch();
        }
    },
    mutations: {
        getUsers(state, payload) {
            state.users = payload;
        }
    },
    getters: {
        showUsers: state => state.users
    }
})

export default store;
