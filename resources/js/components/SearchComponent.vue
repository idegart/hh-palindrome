<template>
    <div>

        <input-component ref="inputComponent"
                         @updateResults="setResults"
                         class="w-100"
        />

        <results-list-component :results="results"
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
            results: null,
        }),

        components: {
            ResultsListComponent,
            InputComponent
        },

        methods: {
            setResults (results) {
                this.results = results
            }
        },
    }
</script>

<style scoped>

</style>
