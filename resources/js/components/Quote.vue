<template>
    <div>
        <div class="row no-gutters px-3 pt-3">
            <div class="col" style="white-space: pre-wrap;">{{ quote }}</div>
        </div>
        <div class="row no-gutters" style="border-bottom: solid black 2px;">
            <div class="col py-4 pr-3 text-right">Pg {{ page }}</div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id', 'literature_review_id', 'quote', 'page'],
    }
</script>
