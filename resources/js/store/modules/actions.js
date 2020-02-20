import apiQualification from '../../api/qualification';
import apiAgent from '../../api/agent';
import apiClient from '../../api/client';
import apiPlanning from '../../api/planning';
import apiMain from '../../api/main';

const actions = {
    login(context) {
        context.commit("login");
    },
    store(context) {
        context.commit("store");
    },
    getNotifications (context) {
        axios.get('/api/notifications', {
            headers: {
                "Authorization": `Bearer ${context.state.currentUser.token}`
            }
        })
            .then((response) => {
                context.commit('updateNotifications', response.data);
            })
    },
    getUnreadMessages (context) {
        axios.get('/api/unreadMessages', {
            headers: {
                "Authorization": `Bearer ${context.state.currentUser.token}`
            }
        })
            .then((response) => {
                context.commit('updateUnreadMessages', response.data);
            })
    },
    getPossibleDayOfMonth (context) {
        let date = new Date();
        let lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
        context.commit('updatePossibleDayOfMonth', {start: date.getDate(), end: lastDay.getDate()})
    },
    getPlanningsCount (context) {
        apiPlanning.count(context.state.currentUser.token).then((response) => {
            context.commit('updatePlanningsCount', response.data.sumPlanningsCount);
            context.commit('updatePlanningsCountForThisMonth', response.data.sumPlanningsCountForThisMonth)
        })
    },
    getPlanningsTrashCount (context) {
        apiPlanning.countTrash(context.state.currentUser.token).then((response) => {
            context.commit('updatePlanningsTrashCount', response.data);
        })
    },
    getPlannings (context) {
        apiPlanning.all(context.state.currentUser.token).then((response) => {
            if (context.state.currentUser.isAdmin) {

                context.commit('updatePlannings', response.data.data);

            } else {
                context.commit('updatePlannings', response.data);
            }
        })
    },
    /*getUserPresence (context) {
      axios.get('/api/user_presence', {
        headers: {
          "Authorization": `Bearer ${context.state.currentUser.token}`
        }
      })
          .then((response) => {
            context.commit('updateUserPresence', response.data);
          })
    },*/
    getPlanningsTrash (context) {
        apiPlanning.trash(context.state.currentUser.token).then((response) => {
            context.commit('updatePlanningsTrash', response.data.data);
        })
    },
    getMainsCount (context) {
        apiMain.count(context.state.currentUser.token).then((response) => {
            context.commit('updateMainsCount', response.data.mainsCount);
            context.commit('updateMainsCountForThisMonth', response.data.mainsCountForThisMonth);
            context.commit('updateMainsCountTrash', response.data.mainsCountTrash)
        })
    },
    getAgentsCount (context) {
        apiAgent.count(context.state.currentUser.token).then((response) => {
            context.commit('updateAgentsCount', response.data.agentsCount);
            context.commit('updateAgentsCountForThisMonth', response.data.agentsCountForThisMonth);
        })
    },
    getAgentsTrash (context) {
        apiAgent.trash(context.state.currentUser.token).then((response) => {
            context.commit('updateAgentsTrash', response.data);
        })
    },
    getClientsTrash (context) {
        apiClient.trash(context.state.currentUser.token).then((response) => {
            context.commit('updateClientsTrash', response.data)
        })
    },
    getMainsTrash (context) {
        apiMain.trash(context.state.currentUser.token).then((response) => {
            context.commit('updateMainsTrash', response.data)
        })
    },
    getClientsCount (context) {
        apiClient.count(context.state.currentUser.token).then((response) => {
            context.commit('updateClientsCount', response.data.clientsCount);
            context.commit('updateClientsCountForThisMonth', response.data.clientsCountForThisMonth);
        })
    },
    getRoles (context) {
        axios.get('/api/roles', {
            headers: {
                "Authorization": `Bearer ${context.state.currentUser.token}`
            }
        })
            .then((response) => {
                context.commit('updateRoles', response.data);
            })
    },
    getContactMessagesCount (context) {
        axios.get('/api/contactMessages_count', {
            headers: {
                "Authorization": `Bearer ${context.state.currentUser.token}`
            }
        })
            .then((response) => {
                context.commit('updateContactMessagesCount', response.data);
            })
    },
    getContactMessages (context) {
        axios.get('/api/contactsMessages', {
            headers: {
                "Authorization": `Bearer ${context.state.currentUser.token}`
            }
        })
            .then((response) => {
                context.commit('updateContactMessages', response.data);
            })
    },
    getCurrentPlannings (context) {
        apiPlanning.current(context.state.currentUser.token).then((response) => {
            if (context.state.currentUser.isAdmin) {

                context.commit('updateCurrentPlannings', response.data.data)

            } else {
                context.commit('updateCurrentPlannings', response.data)
            }
        })
    },
    getContacts (context) {
        axios.get('/api/contacts', {
            headers: {
                "Authorization": `Bearer ${context.state.currentUser.token}`
            }
        })
            .then((response) => {
                context.commit('updateContacts', response.data.contacts);
                context.commit('updateMarkers', response.data.contacts)
            })
    },
    getMarkers (context) {
        axios.get('/api/markers', {
            headers: {
                "Authorization": `Bearer ${context.state.currentUser.token}`
            }
        })
            .then((response) => {
                context.commit('updateMarkers', response.data)
            })
    },
    getConsigneDay (context) {
        axios.get('/api/consigne_day', {
            headers: {
                "Authorization": `Bearer ${context.state.currentUser.token}`
            }
        })
            .then((response) => {
                context.commit('updateConsigneDay', response.data.consigneDay);
            })
    },
    getCurrentMains (context) {
        apiMain.current(context.state.currentUser.token) .then((response) => {
            context.commit('updateCurrentMains', response.data)
        })
    },

    getMains (context) {
        apiMain.all(context.state.currentUser.token).then((response) => {
            context.commit('updateMains', response.data);
        })
    },
    getAgents (context) {
        apiAgent.all(context.state.currentUser.token).then((response) => {
            context.commit('updateAgents', response.data)
        })
    },
    getQualifications (context) {
        apiQualification.all(context.state.currentUser.token).then((response) => {
            context.commit('updateQualifications', response.data)
        })
    },
    getClients (context) {
        apiClient.all(context.state.currentUser.token).then((response) => {
            context.commit('updateClients', response.data)
        })
    },

    /*logout({commit}){
        return new Promise((resolve, reject) => {
            commit('logout')
            localStorage.removeItem('user')
            //delete axios.defaults.headers.common['Authorization']
            resolve()
        })
    }*/
};

export default actions;
