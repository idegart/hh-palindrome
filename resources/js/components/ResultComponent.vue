<template>
    <div>

        <span>{{ leftPart }}</span><span class="palindrome">{{ palindrome }}</span><span>{{ rightPart }}</span>

    </div>
</template>

<script>
    export default {
        name: "ResultComponent",

        props: {
            q: {
                type: String,
                required: true,
            },
            result: {
                type: Object,
                required: true
            }
        },

        data: () => ({
            overWriteStyle: {
                color: 'red',
                backgroundColor: 'yellow'
            },
        }),

        computed: {
            leftPart () {
                if (this.result.start > 0) {
                    return this.q.slice(0, this.result.start)
                }

                return null
            },

            palindrome () {
                return this.q.slice(this.result.start, this.result.end + 1)
            },

            rightPart () {
                if (this.result.end < this.q.length - 1) {
                    return this.q.slice(-(this.q.length - this.result.end - 1))
                }

                return null
            }
        }
    }
</script>

<style scoped>
    .palindrome {
        color: red;
        background-color: yellow
    }
</style>
