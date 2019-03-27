<template>
    <div>

        <input-component ref="inputComponent"
                         @updateResults="setResults"
                         @updateQ="setQ"
                         class="w-100"
        />

        <results-list-component :results="results"
                                :q="q"
                                class="mt-3"
        />

    </div>
</template>

<script>
    import InputComponent from "./InputComponent";
    import ResultsListComponent from "./ResultsListComponent";

    export default {
        name: "SearchComponent",

        data: () => ({
            q: '',
            results: null,
        }),

        components: {
            ResultsListComponent,
            InputComponent
        },

        methods: {
            setResults (results) {
                this.results = results
            },

            setQ (q) {
                this.q = q
            }
        },
    }
</script>

<style scoped>

</style>
