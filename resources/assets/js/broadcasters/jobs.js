import {mapState, mapActions, mapGetters} from 'vuex'

export default {

    computed: mapState('jobs', ['jobs'])

}
