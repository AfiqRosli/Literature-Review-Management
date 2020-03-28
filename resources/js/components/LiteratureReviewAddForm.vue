<template>
    <div>
        <div class="form-group">
            <label for="exampleInputTopic">Topic</label>
            <input type="text" class="form-control" id="exampleInputTopic" v-model="topic">
        </div>
        <div class="form-group">
            <label for="exampleSelectType">Type</label>
            <select name="exampleSelectType" class="form-control" v-model="type">
                <option value="Book">Book</option>
                <option value="Dissertation">Dissertation</option>
                <option value="Journal">Journal</option>
                <option value="Article">Article</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputYear">Year</label>
            <input type="number" class="form-control" id="exampleInputYear" v-model="year">
        </div>
        <div class="form-group">
            <label for="exampleInputLink">Link</label>
            <input type="text" class="form-control" id="exampleInputLink" v-model="link">
        </div>
    </div>
</template>

<script>
    import { app } from '../app.js'

    export default {
        data() {
            return {
                topic: '',
                type: '',
                year: '',
                link: '',
            }
        },
        methods: {
            submit() {
                axios.post('/literature-review', {
                    topic: this.topic,
                    type: this.type,
                    year: this.year,
                    link: this.link,
                }).then( response => {
                    $('#addSourceModal').modal('hide')
                }).finally(
                    axios.get('/literature-review').then(response => app.literatureReviews = response.data)
                )
            }
        },
        created() {
            this.$parent.$on('submit', this.submit)
        }
    }
</script>
