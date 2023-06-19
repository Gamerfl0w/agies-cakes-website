<template>
<div>
  <button @click="accept()">ACCEPT |</button>
</div>
</template>

<script>
export default {
    created(){
        const options = {
            method: 'GET',
            headers: {
                Accept: 'application/json',
                Authorization: 'Basic c2tfdGVzdF9KeDZ0b01zOUdORnJxeHNBakZlZTNwNE06'
            }
            };

            fetch('https://api.paymongo.com/v1/payments?limit=10', options)
            .then(response => response.json())
            .then(response => console.log(response))
            .catch(err => console.error(err));
    },
    methods: {
        accept(){
            return 1
        }
    }
}
</script>

<style>

</style>