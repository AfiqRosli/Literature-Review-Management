<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Literature Review Management</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div id="app" class="container mt-5">
            <h1>Literature Review Management</h1>
            <modal target="addSourceModal">
                <literature-review-add-form ref="form"></literature-review-add-form>
            </modal>

            <modal target="addQuoteModal">
                <quote-add-form ref="form"></quote-add-form>
            </modal>

            <div class="mt-2 mb-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addSourceModal">Add New Source</button>
            </div>

            {{-- <input type="text"> --}}

            <literature-review
                v-for="(literatureReview, index) in literatureReviews"
                v-bind:loop="index + 1"
                v-bind:key="literatureReview.id"
                v-bind:literature_review_id="literatureReview.id"
                v-bind:topic="literatureReview.topic"
                v-bind:type="literatureReview.type"
                v-bind:year="literatureReview.year"
                v-bind:link="literatureReview.link"></literature-review>
        </div>

        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
