import Vue from "vue";
import Vuex from 'vuex'

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        users: [],
    },
    actions: {
        async addUserImageAction({commit, dispatch}, params) {
            await commit('addUserImage', params);
            dispatch('getUsersAction')
        },
        getUsersAction({commit}) {
            axios.get(route('home.getUsers')).then(({data}) => {
                commit('getUsers', data.users);
            }).catch();
        }
    },
    mutations: {
        addUserImage(state, payload) {
            axios.post(route('home.uploadFiles'), payload).then(() => {
                console.log("add image to user")
            }).catch();
        },
        getUsers(state, payload) {
            state.users = payload;
        }
    },
    getters: {
        showUsers: state => state.users
    }
})

export default store;
