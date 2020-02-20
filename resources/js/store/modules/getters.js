const getters = {
  isLoading: state => {
    return state.loading;
  },
  isLoggedIn: state => {
    return state.isLoggedIn;
  },
  currentUser: state => {
    return state.currentUser;
  },
  activities: state => {
    return state.activities;
  },
  authError: state => {
    return state.auth_error;
  },
  notifications: state => {
    return state.notifications;
  },
  markers: state => {
    return state.markers;
  },
  roles: state => {
    return state.roles;
  },
  unreadMessages: state => {
    return state.unreadMessages;
  },
  contactMessagesCount: state => {
    return state.contactMessagesCount;
  },
  contactMessages: state => {
    return state.contactMessages;
  },
  contacts: state => {
    return state.contacts;
  },
  messages: state => {
    return state.messages;
  },
  selectedContact: state => {
    return state.selectedContact;
  },
  storeSuccess: state => {
    return state.store_success;
  },
  onlineUsers: state => {
    return state.onlineUsers;
  },
  storeError: state => {
    return state.store_error;
  },
  agentsTrash: state => {
    return state.agentsTrash;
  },
  planningsTrash: state => {
    return state.planningsTrash;
  },
  planningsTrashCount: state => {
    return state.planningsTrashCount;
  },
  clientsTrash: state => {
    return state.clientsTrash;
  },
  mainsTrash: state => {
    return state.mainsTrash;
  },
  mainsCountTrash: state => {
    return state.mainsCountTrash;
  },
  listSumPlannings: state => {
    return state.listSumPlannings;
  },
  currentPlannings: state => {
    return state.currentPlannings;
  },
  plannings: state => {
    return state.plannings;
  },
  clients: state => {
    return state.clients;
  },
  mains: state => {
    return state.mains;
  },
  listDescriptionMain : state => {
    return state.listDescriptionMain
  },
  planningWithMain: state => {
    return state.planningWithMain
  },
  planningsCount: state => {
    return state.planningsCount
  },
  planningsCountForThisMonth: state => {
    return state.planningsCountForThisMonth
  },
  agentsCount: state => {
    return state.agentsCount
  },
  agentsCountForThisMonth: state => {
    return state.agentsCountForThisMonth
  },
  clientsCount: state => {
    return state.clientsCount
  },
  clientsCountForThisMonth: state => {
    return state.clientsCountForThisMonth
  },
  mainsCountForThisMonth: state => {
    return state.mainsCountForThisMonth
  },
  mainsCount: state => {
    return state.mainsCount
  },
  consigneDay: state => {
    return state.consigneDay
  },
  currentMains: state => {
    return state.currentMains
  },
  agents: state => {
    return state.agents
  },
  qualifications: state => {
    return state.qualifications
  },
    isCollapse: state => {
      return state.isCollapse
    }
};

export default getters;

