import {mapState, mapActions, mapGetters} from 'vuex'

export default {
    computed: mapState('forms', ['jobForm']),
    methods: mapActions('forms', ['templateJobForm', 'setJobForm'])
}
