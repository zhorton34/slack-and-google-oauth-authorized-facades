import {mapState, mapActions} from 'vuex'

Vue.component('home', {

    components: {mapState, mapActions},

    props: ['user'],

    mounted() {
        this.setUser()
        this.get()

        this.createChannel()
    },

    computed:
    {
        ...mapState(['authUser']),
        endpoint()
        {
            return 'https://slack.com/api/channels.create'
        }

    },

    methods:
    {
        ...mapActions(['setUser']),


        createChannel()
        {
            //
            // var instance = axios.create();
            // delete instance.defaults.headers.common['X-CSRF-TOKEN']
            // delete instance.defaults.headers.common['X-Requested-With']
            //
            // setTimeout(() => {
            //     axios.get(this.endpoint, {
            //         params: {
            //             token: this.authUser.services[1].access_token,
            //             name: 'newzakslackchannel-dev'
            //         },
            //         headers: {}
            //     }).then(response => {console.log('response: ', response)})
            // }, 1000)
        },
        get()
        {
            axios.post('/auth/google/sheets')
                .then((response) => { console.log(response) })
        }
    }
});
