<template>
    <div v-if="results !== null">

        <div v-if="results.length">

            <result-component v-for="(result, index) in results"
                              :key="index"
                              :result="result" />

        </div>

        <div v-else class="alert alert-warning" role="alert">
            Палиндромов не найдено!
        </div>

    </div>
</template>

<script>
    import ResultComponent from "./ResultComponent";
    export default {
        name: "ResultsListComponent",
        components: {ResultComponent},
        props: {
            results: {
                type: Array|null,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
