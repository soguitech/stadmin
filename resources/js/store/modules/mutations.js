import { monthName } from '../../services/helpers/helper_service';
const moment = require('moment');

const mutations = {
    login: function(state) {
        state.loading = true;
        state.auth_error = null;
    },
    store: function(state) {
        state.loading = true;
        state.store_error = null;
        state.store_success = null;
    },
    storeFailed: function(state, payload){
        state.loading = false;
        state.store_error = payload.error;
    },
    storeSuccess: function(state, payload){
        state.store_error = null;
        state.loading = false;
        state.store_success = payload.success
    },
    loginSuccess: function(state, payload){
        state.auth_error = null;
        state.isLoggedIn = true;
        state.loading = false;
        state.currentUser = Object.assign({}, payload.user, {token: payload.access_token});

        localStorage.setItem("user", JSON.stringify(state.currentUser));
    },
    updateCurrentUser: function(state, payload) {
        state.currentUser = payload
    },
    updateUnread: function (state, payload) {
        state.unreadMessages += parseInt(payload)
    },
    updateContactMessagesCount: function (state, payload) {
        state.contactMessagesCount = payload
    },
    updateContactMessages: function (state, payload) {
        state.contactMessages = payload
    },
    updateUnreadMessages: function(state, payload) {
        state.unreadMessages = 0;
    },
    updateMarkers: function(state, payload) {
        state.markers = payload;
    },
    updateNotifications: function(state, payload) {
        state.notifications = [];
        if (payload.length) {
            for(let i = 0; i < payload.length; i++) {
                if (payload[i].type === "App\\Notifications\\PlanningValidated") {
                    state.notifications.unshift({
                        "created_at": payload[i].created_at,
                        "title": 'Validation de planning',
                        "content": `L'agent ${payload[i].data.user.firstName} ${payload[i].data.user.lastName} a valider son planning du moi de
                          ${monthName(payload[i].data.sumPlanning.month)} ${payload[i].data.sumPlanning.year}`,
                        "user": payload[i].data.user,
                        "sumPlanning": payload[i].data.sumPlanning,
                        "icon": 'clock',
                        "type": payload[i].type,
                        "read_at": payload[i].read_at
                    })
                }

                if (payload[i].type === "App\\Notifications\\MainAdded") {
                    state.notifications.unshift({
                        "created_at": payload[i].created_at,
                        "title": 'Ajout de main courante',
                        "content": `L'agent ${payload[i].data.user.firstName} ${payload[i].data.user.lastName} a ajouter sa main courante du
                          ${moment(payload[i].data.main.dateOfDay).format('LL')}`,
                        "main": payload[i].data.main,
                        "user": payload[i].user,
                        "icon": 'edit',
                        "type": payload[i].type,
                        "read_at": payload[i].read_at
                    })
                }

                if (payload[i].type === "App\\Notifications\\planningAdded") {
                    state.notifications.unshift({
                        "created_at": payload[i].created_at,
                        "title": 'Ajout de planning',
                        "content": `${payload[i].data.user.firstName} ${payload[i].data.user.lastName} a ajouté le planning de l'agent <em><strong>${payload[i].data.planning.agent.user.firstName} ${payload[i].data.planning.agent.user.lastName}</strong></em> de <em><strong>${monthName(payload[i].data.planning.month)} ${payload[i].data.planning.year}</strong></em>`,
                        "planning": payload[i].data.planning,
                        "user": payload[i].user,
                        "icon": 'plus'
                    })
                }


                if (payload[i].type === "App\\Notifications\\SupervisorFinalApproved") {
                    console.log(payload[i])
                    state.notifications.unshift({
                        "created_at": payload[i].created_at,
                        "title": 'Observation superviseur',
                        "content": `Observation du superviseur sur la main courante du ${payload[i].data.main.dayOf} de l'agent `,
                        "main": payload[i].data.main,
                        "user": payload[i].data.user,
                        "icon": 'plus'
                    })
                }
            }
        }
    },
    updateStoreSumPlanning: function(state, payload) {
        state.storeSumPlanning = payload
    },
    loginFailed: function(state, payload){
        state.loading = false;
        state.auth_error = payload.error;
    },
    logout: function (state){
        localStorage.removeItem("user");
        localStorage.removeItem("sumPlanning");
        state.isLoggedIn = false;
        state.currentUser = null;
    },
    updateListSumPlannings: function (state, payload) {
        state.listSumPlannings = payload;
    },
    updateAgentsTrash: function (state, payload) {
        state.agentsTrash = payload;
    },
    updateOnlineUsers: function (state, payload) {
        state.onlineUsers = payload;
    },
    updateClientsTrash: function (state, payload) {
        state.clientsTrash = payload;
    },
    updateMainsTrash: function (state, payload) {
        state.mainsTrash = payload;
    },
    updateClients: function (state, payload) {
        state.clients = payload;
    },
    updateMains: function (state, payload) {
        state.mains = payload;
    },
    updateRoles: function (state, payload) {
        state.roles = payload;
    },
    updateContacts: function (state, payload) {
        state.contacts = payload;
    },
    updateMessages: function (state, payload) {
        state.messages = payload;
    },
    updateSelectedContact: function (state, payload) {
        state.selectedContact = payload;
    },
    updateListDescriptionMain: function (state, payload) {
        state.listDescriptionMain = payload
    },
    updatePlanningWithMain: function (state, payload) {
        state.planningWithMain = payload;
    },
    updatePlanningsCount: function (state, payload) {
        state.planningsCount = payload;
    },
    updatePlannings: function (state, payload) {
        state.plannings = payload;
    },
    updateAgentsCount: function (state, payload) {
        state.agentsCount = payload;
    },
    updateClientsCount: function (state, payload) {
        state.clientsCount = payload;
    },
    updateMainsCount: function (state, payload) {
        state.mainsCount = payload;
    },
    updateMainsCountTrash: function (state, payload) {
        state.mainsCountTrash = payload;
    },
    updateMainsCountForThisMonth: function (state, payload) {
        state.mainsCountForThisMonth = payload;
    },
    updateAgentsCountForThisMonth: function (state, payload) {
        state.agentsCountForThisMonth = payload;
    },
    updatePlanningsCountForThisMonth: function (state, payload) {
        state.planningsCountForThisMonth = payload;
    },
    updateClientsCountForThisMonth: function (state, payload) {
        state.clientsCountForThisMonth = payload;
    },
    updateCurrentPlannings: function (state, payload) {
        state.currentPlannings = payload;
    },
    updatePlanningsTrash: function (state, payload) {
        state.planningsTrash = payload;
    },
    updatePlanningsTrashCount: function (state, payload) {
        state.planningsTrashCount = payload;
    },
    updateConsigneDay: function (state, payload) {
        state.consigneDay = payload;
    },
    updateCurrentMains: function (state, payload) {
        state.currentMains = payload;
    },
    updateAgents: function (state, payload) {
        state.agents = payload;
    },
    updateQualifications: function (state, payload) {
        state.qualifications = payload;
    },
    collapse: function (state, payload) {
        state.isCollapse = payload;
    }
};

export default mutations
