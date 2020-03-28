<template>
    <div class="literature-card mb-5 rounded">
        <div class="row no-gutters literature-card__title p-2">
            <div class="col-1">
                <div class="row no-gutters h-100">
                    <div class="col align-items-center align-self-center text-center">
                        {{ loop }}
                    </div>
                </div>
            </div>
            <div class="col">
                <p class="m-2"><span class="font-weight-bold">Topic:</span> {{ topic }}</p>
                <p class="m-2"><span class="font-weight-bold">Type:</span> {{ type }}</p>
                <p class="m-2"><span class="font-weight-bold">Year:</span> {{ year }}</p>
                <p class="m-2" style="overflow-wrap: break-word;"><span class="font-weight-bold">Link:</span>
                    <a v-bind:href="link" target="_blank">{{ link }}</a>
                </p>
            </div>
            <div class="col-1 align-items-center align-self-center text-center">
                <button v-on:click="updateLitIdForAddingQuote(literature_review_id)"
                    class="btn btn-primary rounded-circle" data-toggle="modal" data-target="#addQuoteModal">+</button>
            </div>
        </div>

        <div v-if="filterByLiteratureReview(quotes, literature_review_id).length == 0" class="row no-gutters">
            <div class="col text-center" style="height: 60px; line-height: 60px; background-color: #cfd6d8;">
                No quote(s) for this source
            </div>
        </div>

        <quote v-for="quote in filterByLiteratureReview(quotes, literature_review_id)" v-bind:key="quote.id"
            v-bind:literature_review_id="literature_review_id" v-bind:quote="quote.quote" v-bind:page="quote.page"></quote>
    </div>
</template>

<script>
    import {
        app
    } from '../app.js'
    import {
        store
    } from '../app.js'

    export default {
        props: ['loop', 'literature_review_id', 'topic', 'type', 'year', 'link'],
        data() {
            return {
                quotes: app.quotes,
                sharedObject: store,
            }
        },
        mounted() {
            // axios.get('/quote').then(response => this.quotes = response.data)
        },
        methods: {
            filterByLiteratureReview(quotes, literature_review_id) {
                return this.quotes.filter(quote => quote.literature_review_id == literature_review_id)
            },
            updateLitIdForAddingQuote(value) {
                this.sharedObject.setLiteratureReviewIdAction(value)
            },
        }
    }
</script>

<style>
    .literature-card {
        background-color: #cfd6d8;
    }

    .literature-card__title {
        background-color: lightblue;
    }
</style>
