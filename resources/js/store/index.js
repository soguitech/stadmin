import state from './modules/state'
import actions from './modules/actions'
import getters from './modules/getters'
import mutations from './modules/mutations'

let store = {
    state,
    getters,
    mutations,
    actions
};

export default store
