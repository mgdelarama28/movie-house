import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    // state: {
    //     //
    // },

    // mutations: {
    //     //
    // }

    modules: {
        genres: {
            namespaced: true,
            state: {
                //
            },
            getters: {
                //
            },
            mutations: {
                //
            },
        },

        movies: {
            namespaced: true,
            state: {
                //
            },
            getters: {
                //
            },
            mutations: {
                //
            },
        },

        tvShows: {
            namespaced: true,
            state: {
                //
            },
            getters: {
                //
            },
            mutations: {
                //
            },
        },
    },

    mutations: {
        
    }
});