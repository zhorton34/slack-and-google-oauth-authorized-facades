Vue.component('home', {
    props: ['user'],

    mounted() {
        this.get()
    },

    methods:
    {
        get()
        {
            axios.post('/auth/google/sheets')
                .then((response) => { console.log(response) })
        }
    }
});
