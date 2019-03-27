<template>
    <div v-if="results !== null">

        <div v-if="results.length">

            <ul>
                <li v-for="(result, index) in results"
                    :key="index">

                    <result-component :q="q"
                                      :result="result" />

                </li>
            </ul>

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
            q: {
                type: String,
                required: true,
            },
            results: {
                type: Array|null,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
