export default {
    setUser({commit})
    {
        axios.get('/user').then(({data}) => {
            commit('setUser', data)
        })
    }
}
