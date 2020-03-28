/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('literature-review', require('./components/LiteratureReview.vue').default);
Vue.component('quote', require('./components/Quote.vue').default);
Vue.component('modal', require('./components/Modal.vue').default);
Vue.component('literature-review-add-form', require('./components/LiteratureReviewAddForm.vue').default);
Vue.component('quote-add-form', require('./components/QuoteAddForm.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
export var store = {
    debug: true,
    state: {
        literature_review_id: ''
    },
    setLiteratureReviewIdAction(newValue) {
        if (this.debug) console.log('setLiteratureReviewIdAction triggered with', newValue)
        this.state.literature_review_id = newValue
    },
    clearLiteratureReviewIdAction() {
        if (this.debug) console.log('clearLiteratureReviewIdAction triggered')
        this.state.literature_review_id = ''
    }
}

export const app = new Vue({
    el: '#app',

    data: function () {
        return {
            literatureReviews: [],
            quotes: [],
        }
    },
    mounted() {
        axios.all([
            axios.get('/literature-review'),
            axios.get('/quote')
        ]).then(axios.spread((first_response, second_response) => {
            this.literatureReviews = first_response.data
            this.quotes = second_response.data
        }))

        // axios.get('/literature-review').then(response => this.literatureReviews = response.data)
        // axios.get('/quote').then(response => this.quotes = response.data)
    }
});
