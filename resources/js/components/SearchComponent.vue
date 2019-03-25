<template>
    <div>

        <input-component ref="inputComponent" @updateResults="setResults" />

        <results-list-component :results="results" />

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
