<template>
    <div>
        <div class="form-group">
            <label for="exampleInputQuote">Quote</label>
            <textarea id="exampleInputQuote" cols="30" rows="10" class="form-control" v-model="quote"></textarea>
        </div>
        <div class="form-group">
            <label for="pageInput">Page</label>
            <input name="pageInput" type="text" v-model="page">
        </div>
    </div>
</template>

<script>
    import { app } from '../app.js'
    import { store } from '../app.js'

    export default {
        data() {
            return {
                sharedObject: store,
                quote: '',
                page: ''
            }
        },
        methods: {
            removeWhiteSpaceExceptNewline(quote) {
                return quote.replace(/[ \t]+/g, ' ')
            },
            submit() {
                axios.post('/quote', {
                    literature_review_id: this.sharedObject.state.literature_review_id,
                    quote: this.removeWhiteSpaceExceptNewline(this.quote),
                    page: this.page
                }).then( response => {
                    console.log('Quote Submitted')
                    $('#addQuoteModal').modal('hide')
                }).finally(
                    this.quote = '',
                    this.page = '',
                    axios.get('/quote').then(response => app.quotes = response.data)
                )
            }
        },
        created() {
            this.$parent.$on('submit', this.submit)
        }
    }
</script>
